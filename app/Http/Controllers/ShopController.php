<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\FrameBorder;
use App\Models\FrameFrame;
use Illuminate\Support\Facades\Session;
use App\Models\FrameShape;
use App\Models\FrameSize;
use App\Models\CustomTotal;
use App\Models\FrameWrap;
use App\Models\HardwareDisplay;
use App\Models\HardwareFinishing;
use App\Models\HardwareStyle;
use App\Models\Lamination;
use App\Models\Modification;
use Illuminate\Support\Facades\Validator;
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

        return view('front.products.index',$data);
    }

    public function first_level($slug){
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

      
        $data['product'] = $product;
        $data['products'] = $products;
        $data['shapes'] = $shapes;
        $data['sizes'] = $sizes;
        $data['dropdown_1'] = $dropdown_1;
        $data['dropdown_2'] = $dropdown_2;

        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();
        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();        
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

        $recommended_data = FrameSize::where('types','recommended')->get();
        $square_data = FrameSize::where('types','square')->get();
        $panaromic_data = FrameSize::where('types','panaromic')->get();
        $large_data = FrameSize::where('types','large')->get();
        $small_data = FrameSize::where('types','small')->get();

        //Shape
        $canvas_data = FrameShape::where('types','canvas')->get();
        $acrylic_data = FrameShape::where('types','acrylic')->get();
        $metal_data = FrameShape::where('types','metal')->get();
        $wood_data = FrameShape::where('types','wood')->get();
        $others_data = FrameShape::where('types','others')->get();

        $shapePrices = [
            'Square' => 400.00,
            'Rectangle' => 800.00,
            'Panoramic' => 1600.00,
            'Large' => 2000.00,
            'Small' => 200.00
        ];

        //Size
        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;

        //Canvas
        $data['canvas_data'] = $canvas_data;
        $data['acrylic_data'] = $acrylic_data;
        $data['metal_data'] = $metal_data;
        $data['wood_data'] = $wood_data;
        $data['others_data'] = $others_data;

        //Wrap
        $wraps_data = FrameWrap::where('types','wrap')->get();

        $data['shapePrices'] = $shapePrices;
        $data['frameSizes'] = $frameSizes;
        $data['wraps_data'] = $wraps_data;
        $data['borders'] = $borders;
        $data['wrap_borders'] = $wrap_borders;
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

    public function second_level($slug){
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

      
        $data['product'] = $product;
        $data['products'] = $products;
        $data['shapes'] = $shapes;
        $data['sizes'] = $sizes;
        $data['dropdown_1'] = $dropdown_1;
        $data['dropdown_2'] = $dropdown_2;

        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();
        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();        
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

        $recommended_data = FrameSize::where('types','recommended')->get();
        $square_data = FrameSize::where('types','square')->get();
        $panaromic_data = FrameSize::where('types','panaromic')->get();
        $large_data = FrameSize::where('types','large')->get();
        $small_data = FrameSize::where('types','small')->get();

        //Shape
        $canvas_data = FrameShape::where('types','canvas')->get();
        $acrylic_data = FrameShape::where('types','acrylic')->get();
        $metal_data = FrameShape::where('types','metal')->get();
        $wood_data = FrameShape::where('types','wood')->get();
        $others_data = FrameShape::where('types','others')->get();

        $shapePrices = [
            'Square' => 400.00,
            'Rectangle' => 800.00,
            'Panoramic' => 1600.00,
            'Large' => 2000.00,
            'Small' => 200.00
        ];

        //Size
        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;

        //Canvas
        $data['canvas_data'] = $canvas_data;
        $data['acrylic_data'] = $acrylic_data;
        $data['metal_data'] = $metal_data;
        $data['wood_data'] = $wood_data;
        $data['others_data'] = $others_data;

        //Wrap
        $wraps_data = FrameWrap::where('types','wrap')->get();

        $data['shapePrices'] = $shapePrices;
        $data['frameSizes'] = $frameSizes;
        $data['wraps_data'] = $wraps_data;
        $data['borders'] = $borders;
        $data['wrap_borders'] = $wrap_borders;
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

        return view('front.products.custom_frame.index',$data);
    }


    public function store(Request $request) {
        $request->validate([
            //'name' => 'required|string',
            // 'size' => 'required|string',
            // 'shape' => 'required|string',
            // 'total' => 'required|numeric',
            // 'product_id' => 'required|exists:products,id'
        ]);
    
        $frame = CustomTotal::firstOrNew(['product_id' => $request->product_id]);
        $frame->name = $request->name;        
        $frame->size = $request->size;
        $frame->shape = $request->shape;
        $frame->total = $request->total;
        $frame->custom_size_1 = $request->custom_size_1;
        $frame->custom_size_2 = $request->custom_size_2;
        $frame->save();

        $product = $frame->product; 

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        return redirect()->route('frame.summary', ['slug' => $product->slug]);
    }





    public function summary($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        $product = Product::where('slug', $slug)->firstOrFail();
        $firstTotals = CustomTotal::get();        

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
      
        $data['product'] = $product;
        $data['products'] = $products;
        $data['shapes'] = $shapes;
        $data['sizes'] = $sizes;
        $data['dropdown_1'] = $dropdown_1;
        $data['dropdown_2'] = $dropdown_2;        

        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();
        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();        
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
        $wraps_data = FrameWrap::where('types','wrap')->get();

        $selection = Session::get('selection', []);
                
        $recommended_data = [
            'first' => ['name' => 'Square Shape', 'price' => 379.00, 'width' => 47, 'height' => 29, ],
            'second' => ['name' => 'Rectangle Shape', 'price' => 1377.00, 'width' => 49, 'height' => 31, ],
            'third' => ['name' => 'Panoramic Shape', 'price' => 3038.00, 'width' => 51, 'height' => 33, ],
        ];

        $square_data = [
            'small' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            'medium' => ['name' => '10" x 10"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            'large' => ['name' => '16" x 16"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            'large1' => ['name' => '24" x 24"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            'large2' => ['name' => '30" x 30"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            'large3' => ['name' => '45" x 45"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $panaromic_data = [
            'small' => ['name' => '8" x 24"', 'price' => 396.00, 'width' => 45, 'height' => 45, ],
            'medium' => ['name' => '10" x 40"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            'large' => ['name' => '12" x 36"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            'large1' => ['name' => '15" x 45"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            'large2' => ['name' => '16" x 48"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            'large3' => ['name' => '18" x 54"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $large_data = [
            'small' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 45, 'height' => 45, ],
            'medium' => ['name' => '24" x 36"', 'price' => 1584.00, 'width' => 47, 'height' => 47, ],
            'large' => ['name' => '18" x 24"', 'price' => 808.00, 'width' => 49, 'height' => 49, ],
            'large1' => ['name' => '30" x 40"', 'price' => 2181.00, 'width' => 52, 'height' => 52, ],
            'large2' => ['name' => '36" x 54"', 'price' => 3501.00, 'width' => 58, 'height' => 58, ],
            'large3' => ['name' => '40" x 40"', 'price' => 2889.00, 'width' => 60, 'height' => 60, ],
        ];

        $small_data = [
            'small' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            'medium' => ['name' => '12" x 8"', 'price' => 206.00, 'width' => 47, 'height' => 47, ],
            'large' => ['name' => '11" x 14"', 'price' => 316.00, 'width' => 49, 'height' => 49, ],
            'large1' => ['name' => '12" x 12"', 'price' => 297.00, 'width' => 52, 'height' => 52, ],
            'large2' => ['name' => '12" x 18"', 'price' => 417.00, 'width' => 58, 'height' => 58, ],
            'large3' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 60, 'height' => 60, ],
        ];

        $shapeData2 = [
            'Canvas' => ['name' => 'Square Shape', 'price' => 100.00, 'image' => 'square.jpg'],
            'Acrylic' => ['name' => 'Rectangle Shape', 'price' => 200.00, 'image' => 'rectangle.jpg'],
            'Metal' => ['name' => 'Panoramic Shape', 'price' => 300.00, 'image' => 'panoramic.jpg'],
            'Wood' => ['name' => 'Large Shape', 'price' => 400.00, 'image' => 'large.jpg'],
            'Small' => ['name' => 'Small Shape', 'price' => 500.00, 'image' => 'small.jpg']
        ];
        
        $materialData = [            
            'Canvas' => ['name' => 'Single Print', 'price' => 101.00, 'image' => 'square.jpg'],
            'Acrylic' => ['name' => 'Double Print', 'price' => 201.00, 'image' => 'square.jpg'],
        ];

        $wrapData = [
            'Canvas' => ['name' => 'Canvas Lite (0.50")', 'price' => 143.00, 'image' => 'size05.jpg',],
            'Acrylic' => ['name' => 'Thin Gallery Wrap (0.75)', 'price' => 185.00, 'image' => 'size75.jpg',],
            'Metal' => ['name' => 'Thick Gallery Wrap (1.5")', 'price' => 223.08, 'image' => 'size15.jpg',],
            'Wood' => ['name' => 'Hanging Canvas', 'price' => 121.55, 'image' => 'hanging-canvas.jpg',],
        ];

        $borderData = [
            'first' => ['name' => 'Mirror Image Free', 'price' => 0.00, 'image' => 'mirror-image.jpg'],
            'second' => ['name' => 'Border Color Free', 'price' => 0.00, 'image' => 'border-color.jpg'],
        ];

        $standardFrame = [
            'first' => ['name' => 'Golden', 'price' => 798.00, 'image' => 'golden.png'],
            'second' => ['name' => 'Silver', 'price' => 298.00, 'image' => 'golden.png'],
        ];

        $premiumFrame = [
            'first' => ['name' => 'Cherry Style', 'price' => 998.00, 'image' => 'cherry-style.png'],            
        ];

        $floatFrame = [
            'first' => ['name' => 'Black floating Frame', 'price' => 1798.00, 'image' => 'black-floating-frame.png'],
        ];

        $hardwareStyleData = [
            'first' => ['name' => 'Hooks for Hanging Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            'second' => ['name' => 'Ready to Hang Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            'third' => ['name' => 'No Hooks Free', 'price' => 0.00, 'image' => 'no-hooks.jpg'],
            'fourth' => ['name' => 'Sawtooth Hanger', 'price' => 25.00, 'image' => 'sawtooth-hanger.jpg'],
            'first' => ['name' => 'Easel Back', 'price' => 49.00, 'image' => 'easel-back.jpg'],
            'first' => ['name' => 'Nail Free Hook', 'price' => 49.00, 'image' => 'nail-free-hook.jpg'],
        ];

        $displayOption = [
            'first' => ['name' => 'Open Back', 'price' => 0.00,],
            'second' => ['name' => 'Dust Cover', 'price' => 49.00,],
        ];

        $shapeData = [
            'Square' => [ 'name' => 'Square Shape', 'price' =>  2.00, 'height' => 12, 'width' => 12, 'image' => 'square.jpg' ], 
            'Rectangle' => [ 'name' => 'Rectangle Shape', 'price' =>  4.00, 'height' => 12, 'width' => 18, 'image' => 'rectangle.jpg' ], 
            'Panoramic' => [ 'name' => 'Panoramic Shape', 'price' =>  6.00, 'height' => 10, 'width' => 30, 'image' => 'panoramic.jpg' ], 
            'Large' => [ 'name' => 'Large Shape', 'price' =>  8.00, 'height' => 24, 'width' => 36, 'image' => 'large.jpg' ], 
            'Small' => [ 'name' => 'Small Shape', 'price' =>  10.00, 'height' => 8, 'width' => 10, 'image' => 'small.jpg' ] 
        ];

        $sizeData = [
            '8x8' => ['name' => '8" x 8"', 'price' => 1.00, 'height' => 8, 'width' => 8],
            '10x10' => ['name' => '10" x 10"', 'price' => 2.00, 'height' => 10, 'width' => 10],
            '12x12' => ['name' => '12" x 12"', 'price' => 3.00, 'height' => 12, 'width' => 12],
            '16x16' => ['name' => '16" x 16"', 'price' => 4.00, 'height' => 16, 'width' => 16],
            '20x20' => ['name' => '20" x 20"', 'price' => 5.00, 'height' => 20, 'width' => 20],
        ];

        $colorFinishingBasic = [
            '8x8' => ['name' => 'Original Free', 'price' => 1.00, 'height' => 8, 'width' => 8],
            '10x10' => ['name' => '10" x 10"', 'price' => 2.00, 'height' => 10, 'width' => 10],
            '12x12' => ['name' => '12" x 12"', 'price' => 3.00, 'height' => 12, 'width' => 12],
            '16x16' => ['name' => '16" x 16"', 'price' => 4.00, 'height' => 16, 'width' => 16],
            '20x20' => ['name' => '20" x 20"', 'price' => 5.00, 'height' => 20, 'width' => 20],
        ];

        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;
        $data['sizeData'] = $sizeData;
        $data['shapeData'] = $shapeData;
        $data['colorFinishingBasic'] = $colorFinishingBasic;
        $data['shapeData2'] = $shapeData2;
        $data['materialData'] = $materialData;
        $data['wrapData'] = $wrapData;
        $data['borderData'] = $borderData;
        $data['standardFrame'] = $standardFrame;
        $data['premiumFrame'] = $premiumFrame;
        $data['floatFrame'] = $floatFrame;
        $data['hardwareStyleData'] = $hardwareStyleData;
        $data['displayOption'] = $displayOption;
        

        $data['frameSizes'] = $frameSizes;
        $data['wraps_data'] = $wraps_data;
        $data['borders'] = $borders;
        $data['wrap_borders'] = $wrap_borders;
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
        $data['firstTotals'] = $firstTotals;

        // Load stored image and options from session
        $image = Session::get('uploaded_image');
        // $options = Session::get('image_options', [
        //     'frame' => 10,
        //     'size' => 20,
        //     'wrap_wrap' => 30,
        //     'wrap_frame' => 40,
        //     'price' => 50, 
        // ]);

        $data['image'] = $image;

        return view('front.products.custom_frame.test', $data);
    }

   
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

    public function saveSession(Request $request) {
        Session::put('selected_product', [
            'id' => $request->product_id,
            'sizeRadios' => $request->sizeRadios,
            'size' => $request->size,
            'category_name' => $request->category_name,
            'shape' => $request->shapeRadios,
            'custom_size_1' => $request->customSizeDropdown1,
            'custom_size_2' => $request->customSizeDropdown2,
            'price' => $request->priceInput
        ]);
    
        return response()->json(['success' => true]);
    }


    public function custom_frame($slug){
        $products = Product::latest('id')->with('product_images');
        $product = Product::where('slug',$slug)->with('product_images')->first();
        $product = Product::where('slug',$slug)
                            ->with('product_images')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                            ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                            ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
                            ->first();
        
        if($product == null){
            abort(404);
        }

                            $tab_canvas = FrameShape::where('types','')->get();
                            $frame_accordion = FrameShape::get();
                            $tab_canvas = FrameShape::where('types','')->get();
                            $frame_accordion = FrameShape::get();        
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
                    
                            $recommended_data = FrameSize::where('types','recommended')->get();
                            $square_data = FrameSize::where('types','square')->get();
                            $panaromic_data = FrameSize::where('types','panaromic')->get();
                            $large_data = FrameSize::where('types','large')->get();
                            $small_data = FrameSize::where('types','small')->get();
                    
                            //Shape
                            $canvas_data = FrameShape::where('types','canvas')->get();
                            $acrylic_data = FrameShape::where('types','acrylic')->get();
                            $metal_data = FrameShape::where('types','metal')->get();
                            $wood_data = FrameShape::where('types','wood')->get();
                            $others_data = FrameShape::where('types','others')->get();
                    
                            $shapePrices = [
                                'Square' => 400.00,
                                'Rectangle' => 800.00,
                                'Panoramic' => 1600.00,
                                'Large' => 2000.00,
                                'Small' => 200.00
                            ];
                    
                            //Size
                            $data['recommended_data'] = $recommended_data;
                            $data['square_data'] = $square_data;
                            $data['panaromic_data'] = $panaromic_data;
                            $data['large_data'] = $large_data;
                            $data['small_data'] = $small_data;
                    
                            //Canvas
                            $data['canvas_data'] = $canvas_data;
                            $data['acrylic_data'] = $acrylic_data;
                            $data['metal_data'] = $metal_data;
                            $data['wood_data'] = $wood_data;
                            $data['others_data'] = $others_data;
                    
                            $data['products'] = $products;
                    
                            //Wrap
                            $wraps_data = FrameWrap::where('types','wrap')->get();
                    
                            $data['shapePrices'] = $shapePrices;
                            $data['frameSizes'] = $frameSizes;
                            $data['wraps_data'] = $wraps_data;
                            $data['borders'] = $borders;
                            $data['wrap_borders'] = $wrap_borders;
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
        $data['image'] = $image;

        return view('front.products.custom_frame.test',$data);
    }


    //Frame Customise
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
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
    
            // Define path
            $uploadPath = public_path('uploads/custom_frames/');
    
            // Ensure the directory exists
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
    
            // Define full image path
            $fullPath = $uploadPath . $imageName;
    
            // Initialize ImageManager
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
    
            // Save the image as JPG with 80% quality
            $image->toJpeg(100)->save($fullPath);
    
            // Save resized version (500x500)
            $resizedPath = $uploadPath . $imageName;
            $image->cover(500, 500)->save($resizedPath);
    
            // ✅ Step 3: Store new image in session
            Session::put('uploaded_image', $imageName);
    
            // Generate URL to return in response
            $imageUrl = asset('uploads/custom_frames/' . $imageName);
    
            return response()->json([
                'success' => true,
                'image_url' => $imageUrl
            ]);
        }
    
        return response()->json(['success' => false]);
    }


    public function checkImage() {
        // Get the stored image path from the session
        $imagePath = Session::get('uploaded_image');

        return response()->json([
            'success' => true,
            'image' => $imagePath ? asset('storage/' . $imagePath) : null,
        ]);
    }

    public function delete() {
        if (Session::has('uploaded_image')) {
            $oldImage = Session::get('uploaded_image');
            $oldImagePath = public_path('uploads/custom_frames/' . $oldImage);

            // Check if the file exists before deleting
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the file
            }

            // Clear session value
            Session::forget('uploaded_image');
        }

        return response()->json(['success' => 'Image deleted']);
    }

    //Calculations
    // public function updateOptions(Request $request) {
    //     $frames = FrameShape::pluck('price', 'slug')->toArray();
    //     $sizes = FrameSize::pluck('price', 'slug')->toArray();
    //     $wrap_wraps = FrameWrap::pluck('price', 'slug')->toArray();
    //     $wrap_frames = FrameFrame::pluck('price', 'slug')->toArray();
    //     $hardware_styles = HardwareStyle::pluck('price', 'slug')->toArray();
    //     $hardware_finishings = HardwareFinishing::pluck('price', 'slug')->toArray();

    //     $prices = [
    //         'frame' => $frames,
    //         'size' => $sizes,
    //         'wrap_wrap' => $wrap_wraps,
    //         'wrap_frame' => $wrap_frames,
    //         'hardware_style' => $hardware_styles,
    //         'hardware_display' => ['open_back' => 0, 'dust_cover' => 49],
    //         'hardware_finishing' => $hardware_finishings,            
    //         'lamiation' => ['no' => 0, 'standard' => 149, 'premium' => 249],
    //         'retouching' => ['fixed' => 299],
    //         'proof' => ['proof' => 49],
    //     ];

    //     // Get individual prices for each selected option
    //     $selectedPrices = [
    //         'frame_price' => $prices['frame'][$request->frame] ?? 0,
    //         'size_price' => $prices['size'][$request->size] ?? 0,
    //         'wrap_wrap_price' => $prices['wrap_wrap'][$request->wrap_wrap] ?? 0,
    //         'wrap_frame_price' => $prices['wrap_frame'][$request->wrap_frame] ?? 0,
    //         'hardware_style_price' => $prices['hardware_style'][$request->hardware_style] ?? 0,
    //         'hardware_display_price' => $prices['hardware_display'][$request->hardware_display] ?? 0,
    //         'hardware_finishing_price' => $prices['hardware_finishing'][$request->hardware_finishing] ?? 0,
    //         'lamination_price' => $prices['lamination'][$request->lamination] ?? 0,
    //         'retouching_price' => $prices['retouching'][$request->retouching] ?? 0,
    //         'proof_price' => $prices['proof'][$request->proof] ?? 0,
            
    //     ];
   
    //     // Store updated options in session
    //     Session::put('image_options', [
    //         'frame' => $request->frame,
    //         'size' => $request->size,
    //         'wrap_wrap' => $request->wrap_wrap,
    //         'wrap_frame' => $request->wrap_frame,
    //         'hardware_style' => $request->hardware_style,
    //         'hardware_display' => $request->hardware_display,
    //         'hardware_finishing' => $request->hardware_finishing,
    //         'lamination' => $request->lamination,
    //         'retouching' => $request->retouching,
    //         'proof' => $request->proof,
    //         'prices' => $selectedPrices, // Storing individual prices
    //     ]);

    //     return response()->json($selectedPrices);
    // }

    public function updateOptions(Request $request) {
        $frame_price = $this->getPrice('frame', $request->frame);
        $size_price = $this->getPrice('size', $request->size);
        $wrap_wrap_price = $this->getPrice('wrap_wrap', $request->wrap_wrap);
        $wrap_frame_price = $this->getPrice('wrap_frame', $request->wrap_frame);
        $hardware_style_price = $this->getPrice('hardware_style', $request->hardware_style);
        $hardware_display_price = $this->getPrice('hardware_display', $request->hardware_display);
        $hardware_finishing_price = $this->getPrice('hardware_finishing', $request->hardware_finishing);
        $lamination_price = $this->getPrice('lamination', $request->lamination);
        $retouching_price = $this->getPrice('retouching', $request->retouching);
        $proof_price = $this->getPrice('proof', $request->proof);
    
        // Retrieve first-level calculated price from request
        $updated_base_price = floatval($request->final_price);
    
        // Calculate total
        $grand_total = $updated_base_price + 
                       $frame_price + $size_price + 
                       $wrap_wrap_price + $wrap_frame_price +
                       $hardware_style_price + $hardware_display_price +
                       $hardware_finishing_price + $lamination_price +
                       $retouching_price + $proof_price;
    
        // Store in session
        session()->put('cart_price', $grand_total);
    
        return response()->json([
            'frame_price' => $frame_price,
            'size_price' => $size_price,
            'wrap_wrap_price' => $wrap_wrap_price,
            'wrap_frame_price' => $wrap_frame_price,
            'hardware_style_price' => $hardware_style_price,
            'hardware_display_price' => $hardware_display_price,
            'hardware_finishing_price' => $hardware_finishing_price,
            'lamination_price' => $lamination_price,
            'retouching_price' => $retouching_price,
            'proof_price' => $proof_price,
            'grand_total' => $grand_total
        ]);
    }
    

    public function checkSessionImage(Request $request) {
        $imagePath = Session::get('uploaded_image'); // Assuming image is stored in session

        return response()->json([
            'image' => $imagePath ? asset('storage/' . $imagePath) : null
        ]);
    }


    public function metal_product($id) {
        $products = Product::findOrFail($id);
        // $product = Product::where('slug',$slug)->with('product_images')->first();
        // $product = Product::where('slug',$slug)
        //                     ->with('product_images')
        //                     ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
        //                     ->leftJoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        //                     ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
        //                     ->first();


        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();
        $tab_canvas = FrameShape::where('types','')->get();
        $frame_accordion = FrameShape::get();        
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

        $recommended_data = FrameSize::where('types','recommended')->get();
        $square_data = FrameSize::where('types','square')->get();
        $panaromic_data = FrameSize::where('types','panaromic')->get();
        $large_data = FrameSize::where('types','large')->get();
        $small_data = FrameSize::where('types','small')->get();

        //Shape
        $canvas_data = FrameShape::where('types','canvas')->get();
        $acrylic_data = FrameShape::where('types','acrylic')->get();
        $metal_data = FrameShape::where('types','metal')->get();
        $wood_data = FrameShape::where('types','wood')->get();
        $others_data = FrameShape::where('types','others')->get();

        $shapePrices = [
            'Square' => 400.00,
            'Rectangle' => 800.00,
            'Panoramic' => 1600.00,
            'Large' => 2000.00,
            'Small' => 200.00
        ];

        //Size
        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;

        //Canvas
        $data['canvas_data'] = $canvas_data;
        $data['acrylic_data'] = $acrylic_data;
        $data['metal_data'] = $metal_data;
        $data['wood_data'] = $wood_data;
        $data['others_data'] = $others_data;

        $data['products'] = $products;

        //Wrap
        $wraps_data = FrameWrap::where('types','wrap')->get();

        $data['shapePrices'] = $shapePrices;
        $data['frameSizes'] = $frameSizes;
        $data['wraps_data'] = $wraps_data;
        $data['borders'] = $borders;
        $data['wrap_borders'] = $wrap_borders;
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

        return view('front.products.custom_frame.test' ,$data);
    }

    
}