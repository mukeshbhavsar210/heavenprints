<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TempImage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Setting;

class SettingController extends Controller {
     
     public function index(){
        $settings = Setting::first();
        $data['settings'] = $settings;
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

            // Save image here
            // Handle second image if exists
            if (!empty($request->image1_id)) {
                $tempImage = TempImage::find($request->image1_id);
                if ($tempImage) {
                    $extArray = explode('.', $tempImage->name);
                    $ext = last($extArray);

                    $newImageName = $settings->name . '.' . $ext;
                    $sPath = public_path('/temp/' . $tempImage->name);
                    $dPath = public_path('/uploads/logo/' . $newImageName);
                    File::copy($sPath, $dPath);
                    $settings->image = $newImageName;
                    $settings->save();

                    $oldImage = $settings->image;

                    // Save image here
                    if (!empty($request->banner_id)) {
                        $tempImage = TempImage::find($request->banner_id);
                        $extArray = explode('.',$tempImage->name);
                        $ext = last($extArray);
        
                        $newImageName = $settings->name . '.' . $ext;
                        $sPath = public_path().'/temp/'.$tempImage->name;
                        $dPath = public_path().'/uploads/logo/'.$newImageName;
                        File::copy($sPath,$dPath);
                        $settings->image = $newImageName;
                        $settings->save();
        
                        //Delete old image
                        File::delete(public_path().'/uploads/logo/'.$oldImage);
                    }
                }
            }

            $request->session()->flash('success', 'Information added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Information added successfully'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
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
            $banner->description = $request->description;
            $banner->status = $request->status;
            $banner->showHome = $request->showHome;
            $banner->save();

            // Save image here
            if (!empty($request->banner_id)) {
                $tempImage = TempImage::find($request->banner_id);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $newImageName = $banner->id.'_'.$banner->name.'.'.$ext;                
                $sPath = public_path().'/temp/'.$tempImage->name;
                $dPath = public_path().'/uploads/banner/'.$newImageName;                
                File::copy($sPath,$dPath);

                //Generate thumbnail
                $dPath = public_path().'/uploads/banner/thumb/'.$newImageName;
                $manager = new ImageManager(new Driver());
                $image = $manager->read($sPath);
                $image->cover(300,300);
                $image->save($dPath);
                $image->save($dPath);                                  
                $banner->image = $newImageName;
                $banner->save();
            }

            $request->session()->flash('success', 'Banner added successfully');

            return response()->json([
                'status' => true,
                'message' => 'Banner added successfully'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
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

}
