@extends('front.layouts.app')

@section('content')
    <section class="section-5">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Verify your email</li>
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
            
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
            
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <h4 class="modal-title">Please Verify Your Email</h4>
                    <p>Before accessing your account, check your email for a verification link.</p>
                    <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                </form>
            </div>
        </section>
    @endsection
            
