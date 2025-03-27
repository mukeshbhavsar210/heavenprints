<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SVG;
use Illuminate\Support\Facades\Storage;
use Gloudemans\Shoppingcart\Facades\Cart;

class NeonController extends Controller {
    // public function index() {
    //     $colors = ['#ffffff', '#e5097f', '#009846', '#0000ff', '#834e98', '#ef7b1b', '#62bed3', '#eedfc8', '#e31e24', '#ffed00'];
    //     $fonts = ['Passionate', 'Dreamy', 'Flowy', 'Original', 'Classic', 'Boujee', 'Funky', 'Chic', 'Delight', 'Classy', 'Romantic', 'Robo', 'Charming', 'Quirky', 'Stylish', 'Sassy', 'Glam', 'DOPE', 'Chemistry', 'Acoustic', 'Sparky', 'Vibey', 'LoFi', 'Bossy', 'ICONIC', 'Jolly', 'MODERN',];

    //     $data['colors'] = $colors;
    //     $data['fonts'] = $fonts;

    //     return view('front.shop.neon.index', $data);
    // }


    public function saveSVG(Request $request){
        $request->validate([
            'svg' => 'required|string',
            'text' => 'required|string',
            'color' => 'required|string',
            'font' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Save to storage folder
        $neon_id = $request->input('neon_id');
        $text = $request->input('text');
        $fileName = $neon_id.'_'.$text.'.svg';
        Storage::put('public/svgs/' . $fileName, $request->input('svg'));

        // Save to database
        $product = new Product();
        $product->name = $request->input('text');
        $product->save();

        //Save photos to Product Image
        $productImage = new ProductImage();
        $productImage->product_id = $product->id;
        $productImage->image = $fileName;
        $productImage->save();

        // Add to cart
        Cart::add([
            'id'      => $product->id,
            'name'    => $request->text,
            'qty'     => 1,
            'price'   => $request->price,
            'weight'  => 0,
            'options' => [
                'category' => 'Neon', 
                'font'  => $request->font,
                'size'  => $request->size,
                'color' => $request->color,
                'light_category' => $request->light_category,
            ]
        ]);
       
        return response()->json(['message' => 'SVG saved successfully!']);
    }


    public function storeSVG(Request $request){
        $text = $request->input('text');
        $color = $request->input('color');
        $font = $request->input('font');
        $fontSize = $request->input('fontSize');

        $svgContent = '<svg width="300" height="250" style="background: black"  xmlns="http://www.w3.org/2000/svg">
                            <text x="50%" y="50%" font-family="'.$font.'" font-size="'.$fontSize.'" fill="'.$color.'" text-anchor="middle" alignment-baseline="middle">'.$text.'</text>
                        </svg>';

        $neon_id = rand(100000, 999999);
        $text = $request->input('text');
        $fileName = $neon_id.'_'.$text.'.svg';        
        Storage::put('public/svg/' . $fileName, $svgContent);

        SVG::create([
            'neon_id' => $neon_id,
            'text' => $text,
            'font' => $font,
            'color' => $color,
            'font_size' => $fontSize,
            'file_name' => $fileName
        ]);

        return response()->json(['message' => 'SVG saved successfully']);
    }

}
