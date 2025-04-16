<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Country;
use App\Models\Order;
use App\Models\CustomerAddress;
use App\Models\DiscountCoupon;
use App\Models\ShippingCharge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class CartController extends Controller {
    public function addToCart(Request $request){
        $product = Product::with('product_images')->find($request->id);
        $size = $request->size ?? 'Default Size';
        $color = $request->color ?? 'Default Red';

        if ($product == null) {
            return response()->json([
                "status"=> false,
                "message"=> "Product not found"
            ]);
        }

        if (Cart::count() > 0) {

            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false){
                Cart::add(
                        $product->id, 
                        $product->name, 
                        1, 
                        $product->price,                        
                        [
                            'category' => 'Default', 
                            'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                            'size' => $request->size,
                            'color' => $request->color
                        ]
                );
                $status = true;
                $message = '<strong>'.$product->name.'</strong> added in your cart successfully.';
                session()->flash('success', $message);
            } else {
                $status = false;
                $message = $product->name.' already added in cart';
            }

        } else {
            Cart::add(
                    $product->id, 
                    $product->name, 
                    1, 
                    $product->price, 
                    [
                        'category' => 'Default', 
                        'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                        'size' => $request->size,
                        'color' => $request->color                                          
                    ]);
            $status = true;
            $message = '<strong>'.$product->naammee.'</strong> added in your cart successfully.';
            session()->flash('success', $message);
        }

        return response()->json([
            "status"=> $status,
            "message"=> $message
        ]);
    }

    public function cart(){
        $cartContent = Cart::content();
        $data['cartContent'] = $cartContent;

       //dd($cartContent);

        return view('front.cart.index',$data);
    }

    public function addToCart_customize(Request $request){
        $product = Product::with('product_images')->find($request->id);
        
        if ($product == null) {
            return response()->json([
                "status"=> false,
                "message"=> "Product not found"
            ]);
        }

        if (Cart::count() > 0) {
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false){
                $retouchNames = $request->input('retouch_names'); // Get names array
                $fixedRetouchPrice = 299;
                $retouchPrice = !empty($retouchNames) ? $fixedRetouchPrice : 0;

                $proofNames = $request->input('proof'); // Get selected proof name
                $fixedProofPrice = 49; 
                $proofPrice = !empty($proofNames) ? $fixedProofPrice : 0;

                Cart::add(
                        $product->id, 
                        $product->name, 
                        1, 
                        $request->price,
                        [
                            'category' => 'Customize', 
                            'image'             => $request->image,
                            'product_type'       => $request->product_type,
                            'product_name'       => $request->product_name,
                            'product_price'      => $request->product_price,
                            'custom_name'       => $request->custom_name,
                            'custom_image'       => $request->custom_image,
                            'custom_price'      => $request->custom_price,
                            'size_type'       => $request->size_type,
                            'size_name'       => $request->size_name,
                            'size_price'      => $request->size_price,
                            'wrap_name'       => $request->wrap_name,
                            'wrap_image'       => $request->wrap_image,
                            'wrap_price'      => $request->wrap_price,
                            'border_name'       => $request->border_name,
                            'border_image'       => $request->border_image,
                            'border_price'      => $request->border_price,
                            'frame_name'       => $request->frame_name,
                            'frame_image'       => $request->frame_image,
                            'frame_price'      => $request->frame_price,
                            'hardware_name'       => $request->hardware_name,
                            'hardware_image'       => $request->hardware_image,
                            'hardware_price'      => $request->hardware_price,
                            'display_name'       => $request->display_name,
                            'display_price'      => $request->display_price,
                            'lamination_name'       => $request->lamination_name,
                            'lamination_price'      => $request->lamination_price,
                            'retouch_names'       => $retouchNames,
                            'retouch_price'      => $retouchPrice,
                            'major'      => $request->major,
                            'proof_names'   => !empty($proofNames) ? implode(', ', (array) $proofNames) : null, 
                            'proof_price'   => $proofPrice,  
                              
                        ]
                );
                $status = true;
                $message = '<strong>'.$product->name.'</strong> added in your cart successfully.';
                session()->flash('success', $message);
            } else {
                $status = false;
                $message = $product->name.' already added in cart';
            }

        } else {
            $retouchNames = $request->input('retouch_names'); // Get names array
            $fixedRetouchPrice = 299;
            $retouchPrice = !empty($retouchNames) ? $fixedRetouchPrice : 0;

            $proofNames = $request->input('proof'); // Get selected proof name
            $fixedProofPrice = 49; 
            $proofPrice = !empty($proofNames) ? $fixedProofPrice : 0;

            Cart::add(
                    $product->id, 
                    $product->name, 
                    1, 
                    $request->price, 
                    [
                        'category' => 'Customize', 
                        'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                        'image'             => $request->image,
                        'product_type'       => $request->product_type,
                        'product_name'       => $request->product_name,
                        'product_price'      => $request->product_price,
                        'custom_name'       => $request->custom_name,
                        'custom_image'       => $request->custom_image,
                        'custom_price'      => $request->custom_price,
                        'size_type'       => $request->size_type,
                        'size_name'       => $request->size_name,
                        'size_price'      => $request->size_price,
                        'wrap_name'       => $request->wrap_name,
                        'wrap_image'       => $request->wrap_image,
                        'wrap_price'      => $request->wrap_price,
                        'border_name'       => $request->border_name,
                        'border_image'       => $request->border_image,
                        'border_price'      => $request->border_price,
                        'frame_name'       => $request->frame_name,
                        'frame_image'       => $request->frame_image,
                        'frame_price'      => $request->frame_price,
                        'hardware_name'       => $request->hardware_name,
                        'hardware_image'       => $request->hardware_image,
                        'hardware_price'      => $request->hardware_price,
                        'display_name'       => $request->display_name,
                        'display_price'      => $request->display_price,
                        'lamination_name'       => $request->lamination_name,
                        'lamination_price'      => $request->lamination_price,
                        'major'      => $request->major,
                        'retouch_names'       => $retouchNames,
                        'retouch_price'      => $retouchPrice,
                        'proof_names'   => !empty($proofNames) ? implode(', ', (array) $proofNames) : null, 
                        'proof_price'   => $proofPrice,                      
                        
                    ]);
            $status = true;
            $message = '<strong>'.$product->naammee.'</strong> added in your cart successfully.';
            session()->flash('success', $message);
        }

        return response()->json([
            "status"=> $status,
            "message"=> $message
        ]);
    }


    public function addToCart_neon(Request $request){
        $product = Product::with('product_images')->find($request->id);
        $neon_color = $request->neon_color ?? 'Default Red';
        $neon_size = $request->neon_size ?? 'Default Red';
        $neon_font = $request->neon_font ?? 'Default Red';
        $neon_light = $request->neon_light ?? 'Default Light';
        $custom_neon = $request->custom_neon ?? 'Default Light';

        if ($product == null) {
            return response()->json([
                "status"=> false,
                "message"=> "Product not found"
            ]);
        }

        if (Cart::count() > 0) {
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach ($cartContent as $item) {
                if ($item->id == $product->id) {
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false){
                Cart::add(
                        $product->id, 
                        $product->name, 
                        1, 
                        $request->price,
                        [
                            'category' => 'Neon light', 
                            'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                            'neon_color' => $request->neon_color,
                            'neon_size' => $request->neon_size,
                            'neon_font' => $request->neon_font,
                            'neon_light' => $request->neon_light,
                            'custom_neon' => $request->custom_neon
                        ]
                );
                $status = true;
                $message = '<strong>'.$product->name.'</strong> added in your cart successfully.';
                session()->flash('success', $message);
            } else {
                $status = false;
                $message = $product->name.' already added in cart';
            }

        } else {
            Cart::add(
                    $product->id, 
                    $product->name, 
                    1, 
                    $request->price, 
                    [
                        'category' => 'Neon light', 
                        'productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '',
                        'neon_color' => $request->neon_color,
                        'neon_size' => $request->neon_size,
                        'neon_font' => $request->neon_font,
                        'neon_light' => $request->neon_light,
                        'custom_neon' => $request->custom_neon                        
                        
                    ]);
            $status = true;
            $message = '<strong>'.$product->naammee.'</strong> added in your cart successfully.';
            session()->flash('success', $message);
        }

        return response()->json([
            "status"=> $status,
            "message"=> $message
        ]);
    }

    
    public function getProductPrice(Request $request) {
        // Fetch latest prices from the database based on selections
        $product = Product::where('name', $request->product_name)->first();
        $size = Size::where('name', $request->size_name)->first();
        $wrap = Wrap::where('name', $request->wrap_name)->first();
        $border = Border::where('name', $request->border_name)->first();
        $frame = Frame::where('name', $request->frame_name)->first();
        $hardware = Hardware::where('name', $request->hardware_name)->first();
        $display = Display::where('name', $request->display_name)->first();
        $lamination = Lamination::where('name', $request->lamination_name)->first();
        $retouchPrice = Retouching::whereIn('name', $request->retouch_names)->sum('price');
    
        $product_price = $product->price ?? 0;
        $size_price = $size->price ?? 0;
        $wrap_price = $wrap->price ?? 0;
        $border_price = $border->price ?? 0;
        $frame_price = $frame->price ?? 0;
        $hardware_price = $hardware->price ?? 0;
        $display_price = $display->price ?? 0;
        $lamination_price = $lamination->price ?? 0;
        $proof_price = count($request->proof_names) > 0 ? 49 : 0;
    
        $total_price = $product_price + $size_price + $wrap_price + $border_price + 
                       $frame_price + $hardware_price + $display_price + 
                       $lamination_price + $retouchPrice + $proof_price;
    
        return response()->json([
            'status' => true,
            'product_price' => $product_price,
            'size_price' => $size_price,
            'wrap_price' => $wrap_price,
            'border_price' => $border_price,
            'frame_price' => $frame_price,
            'hardware_price' => $hardware_price,
            'display_price' => $display_price,
            'lamination_price' => $lamination_price,
            'retouch_prices' => $retouchPrice,
            'proof_prices' => $proof_price,
            'total_price' => $total_price,
        ]);
    }


    public function updateCart(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qty;

        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);

        //check qty available in stock
        if($product->track_qty == "Yes"){
            if($qty <= $product->qty ){
                Cart::update($rowId, $qty);
                $message = 'Cart updated successfully';
                $state = true;
                session()->flash('success',$message);
            } else {
                $message = 'Requested qty('.$qty.') not available in stock.';
                $state = false;
                session()->flash('error',$message);
            }
        } else {
            Cart::update($rowId, $qty);
            $message = 'Cart updated successfully';
            $state = true;
            session()->flash('success',$message);
        }

        return response()->json([
            "status"=> $state,
            "message"=> $message
        ]);
    }


    public function deleteItem(Request $request){
        $rowId = $request->rowId;
        $itemInfo = Cart::get($rowId);

        if($itemInfo == null ){
            $errorMessage = 'Item not found in cart.';
            session()->flash('error',$errorMessage);
            return response()->json([
                "status"=> false,
                "message"=> $errorMessage,
            ]);
        }

        Cart::remove($request->rowId);

        session()->forget('finalPriceData');

        $success = 'Item removed from cart successfully.';
        session()->flash('success',$success);
        return response()->json([
            "status"=> true,
            "message"=> $success,
        ]);
    }


    public function checkout(){
        $discount = 0;

        //if cart is empty redirect to cart page
        if (Cart::count() == 0) {
            return redirect()->route('front.cart');
        }

        //if user is not logged in then redirect to login page
        if (Auth::check() == false) {
            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('account.login');
        }

        $homeAddress = Auth::check()
                        ? Auth::user()->customerAddresses->where('type', 'home')->first()
                        : null;

        $officeAddress = Auth::check()
                        ? Auth::user()->customerAddresses->where('type', 'office')->first()
                        : null;
        
        
        $discountCode = DiscountCoupon::get();

        $customerAddress = CustomerAddress::find(Auth::user()->id);

        $countryShow = CustomerAddress::with('country')->get();

        session()->forget('url.intended');

        $countries = Country::orderBy('name','ASC')->get();

        //Calcuting shipping charges
        if($customerAddress != '' ){
            $userCountry = $customerAddress->country_id;
            $shippingInfo = ShippingCharge::where('country_id', $userCountry)->first();

            //echo $shippingInfo->amount;
            $totalQty = 0;
            $totalShiipingCharge = 0;
            $grandTotal = 0;
            foreach (Cart::content() as $item){
                $totalQty += $item->qty;
            }

            $totalShiipingCharge = $totalQty*$shippingInfo->amount;
            $grandTotal = Cart::subtotal(2,'.','')+$totalShiipingCharge;

        } else {
            $grandTotal = Cart::subtotal(2,'.','');
            $totalShiipingCharge = 0;
        }

     

        return view('front.checkout.index',[
            'countries' => $countries,
            'customerAddress' => $customerAddress,
            'totalShiipingCharge' => $totalShiipingCharge,
            'discount' => $discount,
            'grandTotal' => $grandTotal,
            'countryShow' => $countryShow,
            'homeAddress' => $homeAddress,
            'officeAddress' => $officeAddress,            
            'discountCode' => $discountCode, 
        ]);
    }


    // Generate Razorpay Order
    public function processCheckout(Request $request) {
        $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
        $amount = $request->amount * 100; // Convert to paise

        $order = $api->order->create([
            'receipt' => 'order_'.rand(1000, 9999),
            'amount'  => $amount, // Amount in paise (₹100)
            'currency' => 'INR',
            'payment_capture' => 1 // Auto capture payment
        ]);
        //Cart::destroy();

        return response()->json([
            'order_id' => $order['id'],
            'key' => config('services.razorpay.key'),
            'amount' => $order['amount'],
        ]);
    }



    // Verify Payment
    public function verifyPayment(Request $request) {
        $amount = $request->amount ?? 0;                
        $order_notes = $request->order_notes;                
        $country = $request->country;
        $address_type = $request->address_type;        

        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));

            $attributes = [
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            //Step 1: apply validations while make orders
            $validator = Validator::make($request->all(),[                                
                // 'zip' => 'required'
            ]);

            if ($validator->fails()){
                return response()->json([
                    'message' => 'Please fix the errors',
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }           

            $user = Auth::user();

            if ($address_type === 'home') {
                CustomerAddress::where('user_id', $user->id)
                                ->whereNotNull('delivery_at')
                                ->update(['delivery_at' => null]);

                $homeAddress = CustomerAddress::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'type' => 'home'
                    ],
                    [
                        'country_id' => $country,
                        'notes' => $order_notes,
                        'delivery_at' => 'home',
                    ]
                );
            } elseif ($address_type === 'office') {
                $officeAddress = CustomerAddress::updateOrCreate(
                    [
                        'user_id' => $user->id,
                        'type' => 'office'
                    ],
                    [
                        'country_id' => $country,
                        'notes' => $order_notes,
                        'delivery_at' => 'office',
                    ]
                );
            }            
            
            //Step 3: Store data in orders table
            $discountCodeId = NULL;
            $promoCode = '';
            $shipping = 0;
            $discount = 0;
            $subTotal = Cart::subtotal(2,'.','');

            // Apply Discount
            if (session()->has('code')) {
                $code = session()->get('code');
                if($code->type == 'percent'){
                    $discount = ($code->discount_amount/100)*$subTotal;
                } else {
                    $discount = $code->discount_amount;
                }
                $discountCodeId = $code->id;
                $promoCode = $code->code;
            }

            // Calculate shipping
            $shippingInfo = ShippingCharge::where('country_id', $request->country)->first();

            $totalQty = 0;
            foreach (Cart::content() as $item){
                $totalQty += $item->qty;
            }

            if ($shippingInfo != null) {
                $shipping = $totalQty*$shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shipping;
            } else {
                $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
                $shipping = $totalQty*$shippingInfo->amount;
                $grandTotal = ($subTotal - $discount)+$shipping;
            }

            //Update product stock
            $productData = Product::find($item->id);
            if($productData->track_qty == 'Yes'){
                $currentQty = $productData->qty;
                $updatedQty = $currentQty-$item->qty;
                $productData->qty = $updatedQty;
                $productData->save();
            }   

            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $item->id,
                'country_id' => $country,
                'subtotal' => $subTotal,
                'shipping' => $shipping,
                'coupon_code' => $promoCode,
                'coupon_code_id' => $discountCodeId,
                'discount' => $discount,
                'qty' => $item->qty,
                'price' => $item->price,
                'grandtotal' => $grandTotal,
                'status' => 'pending',
            ]);        
            
            //Order Item update
            foreach (Cart::content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'name' => $item->name,
                    'category' => $item->options->category ?? ($item->options->custom_neon . ' - ' . $item->options->neon_light),
                    'font' => $item->options->font ?? $item->options->neon_font,
                    'size' => $item->options->size || $item->options->neon_size || $item->options->size_name,
                    'color' => $item->options->color ?? $item->options->neon_color,
                    'selected_product' => $item->options->custom_image,
                    'selected_product_name' => $item->options->custom_name,
                    'frame' => $item->options->frame_name,
                    'image' => $item->options->image,                    
                    'border' => $item->options->border_name,
                    'major' => $item->options->major,                    
                    'wrap_wrap' => $item->options->wrap_name,
                    'hardware_style' => $item->options->hardware_name,
                    'hardware_display' => $item->options->display_name,
                    'lamination' => $item->options->lamination_name,
                    'retouching' => json_encode($item->options->retouch_names),                    
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'total' => $item->price * $item->qty,                    
                ]);
            }

            //Payment table update
            Payment::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_order_id' => $request->razorpay_order_id,
                'payment_mode' => $request->payment_mode ?? 'Online',
                'amount' => $item->price * $item->qty,
                'status' => 'Paid',
                'currency' => $request->currency ?? 'INR',
                'payment_data' => json_encode($request->all()),               
            ]);

            //Send confirmed order email onilne for ONLINE NOT for LOCAL
            //orderEmail($order->id, 'customer');

            Cart::destroy();
            session()->forget(['grand_total']);

            return response()->json([
                'status' => 'success',                
                'orderId' => $order->id,
                'message' => 'Payment verified successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Payment Verification Failed: ' . $e->getMessage());
            return response()->json(['status' => 'failed', 'message' => 'Payment verification failed'], 500);
        }
    }

    public function thankyou($id){
        $order = Order::where('id', $id)->firstOrFail();
        return view('front.checkout.thanks',[
            'id' => $id,
            'order' => $order,
        ]);
    }

    public function failed(){
        return view("front.checkout.failed");
    }

    

    public function getOrderSummary(Request $request){
        $subTotal = Cart::subtotal(2,'.','');
        $discount = 0;
        $discountString = '';

        //Appy Discount start here
        if (session()->has('code')) {
            $code = session()->get('code');

            if($code->type == 'percent'){
                $discount = ($code->discount_amount/100)*$subTotal;
            } else {
                $discount = $code->discount_amount;
            }

            $discountString = '<div id="discount-response">
                <div class="card-body p-2">
                    <strong>'.session()->get('code')->code.'</strong>
                    <a id="remove-discount"><i class="fa fa-times"></i></a>
                </div>
            </div>';
        }
        //Appy Discount end here


        if($request->country_id > 0){
            $shippingInfo = ShippingCharge::where('country_id', $request->country_id)->first();

            $totalQty = 0;
            foreach (Cart::content() as $item){
                $totalQty += $item->qty;
            }

            if ($shippingInfo != null) {
                $shippingCharge = $totalQty*$shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shippingCharge;

                return response()->json([
                    'status' => true,
                    'grandTotal' => number_format($grandTotal,2),
                    'discount' => number_format($discount,2),
                    'discountString' => $discountString,
                    'shippingCharge' => number_format($shippingCharge,2),
                ]);
            } else {
                $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
                $shippingCharge = $totalQty*$shippingInfo->amount;
                $grandTotal = ($subTotal-$discount)+$shippingCharge;

                return response()->json([
                    'status' => true,
                    'grandTotal' => number_format($grandTotal,2),
                    'discount' => number_format($discount,2),
                    'discountString' => $discountString,
                    'shippingCharge' => number_format($shippingCharge,2),
                ]);
            }
        } else {
            return response()->json([
                'status' => true,
                'grandTotal' => number_format(($subTotal-$discount),2),
                'discount' => number_format($discount,2),
                'discountString' => $discountString,
                'shippingCharge' => number_format(0,2),
            ]);
        }
    }


    public function applyDiscount(Request $request){
        $code = DiscountCoupon::where('code', $request->code)->first();

        if($code == null){
            return response()->json([
                'status' => false,
                'message' => 'Invalid discount coupon',
            ]);
        }

        //Check if coupon start date is valid or not
        $now = Carbon::now();

        if($code->starts_at != ""){
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s',$code->starts_at);

            if($now->lt($startDate)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon',
                ]);
            }
        }

        if($code->expires_at != ""){
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s',$code->expires_at);

            if($now->gt($endDate)){
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid discount coupon',
                ]);
            }
        }

        //Max uses check start here
        if($code->max_uses > 0){
            $couponUsed = Order::where('coupon_code_id', $code->id)->count();

            if($couponUsed >= $code->max_uses){
                return response()->json([
                    'status' => false,
                    'message' => 'Discount code expired.',
                ]);
            }
        }

        //Max uses user check start here
        if($code->max_uses_user > 0){
            $couponUsedByUser = Order::where(['coupon_code_id' => $code->id, 'user_id' => Auth::user()->id ])->count();

            if($couponUsedByUser >= $code->max_uses_user){
                return response()->json([
                    'status' => false,
                    'message' => 'You already used this coupon!',
                ]);
            }
        }

        $subTotal = Cart::subtotal(2,'.','');

        //Min amount condition check
        if($code->min_amount > 0){
            if($subTotal < $code->min_amount){
                return response()->json([
                    'status' => false,
                    'message' => 'Your min amount must be ₹ '.$code->min_amount.'.00',
                ]);
            }
        }

        session()->put('code',$code);

        return $this->getOrderSummary($request);
    }

    public function removeCoupon(Request $request){
        session()->forget('code');
        return $this->getOrderSummary($request);
    }


    
}