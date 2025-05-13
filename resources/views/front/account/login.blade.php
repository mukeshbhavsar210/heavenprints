@extends('front.layouts.app')

@section('content')


    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <img src="{{ asset('front-assets/images/Heaven.jpg') }}" style="width: 50px" alt="logo" class="auth-logo" />                                    
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
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

                                <div id="sessionMessage" class="alert" style="display: none;"></div>

                                <div id="otpSendForm">
                                    <form id="sendOtpForm" action="{{ route('otp.send') }}" method="POST">
                                        @csrf
                                        <h6 class="modal-title mt-3 mb-3">Login to Your Account</h6>

                                        <div class="form-group mb-3">
                                            <label>Email:</label>
                                            <input type="email" name="email" required class="form-control">
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mb-3">
                                                    <button type="submit" class="btn btn-primary" type="button">Send OTP <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </form>
                                </div>

                                <div id="otpVerifyForm" style="display: none;">
                                    <form id="verifyOtpForm" action="{{ route('otp.verify') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>Email:</label>
                                                    <input type="email" name="email" placeholder="Enter Email" required class="form-control" id="verifyEmail">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mt-2">
                                                <label>OTP:</label>
                                                <input type="text" name="otp" placeholder="Enter OTP" required class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="button">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div> 
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2">Verify OTP</button>
                                    </form>
                                </div>
                            
                                <form action="{{ route('account.authenticate') }}" method="post" >
                                    @csrf
                                    <h6 class="modal-title mb-3 mt-3">Login to Your Account</h6>
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

                                <div class="text-center  mb-2">
                                    <p class="text-muted">Don't have an account ?  <a href="{{ route('account.register') }}" class="text-primary ms-2">Free Resister</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                                       

@endsection
@section('customJs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup CSRF for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle Send OTP
            $('#sendOtpForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {

                        // Hide first form and show second
                        $('#otpSendForm').hide();
                        $('#otpVerifyForm').show();

                        $('#sessionMessage')
                            .removeClass('alert-success')
                            .addClass('alert alert-success')
                            .text('OTP sent successfully!')
                            .fadeIn();

                        // $('#sessionMessage')
                        //     .removeClass('alert-success')
                        //     .addClass('alert alert-danger')
                        //     .text(error)
                        //     .fadeIn();

                        setTimeout(() => {
                            $('#sessionMessage').fadeOut();
                        }, 1500);

                        // Set email value in second form
                        let email = $('#sendOtpForm input[name="email"]').val();
                        $('#verifyEmail').val(email);
                    },
                    error: function(xhr) {
                        let error = xhr.responseJSON?.message || 'Something went wrong';
                        alert(error);
                    }
                });
            });



            $('#verifyOtpForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#sessionMessage')
                            .removeClass('alert-danger')
                            .addClass('alert alert-success')
                            .text(response.message)
                            .fadeIn();

                        // 🔁 Redirect after 1 second (you can make it 0 for instant redirect)
                        setTimeout(function() {
                            var redirectUrl = response.redirect; // the URL from the response
                            
                            if (response.redirect) {
                                window.location.href = redirectUrl;
                            } else {
                                window.location.href = 'account/profile'; // Change '/defaultRoute' to any route
                            }
                        }, 1000); // Adjust timeout duration as needed
                    },
                    error: function(xhr) {
                        const errorMsg = xhr.responseJSON?.message || 'OTP verification failed';

                        $('#sessionMessage')
                            .removeClass('alert-success')
                            .addClass('alert alert-danger')
                            .text(errorMsg)
                            .fadeIn();
                    }
                });
            });
        });
    </script>
@endsection
