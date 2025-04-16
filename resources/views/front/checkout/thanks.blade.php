@extends('front.layouts.app')

@section('content')
    <section class="container">
        <div class="col-md-12 text-center py-5">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">                    
                            <div class="card-body">
                                <h4>Order placed Successful!</h4>
                                <h6 class="mt-2">Your Order id is: {{ $id }}</h6>
                                <hr class="mt-3 mb-2" />        
                               
                                @foreach($order->items as $item)
                                    <div class="p-2 row">
                                        <div class="col-md-2 col-3">
                                            <img src="{{ asset('uploads/products/small/' . $order->product->images->first()->image1) }}" style="width:70px; border-radius:4px">
                                        </div>
                                        <div class="col-md-5 col-3 left-text"><h5 class="mt-3"><a href="{{ route('account.orderDetail',$id) }}">{{ $item->product->name }}</a></h5></div>
                                        <div class="col-md-2 col-3 right-text"><p class="mt-4">{{ $item->qty }}</p></div>
                                        <div class="col-md-3 col-3 right-text"><p class="mt-4">₹{{ number_format($item->price * $item->qty, 2) }}</p></div>
                                    </div>                                
                                    <hr class="mt-2 mb-3" />
                                @endforeach
                                    <div class="row">
                                        <div class="col-md-6 col-3"></div>
                                        <div class="col-md-3 col-3 right-text">
                                            <strong>Shipping :</strong> 
                                        </div>
                                        <div class="col-md-3 col-3 right-text">
                                            ₹{{ number_format($order->shipping, 2) }}
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6 col-9"></div>
                                        <div class="col-md-3 col-9 right-text">
                                            <strong>You Paid :</strong>
                                        </div>
                                        <div class="col-md-3 col-3 right-text">
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

@section('customJs')
@endsection
