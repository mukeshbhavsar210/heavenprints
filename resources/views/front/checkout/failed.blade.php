@extends('front.layouts.app')

@section('content')

<section class="section-9 pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Order status</div>
                    <div class="card-body">
                    <h4>❌ Payment Failed! Please try again.</h4>
                    <a href="{{ route('front.checkout') }}" class="btn btn-danger mt-3">Try Again</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection