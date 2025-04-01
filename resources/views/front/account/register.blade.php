@extends('front.layouts.app')

@section('content')
<section class="section-5">
    <div class="container">
        <div class="light-font">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item">Register</li>
            </ol>
        </div>
    </div>
</section>

<section class="section-10">
    <div class="container">
        <div class="login-form">
            {{-- <form action="" method="post" name="registrationForm" id="registrationForm"> --}}

            <form action="process-register" method="post" >            
                @csrf
                <h4 class="modal-title">Register Now</h4>

                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label class="first_name">First Name</label>
                            <input type="text" id="first_name" value="{{ old('first_name') }}" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label class="last_name">Last Name</label>
                            <input type="text" id="last_name" value="{{ old('last_name') }}" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>                            
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="email">Email</label>
                            <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="phone">Phone</label>
                            <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label class="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" id="password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="form-group">
                            <label class="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                            @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 mt-2">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="col-md-6 col-6">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" value="Register">Register Account</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center small">Already have an account? <a href="{{ route('account.login') }}">Login Now</a></div>
        </div>
    </div>
</section>
@endsection

@section('customJs')

{{-- <script type="text/javascript">
    $("#registrationForm").submit(function(event){
        event.preventDefault();

        $("button[type='submit']").prop('disabled', true);

        $.ajax({
            url: '{{ route("account.processRegister") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                $("button[type='submit']").prop('disabled', false);

                var errors = response.errors;

                if(response.status == false){
                    if(errors.first_name){
                        $("#first_name").siblings("p").addClass('invalid-feedback').html(errors.first_name);
                        $("#first_name").addClass('is-invalid');
                    } else {
                        $("#first_name").siblings("p").removeClass('invalid-feedback').html();
                        $("#first_name").removeClass('is-invalid');
                    }

                    if(errors.last_name){
                        $("#last_name").siblings("p").addClass('invalid-feedback').html(errors.last_name);
                        $("#last_name").addClass('is-invalid');
                    } else {
                        $("#last_name").siblings("p").removeClass('invalid-feedback').html();
                        $("#last_name").removeClass('is-invalid');
                    }

                    if(errors.email){
                        $("#email").siblings("p").addClass('invalid-feedback').html(errors.email);
                        $("#email").addClass('is-invalid');
                    } else {
                        $("#email").siblings("p").removeClass('invalid-feedback').html();
                        $("#email").removeClass('is-invalid');
                    }

                    if(errors.password){
                        $("#password").siblings("p").addClass('invalid-feedback').html(errors.password);
                        $("#password").addClass('is-invalid');
                    } else {
                        $("#password").siblings("p").removeClass('invalid-feedback').html();
                        $("#password").removeClass('is-invalid');
                    }
                } else {
                    $("#first_name").siblings("p").removeClass('invalid-feedback').html();
                    $("#first_name").removeClass('is-invalid');
                    $("#last_name").siblings("p").removeClass('invalid-feedback').html();
                    $("#last_name").removeClass('is-invalid');
                    $("#email").siblings("p").removeClass('invalid-feedback').html();
                    $("#email").removeClass('is-invalid');
                    $("#password").siblings("p").removeClass('invalid-feedback').html();
                    $("#password").removeClass('is-invalid');

                    window.location.href="{{ route('account.login') }}"
                }

            },
            error: function(JQXHR, exception){
                console.log("Something went wrong");
            }
        })
    });
</script> --}}

@endsection
