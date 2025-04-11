@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">     
        <div class="row">
            <div class="col-md-9 col-10">
                <ol class="breadcrumb primary-color">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">My Orders</li>
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
            <div class="col-md-3 col-12">
                <aside>
                    @include('front.account.common.sidebar')
                </aside>                
            </div>
            <div class="col-md-9 col-12">
                <div class="row">
                    <div class="col-md-8 col-5">
                        <h2 class="h5 mb-0 pt-2 pb-3">My Orders <span class="counts">{{ $orderCount  }}</span></h2>
                    </div>
                    <div class="col-md-4 col-7">
                        <form action="" method="get" >                            
                            <div class="d-flex">
                                <button type="button" onclick="window.location.href='{{ route('account.orders') }}'" class="btn btn-default btn-sm">Reset</button>
                               
                                <div class="card-tools">
                                    <div class="input-group input-group" style="width: 150px;">
                                        <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($orders->isNotEmpty())
                    @foreach ($orders as $order)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-3">
                                        <a href="{{ route('account.orderDetail',$order->id) }}"><img src="{{ asset('uploads/products/small/' . $order->product->images->first()->image1) }}" style="width:70px; border-radius:4px"></a>
                                    </div>
                                    <div class="col-md-10 col-9">
                                        <div class="row">
                                            <div class="col-md-8 col-12">
                                                <h6 class="mb-1"><a href="{{ route('account.orderDetail',$order->id) }}" class="price-title">{{ $order->product->name }}</a></h6>
                                                ₹ {{ number_format($order->grandtotal,2) }}
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <p class="mt-3">{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</p>
                                            </div>
                                            <div class="col-md-2 col-6">
                                                <p class="mt-3">
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
                                        </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div>Orders not found</div>
                @endif
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