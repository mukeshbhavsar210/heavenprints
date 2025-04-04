<?php

use App\Mail\OrderEmail;
use App\Models\Category;
use App\Models\Country;
use App\Models\Banner;
use App\Models\Order;
use App\Models\Role;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Mail;

    function onlyMetalProducts(){
        return Product::orderBy('name','ASC')->where('product_type','metal')->get();
    }

    function getBanners(){
        return Banner::orderBy('name','ASC')->where('status',1)->where('showHome','Yes')->get();
    }

    function getCategories(){
        return Category::orderBy('name','ASC')->with('sub_category')->take(4)->orderBy('id','DESC')->where('status',1)->where('showHome','Yes')->get();
    }

    function allProducts(){
        return SubCategory::orderBy('name','ASC')->orderBy('id','DESC')->where('status',1)->get();
    }

    function getProductImage($productId){
        return ProductImage::where('product_id',$productId)->first();
    }

    function orderEmail($orderId, $userType="customer"){
        $order = Order::where('id',$orderId)->with('items')->first();

        if($userType == 'customer'){
            $subject = 'Thanks for your order';
            $email = $order->email;
        } else {
            $subject = 'You have received an order';
            $email = env('ADMIN_EMAIL');
        }

        $mailData = [
            'subject' => $subject,
            'order' => $order,
            'userType' => $userType,
        ];

        //Mail::to($email)->send(new OrderEmail($mailData));
    }

    function getCountryInfo($id){
        return Country::where('id',$id)->first();
    }

    function aboutusPages(){
        $pages = Page::orderBy('name','ASC')->where('category','about_us')->get();
        return $pages;
    }

    function insrpirationPages(){
        $pages = Page::orderBy('name','ASC')->where('category','insrpiration')->get();
        return $pages;
    }

    function productsPages(){
        $pages = Page::orderBy('name','ASC')->where('category','products')->get();
        return $pages;
    }
?>
