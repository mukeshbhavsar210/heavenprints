<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {

    public function index(Request $request){

        $totalCategories = Category::count();
        $totalProducts = Product::count();

        $orders = Order::with('user')->get();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('grandtotal');
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $latestOrders = Order::latest()
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->select(
                    'orders.id as order_id',
                    'orders.status',
                    'orders.grandtotal',
                    'orders.created_at',
                    'users.first_name as first_name',
                    'users.last_name as last_name',
                )
                ->take(5)
                ->get();

        return view('admin.dashboard.index', compact('orders', 'totalCategories', 'totalProducts', 'totalOrders', 'totalRevenue', 'pendingOrders', 'completedOrders', 'latestOrders'));
    }
}
