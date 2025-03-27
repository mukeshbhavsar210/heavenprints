<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

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
        $order = Order::where('orders.id',$orderId)->with(['payments', 'customerAddress'])
                ->leftJoin('customer_addresses', 'orders.user_id', '=', 'customer_addresses.user_id', )
                ->leftJoin('countries', 'customer_addresses.country_id', '=', 'countries.id')
                ->select('orders.*', 'customer_addresses.address',   )
                ->first();

        //$orderItems = OrderItem::where('order_id',$orderId)->get();

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

    public function changeOrderStatus(Request $request, $orderId){
        $order = Order::find($orderId);
        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();

        $message = 'Order status updated successfully';

        session()->flash('success',$message);

        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }

    public function sendInvoiceEmail(Request $request, $orderId){
        orderEmail($orderId, $request->userType);

        $message = 'Order email sent successfully';

        session()->flash('success',$message);

        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }
}
