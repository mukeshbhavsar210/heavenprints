@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="#">My Account</a></li>
            <li class="breadcrumb-item">Settings</li>
        </ol>
       
        <div class="row">
            <div class="col-md-12">
                @include('front.account.common.message')
            </div>
            <div class="col-md-3 col-12">
                @include('front.account.common.sidebar')
            </div>
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mb-0 pt-2 pb-2">Change Password</h2>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="post" name="changePasswordForm" id="changePasswordForm" >
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Old Password" class="form-control">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">                                
                                    <button class="btn btn-primary mt-4" type="submit" id="submit">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
 $("#changePasswordForm").submit(function(event){
        event.preventDefault();

        $("#submit").prop('disbled','true');

        $.ajax({
            url: '{{ route("account.processChangePassword") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                $("#submit").prop('disbled','false');
                if (response.status == true){

                    $('#old_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#new_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#confirm_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');

                    window.location.href = '{{ route("account.changePassword") }}'

                } else {
                    var errors = response.errors;

                    if(errors.old_password){
                        $('#old_password').addClass('is-invalid').siblings('p').html(errors.old_password).addClass('invalid-feedback');
                    } else {
                        $('#old_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.new_password){
                        $('#new_password').addClass('is-invalid').siblings('p').html(errors.new_password).addClass('invalid-feedback');
                    } else {
                        $('#new_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.confirm_password){
                        $('#confirm_password').addClass('is-invalid').siblings('p').html(errors.confirm_password).addClass('invalid-feedback');
                    } else {
                        $('#confirm_password').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }
                }
            }
        })
    })
</script>
@endsection
