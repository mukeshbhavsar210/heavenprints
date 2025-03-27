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
            'slug_sub_category' => 'required|unique:sub_categories',
            'category' => 'required',
            'status' => 'required',
        ]);

        if ($validator->passes()) {
            $subCategory = new SubCategory();
            $subCategory->name = $request->name;
            $subCategory->slug_sub_category = $request->slug_sub_category;
            $subCategory->status = $request->status;
            $subCategory->category_id = $request->category;
            $subCategory->showHome = $request->showHome;
            $subCategory->save();

            // Save image here
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $subCategory->id.'_'.$subCategory->name.'.'.$ext;                
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/sub_category/'.$newImageName;                
                File::copy($sPath,$dPath);

                //Generate thumbnail
                $dPath = public_path().'/uploads/sub_category/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,300);
                $image->save($dPath);                
                $subCategory->image = $newImageName;
                $subCategory->save();
            }

            $request->session()->flash('success', 'Sub-Category added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Sub-Category added successfully'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
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

            $oldImage = $subCategory->image;

            // Save image here
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $subCategory->id.'-'.time().'.'.$ext;
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/sub_category/'.$newImageName;
                File::copy($sPath,$dPath);

                //Generate image thumbnail
                $dPath = public_path().'/uploads/sub_category/thumb/'.$newImageName;
                File::copy($sPath,$dPath);

                $subCategory->image = $newImageName;
                $subCategory->save();

                //Delete old image
                File::delete(public_path().'/uploads/sub_category/thumb/'.$oldImage);
                File::delete(public_path().'/uploads/sub_category/'.$oldImage);
            }

            $request->session()->flash('success', 'Sub-Category updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'Sub-Category updated successfully'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
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
