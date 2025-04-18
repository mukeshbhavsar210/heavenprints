<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusChanged;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Services\ShiprocketService;

class OrderController extends Controller {
    public function index(Request $request){

        $orders = Order::latest('orders.created_at')->select('orders.*','users.first_name','users.last_name','users.email');
        $orders = $orders->leftJoin('users','users.id','orders.user_id');

        if($request->get('keyword') != ""){
            $orders = $orders->where('users.name','like','%'.$request->keyword.'%');
            $orders = $orders->orWhere('users.email','like','%'.$request->keyword.'%');
            $orders = $orders->orWhere('orders.id','like','%'.$request->keyword.'%');
        }

        $orders = $orders->paginate(10);

        return view('admin.orders.list',[
            'orders' => $orders
        ]);
    }

    public function detail($orderId){
        $order = Order::with('user')->findOrFail($orderId);
        $order = Order::where('orders.id',$orderId)->with(['payments', 'customerAddress'])
                ->leftJoin('customer_addresses', 'orders.user_id', '=', 'customer_addresses.user_id', )
                ->leftJoin('countries', 'customer_addresses.country_id', '=', 'countries.id')
                ->select('orders.*', 'customer_addresses.address',   )
                ->first();                                       
        
        $orderItems = OrderItem::where('order_id',$orderId)->select(
                            'order_items.*', 
                            'products.font', 
                            'products.colors', 
                            'products.sizes',                            
                        )
                        ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                        ->get();        

        return view('admin.orders.detail',[
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }

   
    public function updateStatus(Request $request, $orderId) {
        $order = Order::with('user', 'items.product')->findOrFail($orderId);
        $oldStatus = $order->status;
        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();

        if (!empty($order->userEmail->email)) {
            Mail::to($order->userEmail->email)->send(new OrderStatusChanged($order));
        }
                
        return back()->with('success', 'Order status updated and email sent.');
    }

    public function sendInvoiceEmail(Request $request, $orderId) {
        $userType = $request->input('userType');
        $order = Order::with(['user', 'items', 'customerAddress'])->findOrFail($orderId);

        if ($userType === 'customer') {
            $customerMailData = [
                'order' => $order,
                'userType' => 'customer',
                'subject' => 'Thank You for Your Order! Keep shopping',
            ];

            Mail::send('email.order', ['mailData' => $customerMailData], function ($message) use ($customerMailData) {
                $message->to($customerMailData['order']->user->email)
                        ->subject($customerMailData['subject']);
            });

            $message = 'Order email sent to Customer successfully.';
        } elseif ($userType === 'admin') {
            $adminMailData = [
                'order' => $order,
                'userType' => 'admin',
                'subject' => 'You have received an order',
            ];

            Mail::send('email.order', ['mailData' => $adminMailData], function ($message) use ($adminMailData) {
                $message->to('info@heavenprints.in')
                        ->subject($adminMailData['subject']);
            });

            $message = 'Order email sent to Admin successfully.';
        } else {
            $message = 'Invalid user type selected.';
        }

        session()->flash('success', $message);

         // Return response with a success message
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }


    public function shipOrder($id) {
        $order = Order::findOrFail($id);
        $response = ShiprocketService::createOrder($order);

        if (isset($response['order_id'])) {
            $order->shiprocket_order_id = $response['order_id'];
            $order->awb_code = $response['awb_code'] ?? null;
            $order->courier_name = $response['courier_company_id'] ?? null;
            $order->shipment_status = 'Shipped';
            $order->save();
            return back()->with('success', 'Order shipped successfully.');
        }

        return back()->with('error', 'Shiprocket failed to ship order.');
    }

    public function trackOrder($awb) {
        $tracking = ShiprocketService::trackOrder($awb);
        return view('admin.tracking', ['tracking' => $tracking]);
    }
}