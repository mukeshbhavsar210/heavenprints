@extends('admin.layouts.app')

@section('content')

@include('admin.message')

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-sm-9 col-12 d-flex">
                        <h3>Orders</h3>  
                        <span class="counts">{{ $counts }}</span>                                  
                    </div>
                    <div class="col-sm-3 col-12 d-flex">
                        <div class="flexContainer">
                            <form action="" method="get" >
                                <div class="d-flex">
                                    <div class="card-title">
                                        <button type="button" onclick="window.location.href='{{ route('orders.index') }}'" class="btn btn-default btn-sm">Reset</button>
                                    </div>
                
                                    <div class="card-tools">
                                        <div class="input-group input-group" style="width: 250px;">
                                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                
                                            <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>

        <div class="card-body pt-0">
            <table class="table datatable dataTable-table">
            <thead class="table-light">  
                    <tr>
                        <th width="60">Order#</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>AWB</th>
                        <th>Courier</th>                                                                                    
                        <th>Action</th>  
                        <th>Date Purchased</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($orders->isNotEmpty())
                        @foreach ($orders as $order)
                            <tr>
                                <td><a href="{{ route('orders.detail',$order->id) }}">{{ $order->id }}</a></td>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>                                    
                                <td>₹ {{ number_format($order->grandtotal,2) }}</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <span class="badge bg-danger">Pending</span>
                                    @elseif ($order->status == 'shipped')
                                        <span class="badge bg-info">Shipped</span>
                                    @elseif ($order->status == 'delivered')
                                        <span class="badge bg-success">Delivered</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>{{ $order->awb_code ?? '-' }}</td>
                                <td>{{ $order->courier_name ?? '-' }}</td>
                                <td>
                                    @if (!$order->awb_code)
                                        <form action="{{ route('admin.shipOrder', $order->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary">Ship Now</button>
                                        </form>
                                    @else
                                        <a href="{{ route('admin.trackOrder', $order->awb_code) }}" class="btn btn-success">Track</a>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at->format('d M, Y')) }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Records not found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="card-body clearfix">
            {{ $orders->links() }}
        </div>
</div>    
@endsection