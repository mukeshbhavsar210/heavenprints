@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">       
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('account.profile')}}">My Account</a></li>
            <li class="breadcrumb-item">My Orders</li>
        </ol>
        
        <div class="row">
            <div class="col-md-3 col-12">
                @include('front.account.common.sidebar')
            </div>
            <div class="col-md-9 col-12">
                <h2 class="h5 mb-0 pt-2 pb-3">My Orders</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Orders #</th>
                                <th>Date Purchased</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($orders->isNotEmpty())
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('account.orderDetail',$order->id) }}">{{ $order->id }}</a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>
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
                                        <td>₹ {{ number_format($order->grandtotal,2) }}</td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">Orders not found</td>
                                    </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
