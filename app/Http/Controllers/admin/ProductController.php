<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller {

    public function index(Request $request){
        $products = Product::latest('id')->with('product_images')->where('product_type', 'default');;

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
        $data['categories'] = $categories;
        $data['brands'] = $brands;

        return view('admin.products.create', $data);
    }



    public function store(Request $request){
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:products',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ];

        if (!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $rules['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->passes()) {
            $product = new Product;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->product_type = $request->product_type;
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

            // Store Size if selected
            if ($request->has('size')) {
                $product->sizes = json_encode($request->size); // Convert array to JSON
            } else {
                $product->sizes = null; // Store null if not selected
            }

            // Store Color if selected
            if ($request->has('color')) {
                $product->colors = json_encode($request->color);
            } else {
                $product->colors = null;
            }

            $product->save();

            // Check if multiple images are uploaded
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . '_' . time() . '.' . $extension;
                    $path = public_path('/uploads/product/large/' . $fileName);

                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);

                    $image->toJpeg(80)->save($path);

                    $thumbPath = public_path('/uploads/product/small/' . $fileName);
                    $image->cover(300, 300)->save($thumbPath);

                    $categoryImage = new ProductImage();
                    $categoryImage->product_id = $product->id;
                    $categoryImage->image = $fileName;
                    $categoryImage->save();
                }
            }
        
            return redirect()->route('products.index')->with('success','Product added successfully.');
        } else {
            return redirect()->route('products.index')->withInput()->withErrors($validator);
        }    
    }

    //Edit Product
    public function edit($id, Request $request){
        $product = Product::find($id);

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

        return view('admin.products.edit',$data);
    }



    public function update($id, Request $request){
        $product = Product::find($id);
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:products,slug,'.$product->id.',id',
            'price' => 'required|numeric',
            'sku' => 'required|unique:products,sku,'.$product->id.',id',
            'track_qty' => 'required|in:Yes,No',
            'category' => 'required|numeric',
            'is_featured' => 'required|in:Yes,No',
        ];

        if (!empty($request->track_qty) && $request->track_qty == 'Yes') {
            $rules['qty'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->passes()) {
            $product->name = $request->name;
            $product->slug = $request->slug;
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

            // Store Size if selected
            if ($request->has('size')) {
                $product->sizes = json_encode($request->size); // Convert array to JSON
            } else {
                $product->sizes = null; // Store null if not selected
            }

            // Store Color if selected
            if ($request->has('color')) {
                $product->colors = json_encode($request->color);
            } else {
                $product->colors = null;
            }
            
            $product->save();

            if ($request->hasFile('image')) {
                // Fetch existing images for the product
                $existingImages = ProductImage::where('product_id', $product->id)->get();
            
                // Delete old images from storage
                foreach ($existingImages as $oldImage) {
                    $largeImagePath = public_path('/uploads/product/large/' . $oldImage->image);
                    $thumbImagePath = public_path('/uploads/product/small/' . $oldImage->image);
            
                    if (File::exists($largeImagePath)) {
                        File::delete($largeImagePath);
                    }
                    if (File::exists($thumbImagePath)) {
                        File::delete($thumbImagePath);
                    }
            
                    // Delete the old image record from the database
                    $oldImage->delete();
                }
            
                // Upload and store the new images
                foreach ($request->file('image') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $product->slug . '_' . time() . '.' . $extension;
            
                    // Define paths
                    $largePath = public_path('/uploads/product/large/' . $fileName);
                    $thumbPath = public_path('/uploads/product/small/' . $fileName);
            
                    // Initialize ImageManager
                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($file);
            
                    // Save original large image
                    $image->toJpeg(80)->save($largePath);
            
                    // Save resized thumbnail
                    $image->cover(300, 300)->save($thumbPath);
            
                    // Save new image details in the database
                    $newImage = new ProductImage();
                    $newImage->product_id = $product->id;
                    $newImage->image = $fileName;
                    $newImage->save();
                }
            }

            return redirect()->route('products.index')->with('success','Product updated successfully.');
        } else {
            return redirect()->route('products.index')->withInput()->withErrors($validator);
        }    
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
                File::delete(public_path('uploads/product/large/'.$productImage->image));
                File::delete(public_path('uploads/product/small/'.$productImage->image));
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
