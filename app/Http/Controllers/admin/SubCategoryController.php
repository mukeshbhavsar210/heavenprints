<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SubCategoryController extends Controller {
    public function index(Request $request){
        $subCategories = SubCategory::select('sub_categories.*','categories.name as categoryName')
            ->latest('sub_categories.id')
            ->leftJoin('categories', 'categories.id', 'sub_categories.category_id');

        if(!empty($request->get('keyword'))){
            $subCategories = $subCategories->where('sub_categories.name', 'like', '%'.$request->get('keyword').'%');
            $subCategories = $subCategories->orWhere('categories.name', 'like', '%'.$request->get('keyword').'%');
        }

        $subCategories = $subCategories->paginate(10);
        return view('admin.sub_category.list', compact('subCategories'));
    }


    public function create(){
        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        return view("admin.sub_category.create", $data);
    }



    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->slug_sub_category = $request->slug_sub_category;
            $subCategory->status = $request->status;
            $subCategory->showHome = $request->showHome;
            $subCategory->category_id = $request->category;

            //Image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = $subCategory->slug_sub_category.'_'.time().'.'.$extenstion;
                $path = public_path().'/uploads/sub_category/'.$fileName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($path);
                $image->cover(300,300)->save($path);
                $subCategory->image = $fileName;
                $subCategory->save();
            }

            return redirect()->route('sub-categories.index')->with('success','Sub-Category added successfully.');
        } else {
            return redirect()->route('sub-categories.index')->withInput()->withErrors($validator);
        }            
    }




    public function edit($id, Request $request){

        $subCategory = SubCategory::find($id);
        if(empty($subCategory)){
            $request->session()->flash('error','Record not found');
            return redirect()->route('sub-categories.index');
        }

        $categories = Category::orderBy('name','ASC')->get();
        $data['categories'] = $categories;
        $data['subCategory'] = $subCategory;
        return view("admin.sub_category.edit", $data);
    }



    public function update($id, Request $request){

        $subCategory = SubCategory::find($id);

        if(empty($subCategory)){
            $request->session()->flash('error','Record not found');
            return response([
                'status' => false,
                'notFound' => true,
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug_sub_category' => 'required|unique:sub_categories,slug_sub_category,'.$subCategory->id.',id',
            'category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->passes()) {
            $subCategory->name = $request->name;
            $subCategory->slug_sub_category = $request->slug_sub_category;
            $subCategory->status = $request->status;
            $subCategory->showHome = $request->showHome;
            $subCategory->category_id = $request->category;
            $subCategory->save();

            // Save image here
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($subCategory->image) {
                    $oldImagePath = public_path('/uploads/sub_category/' . $subCategory->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            
                // Process new image upload
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $subCategory->slug_category . '_' . time() . '.' . $extension;
            
                // Define paths
                $uploadPath = public_path('/uploads/sub_category/');
            
                // Process and save the image
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($uploadPath . $fileName);  // Save original image
            
                // Update category image field
                $subCategory->image = $fileName;
                $subCategory->save();
            }
            return redirect()->route('sub-categories.index')->with('success','Sub-Category updated successfully.');
        } else {
            return redirect()->route('sub-categories.index')->withInput()->withErrors($validator);
        }   
    }


    public function update_old($categoryId, Request $request){
        $category = SubCategory::find($categoryId);

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
            $category->category_id = $request->category;
            $category->save();

            $oldImage = $category->image;

            // Save image here
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($category->image) {
                    $oldImagePath = public_path('/uploads/sub_category/' . $category->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            
                // Process new image upload
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $category->slug_category . '_' . time() . '.' . $extension;
            
                // Define paths
                $uploadPath = public_path('/uploads/sub_category/');
            
                // Process and save the image
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($uploadPath . $fileName);  // Save original image
            
                // Update category image field
                $category->image = $fileName;
                $category->save();
            }
            return redirect()->route('sub-categories.index')->with('success','Sub-Category updated successfully.');
        } else {
            return redirect()->route('sub-categories.index')->withInput()->withErrors($validator);
        }    
    }


    public function destroy($id, Request $request){
        $subCategory = SubCategory::find($id);

        if(empty($subCategory)){
            $request->session()->flash('error','Record not found');
            return response([
                'status' => false,
                'notFound' => true,
            ]);
        }

        $subCategory->delete();

        $request->session()->flash('success', 'Sub Category deleted successfully');

        return response([
            'status' => true,
            'message' => 'Sub Category deleted successfully',
        ]);
    }
}
