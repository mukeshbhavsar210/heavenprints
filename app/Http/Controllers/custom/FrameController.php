<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Frame;
use App\Models\FrameBorder;
use App\Models\FrameFrame;
use App\Models\FrameMetal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\FrameShape;
use App\Models\FrameSize;
use App\Models\FrameWrap;
use App\Models\HardwareDisplay;
use App\Models\HardwareFinishing;
use App\Models\HardwareStyle;
use App\Models\Lamination;
use App\Models\Modification;
use App\Models\Product;
use App\Models\ProductImage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FrameController extends Controller {

    public function index(Request $request) {
        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();
        $canvas = FrameShape::where('types','canvas')->get();
        $acrylic = FrameShape::where('types','acrylic')->get();
        $metal = FrameShape::where('types','metal')->get();
        $wood = FrameShape::where('types','wood')->get();
        $others = FrameShape::where('types','others')->get();
        $recommended = FrameSize::where('types','recommended')->get();
        $square = FrameSize::where('types','square')->get();
        $panaromic = FrameSize::where('types','panaromic')->get();
        $large = FrameSize::where('types','large')->get();
        $small = FrameSize::where('types','small')->get();
        $wraps = FrameWrap::where('types','wrap')->get();
        $borders = FrameWrap::where('types','border')->get();    
        $wrap_borders = FrameBorder::get();
        $standards = FrameFrame::where('types','standard')->get();
        $premium = FrameFrame::where('types','premium')->get();
        $floating = FrameFrame::where('types','floating')->get();                   
        $hardware_styles = HardwareStyle::get();
        $hardware_displays = HardwareDisplay::get();
        $hardware_basic_finishings = HardwareFinishing::where('types','basic')->get();
        $hardware_advance_finishings = HardwareFinishing::where('types','advance')->get();
        $laminations = Lamination::all();
        $frameSizes = FrameSize::all();
        $modifications = Modification::all();

        $data['canvas'] = $canvas;
        $data['acrylic'] = $acrylic;
        $data['metal'] = $metal;
        $data['wood'] = $wood;
        $data['others'] = $others;
        $data['frameSizes'] = $frameSizes;
        $data['wraps'] = $wraps;
        $data['borders'] = $borders;
        $data['wrap_borders'] = $wrap_borders;
        $data['recommended'] = $recommended;
        $data['square'] = $square;
        $data['panaromic'] = $panaromic;
        $data['large'] = $large;
        $data['small'] = $small;
        $data['standards'] = $standards;
        $data['premium'] = $premium;
        $data['floating'] = $floating;
        $data['hardware_styles'] = $hardware_styles;
        $data['hardware_displays'] = $hardware_displays;
        $data['hardware_basic_finishings'] = $hardware_basic_finishings;
        $data['hardware_advance_finishings'] = $hardware_advance_finishings;
        $data['frame_accordion'] = $frame_accordion;
        $data['tab_canvas'] = $tab_canvas;
        $data['laminations'] = $laminations;
        $data['modifications'] = $modifications;

        // Load stored image and options from session
        $image = Session::get('uploaded_image');
        $options = Session::get('image_options', [
            'frame' => 10,
            'size' => 20,
            'wrap_wrap' => 30,
            'wrap_frame' => 40,
            'price' => 50, // Default price
        ]);

        $data['image'] = $image;

        //Select Metal Frame and store in session       
        $request->session()->forget('sizePrice'); 
        $request->session()->forget('framePrice');  
        session()->forget('sizePrice,  framePrice, wrapWrapPrice'); 

        $selection = Session::get('selection', []);

        return view('front.shop.custom_frame.index', $data, $options, $selection );
    }

   
    public function getFrameDetails(Request $request){
        // Get frame details from database based on selected radio button
        $standards = FrameFrame::where('id', $request->frame_id)->first();

        return response()->json([
            'name'  => $standards->name ?? 'Unknown',
            'price' => $standards->price ?? 0
        ]);
    }

    public function upload(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads', $imageName, 'public');

            // Store image in session
            Session::put('uploaded_image', $path);

            return response()->json([
                'success' => true,
                'image_url' => asset('storage/' . $path),
                //'image_url' => asset('storage/' . $path),
                //'image_id' => $imageRecord->id
            ]);
        }
        return response()->json(['success' => false]);
    }   

    public function delete(){
        session()->forget('uploaded_image');
        return response()->json(['success' => 'Image deleted']);
    }

    //Calculations
    public function updateOptions(Request $request) {
        $frames = FrameShape::pluck('price', 'slug')->toArray();
        $sizes = FrameSize::pluck('price', 'slug')->toArray();
        $wrap_wraps = FrameWrap::pluck('price', 'slug')->toArray();
        $wrap_frames = FrameFrame::pluck('price', 'slug')->toArray();
        $hardware_styles = HardwareStyle::pluck('price', 'slug')->toArray();
        $hardware_finishings = HardwareFinishing::pluck('price', 'slug')->toArray();

        $prices = [
            'frame' => $frames,
            'size' => $sizes,
            'wrap_wrap' => $wrap_wraps,
            'wrap_frame' => $wrap_frames,
            'hardware_style' => $hardware_styles,
            'hardware_display' => ['open_back' => 0, 'dust_cover' => 49],
            'hardware_finishing' => $hardware_finishings,            
            'lamiation' => ['no' => 0, 'standard' => 149, 'premium' => 249],
            'retouching' => ['fixed' => 299],
            'proof' => ['proof' => 49],
        ];

        // Get individual prices for each selected option
        $selectedPrices = [
            'frame_price' => $prices['frame'][$request->frame] ?? 0,
            'size_price' => $prices['size'][$request->size] ?? 0,
            'wrap_wrap_price' => $prices['wrap_wrap'][$request->wrap_wrap] ?? 0,
            'wrap_frame_price' => $prices['wrap_frame'][$request->wrap_frame] ?? 0,
            'hardware_style_price' => $prices['hardware_style'][$request->hardware_style] ?? 0,
            'hardware_display_price' => $prices['hardware_display'][$request->hardware_display] ?? 0,
            'hardware_finishing_price' => $prices['hardware_finishing'][$request->hardware_finishing] ?? 0,
            'lamination_price' => $prices['lamination'][$request->lamination] ?? 0,
            'retouching_price' => $prices['retouching'][$request->retouching] ?? 0,
            'proof_price' => $prices['proof'][$request->proof] ?? 0,
            
        ];
   
        // Store updated options in session
        Session::put('image_options', [
            'frame' => $request->frame,
            'size' => $request->size,
            'wrap_wrap' => $request->wrap_wrap,
            'wrap_frame' => $request->wrap_frame,
            'hardware_style' => $request->hardware_style,
            'hardware_display' => $request->hardware_display,
            'hardware_finishing' => $request->hardware_finishing,
            'lamination' => $request->lamination,
            'retouching' => $request->retouching,
            'proof' => $request->proof,
            'prices' => $selectedPrices, // Storing individual prices
        ]);

        return response()->json($selectedPrices);
    }
}