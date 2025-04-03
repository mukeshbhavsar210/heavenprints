<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\FrameMaterial;
use App\Models\Size;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller {

    public function index(Request $request){
        $products = Product::latest('id')->with('product_images');
        

        if ($request->get('keyword') != ""){
            $products = $products->where('name', 'like', '%'.$request->keyword.'%');
        }

        $products = $products->paginate();

        $data['products'] = $products;
        return view ('admin.products.list',$data);
    }



    public function create(){
        $data = [];
        $categories = Category::orderBy('name','ASC')->get();
        $brands = Brand::orderBy('name','ASC')->get();
        $frameMaterials = FrameMaterial::get();
        $colors = Color::get();
        $sizes = Size::get();

        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['frameMaterials'] = $frameMaterials;
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;

        return view('admin.products.create', $data);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',   
            'price' => 'required|min:3',  
            'category' => 'required|numeric',
            'qty' => 'required',
            'product_type' => 'required',
            //'track_qty' => 'required|in:Yes,No',
            //'sku' => 'required|unique:products',                        
            //'is_featured' => 'required|in:Yes,No',        
        ]);

        if($validator->passes()) {
            $product = new Product;
            $product->name = $request->name;   
            $product->slug = $request->slug;
            $product->product_type = $request->product_type;         
            $product->metal_type = $request->metal_type;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->brand;
            $product->is_featured = $request->is_featured;
            $product->shipping_returns = $request->shipping_returns;
            $product->short_description = $request->short_description;
            $product->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';

            if ($request->has('sizes')) {
                $product->sizes = json_encode($request->sizes);
            } else {
                $product->sizes = null;
            }

            if ($request->has('colors')) {
                $product->colors = json_encode($request->colors);
            } else {
                $product->colors = null;
            }

            $product->save(); 

            //Image upload
            $manager = new ImageManager(new Driver());
            $productImage = new ProductImage();
            $productImage->product_id = $product->id;

            for ($i = 1; $i <= 5; $i++) {
                $imageField = 'image' . $i;
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . "_{$i}_" . time() . '.' . $extension;
                    
                    // Paths for different image sizes
                    $smallPath = public_path('/uploads/products/small/' . $fileName);
                    $largePath = public_path('/uploads/products/large/' . $fileName);
            
                    // Process & Save Image
                    $image = $manager->read($file);
                    
                    // Save original (optional)
                    $image->toJpeg(70)->save($smallPath);
            
                    // Save resized versions
                    $image->cover(250, 250)->save($smallPath);  // 200x200 Thumbnail
                    $image->cover(800, 600)->save($largePath); // 1000x300 Wide Banner
            
                    // Assign Image to Corresponding Column in DB
                    $productImage->{'image' . $i} = $fileName;
                }
            }
            $productImage->save(); // ✅ Save ProductImage after all processing

            session()->flash('success','Product added successfully');

            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

   

    //Edit Product
    public function edit($id, Request $request){
        $product = Product::find($id);
        $frameMaterials = FrameMaterial::get();
        $colors = Color::get();
        $sizes = Size::get();

        if (empty($product)) {
            return redirect()->route('products.index')->with('error','Product not found');
        }

        //Fetch Product Images
        $productImages = ProductImage::where('product_id',$product->id)->get();
        $subCategories = SubCategory::where('category_id',$product->category_id)->get();

        //Fetch Related products
        $relatedProducts = [];
        if ($product->related_products != '') {
            $productArray = explode(',',$product->related_products);
            $relatedProducts = Product::whereIn('id',$productArray)->get();
        }

        $data = [];
        $categories = Category::orderBy('name','ASC')->get();
        $brands = Brand::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        $data['product'] = $product;
        $data['subCategories'] = $subCategories;
        $data['productImages'] = $productImages;
        $data['relatedProducts'] = $relatedProducts;    
        $data['frameMaterials'] = $frameMaterials;    
        $data['colors'] = $colors;    
        $data['sizes'] = $sizes;            

        return view('admin.products.edit',$data);
    }

    //Product Updates
    public function update($id, Request $request){
        $product = Product::find($id);
        $rules = [
            'name' => 'required|min:3',   
            'product_type' => 'required',
            'price' => 'required|min:3',  
            'category' => 'required|numeric',
            'qty' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()) {
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->product_type = $request->product_type;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->metal_type = $request->metal_type;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->compare_price = $request->compare_price;
            $product->sku = $request->sku;
            $product->barcode = $request->barcode;
            $product->track_qty = $request->track_qty;
            $product->qty = $request->qty;
            $product->status = $request->status;
            $product->category_id = $request->category;
            $product->sub_category_id = $request->sub_category;
            $product->brand_id = $request->brand;
            $product->is_featured = $request->is_featured;
            $product->shipping_returns = $request->shipping_returns;
            $product->short_description = $request->short_description;
            $product->related_products = (!empty($request->related_products)) ? implode(',',$request->related_products) : '';

            if ($request->has('sizes')) {
                $product->sizes = json_encode($request->size);
            } else {
                $product->sizes = null;
            }

            if ($request->has('colors')) {
                $product->colors = json_encode($request->color);
            } else {
                $product->colors = null;
            }
            
            $product->save();            

            $manager = new ImageManager(new Driver());
            $productImage = ProductImage::where('product_id', $product->id)->first();

            // If product images exist, delete the old images
            if ($productImage) {
                for ($i = 1; $i <= 5; $i++) {
                    $imageField = 'image' . $i;
                    if ($request->hasFile($imageField) && !empty($productImage->$imageField)) {
                        // Delete old images
                        $oldFileName = $productImage->$imageField;
                        $smallPath = public_path("/uploads/products/small/" . $oldFileName);
                        $largePath = public_path("/uploads/products/large/" . $oldFileName);

                        if (File::exists($smallPath)) {
                            File::delete($smallPath);
                        }
                        if (File::exists($largePath)) {
                            File::delete($largePath);
                        }
                    }
                }
            } else {
                // Create a new record if product images do not exist
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
            }

            // Now, process the new images and update the existing entry
            for ($i = 1; $i <= 5; $i++) {
                $imageField = 'image' . $i;
                if ($request->hasFile($imageField)) {
                    $file = $request->file($imageField);
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . "_{$i}_" . time() . '.' . $extension;

                    $smallPath = public_path('/uploads/products/small/' . $fileName);
                    $largePath = public_path('/uploads/products/large/' . $fileName);

                    $image = $manager->read($file);
                    $image->toJpeg(70)->save($smallPath);
                    $image->cover(250, 250)->save($smallPath);
                    $image->cover(800, 600)->save($largePath);

                    $productImage->$imageField = $fileName;
                }
            }
            $productImage->save();

            session()->flash('success','Product updated successfully');

            return response()->json([

                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function deleteImage(Request $request)
{
    $image = ProductImage::find($request->image_id);
    
    if ($image) {
        // Delete image from storage
        for ($i = 1; $i <= 5; $i++) {
            if ($image->{'image' . $i}) {
                $imagePath = public_path('uploads/products/small/' . $image->{'image' . $i});
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->{'image' . $i} = null; // Set the image field to null
                break;
            }
        }
        $image->save();

        return response()->json(['success' => true]);
    }
    
    return response()->json(['success' => false, 'message' => 'Image not found.']);
}


    //Delete product
    public function destroy($id, Request $request){
        $product = Product::find($id);
        if (empty($product)) {
            $request->session()->flash('error','Product not found');
            return response()->json([
                'status' => false,
                'notFound' => true,
            ]);
        }

        $productImages = ProductImage::where('product_id',$id)->get();

        if (!empty($productImages)) {
            foreach ($productImages as $productImage) {
                File::delete(public_path('uploads/products/large/'.$productImage->image));
                File::delete(public_path('uploads/products/small/'.$productImage->image));
            }

            ProductImage::where('product_id',$id)->delete();
        }
        $product->delete();
        $request->session()->flash('success','Product deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully',
        ]);
    }



    public function getProducts(Request $request){
        $tempProduct = [];

        if($request->term != ""){
            $products = Product::where('name','like','%'.$request->term.'%')->get();

            if ($products != null){
                foreach ($products as $product){
                    $tempProduct[] = array(
                        'id' => $product->id,
                        'text' => $product->name,
                    );
                }
            }
        }
        return response()->json([
            'tags' => $tempProduct,
            'status' => true,
        ]);
    }


}
