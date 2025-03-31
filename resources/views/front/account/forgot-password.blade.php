@extends('front.layouts.app')

@section('content')
<section class="section-5">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item">Forgot Password</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-10">
    <div class="container">
        <div class="login-form">

                @if(session('status'))
                    <p>{{ session('status') }}</p>
                @endif

                @if($errors->any())
                    <p>{{ $errors->first() }}</p>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Send Password Reset Link</button>
                </form>

            </div>
        </div>
    </section>
@endsection
