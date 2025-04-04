<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;

use App\Models\FrameMaterial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Setting;
use App\Models\Size;

class SettingController extends Controller {
     
     public function index(){
        $settings = Setting::first();
        $frameMaterials = FrameMaterial::get();
        $colors = Color::get();
        $sizes = Size::get();

        $data['settings'] = $settings;
        $data['frameMaterials'] = $frameMaterials;
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;

        return view('admin.setting.index', $data);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $settings = Setting::first() ?? new Setting();  
            $settings->name = $request->name;
            $settings->business_line = $request->business_line;
            $settings->phone = $request->phone;
            $settings->whatsapp = $request->whatsapp;
            $settings->email = $request->email;
            $settings->address = $request->address;
            $settings->description = $request->description;
            $settings->save();

            //logo upload
            if ($request->hasFile('image')) {
                if ($settings->image) {
                    $oldImagePath = public_path('/uploads/logo/' . $settings->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = $settings->name.'.'.$extenstion;
                $path = public_path().'/uploads/logo/'.$fileName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                //$image->toJpeg(80)->save($path);
                //$image->cover(300,300)->save($path);
                $image->save($path);
                $settings->image = $fileName;
                $settings->save();
            };

            return redirect()->route('settings.index')->with('success','Setting saved successfully.');
        } else {
            return redirect()->route('settings.index')->withInput()->withErrors($validator);
        }              
    }



    


    // Update Settings
    public function socials(Request $request) {
        $request->validate([
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'pinterest' => 'nullable|url',
        ]);

        $settings = Setting::first() ?? new Setting();
       
        // Update Other Fields
        $settings->facebook = $request->facebook;
        $settings->instagram = $request->instagram;
        $settings->twitter = $request->twitter;
        $settings->pinterest = $request->pinterest;
        $settings->save();

        return back()->with('success', 'Social media updated successfully!');
    }


    

   
    public function showChangePasswordForm(){
        return view("admin.change-password");
    }

    public function processChangePassword(Request $request){

        $validator = Validator::make(request()->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:new_password',
        ]);

        $id = Auth::guard('admin')->user()->id;

        $admin = User::where('id',$id)->first();

        if($validator->passes()){
            if(!Hash::check($request->old_password,$admin->password)){
                session()->flash('error','Your old password is incorrect.');
                return response()->json([
                    'status' => true,
                ]);
            }

            User::where('id',$id)->update([
                'password' => Hash::make($request->new_password),
            ]);

            session()->flash('success','You have successfully changed your password.');
            return response()->json([
                'status' => true,
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }


   

    //Store Banner images
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->passes()) {
            $banner = new Banner();
            $banner->name = $request->name;
            $banner->banner_slug = $request->banner_slug;
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->showHome = $request->showHome;
            $banner->save();

            //logo upload
            if ($request->hasFile('image')) {
                if ($banner->image) {
                    $oldImagePath = public_path('/uploads/banners/' . $banner->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $fileName = $banner->banner_slug.'.'.$extenstion;
                $path = public_path().'/uploads/banners/'.$fileName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->toJpeg(80)->save($path);
                // $image->resize(1000, null, function ($constraint) {
                //     $constraint->aspectRatio();
                // });
                $image->cover(1000,300)->save($path);
                //$image->save($path);
                $banner->image = $fileName;
                $banner->save();
            };

            return redirect()->route('settings.index')->with('success','Banner saved successfully.');
        } else {
            return redirect()->route('settings.index')->withInput()->withErrors($validator);
        }  
    }


    

    public function destroy($bannerId, Request $request){
        $banner = Banner::find($bannerId);

        if(empty($banner)){
            $request->session()->flash('error', 'Banner not found');
            return response()->json([
                'status' => true,
                'message' => 'Banner not found'
            ]);
            //return redirect()->route('banner.index');
        }

        //Delete old image
        File::delete(public_path().'/uploads/banner/thumb/'.$banner->image);
        File::delete(public_path().'/uploads/banner/'.$banner->image);

        $banner->delete();

        $request->session()->flash('success', 'Banner deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'Banner deleted successfully'
        ]);
    }


    public function frame_material(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $frame = new FrameMaterial;
        $frame->name = $request->name;
        $frame->show = $request->show;
        $frame->save();

        return back()->with('success', 'Frame Material successfully!');
    }

    //Delete 
    public function destroy_material($id, Request $request){
        $frame_material = FrameMaterial::find($id);       
        $frame_material->delete();
        $request->session()->flash('success','Frame Material deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Frame Material deleted successfully',
        ]);
    }


    public function colors(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $frame = new Color;
        $frame->name = $request->name;
        $frame->color_code = $request->color_code;
        $frame->show = $request->show;
        $frame->save();

        return back()->with('success', 'Color added successfully!');
    }

    //Delete product
    public function destroy_colors($id, Request $request){
        $color = Color::find($id);       
        $color->delete();
        $request->session()->flash('success','Color deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Color deleted successfully',
        ]);
    }


    public function sizes(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $frame = new Size;
        $frame->name = $request->name;
        $frame->show = $request->show;
        $frame->save();

        return back()->with('success', 'Size added successfully!');
    }

    //Delete product
    public function destroy_sizes($id, Request $request){
        $size = Size::find($id);       
        $size->delete();
        $request->session()->flash('success','Size deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Size deleted successfully',
        ]);
    }

}
