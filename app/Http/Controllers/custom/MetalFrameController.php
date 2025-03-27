<?php

namespace App\Http\Controllers\custom;

use App\Http\Controllers\Controller;
use App\Models\FrameMetal;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class MetalFrameController extends Controller {

    public function index() {
        $shapes = ['Square', 'Rectangle', 'Panoramic'];
        $sizes = ['8x8', '10x10', '12x12', '16x16', '20x20', '24x24'];
        $dropdown_1 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];
        $dropdown_2 = ['8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30'];

        return view('front.shop.metal_frame.index', compact('shapes', 'sizes', 'dropdown_1', 'dropdown_2'));
    }
    
    public function metalFrameSelection(Request $request) {
        $request->validate([
            'shape' => 'required|string',
            'size' => 'required|string',
            'custom_size_1' => 'nullable|in:16,20', // First custom size
            'custom_size_2' => 'nullable|in:22,24', // Second custom size
        ]);

        $shape = $request->input('shape');
        $size = $request->input('size');
        $customSize1 = $request->input('custom_size_1');
        $customSize2 = $request->input('custom_size_2');

        $shapePrices = [
            'Square' => 400.00,
            'Rectangle' => 800.00,
            'Panoramic' => 1600.00,
        ];

        $sizePrices = [
            '8x8' => 100.00,
            '10x10' => 200.00,
            '12x12' => 300.00,
            '16x16' => 400.00,
            '20x20' => 500.00,
            '24x24' => 600.00,
        ];

        $customSizePrices1 = [
            '8' => 50.00,
            '9' => 50.00,
            '10' => 100.00,
            '11' => 100.00,
            '12' => 200.00,
            '13' => 200.00,
            '14' => 300.00,
            '15' => 300.00,
            '16' => 400.00,
            '17' => 400.00,
            '18' => 500.00,
            '19' => 500.00,
            '20' => 600.00,
            '21' => 600.00,
            '22' => 700.00,
            '23' => 700.00,
            '24' => 800.00,
            '25' => 800.00,
            '26' => 900.00,
            '27' => 900.00,
            '28' => 1000.00,
            '29' => 1000.00,
            '30' => 1100.00,
        ];        

        $customSizePrices2 = [...$customSizePrices1];

        // Get the price for the selected shape and size
        $shapePrice = $shapePrices[$shape] ?? 0.00;
        $sizePrice = $sizePrices[$size] ?? 0.00;
        $customSizePrice1 = $customSizePrices1[$customSize1] ?? 0.00;
        $customSizePrice2 = $customSizePrices2[$customSize2] ?? 0.00;
        
        // Total price calculation (could combine shape and size, or have different logic)
        $totalPrice = $shapePrice + $sizePrice + $customSizePrice1 + $customSizePrice2;

        // Check if the combination exists
        if (isset($prices[$shape][$size])) {
            $price = $prices[$shape][$size];
        } else {
            // Default value if no match found
            $price = 0.00;
        }

        // Store the selection in session
        session([
            'shape' => $shape,
            'size' => $size,
            'total' => $price,
            'custom_size_1' => $customSize1,
            'custom_size_2' => $customSize2,
        ]);

        return response()->json(['message' => 'Metal Frame added to cart!']);
    }


    public function addToMetalFrame(Request $request){
        $request->validate([
            //'photo' => 'required|string',            
            //'price' => 'required|numeric',
        ]);

        $frameName = rand(100000, 999999); // Example: 345678

        // Determine size
        $selectedSize = $request->customSize1 ?: ($request->customSize2 ?: $request->metalSize);

        // Save to database
        $product = new Product();
        //$product->name = $frameName;
        // $product->shape = $request->input('metalShape');
        // $product->size = $selectedSize;
        // $product->custom_size1 = $request->input('customSize1');
        // $product->custom_size2 = $request->input('customSize2');
        // $product->price = $request->price;
        $product->save();

        // Add to cart
        Cart::add([
            'id'      => $product->id,
            'name'    => $frameName,
            'qty'     => 1,
            'price'   => $request->price,
            'weight'  => 0,
            'options' => [
                'category'     => 'Metal Frame',
                'image'        => $request->image,
                'size'         => $selectedSize, 
                'shape'        => $request->metalShape,
                'custom_size1' => $request->customSize1,
                'custom_size2' => $request->customSize2,
            ]
        ]);
       
        return response()->json(['message' => 'Metal Frame added to cart successfully!']);
    }
}
