@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">
        <ol class="breadcrumb primary-color mb-0">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.shop') }}">Home</a></li>
            <li class="breadcrumb-item">Track Order</li>
        </ol>

        <div class="row mt-3">
            <div class="col-md-3 col-12">
                <aside>
                    @include('front.account.common.sidebar')
                </aside>                
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <h5 class="mt-1 mb-1">Track Your Order</h5>
                            </div>
                            <div class="col-md-6 col-12">
                                <p class="float-end mt-1 mb-1">Current Status: <strong class="text-uppercase">{{ $order->status }}</strong></p>
                            </div>
                        </div>                        
                    </div>
                    <div class="card-body">
                        <div class="step-progressbar d-flex justify-content-between position-relative mt-2 mb-2">
                            @foreach($steps as $index => $step)
                                @php
                                    $isCompleted = array_search($order->status, $steps) >= $index;
                                    $isCancelled = $order->status === 'cancelled';
                                @endphp
                
                                <div class="step text-center flex-fill">
                                    <div class="circle {{ $isCancelled ? 'bg-danger' : ($isCompleted ? 'bg-success' : 'bg-secondary') }}">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="label mt-2 text-capitalize">
                                        {{ $step }}
                                    </div>
                                </div>
                            @endforeach
                
                            @if($order->status === 'cancelled')
                                <div class="step text-center flex-fill">
                                    <div class="circle bg-danger">X</div>
                                    <div class="label mt-2">Cancelled</div>
                                </div>
                            @endif
                        </div>
                
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection