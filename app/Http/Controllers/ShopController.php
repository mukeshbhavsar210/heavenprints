<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Customize;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ShopController extends Controller {
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';
        $brandsArray = [];

        $colors = Color::get();
        $sizes = Size::get();

        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $brands = Brand::orderBy('name','ASC')->where('status',1)->get();

        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug',$subCategorySlug)->first();
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
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;

        return view('front.shop.index',$data);
    }


    public function index_home(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';
        $brandsArray = [];

        $colors = Color::get();
        $sizes = Size::get();

        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $brands = Brand::orderBy('name','ASC')->where('status',1)->get();

        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug',$subCategorySlug)->first();
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
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;

        return view('front.shop.index',$data);
    }


    //CUSTOM NEON PRODUCT
    public function neonProducts(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $colors = ['#ffffff', '#e5097f', '#009846', '#0000ff', '#834e98', '#ef7b1b', '#62bed3', '#eedfc8', '#e31e24', '#ffed00'];
        $fonts = ['Passionate', 'Dreamy', 'Flowy', 'Original', 'Classic', 'Boujee', 'Funky', 'Chic', 'Delight', 'Classy', 'Romantic', 'Robo', 'Charming', 'Quirky', 'Stylish', 'Sassy', 'Glam', 'DOPE', 'Chemistry', 'Acoustic', 'Sparky', 'Vibey', 'LoFi', 'Bossy', 'ICONIC', 'Jolly', 'MODERN',];

        $categorySelected = ' ';
        $subCategorySelected = ' ';
        
        $products = Product::where('product_type','Neon')->where('status',1);

        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug',$categorySlug)->first();
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

    //CUSTOMIZE PRODUCT
    public function customizeProducts(Request $request, $categorySlug = null, $subCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';        

        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $products = Product::whereNotNull('metal_type')->where('metal_type', '!=', '')->where('status',1);
   
        //Apply filters here
        if(!empty($categorySlug)) {
            $category = Category::where('slug',$categorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug',$subCategorySlug)->first();
            $products = $products->where('sub_category_id',$subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        $products = $products->paginate(10);

        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['categorySelected'] = $categorySelected;
        $data['subCategorySelected'] = $subCategorySelected;
        
        return view('front.shop.customize',$data);
    }


    public function search(Request $request, $searchCategorySlug = null, $searchSubCategorySlug = null) {
        $categorySelected = ' ';
        $subCategorySelected = ' ';
        $categories = Category::orderBy("name","ASC")->with('sub_category')->where('status',1)->get();
        $products = Product::where('status',1);

        //Apply filters here
        if(!empty($searchCategorySlug)) {
            $category = Category::where('slug',$searchCategorySlug)->first();
            $products = $products->where('category_id',$category->id);
            $categorySelected = $category->id;
        }

        if(!empty($searchSubCategorySlug)) {
            $subCategory = SubCategory::where('slug',$searchSubCategorySlug)->first();
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
        $product = Product::where('slug',$slug)->with('product_images')->first();
       
        if($product == null){
            abort(404);
        }

        //Fetch Related products
        $relatedProducts = [];
        if ($product->related_products != '') {
            $productArray = explode(',',$product->related_products);
            $relatedProducts = Product::whereIn('id',$productArray)->where('status',1)->with('product_images')->get();
        }

        $rows = DB::table('customizes')
          ->orderBy('name', 'asc')
          ->get();

        $customSizePrices1 = [];

        foreach ($rows as $row) {
            $customSizePrices1[(int) $row->name] = (float) $row->price;
        }
        
        $data['product'] = $product;
        $data['relatedProducts'] = $relatedProducts;  
        $data['customSizePrices1'] = $customSizePrices1;

        return view('front.products.index',$data);
    }


    public function second_level($slug){       
        $productSelection = Product::orderBy('id','DESC')->where('status',1)->get();  
        $product = Product::where('slug',$slug)->with('product_images')->first();    
        if($product == null){
            abort(404);
        }

        //$wrapData = Customize::where('category','Wrap_border')->where('type','wrap')->get();
        //$borderData = Customize::where('category','Wrap_border')->where('type','border')->get();
        //$standardFrame = Customize::where('category','Frames')->where('type','Standard')->get();
        //$premiumFrame = Customize::where('category','Frames')->where('type','Premium')->get();        

        $product_data = Customize::where('category','Product')->get();
        $size__data = Customize::where('category','Selected_Size')->get();
        
        $hardware_finish_data = Customize::where('category','Hardware_finish')->get();
        $options_data = Customize::where('category','Options')->get();        


        $wrapData = [
            '1' => ['name' => 'Canvas Lite (0.50")', 'price' => 143.00, 'image' => 'size05.jpg',],
            '2' => ['name' => 'Thin Gallery Wrap (0.75)', 'price' => 185.00, 'image' => 'size75.jpg',],
            '3' => ['name' => 'Thick Gallery Wrap (1.5")', 'price' => 223.08, 'image' => 'size15.jpg',],
            '4' => ['name' => 'Hanging Canvas', 'price' => 121.55, 'image' => 'hanging-canvas.jpg',],
        ];

        $borderData = [
            '1' => ['name' => 'Mirror Image Free', 'price' => 0.00, 'image' => 'mirror-image.jpg'],
            '2' => ['name' => 'Border Color Free', 'price' => 10.00, 'image' => 'border-color.jpg'],
        ];

        $standardFrame = [
            '1' => ['name' => 'Golden', 'price' => 798.00, 'image' => 'golden.png'],
            '2' => ['name' => 'Silver', 'price' => 298.00, 'image' => 'golden.png'],
        ];

        $premiumFrame = [
            'first' => ['name' => 'Cherry Style', 'price' => 998.00, 'image' => 'cherry-style.png'],            
        ];

        $floatFrame = [
            'first' => ['name' => 'Black floating Frame', 'price' => 1798.00, 'image' => 'black-floating-frame.png'],
        ];

        $hardwareStyleData = [
            '1' => ['name' => 'Hooks for Hanging Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            '2' => ['name' => 'Ready to Hang Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            '3' => ['name' => 'No Hooks Free', 'price' => 0.00, 'image' => 'no-hooks.jpg'],
            '4' => ['name' => 'Sawtooth Hanger', 'price' => 25.00, 'image' => 'sawtooth-hanger.jpg'],
            '5' => ['name' => 'Easel Back', 'price' => 49.00, 'image' => 'easel-back.jpg'],
            '6' => ['name' => 'Nail Free Hook', 'price' => 49.00, 'image' => 'nail-free-hook.jpg'],
        ];

        $displayOption = [
            '1' => ['name' => 'Open Back', 'price' => 0.00,],
            '2' => ['name' => 'Dust Cover', 'price' => 49.00,],
        ];

        $laminationOption = [
            '1' => ['name' => 'No', 'price' => 0.00, 'class' => 3],
            '2' => ['name' => 'Standard', 'price' => 149.00, 'class' => 4],
            '3' => ['name' => 'Premium', 'price' => 249.00, 'class' => 4],
        ];

        $retouchingOption = [
            '1' => ['name' => 'Red Eye Removal', 'price' => 299.00],
            '2' => ['name' => 'Dust/Scratch Removal', 'price' => 299.00],
            '3' => ['name' => 'Enhance Color', 'price' => 299.00 ],
            '4' => ['name' => 'Date Stamp Removal', 'price' => 299.00 ],
            '5' => ['name' => 'Lighten/Darken Image', 'price' => 299.00 ],
        ];

        $proofOption = [
            '1' => ['name' => 'Email with link to the design proof will be emailed within 24 hours and has to be approved online.
                Customers should approve their proof(s) as quickly as possible in order to avoid delays in production and shipping times.', 'price' => 49.00],            
        ];

        $shapeData = [
            '1' => [ 'name' => 'Square Shape', 'price' =>  2.00, 'height' => 12, 'width' => 12, 'image' => 'square.jpg' ], 
            '2' => [ 'name' => 'Rectangle Shape', 'price' =>  4.00, 'height' => 12, 'width' => 18, 'image' => 'rectangle.jpg' ], 
            '3' => [ 'name' => 'Panoramic Shape', 'price' =>  6.00, 'height' => 10, 'width' => 30, 'image' => 'panoramic.jpg' ], 
            '4' => [ 'name' => 'Large Shape', 'price' =>  8.00, 'height' => 24, 'width' => 36, 'image' => 'large.jpg' ], 
            '5' => [ 'name' => 'Small Shape', 'price' =>  10.00, 'height' => 8, 'width' => 10, 'image' => 'small.jpg' ] 
        ];

        $sizeData = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'height' => 45, 'width' => 45],
            '2' => ['name' => '10" x 10"', 'price' => 212.00, 'height' => 47, 'width' => 47],
            '3' => ['name' => '16" x 16"', 'price' => 489.00, 'height' => 49, 'width' => 49],
            '4' => ['name' => '24" x 24"', 'price' => 1066.00, 'height' => 53, 'width' => 53],
            '5' => ['name' => '30" x 30"', 'price' => 1646.00, 'height' => 56, 'width' => 56],
            '5' => ['name' => '45" x 45"', 'price' => 3640.00, 'height' => 58, 'width' => 58],
        ];

        $recommended_data = [
            '1' => ['name' => 'Square Shape', 'price' => 379.00, 'width' => 47, 'height' => 29, ],
            '2' => ['name' => 'Rectangle Shape', 'price' => 1377.00, 'width' => 49, 'height' => 31, ],
            '3' => ['name' => 'Panoramic Shape', 'price' => 3038.00, 'width' => 51, 'height' => 33, ],
        ];

        $square_data = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '10" x 10"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '16" x 16"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '24" x 24"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '30" x 30"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '45" x 45"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $panaromic_data = [
            '1' => ['name' => '8" x 24"', 'price' => 396.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '10" x 40"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '12" x 36"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '15" x 45"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '16" x 48"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '18" x 54"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $large_data = [
            '1' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '24" x 36"', 'price' => 1584.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '18" x 24"', 'price' => 808.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '30" x 40"', 'price' => 2181.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '36" x 54"', 'price' => 3501.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '40" x 40"', 'price' => 2889.00, 'width' => 60, 'height' => 60, ],
        ];

        $small_data = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '12" x 8"', 'price' => 206.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '11" x 14"', 'price' => 316.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '12" x 12"', 'price' => 297.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '12" x 18"', 'price' => 417.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 60, 'height' => 60, ],
        ];

        $colorFinishingBasic = [
            '1' => ['name' => 'Original Free', 'price' => 0.00, 'image' => 'sepia.jpg'],
            '2' => ['name' => 'Sephia Free"', 'price' => 0.00, 'image' => 'sepia.jpg'],
            '3' => ['name' => 'Grey Scale', 'price' => 0.00, 'image' => 'grayscale.jpg']
        ];



        $canvas_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 143.00, 'image' => 'icon_single_print.png'],
            '2' => ['name' => 'Round Canvas', 'price' => 721.27, 'image' => 'round_canvas.png'],
            '3' => ['name' => 'Triangle Canvas', 'price' => 1250.79, 'image' => 'triangle_canvas.png'],
            '4' => ['name' => 'Heart Canvas', 'price' => 1854.68, 'image' => 'heart_canvas.png'],
            '5' => ['name' => 'Oval Canvas', 'price' => 1398.67, 'image' => 'oval_canvas.png'],
            '6' => ['name' => 'Wall Display', 'price' => 726.75, 'image' => 'icon_wall_display.png'],
            '7' => ['name' => 'Photo Collage', 'price' => 214.50, 'image' => 'icon_photo_collage.png'],
            '8' => ['name' => 'Hexagon Prints', 'price' => 449.00, 'image' => 'icon_honeycomb.png'],
            '9' => ['name' => 'Split Canvas', 'price' => 271.70, 'image' => 'icon_split_canvas.png'],
            '10' => ['name' => 'Photo Mosaic', 'price' => 214.50, 'image' => 'mosaic.png'],
            '11' => ['name' => 'Lyric on Canvas', 'price' => 214.50, 'image' => 'lyrics_on_canvas.png'],
            '12' => ['name' => 'Digital Painting', 'price' => 2642.00, 'image' => 'digital_painting.png'],
            '13' => ['name' => 'Quotes on Canvas', 'price' => 143.00, 'image' => 'quotes_on_canvas.jpg'],
            '14' => ['name' => 'Bus Roll', 'price' => 599.40, 'image' => 'bus_roll.png'],
            '15' => ['name' => 'Canvas Banner', 'price' => 399.00, 'image' => 'canvas-banner.png'],
            '16' => ['name' => 'Pop Art', 'price' => 642.00, 'image' => 'pop-art.jpg'],
            '17' => ['name' => 'Word Art', 'price' => 242.00, 'image' => 'word-art-icon.png'],
        ];
        
        $acrylic_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 355.00, 'image' => 'acrylic_print.png'],
            '2' => ['name' => 'Wall Display', 'price' => 1983.60, 'image' => 'icon_wall_display.png'],
            '3' => ['name' => 'Photo Collage', 'price' => 426.60, 'image' => 'icon_photo_collage.png'],
            '4' => ['name' => 'Split Acrylic', 'price' => 674.50, 'image' => 'icon_split_canvas.png'],
            '5' => ['name' => 'Photo Mosaic', 'price' => 426.00, 'image' => 'mosaic.png'],
            '6' => ['name' => 'Lyric on Acrylic', 'price' => 426.00, 'image' => 'lyrics_on_canvas.png'],
            '7' => ['name' => 'Digital Painting', 'price' => 2854.00, 'image' => 'digital_painting.png'],
            '8' => ['name' => 'Quotes on Acrylic', 'price' => 355.00, 'image' => 'quotes_on_canvas.jpg'],
            '9' => ['name' => 'Bus Roll', 'price' => 1065.60, 'image' => 'bus_roll.png'],
            '10' => ['name' => 'Word Art', 'price' => 454.00, 'image' => 'word-art-icon.png'],
        ];
        
        $metal_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 444.00, 'image' => 'metal_print.png'],
            '2' => ['name' => 'Wall Display', 'price' => 2479.50, 'image' => 'icon_wall_display.png'],
            '3' => ['name' => 'Photo Collage', 'price' => 532.80, 'image' => 'icon_photo_collage.png'],
            '4' => ['name' => 'Split Metal', 'price' => 843.60, 'image' => 'icon_split_canvas.png'],
            '5' => ['name' => 'Photo Mosaic', 'price' => 532.80, 'image' => 'mosaic.png'],
            '6' => ['name' => 'Lyric on Metal', 'price' => 532.80, 'image' => 'lyrics_on_canvas.png'],
            '7' => ['name' => 'Digital Painting', 'price' => 2943.00, 'image' => 'digital_painting.png'],
            '8' => ['name' => 'Quotes on Metal', 'price' => 444.00, 'image' => 'quotes_on_canvas.jpg'],
            '9' => ['name' => 'Bus Roll', 'price' => 1333.20, 'image' => 'bus_roll.png'],
            '10' => ['name' => 'Word Art', 'price' => 543.00, 'image' => 'word-art-icon.png'],
        ];
        
        $wood_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 1799.00, 'image' => 'icon_wood_print.png'],
            '2' => ['name' => 'Round Wood', 'price' => 2699.00, 'image' => 'round_wood.png'],
            '3' => ['name' => 'Wood Wall Display', 'price' => 8857.80, 'image' => 'icon_wall_display.png'],
            '4' => ['name' => 'Lyric on Wood', 'price' => 2158.80, 'image' => 'lyrics_on_canvas.png'],
            '5' => ['name' => 'Digital Painting', 'price' => 4298.00, 'image' => 'digital_painting.png'],
            '6' => ['name' => 'Quotes on Wood', 'price' => 1799.00, 'image' => 'quotes_on_canvas.jpg'],
            '7' => ['name' => 'Split Wood', 'price' => 3418.10, 'image' => 'icon_split_canvas.png'],
            '8' => ['name' => 'Hexagon Wood', 'price' => 807.30, 'image' => 'icon_honeycomb.png'],
            '9' => ['name' => 'Word Art', 'price' => 1898.00, 'image' => 'word-art-icon.png'],
        ];
        
        $other_material_data = [            
            '1' => ['name' => 'Peel & Stick', 'price' => 1589.28, 'image' => 'peel_stick.jpg'],
            '2' => ['name' => 'Engraved Prints', 'price' => 329.00, 'image' => 'engrave_print.jpg'],
            '3' => ['name' => 'Wall Murals', 'price' => 1225.60, 'image' => 'wall_murals.png'],
        ];

        $finalPriceData = session('finalPriceData', []);

       
        

        $data['sizeData'] = $sizeData;
        $data['canvas_material_data'] = $canvas_material_data;
        $data['acrylic_material_data'] = $acrylic_material_data;
        $data['metal_material_data'] = $metal_material_data;
        $data['wood_material_data'] = $wood_material_data;
        $data['other_material_data'] = $other_material_data;
        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;
        $data['shapeData'] = $shapeData;
        $data['colorFinishingBasic'] = $colorFinishingBasic;
        $data['wrapData'] = $wrapData;
        $data['borderData'] = $borderData;
        $data['standardFrame'] = $standardFrame;
        $data['premiumFrame'] = $premiumFrame;
        $data['floatFrame'] = $floatFrame;
        $data['hardwareStyleData'] = $hardwareStyleData;
        $data['displayOption'] = $displayOption;
        $data['retouchingOption'] = $retouchingOption;        
        $data['proofOption'] = $proofOption;        
        $data['laminationOption'] = $laminationOption;    
        $data['finalPriceData'] = $finalPriceData;
        $data['productSelection'] = $productSelection;
        $data['product'] = $product;

                
        // Load stored image and options from session
        $image = Session::get('uploaded_image');
        $data['image'] = $image;

        return view('front.products.custom_frame.index',$data);
    }
   

    public function store_total(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'nullable|string',
            'size' => 'nullable|string',
            'shape' => 'nullable|string',
            'total' => 'nullable|numeric',
            'custom_size_1' => 'nullable|string',
            'custom_size_2' => 'nullable|string',
        ]);

        // 🗑️ Remove Old Stored Data
        session()->forget('finalPriceData');  

        // Perform First-Level Calculation (Example: Add 10% Tax or any logic)
        $finalPrice = $request->total ? $request->total * 1.10 : 0; // Example: Adding 10% to total

        // Store Calculation Data in Session
        session()->put('finalPriceData', [
            'product_id' => $request->product_id,
            'name' => $request->name,
            'size' => $request->size,
            'shape' => $request->shape,
            'finalPrice' => $finalPrice,
            'custom_size_1' => $request->custom_size_1,
            'custom_size_2' => $request->custom_size_2
        ]);

        // Fetch the product to get the slug
        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        return redirect()->route('frame.summary', ['slug' => $product->slug]);
    }

    
    public function summary($slug){
        $productSelection = Product::orderBy('id','DESC')->where('status',1)->get(); 
        $finalPriceData = session('finalPriceData', []);
        $product = Product::where('slug',$slug)->with('product_images')->first();        

        $shapes = ['Square', 'Rectangle', 'Panoramic', 'Large', 'Small'];
        $sizes = ['8" x 8"', '10" x 10"', '12" x 12"', '16" x 16"', '20" x 20"', '24" x 24"'];
        $dropdown_1 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];
        $dropdown_2 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];

        if($product == null){
            abort(404);
        }
      
        $data['product'] = $product;
        
            
        $wrapData = [
            '1' => ['name' => 'Canvas Lite (0.50")', 'price' => 143.00, 'image' => 'size05.jpg',],
            '2' => ['name' => 'Thin Gallery Wrap (0.75)', 'price' => 185.00, 'image' => 'size75.jpg',],
            '3' => ['name' => 'Thick Gallery Wrap (1.5")', 'price' => 223.08, 'image' => 'size15.jpg',],
            '4' => ['name' => 'Hanging Canvas', 'price' => 121.55, 'image' => 'hanging-canvas.jpg',],
        ];

        $borderData = [
            '1' => ['name' => 'Mirror Image Free', 'price' => 0.00, 'image' => 'mirror-image.jpg'],
            '2' => ['name' => 'Border Color Free', 'price' => 10.00, 'image' => 'border-color.jpg'],
        ];

        $standardFrame = [
            '1' => ['name' => 'Golden', 'price' => 798.00, 'image' => 'golden.png'],
            '2' => ['name' => 'Silver', 'price' => 298.00, 'image' => 'golden.png'],
        ];

        $premiumFrame = [
            'first' => ['name' => 'Cherry Style', 'price' => 998.00, 'image' => 'cherry-style.png'],            
        ];

        $floatFrame = [
            'first' => ['name' => 'Black floating Frame', 'price' => 1798.00, 'image' => 'black-floating-frame.png'],
        ];

        $hardwareStyleData = [
            '1' => ['name' => 'Hooks for Hanging Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            '2' => ['name' => 'Ready to Hang Free', 'price' => 0.00, 'image' => 'hooks-for-hanging.jpg'],
            '3' => ['name' => 'No Hooks Free', 'price' => 0.00, 'image' => 'no-hooks.jpg'],
            '4' => ['name' => 'Sawtooth Hanger', 'price' => 25.00, 'image' => 'sawtooth-hanger.jpg'],
            '5' => ['name' => 'Easel Back', 'price' => 49.00, 'image' => 'easel-back.jpg'],
            '6' => ['name' => 'Nail Free Hook', 'price' => 49.00, 'image' => 'nail-free-hook.jpg'],
        ];

        $displayOption = [
            '1' => ['name' => 'Open Back', 'price' => 0.00,],
            '2' => ['name' => 'Dust Cover', 'price' => 49.00,],
        ];

        $laminationOption = [
            '1' => ['name' => 'No', 'price' => 0.00, 'class' => 3],
            '2' => ['name' => 'Standard', 'price' => 149.00, 'class' => 4],
            '3' => ['name' => 'Premium', 'price' => 249.00, 'class' => 4],
        ];

        $retouchingOption = [
            '1' => ['name' => 'Red Eye Removal', 'price' => 299.00],
            '2' => ['name' => 'Dust/Scratch Removal', 'price' => 299.00],
            '3' => ['name' => 'Enhance Color', 'price' => 299.00 ],
            '4' => ['name' => 'Date Stamp Removal', 'price' => 299.00 ],
            '5' => ['name' => 'Lighten/Darken Image', 'price' => 299.00 ],
        ];

        $proofOption = [
            '1' => ['name' => 'Email with link to the design proof will be emailed within 24 hours and has to be approved online.
                Customers should approve their proof(s) as quickly as possible in order to avoid delays in production and shipping times.', 'price' => 49.00],            
        ];

        $shapeData = [
            '1' => [ 'name' => 'Square Shape', 'price' =>  2.00, 'height' => 12, 'width' => 12, 'image' => 'square.jpg' ], 
            '2' => [ 'name' => 'Rectangle Shape', 'price' =>  4.00, 'height' => 12, 'width' => 18, 'image' => 'rectangle.jpg' ], 
            '3' => [ 'name' => 'Panoramic Shape', 'price' =>  6.00, 'height' => 10, 'width' => 30, 'image' => 'panoramic.jpg' ], 
            '4' => [ 'name' => 'Large Shape', 'price' =>  8.00, 'height' => 24, 'width' => 36, 'image' => 'large.jpg' ], 
            '5' => [ 'name' => 'Small Shape', 'price' =>  10.00, 'height' => 8, 'width' => 10, 'image' => 'small.jpg' ] 
        ];

        $sizeData = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'height' => 45, 'width' => 45],
            '2' => ['name' => '10" x 10"', 'price' => 212.00, 'height' => 47, 'width' => 47],
            '3' => ['name' => '16" x 16"', 'price' => 489.00, 'height' => 49, 'width' => 49],
            '4' => ['name' => '24" x 24"', 'price' => 1066.00, 'height' => 53, 'width' => 53],
            '5' => ['name' => '30" x 30"', 'price' => 1646.00, 'height' => 56, 'width' => 56],
            '5' => ['name' => '45" x 45"', 'price' => 3640.00, 'height' => 58, 'width' => 58],
        ];

        $recommended_data = [
            '1' => ['name' => 'Square Shape', 'price' => 379.00, 'width' => 47, 'height' => 29, ],
            '2' => ['name' => 'Rectangle Shape', 'price' => 1377.00, 'width' => 49, 'height' => 31, ],
            '3' => ['name' => 'Panoramic Shape', 'price' => 3038.00, 'width' => 51, 'height' => 33, ],
        ];

        $square_data = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '10" x 10"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '16" x 16"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '24" x 24"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '30" x 30"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '45" x 45"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $panaromic_data = [
            '1' => ['name' => '8" x 24"', 'price' => 396.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '10" x 40"', 'price' => 212.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '12" x 36"', 'price' => 489.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '15" x 45"', 'price' => 1066.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '16" x 48"', 'price' => 1646.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '18" x 54"', 'price' => 3640.00, 'width' => 60, 'height' => 60, ],
        ];

        $large_data = [
            '1' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '24" x 36"', 'price' => 1584.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '18" x 24"', 'price' => 808.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '30" x 40"', 'price' => 2181.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '36" x 54"', 'price' => 3501.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '40" x 40"', 'price' => 2889.00, 'width' => 60, 'height' => 60, ],
        ];

        $small_data = [
            '1' => ['name' => '8" x 8"', 'price' => 143.00, 'width' => 45, 'height' => 45, ],
            '2' => ['name' => '12" x 8"', 'price' => 206.00, 'width' => 47, 'height' => 47, ],
            '3' => ['name' => '11" x 14"', 'price' => 316.00, 'width' => 49, 'height' => 49, ],
            '4' => ['name' => '12" x 12"', 'price' => 297.00, 'width' => 52, 'height' => 52, ],
            '5' => ['name' => '12" x 18"', 'price' => 417.00, 'width' => 58, 'height' => 58, ],
            '6' => ['name' => '16" x 20"', 'price' => 604.00, 'width' => 60, 'height' => 60, ],
        ];

        $colorFinishingBasic = [
            '1' => ['name' => 'Original Free', 'price' => 0.00, 'image' => 'sepia.jpg'],
            '2' => ['name' => 'Sephia Free"', 'price' => 0.00, 'image' => 'sepia.jpg'],
            '3' => ['name' => 'Grey Scale', 'price' => 0.00, 'image' => 'grayscale.jpg']
        ];


        $canvas_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 143.00, 'image' => 'icon_single_print.png'],
            '2' => ['name' => 'Round Canvas', 'price' => 721.27, 'image' => 'round_canvas.png'],
            '3' => ['name' => 'Triangle Canvas', 'price' => 1250.79, 'image' => 'triangle_canvas.png'],
            '4' => ['name' => 'Heart Canvas', 'price' => 1854.68, 'image' => 'heart_canvas.png'],
            '5' => ['name' => 'Oval Canvas', 'price' => 1398.67, 'image' => 'oval_canvas.png'],
            '6' => ['name' => 'Wall Display', 'price' => 726.75, 'image' => 'icon_wall_display.png'],
            '7' => ['name' => 'Photo Collage', 'price' => 214.50, 'image' => 'icon_photo_collage.png'],
            '8' => ['name' => 'Hexagon Prints', 'price' => 449.00, 'image' => 'icon_honeycomb.png'],
            '9' => ['name' => 'Split Canvas', 'price' => 271.70, 'image' => 'icon_split_canvas.png'],
            '10' => ['name' => 'Photo Mosaic', 'price' => 214.50, 'image' => 'mosaic.png'],
            '11' => ['name' => 'Lyric on Canvas', 'price' => 214.50, 'image' => 'lyrics_on_canvas.png'],
            '12' => ['name' => 'Digital Painting', 'price' => 2642.00, 'image' => 'digital_painting.png'],
            '13' => ['name' => 'Quotes on Canvas', 'price' => 143.00, 'image' => 'quotes_on_canvas.jpg'],
            '14' => ['name' => 'Bus Roll', 'price' => 599.40, 'image' => 'bus_roll.png'],
            '15' => ['name' => 'Canvas Banner', 'price' => 399.00, 'image' => 'canvas-banner.png'],
            '16' => ['name' => 'Pop Art', 'price' => 642.00, 'image' => 'pop-art.jpg'],
            '17' => ['name' => 'Word Art', 'price' => 242.00, 'image' => 'word-art-icon.png'],
        ];
        
        $acrylic_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 355.00, 'image' => 'acrylic_print.png'],
            '2' => ['name' => 'Wall Display', 'price' => 1983.60, 'image' => 'icon_wall_display.png'],
            '3' => ['name' => 'Photo Collage', 'price' => 426.60, 'image' => 'icon_photo_collage.png'],
            '4' => ['name' => 'Split Acrylic', 'price' => 674.50, 'image' => 'icon_split_canvas.png'],
            '5' => ['name' => 'Photo Mosaic', 'price' => 426.00, 'image' => 'mosaic.png'],
            '6' => ['name' => 'Lyric on Acrylic', 'price' => 426.00, 'image' => 'lyrics_on_canvas.png'],
            '7' => ['name' => 'Digital Painting', 'price' => 2854.00, 'image' => 'digital_painting.png'],
            '8' => ['name' => 'Quotes on Acrylic', 'price' => 355.00, 'image' => 'quotes_on_canvas.jpg'],
            '9' => ['name' => 'Bus Roll', 'price' => 1065.60, 'image' => 'bus_roll.png'],
            '10' => ['name' => 'Word Art', 'price' => 454.00, 'image' => 'word-art-icon.png'],
        ];
        
        $metal_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 444.00, 'image' => 'metal_print.png'],
            '2' => ['name' => 'Wall Display', 'price' => 2479.50, 'image' => 'icon_wall_display.png'],
            '3' => ['name' => 'Photo Collage', 'price' => 532.80, 'image' => 'icon_photo_collage.png'],
            '4' => ['name' => 'Split Metal', 'price' => 843.60, 'image' => 'icon_split_canvas.png'],
            '5' => ['name' => 'Photo Mosaic', 'price' => 532.80, 'image' => 'mosaic.png'],
            '6' => ['name' => 'Lyric on Metal', 'price' => 532.80, 'image' => 'lyrics_on_canvas.png'],
            '7' => ['name' => 'Digital Painting', 'price' => 2943.00, 'image' => 'digital_painting.png'],
            '8' => ['name' => 'Quotes on Metal', 'price' => 444.00, 'image' => 'quotes_on_canvas.jpg'],
            '9' => ['name' => 'Bus Roll', 'price' => 1333.20, 'image' => 'bus_roll.png'],
            '10' => ['name' => 'Word Art', 'price' => 543.00, 'image' => 'word-art-icon.png'],
        ];
        
        $wood_material_data = [            
            '1' => ['name' => 'Single Print', 'price' => 1799.00, 'image' => 'icon_wood_print.png'],
            '2' => ['name' => 'Round Wood', 'price' => 2699.00, 'image' => 'round_wood.png'],
            '3' => ['name' => 'Wood Wall Display', 'price' => 8857.80, 'image' => 'icon_wall_display.png'],
            '4' => ['name' => 'Lyric on Wood', 'price' => 2158.80, 'image' => 'lyrics_on_canvas.png'],
            '5' => ['name' => 'Digital Painting', 'price' => 4298.00, 'image' => 'digital_painting.png'],
            '6' => ['name' => 'Quotes on Wood', 'price' => 1799.00, 'image' => 'quotes_on_canvas.jpg'],
            '7' => ['name' => 'Split Wood', 'price' => 3418.10, 'image' => 'icon_split_canvas.png'],
            '8' => ['name' => 'Hexagon Wood', 'price' => 807.30, 'image' => 'icon_honeycomb.png'],
            '9' => ['name' => 'Word Art', 'price' => 1898.00, 'image' => 'word-art-icon.png'],
        ];
        
        $other_material_data = [            
            '1' => ['name' => 'Peel & Stick', 'price' => 1589.28, 'image' => 'peel_stick.jpg'],
            '2' => ['name' => 'Engraved Prints', 'price' => 329.00, 'image' => 'engrave_print.jpg'],
            '3' => ['name' => 'Wall Murals', 'price' => 1225.60, 'image' => 'wall_murals.png'],
        ];

       

        $data['sizeData'] = $sizeData;
        $data['canvas_material_data'] = $canvas_material_data;
        $data['acrylic_material_data'] = $acrylic_material_data;
        $data['metal_material_data'] = $metal_material_data;
        $data['wood_material_data'] = $wood_material_data;
        $data['other_material_data'] = $other_material_data;
        $data['recommended_data'] = $recommended_data;
        $data['square_data'] = $square_data;
        $data['panaromic_data'] = $panaromic_data;
        $data['large_data'] = $large_data;
        $data['small_data'] = $small_data;
        $data['shapeData'] = $shapeData;
        $data['colorFinishingBasic'] = $colorFinishingBasic;
        $data['wrapData'] = $wrapData;
        $data['borderData'] = $borderData;
        $data['standardFrame'] = $standardFrame;
        $data['premiumFrame'] = $premiumFrame;
        $data['floatFrame'] = $floatFrame;
        $data['hardwareStyleData'] = $hardwareStyleData;
        $data['displayOption'] = $displayOption;
        $data['retouchingOption'] = $retouchingOption;        
        $data['proofOption'] = $proofOption;        
        $data['laminationOption'] = $laminationOption;    
        $data['finalPriceData'] = $finalPriceData;
        $data['productSelection'] = $productSelection;
        
        // Load stored image and options from session
        $image = Session::get('uploaded_image');
        $data['image'] = $image;

        return view('front.products.custom_frame.index', $data);
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
    
    public function checkSessionImage(Request $request) {
        $imagePath = Session::get('uploaded_image'); // Assuming image is stored in session

        return response()->json([
            'image' => $imagePath ? asset('storage/' . $imagePath) : null
        ]);
    }    


    public function calculatePrice(Request $request) {
        $text = $request->input('text', '');
        $pricePerCharacter = 3650; // Example: 2 Rupees per character
        $totalPrice = mb_strlen($text) * $pricePerCharacter; // Count characters, including special ones

        return response()->json(['price' => $totalPrice]);
    }







    public function uploadImage2(Request $request) {
        $request->validate([
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '_2.' . $extension;
    
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
    
            // Save the image as JPG with 100% quality
            $image->toJpeg(100)->save($fullPath);
    
            // Save resized version (500x500)
            $resizedPath = $uploadPath . $imageName;
            $image->cover(500, 500)->save($resizedPath);
    
            // ✅ Step 3: Store new image in session
            Session::put('uploaded_image2', $imageName);
    
            // Generate URL to return in response
            $imageUrl = asset('uploads/custom_frames/' . $imageName);
    
            return response()->json([
                'success' => true,
                'image_url' => $imageUrl
            ]);
        }
    
        return response()->json(['success' => false]);
    }
    
    public function checkImage2() {
        // Get the stored image path from the session
        $imagePath = Session::get('uploaded_image2');
    
        return response()->json([
            'success' => true,
            'image' => $imagePath ? asset('uploads/custom_frames/' . $imagePath) : null,
        ]);
    }
    
    public function deleteImage2() {
        if (Session::has('uploaded_image2')) {
            $oldImage = Session::get('uploaded_image2');
            $oldImagePath = public_path('uploads/custom_frames/' . $oldImage);
    
            // Check if the file exists before deleting
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the file
            }
    
            // Clear session value            
            Session::forget('uploaded_image2');
        }
        return response()->json(['success' => 'Image deleted']);
    }
    
    
}