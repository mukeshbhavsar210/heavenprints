@extends('front.layouts.app')

@section('content')

<section class="section-9 pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">                    
                    <div class="card-body">
                        <h4>Order placed Successful!</h4>
                        <hr />

                        <div class="row">
                            <div class="col-md-9 col-6">
                                <p class="mt-2">Order Summary (Order #{{ $order->id }})</p>
                            </div>
                            <div class="col-md-3 col-6">
                                <a href="{{ route('account.orderDetail',$order->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>

                        <div class="card mt-2">
                            @foreach($order->items as $item)
                                <div class="p-2 row">
                                    <div class="col-md-2 col-3">
                                        <img src="{{ asset('uploads/products/small/' . $order->product->images->first()->image1) }}" style="width:70px; border-radius:4px">
                                    </div>
                                    <div class="col-md-5 col-3"><p class="mt-4">{{ $item->product->name }}</p></div>
                                    <div class="col-md-2 col-3 right-text"><p class="mt-4">Qty: {{ $item->quantity }}</p></div>
                                    <div class="col-md-2 col-3 right-text"><p class="mt-4">₹{{ number_format($item->price * $item->quantity, 2) }}</p></div>
                                </div>                                
                                <hr class="mt-0 mb-2" />
                            @endforeach
                                <div class="row">
                                    <div class="col-md-7 col-9"></div>
                                    <div class="col-md-2 col-9 right-text">
                                        <strong>Shipping :</strong> 
                                    </div>
                                    <div class="col-md-2 col-3 right-text">
                                        ₹{{ number_format($order->shipping, 2) }}
                                    </div>
                                </div>
                                <hr class="mt-2 mb-2" />
                                <div class="row mb-2">
                                    <div class="col-md-7 col-9"></div>
                                    <div class="col-md-2 col-9 right-text">
                                        <strong>You Paid :</strong>
                                    </div>
                                    <div class="col-md-2 col-3 right-text">
                                        ₹{{ number_format($order->grandtotal, 2) }}
                                    </div>
                                </div>
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection