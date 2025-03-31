@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Update User</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">

        {{-- <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf --}}
        <form action="" method="post" id="userForm" name="userForm">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="first_name">First Name</label>
                                <input value="{{ $user->first_name }}" type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="mb-3">
                                <label for="last_name">Last Name</label>
                                <input value="{{ $user->last_name }}" type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input value="{{ $user->email }}" type="text" name="email" id="email" class="form-control" placeholder="Email">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <span style="font-size: 13px;">To change password you have to enter a value. otherwise leave a blank.</span>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input value="{{ $user->phone }}" type="text"  name="phone" id="phone" class="form-control" placeholder="Phone">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option {{ ($user->status == 1) ? 'selected' : ' '}} value="1">Active</option>
                                    <option {{ ($user->status == 0) ? 'selected' : ' '}} value="0">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('users.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        $("#userForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("users.update",$user->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);

                    if(response["status"] == true){
                        $('#first_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#last_name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        window.location.href="{{ route('users.index') }}"

                    } else {
                        var errors = response['errors']
                        if(errors['first_name']){
                            $('#first_name').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['first_name']);
                        } else {
                            $('#first_name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }

                        if(errors['last_name']){
                            $('#last_name').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['last_name']);
                        } else {
                            $('#last_name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }
                        if(errors['email']){
                            $('#email').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['email']);
                        } else {
                            $('#email').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }
                        if(errors['password']){
                            $('#password').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['password']);
                        } else {
                            $('#password').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }
                    }

                }, error: function(jqXHR, exception) {
                    console.log("Something event wrong");
                }
            })
        });
    </script>
@endsection
