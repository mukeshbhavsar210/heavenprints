@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-10">
                    <ol class="breadcrumb primary-color mb-0">
                        <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
                        <li class="breadcrumb-item">Order details</li>
                    </ol>
                </div>
                <div class="col-md-3 col-2">
                    <nav class="frame_mobile_menu">
                        <div class="toggle-wrap" onclick="toggleMenu(this)">
                            <span class="toggle-bar" style="margin-top:0;"></span>
                        </div>
                    </nav>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        @include('front.account.common.sidebar')
                    </aside> 
                </div>
                <div class="col-md-9">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Order {{ $order->id }}</h2>
                        </div>

                        <div class="card-body">                           
                            <div class="mb-3">
                            <ul>
                                @foreach ($orderItems as $item)
                                    <li>
                                        <div class="row">
                                            <div class="col-4 col-md-3 col-xl-2">
                                                @php
                                                    $productImage = getProductImage($item->product_id)
                                                @endphp

                                                @if($item->product->images->isNotEmpty()) 
                                                    <img src="{{ asset('uploads/products/small/' . $item->product->images->first()->image1) }}" alt="Product Image" class="img-thumbnail" style="100%">
                                                @else
                                                    <img src="{{ asset('uploads/products/small/default.jpg') }}" alt="Default Image" style="width: 80px;">
                                                @endif
                                            </div>
                                            <div class="col">                                            
                                                <a class="text-body" href=""><h5>{{ $item->name }} x {{ $item->qty }}</h5></a>
                                                <div class="row mt-3">
                                                    <div class="col-6 col-lg-3">
                                                        <h6 class="heading-xxxs text-muted">Order No:</h6>
                                                        <p class="mb-lg-0 fs-sm fw-bold">{{ $order->id }}</p>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <h6 class="heading-xxxs text-muted">Shipped date:</h6>
                                                        <p class="mb-lg-0 fs-sm fw-bold">
                                                            <time datetime="2019-10-01">
                                                                @if (!empty($order->shipped_date))
                                                                    {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, y')}}
                                                                @else
                                                                    n/a
                                                                @endif
                                                            </time>
                                                        </p>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <h6 class="heading-xxxs text-muted">Status:</h6>
                                                        <p class="mb-0 fs-sm fw-bold">
                                                            @if ($order->status == 'pending')
                                                                <span class="badge bg-danger">Pending</span>
                                                            @elseif ($order->status == 'shipped')
                                                                <span class="badge bg-info">Shipped</span>
                                                            @elseif ($order->status == 'delivered')
                                                                <span class="badge bg-success">Delivered</span>
                                                            @else
                                                                <span class="badge bg-danger">Cancelled</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-6 col-lg-3">
                                                        <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                                                        <p class="mb-0 fs-sm fw-bold">
                                                            ₹ {{ number_format($order->grandtotal,2) }} x {{ $orderItemsCount }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>                            
                        </div>
                    </div>
                    <ul>
                        <li class="list-group-item d-flex">
                            <span>Subtotal</span>
                            <span class="ms-auto">₹ {{ number_format($order->subtotal,2) }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span>Discount {{ (!empty($order->coupon_code)) ? '('.$order->coupon_code.')' : '' }}</span>
                            <span class="ms-auto">₹ {{ number_format($order->discount,2) }}</span>
                        </li>
                        <li class="list-group-item d-flex">
                            <span>Shipping</span>
                            <span class="ms-auto">₹ {{ number_format($order->shipping,2) }}</span>
                        </li>
                        <li class="list-group-item d-flex fs-lg fw-bold">
                            <span>Grand Total</span>
                            <span class="ms-auto">₹ {{ number_format($order->grandtotal,2) }}</span>
                        </li>
                    </ul>                    
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        function toggleMenu(e) {
            e.classList.toggle("active");
            document.querySelector("aside").classList.toggle("active");        
        }   
    </script>
@endsection