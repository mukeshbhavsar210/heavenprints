<?php

use App\Mail\OrderEmail;
use App\Models\Category;
use App\Models\Country;
use App\Models\Banner;
use App\Models\Order;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\OrderInvoiceMail;


    function onlyMetalProducts(){
        return Product::orderBy('name','ASC')->where('product_type','metal')->get();
    }

    function getBanners(){
        return Banner::orderBy('name','ASC')->where('showHome','Yes')->get();
    }

    function getCategories(){
        return Category::withCount('products')
            ->with('sub_category')
            ->where('status', 1)
            ->where('showHome', 'Yes')
            ->orderBy('name', 'ASC')
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
    }

    function allProducts(){
        return SubCategory::orderBy('name','ASC')->orderBy('id','DESC')->where('status',1)->get();
    }

    function getProductImage($productId){
        return ProductImage::where('product_id',$productId)->first();
    }

    function orderEmail($orderId, $userType="customer"){
        $order = Order::with('user')->find($orderId);
        $order = Order::where('id',$orderId)->with('items')->first();
        $order = Order::where('id', $orderId)->with(['user', 'items', 'items.product', 'customerAddress', 'customerAddress.country']) // include shippingAddress
                ->first();

        if (!$order) {
            return;
        }
        
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

        // Send to Admin
        if ($userType === 'admin' || $userType === 'both') {
            Mail::to('info@heavenprints.in')->send(new OrderEmail($mailData, 'admin'));
        }

        // Send to Customer
        if (($userType === 'customer' || $userType === 'both') && $order->user && $order->user->email) {
            Mail::to($order->user->email)->send(new OrderEmail($mailData, 'customer'));
        }

        // Mail::to($email)->send(new OrderEmail($mailData));
        // Mail::to($order->user->email)->send(new OrderEmail($mailData));
    }


    

    

    function getCountryInfo($id){
        return Country::where('id',$id)->first();
    }

    function aboutusPages(){
        $pages = Page::orderBy('name','ASC')->where('category','about_us')->get();
        return $pages;
    }

    function products(){
        $products = Product::orderBy('id','DESC')->with('product_images')->where('product_type','Default')->where('status',1)->get();          
        return $products;
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
