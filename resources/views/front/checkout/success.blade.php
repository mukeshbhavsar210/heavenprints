@extends('front.layouts.app')

@section('content')

<section class="section-9 pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Order status</div>
                    <div class="card-body">
                        <h4>🎉 Payment Successful!</h4>
                        <p>Thank you for your order.</p>
                        <a href="{{ route('front.home') }}" class="btn btn-primary">Shopping More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection