<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customize;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CustomizeController extends Controller
{
    public function index(Request $request){
        $customize = Customize::latest();
        
        if(!empty($request->get('keyword'))){
            $customize = $customize->where('name', 'like', '%'.$request->get('keyword').'%');
        }

        $customize = $customize->paginate(10);
        return view('admin.customize.list', compact('customize'));
    }



    public function create(){
        $products = Product::whereIn('metal_type', ['Canvas', 'Acrylic', 'Metal', 'Wood'])->get();

        return view('admin.customize.create', compact('products'));
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            //'name' => 'required',
        ]);

        if ($validator->passes()) {
            $customize = new Customize();
            $customize->product = $request->product;
            $customize->name = $request->name;
            $customize->price = $request->price;
            $customize->category = $request->category;
            $customize->type = $request->type;
            $customize->save();

            //Image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = $customize->name.'_'.time().'.'.$extenstion;
                $path = public_path().'/uploads/customize/'.$fileName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->cover(600,600)->save($path);
                $customize->image = $fileName;
                $customize->save();
            };

            return redirect()->route('customize.index')->with('success','Customize added successfully.');
        } else {
            return redirect()->route('customize.index')->withInput()->withErrors($validator);
        }            
    }


    public function edit($customizeId, Request $request){
        $products = Product::whereIn('metal_type', ['Canvas', 'Acrylic', 'Metal', 'Wood'])->get();

        $customize = Customize::find($customizeId);

        if (empty($customize)) {
            return redirect()->route('customize.index');
        }

        $data['products'] = $products;
        $data['customize'] = $customize;

        return view('admin.customize.edit', $data);
    }




    public function update($customizeId, Request $request){
        $customize = Customize::find($customizeId);

        if (empty($customize)) {
            $request->session()->flash('error', 'Customize not found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Customize not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',            
        ]);

        if ($validator->passes()) {
            $customize->name = $request->name;
            $customize->product = $request->product;
            $customize->price = $request->price;
            $customize->image = $request->image;
            $customize->category = $request->category;
            $customize->type = $request->type;
            $customize->save();

            $oldImage = $customize->image;

            // Save image here
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($customize->image) {
                    $oldImagePath = public_path('/uploads/customize/' . $customize->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            
                // Process new image upload
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $customize->name . '_' . time() . '.' . $extension;
            
                // Define paths
                $uploadPath = public_path('/uploads/customize/');
            
                // Process and save the image
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(100)->save($uploadPath . $fileName);  // Save original image
                            
                $customize->image = $fileName;
                $customize->save();
            }
            return redirect()->route('customize.index')->with('success','Customize updated successfully.');
        } else {
            return redirect()->route('customize.index')->withInput()->withErrors($validator);
        }    
    }


    public function destroy($customizeId, Request $request){
        $customize = Customize::find($customizeId);

        if(empty($customize)){
            $request->session()->flash('error', 'Customize not found');
            return response()->json([
                'status' => true,
                'message' => 'Customize not found'
            ]);
        }

        //Delete old image
        File::delete(public_path().'/uploads/customize/'.$customize->image);

        $customize->delete();

        $request->session()->flash('success', 'Customize deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Customize deleted successfully'
        ]);
    }
}
