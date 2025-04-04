<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductImageController extends Controller {
    public function update(Request $request){

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $sourcePath = $image->getPathName();

        $productImage = new ProductImage();
        $productImage->product_id = $request->product_id;
        $productImage->image = "NULL";
        $productImage->save();

        $imageName = $request->product_id.'-'.$productImage->id.'-'.time().'.'.$ext;
        $productImage->image = $imageName;
        $productImage->save();

        //Large Image
        $destPath = public_path().'/uploads/products/large/'.$imageName;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($sourcePath);
        // $image->resize(1000, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        $image->cover(950,750);
        $image->save($destPath);

        //Generate Thumnail
        $destPath = public_path().'/uploads/products/small/'.$imageName;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($sourcePath);
        $image->cover(300,300);
        $image->save($destPath);

        return response()->json([
            'status' => true,
            'image_id' => $productImage->id,
            'ImagePath' => asset('uploads/products/small/'.$productImage->image),
            'message' => 'Image saved successfully'
        ]);
    }

    public function destroy(Request $request){
        $productImage = ProductImage::find($request->id);

        if (empty($productImage)){
            return response()->json([
                'status' => false,
                'message' => 'Image not found'
            ]);
        }

        //Delete images from folder
        File::delete(public_path('uploads/products/large/'.$productImage->image));
        File::delete(public_path('uploads/products/small/'.$productImage->image));

        //Delete images from database
        $productImage->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
