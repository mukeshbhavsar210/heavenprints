@extends('front.layouts.app')

@section('content')
    <section class="section-5">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Login</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-10">
        <div class="container">
            <div class="login-form">

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

            {{-- @if(session('success'))
                <p style="color:green;">{{ session('success') }}</p>
            @endif
            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif --}}

            <!-- Step 1: Enter Email -->
            <form action="{{ route('otp.send') }}" method="POST">
                @csrf
                <h4 class="modal-title">OTP Login</h4>

                <div class="form-group mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Send OTP</button>
            </form>
        <br>

        <!-- Step 2: Enter OTP -->
        <form action="{{ route('otp.verify') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-9 col-8">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Enter Email" required class="form-control">
                    </div>
                </div>
                <div class="col-md-3 col-4">
                    <label>OTP:</label>
                    <input type="text" name="otp" placeholder="Enter OTP" required class="form-control">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Verify OTP</button>
        </form>

        </div>
    </section>
@endsection
