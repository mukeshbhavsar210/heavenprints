<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index(){
        $products = Product::where('is_featured','Yes')->orderBy('id','DESC')->take(4)->where('status',1)->where('product_type','default')->get();
        $latestProducts = Product::orderBy('id','DESC')->where('status',1)->take(4)->where('product_type','default')->get();
        $data['latestProducts'] = $latestProducts;
        $data['featuredProducts'] = $products;        
        return view("front.home.index",$data);
    }

    public function addToWishlist(Request $request){
        if(Auth::check() == false){
            session(['url.intended' => url()->previous() ]);
            return response()->json([
                'status' => false,
            ]);
        }

        // if(Auth::check() == false){
        //     session(['url.intended' => url()->previous() ]);
        //     return response()->json([
        //         'status' => false,
        //     ]);
        // }

        //Product add in wishlist
        $product = Product::where('id', $request->id)->first();

        if ($product == null){
            return response()->json([
                'status' => true,
                'message' => '<div class="alert alert-danger">Product not found.</div>'
            ]);
        }


        Wishlist::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ],
        );

        //$wishlist = new Wishlist;
        //$wishlist->user_id = Auth::user()->id;
        //$wishlist->product_id = $request->id;
        //$wishlist->save();

        return response()->json([
            'status' => true,
            'message' => '<div class="alert alert-success"><strong>"'.$product->name.'"</strong> added in yout wishlist!</div>'
        ]);
    }

    public function page($slug){
        $page = Page::where('slug', $slug)->first();

        if($page == null){
            abort(404);
        }

        return view('front.page', [
            'page' => $page
        ]);
    }

    
    public function sendContactEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:10',
        ]);

        if($validator->passes()){

        } else {
            return response()->json([
                'status'=> false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
