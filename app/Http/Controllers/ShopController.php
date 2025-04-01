<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SVG;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

use App\Models\Frame;
use App\Models\FrameBorder;
use App\Models\FrameFrame;
use App\Models\FrameMetal;
use Illuminate\Support\Facades\Session;
use App\Models\FrameShape;
use App\Models\FrameSize;
use App\Models\FrameWrap;
use App\Models\HardwareDisplay;
use App\Models\HardwareFinishing;
use App\Models\HardwareStyle;
use App\Models\Lamination;
use App\Models\Modification;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ShopController extends Controller {
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';
        $brandsArray = [];

        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $brands = Brand::orderBy('name','ASC')->where('status',1)->get();

        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug_category',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug_sub_category',$subCategorySlug)->first();
            $products = $products->where('sub_category_id',$subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        if(!empty($request->get('brand'))) {
            $brandsArray = explode(',',$request->get('brand'));
            $products = $products->whereIn('brand_id',$brandsArray);
        }

        // Price slider
        if($request->get('price_max') != '' && $request->get('price_min') != '') {
            if($request->get('price_max') == 1000){
                $products = $products->whereBetween('price',[intval($request->get('price_min')),1000000]);
            } else {
                $products = $products->whereBetween('price',[intval($request->get('price_min')),intval($request->get('price_max'))]);
            }
        }

        //Search main header
        if (!empty($request->get('search'))){
            $products = $products->where('name','like','%'.$request->get('search').'%');
        }

        if($request->get('sort') != ''){
            if($request->get('sort') == 'latest'){
                $products = $products->orderBy('id','DESC');
            } else if($request->get('sort') == 'price_asc') {
                $products = $products->orderBy('price','ASC');
            } else {
                $products = $products->orderBy('price','DESC');
            }
        } else {
            $products = $products->orderBy('id','DESC');
        }

        $products = $products->paginate(10);

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;
        $data['brandsArray'] = $brandsArray;
        $data['priceMax'] = (intval($request->get('price_max')) == 0 ? 1000 : $request->get('price_max'));
        $data['priceMin'] = intval($request->get('price_min'));
        $data['sort'] = $request->get('sort');

        return view('front.shop.index',$data);
    }

    //CUSTOM NEON PRODUCT
    public function neonProducts(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $colors = ['#ffffff', '#e5097f', '#009846', '#0000ff', '#834e98', '#ef7b1b', '#62bed3', '#eedfc8', '#e31e24', '#ffed00'];
        $fonts = ['Passionate', 'Dreamy', 'Flowy', 'Original', 'Classic', 'Boujee', 'Funky', 'Chic', 'Delight', 'Classy', 'Romantic', 'Robo', 'Charming', 'Quirky', 'Stylish', 'Sassy', 'Glam', 'DOPE', 'Chemistry', 'Acoustic', 'Sparky', 'Vibey', 'LoFi', 'Bossy', 'ICONIC', 'Jolly', 'MODERN',];

        $categorySelected = ' ';
        $subCategorySelected = ' ';
        
        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug_category',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        $products = $products->paginate(10);

        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;
        $data['colors'] = $colors;
        $data['fonts'] = $fonts;

        return view('front.shop.neon',$data);
    }


    //METAL PRODUCT
    public function metalProducts(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';        

        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug_category',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug_sub_category',$subCategorySlug)->first();
            $products = $products->where('sub_category_id',$subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        $products = $products->paginate(10);

        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;
        
        return view('front.shop.metal',$data);
    }

   

    public function search(Request $request, $searchCategorySlug = null, $searchSubCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';
        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($searchCategorySlug)) {
            $category = Category::where('slug_category',$searchCategorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($searchSubCategorySlug)) {
            $subCategory = SubCategory::where('slug_sub_category',$searchSubCategorySlug)->first();
            $products = $products->where('sub_category_id',$subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        //Search main header
        if (!empty($request->get('search'))){
            $products = $products->where('name','like','%'.$request->get('search').'%');
        }

        $products = $products->paginate(10);
        
        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;

        return view('front.shop.result',$data);
    }

    public function product($slug){
        $products = Product::latest('id')->with('product_images');
        $product = Product::where('slug',$slug)->with('product_images')->first();
        $product = Product::where('slug',$slug)
                            ->with('product_images')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                            ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
                            ->first();

        $shapes = ['Square', 'Rectangle', 'Panoramic', 'Large', 'Small'];
        $sizes = ['8" x 8"', '10" x 10"', '12" x 12"', '16" x 16"', '20" x 20"', '24" x 24"'];
        $dropdown_1 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];
        $dropdown_2 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];

        if($product == null){
            abort(404);
        }

        //Fetch Related products
        $relatedProducts = [];
        if ($product->related_products != '') {
            $productArray = explode(',',$product->related_products);
            $relatedProducts = Product::whereIn('id',$productArray)->where('status',1)->with('product_images')->get();
        }

        $data['product'] = $product;
        $data['products'] = $products;
        $data['relatedProducts'] = $relatedProducts;
        $data['shapes'] = $shapes;
        $data['sizes'] = $sizes;
        $data['dropdown_1'] = $dropdown_1;
        $data['dropdown_2'] = $dropdown_2;

        //METAL FRAMES
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

        $selection = Session::get('selection', []);

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
        $data['selection'] = $selection;

        // Load stored image and options from session
        $image = Session::get('uploaded_image');
        $options = Session::get('image_options', [
            'frame' => 10,
            'size' => 20,
            'wrap_wrap' => 30,
            'wrap_frame' => 40,
            'price' => 50, 
        ]);

        $data['image'] = $image;

        session()->forget('framePrice');
        session()->forget('sizePrice');
        session()->forget('selection');
        session()->forget('sizePrice,  framePrice, wrapWrapPrice');

        return view('front.products.index',$data);
    }

    public function saveSession(Request $request) {
        Session::put('selected_size', $request->sizeRadios);
        Session::put('category_name', $request->category_name);
        Session::put('shape', $request->shapeRadios);
        Session::put('custom_size_1', $request->customSizeDropdown1);
        Session::put('custom_size_2', $request->customSizeDropdown2);
        Session::put('price', $request->priceInput);
    
        return response()->json(['success' => true]);
    }
    

    public function showSelection(Request $request, $categorySlug = null, $subCategorySlug = null){
        $products = Product::where('status',1);

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

        $selection = Session::get('selection', []);

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
        $data['selection'] = $selection;

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

        $data['products'] = $products;

        //Select Metal Frame and store in session       
        session()->forget('framePrice');
        session()->forget('sizePrice');
        session()->forget('selection');
        session()->forget('sizePrice,  framePrice, wrapWrapPrice'); 

        return view('front.products.custom_frame.custom', $data);        
    }


    // public function metal_product($slug){
    //     $products = Product::latest('id')->with('product_images');
    //     $product = Product::where('slug',$slug)->with('product_images')->first();

    //     $product = Product::where('slug',$slug)
    //                         ->where('product_type', 'default')
    //                         ->with('product_images')
    //                         ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    //                         ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
    //                         ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
    //                         ->first();

    //     $shapes = ['Square', 'Rectangle', 'Panoramic', 'Large', 'Small'];
    //     $sizes = ['8x8', '10x10', '12x12', '16x16', '20x20', '24x24'];
    //     $dropdown_1 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];
    //     $dropdown_2 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];

    //     if($product == null){
    //         abort(404);
    //     }

    //     //Fetch Related products
    //     $relatedProducts = [];
    //     if ($product->related_products != '') {
    //         $productArray = explode(',',$product->related_products);
    //         $relatedProducts = Product::whereIn('id',$productArray)->where('status',1)->with('product_images')->get();
    //     }

    //     $data['product'] = $product;
    //     $data['products'] = $products;
    //     $data['relatedProducts'] = $relatedProducts;
    //     $data['shapes'] = $shapes;
    //     $data['sizes'] = $sizes;
    //     $data['dropdown_1'] = $dropdown_1;
    //     $data['dropdown_2'] = $dropdown_2;

    //     return view('front.products.metal',$data);
    // }

    public function metalFrameSelection(Request $request) {
        $request->validate([
            'shape' => 'required|string',
            'size' => 'required|string',
            'custom_size_1' => 'nullable|in:16,20', // First custom size
            'custom_size_2' => 'nullable|in:22,24', // Second custom size
        ]);

        $shape = $request->input('shape');
        $size = $request->input('size');
        $customSize1 = $request->input('custom_size_1');
        $customSize2 = $request->input('custom_size_2');

        $shapePrices = [
            'Square' => 400.00,
            'Rectangle' => 800.00,
            'Panoramic' => 1600.00,
        ];

        $sizePrices = [
            '8x8' => 100.00,
            '10x10' => 200.00,
            '12x12' => 300.00,
            '16x16' => 400.00,
            '20x20' => 500.00,
            '24x24' => 600.00,
        ];

        $customSizePrices1 = [
            '8' => 50.00,
            '9' => 50.00,
            '10' => 100.00,
            '11' => 100.00,
            '12' => 200.00,
            '13' => 200.00,
            '14' => 300.00,
            '15' => 300.00,
            '16' => 400.00,
            '17' => 400.00,
            '18' => 500.00,
            '19' => 500.00,
            '20' => 600.00,
            '21' => 600.00,
            '22' => 700.00,
            '23' => 700.00,
            '24' => 800.00,
            '25' => 800.00,
            '26' => 900.00,
            '27' => 900.00,
            '28' => 1000.00,
            '29' => 1000.00,
            '30' => 1100.00,
        ];        

        $customSizePrices2 = [...$customSizePrices1];

        // Get the price for the selected shape and size
        $shapePrice = $shapePrices[$shape] ?? 0.00;
        $sizePrice = $sizePrices[$size] ?? 0.00;
        $customSizePrice1 = $customSizePrices1[$customSize1] ?? 0.00;
        $customSizePrice2 = $customSizePrices2[$customSize2] ?? 0.00;
        
        // Total price calculation (could combine shape and size, or have different logic)
        $totalPrice = $shapePrice + $sizePrice + $customSizePrice1 + $customSizePrice2;

        // Check if the combination exists
        if (isset($prices[$shape][$size])) {
            $price = $prices[$shape][$size];
        } else {
            // Default value if no match found
            $price = 0.00;
        }

        // Store the selection in session
        session([
            'shape' => $shape,
            'size' => $size,
            'total' => $price,
            'custom_size_1' => $customSize1,
            'custom_size_2' => $customSize2,
        ]);

        return response()->json(['message' => 'Metal Frame added to cart!']);
    }


    // public function addToMetalFrame(Request $request){
    //     $request->validate([
    //         //'photo' => 'required|string',            
    //         //'price' => 'required|numeric',
    //     ]);

    //     $frameName = rand(100000, 999999); // Example: 345678

    //     // Determine size
    //     $selectedSize = $request->customSize1 ?: ($request->customSize2 ?: $request->metalSize);

    //     // Save to database
    //     $product = new Product();
    //     //$product->name = $frameName;
    //     // $product->shape = $request->input('metalShape');
    //     // $product->size = $selectedSize;
    //     // $product->custom_size1 = $request->input('customSize1');
    //     // $product->custom_size2 = $request->input('customSize2');
    //     // $product->price = $request->price;
    //     $product->save();

    //     // Add to cart
    //     Cart::add([
    //         'id'      => $product->id,
    //         'name'    => $frameName,
    //         'qty'     => 1,
    //         'price'   => $request->price,
    //         'weight'  => 0,
    //         'options' => [
    //             'category'     => 'Metal Frame',
    //             'image'        => $request->image,
    //             'size'         => $selectedSize, 
    //             'shape'        => $request->metalShape,
    //             'custom_size1' => $request->customSize1,
    //             'custom_size2' => $request->customSize2,
    //         ]
    //     ]);
       
    //     return response()->json(['message' => 'Metal Frame added to cart successfully!']);
    // }
}