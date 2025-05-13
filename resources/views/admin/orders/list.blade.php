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
                                        <button type="button" onclick="window.location.href='{{ route('orders.index') }}'" class="btn btn-default btn-sm">
                                            <?xml version="1.0" encoding="utf-8"?>
                                                <svg width="20px" height="20px" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" transform="matrix(0 1 1 0 2.5 2.5)">
                                                <path d="m3.98652376 1.07807068c-2.38377179 1.38514556-3.98652376 3.96636605-3.98652376 6.92192932 0 4.418278 3.581722 8 8 8s8-3.581722 8-8-3.581722-8-8-8"/>
                                                <path d="m4 1v4h-4" transform="matrix(1 0 0 -1 0 6)"/>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                
                                    <div class="card-tools">
                                        <div class="input-group input-group searchMain">
                                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                
                                            <div class="input-group-append">
                                                <button type="submit" class="btn">
                                                    <i class="iconoir-search"></i>
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