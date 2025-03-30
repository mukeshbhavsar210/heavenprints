<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Flash;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller {
    public function index(Request $request){
        $categories = Category::latest();

        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name', 'like', '%'.$request->get('keyword').'%');
        }

        $categories = $categories->paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }




    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $category = new Category();
            $category->name = $request->name;
            $category->slug_category = $request->slug_category;
            $category->status = $request->status;
            $category->showHome = $request->showHome;

            //Image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = $category->slug_category.'_'.time().'.'.$extenstion;
                $path = public_path().'/uploads/category/'.$fileName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($path);
                $image->cover(300,300)->save($path);
                $category->image = $fileName;
                $category->save();
            };

            return redirect()->route('categories.index')->with('success','Category added successfully.');
        } else {
            return redirect()->route('categories.index')->withInput()->withErrors($validator);
        }            
    }


    public function edit($categoryId, Request $request){
        $category = Category::find($categoryId);

        if (empty($category)) {
            return redirect()->route('categories.index');
        }

        return view('admin.category.edit', compact('category'));
    }




    public function update($categoryId, Request $request){
        $category = Category::find($categoryId);

        if (empty($category)) {
            $request->session()->flash('error', 'Category not found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => 'Category not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug_category' => 'required|unique:categories,slug_category,'.$category->id.',id',
        ]);

        if ($validator->passes()) {
            $category->name = $request->name;
            $category->slug_category = $request->slug_category;
            $category->status = $request->status;
            $category->showHome = $request->showHome;
            $category->save();

            $oldImage = $category->image;

            // Save image here
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($category->image) {
                    $oldImagePath = public_path('/uploads/category/' . $category->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            
                // Process new image upload
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $category->slug_category . '_' . time() . '.' . $extension;
            
                // Define paths
                $uploadPath = public_path('/uploads/category/');
            
                // Process and save the image
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($uploadPath . $fileName);  // Save original image
            
                // Update category image field
                $category->image = $fileName;
                $category->save();
            }
            return redirect()->route('categories.index')->with('success','Category updated successfully.');
        } else {
            return redirect()->route('categories.index')->withInput()->withErrors($validator);
        }    
    }


    public function destroy($categoryId, Request $request){
        $category = Category::find($categoryId);

         // Prevent deletion for specific categories
        if ($category->is_protected) {
            return redirect()->back()->with('error', 'This category cannot be deleted.');
        }

        if(empty($category)){
            $request->session()->flash('error', 'Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Category not found'
            ]);
            //return redirect()->route('categories.index');
        }

        //Delete old image
        File::delete(public_path().'/uploads/category/'.$category->image);

        $category->delete();

        $request->session()->flash('success', 'Category deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
