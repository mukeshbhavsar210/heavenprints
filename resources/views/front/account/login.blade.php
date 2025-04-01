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

            
                <form action="{{ route('account.authenticate') }}" method="post" >
                    @csrf
                    <h4 class="modal-title">Login to Your Account</h4>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="password">Password</label>
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" >
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="pull-right">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="text-center small">Don't have an account? <a href="{{ route('account.register') }}">Sign up</a></div>
            </div>
        </div>
    </section>
@endsection
