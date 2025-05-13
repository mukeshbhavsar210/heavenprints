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
                                <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Create an account</h4>   
                                <p class="text-muted fw-medium mb-0">Enter your detail to Create your account today.</p>  
                            </div>
                        </div>
                        <div class="card-body pt-0">           
                            <form action="" method="post" name="registrationForm" id="registrationForm">                                                                    
                                <div class="row mt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="first_name">First Name</label>
                                            <input type="text" id="first_name" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="last_name">Last Name</label>
                                            <input type="text" id="last_name" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
                                    <p></p>
                                </div>
                            
                                <div class="form-group">
                                    <label class="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone">
                                    <p></p>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="password">Password</label>
                                            <input type="password" id="password" class="form-control" placeholder="Password" id="password" name="password">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label class="confirm_password">Confirm Password</label>
                                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary" value="Register">Register Account <i class="fas fa-sign-in-alt ms-1"></i></button>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="text-center">
                                <p class="text-muted">Already have an account ?  <a href="{{ route('account.login') }}" class="text-primary ms-2">Log in</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-body-->
</div>
                                
@endsection

@section('customJs')

<script type="text/javascript">
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
</script>

@endsection
