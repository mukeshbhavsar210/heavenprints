@extends('front.layouts.app')

@section('content')
<section class="section-5">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item">Reset</li>
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
            
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                
                <h4 class="modal-title">Reset your password!</h4>
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"  placeholder="New Password" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-6">
                        <div class="form-group mb-3">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirm Password" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Reset Password</button>
            </form>
        </div>
    </div>
</section>
@endsection
