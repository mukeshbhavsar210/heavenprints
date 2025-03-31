@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6 text-right">
                
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        @include('admin.message')
    
        <div class="row">
            <div class="col">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h2>{{ $totalCategories }}</h2>
                        <h6>Categories</h6>                        
                    </div>
                </div>
            </div>    
            <div class="col">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h2>{{ $totalProducts }}</h2>
                        <h6>Products</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h2>{{ $totalOrders }}</h2>
                        <h6>Total Orders</h6>
                    </div>
                </div>
            </div>        
            <div class="col">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h2>{{ $pendingOrders }}</h2>
                        <h6>Pending Orders</h6>
                    </div>
                </div>
            </div>        
            <div class="col">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h2>{{ $completedOrders }}</h2>
                        <h6>Completed Orders</h6>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h2>₹{{ number_format($totalRevenue, 2) }}</h2>
                        <h6>Total Revenue</h6>
                    </div>
                </div>
            </div>
        </div>       
        
        <div class="row mt-2">
            <div class="col-md-7 col-12">
                <h4>Latest Orders</h4>
                <div class="mt-2 card">            
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>₹{{ number_format($order->total_price, 2) }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
            <div class="col-md-5 col-12">
                <h4>Graph</h4>
                <div class="mt-2 card"> 
                    <canvas id="orderChart" width="200" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script>
    var ctx = document.getElementById('orderChart').getContext('2d');
    var orderChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Orders', 'Pending Orders', 'Completed Orders'],
            datasets: [{
                label: 'Orders Count',
                data: [{{ $totalOrders }}, {{ $pendingOrders }}, {{ $completedOrders }}],
                backgroundColor: ['blue', 'orange', 'green']
            }]
        }
    });
</script>
@endsection