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
                        <h2 class="h5 mt-1">Personal Information</h2>     
                    </div>         
                    <div class="card-body">
                    <form action="" id="profileForm" name="profileForm">
                        <div class="row">
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input value={{ $user->first_name }} type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input value={{ $user->last_name }} type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value={{ $user->email }} type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value={{ $user->phone }} type="text" name="phone" id="phone" placeholder="Enter Your Phone" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-2 ">
                                <button class="btn btn-primary mt-4">Update</button>
                            </div>
                        </div>
                    </form> 
                </div>      
                </div>             
               
                <div class="card mt-4">
                    <div class="card-header">
                        <h2 class="h5 mt-1">Address</h2>     
                    </div>         
                    <div class="card-body">
                    <form action="" id="addressForm" name="addressForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input value={{ (!empty($address)) ? $address->first_name : '' }} type="text" name="first_name" id="first_name" placeholder="Enter Your First Name" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input value={{ (!empty($address)) ? $address->last_name : '' }} type="text" name="last_name" id="last_name" placeholder="Enter Your Last Name" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value={{ (!empty($address)) ? $address->email : '' }} type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ (!empty($address)) ? $address->address : '' }}</textarea>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input value={{ (!empty($address)) ? $address->mobile : '' }} type="text" name="mobile" id="mobile" placeholder="Enter Your Mobile" class="form-control">
                                    <p></p>
                                </div>

                                <div class="form-group">
                                    <label for="apartment">Apartment</label>
                                    <input value={{ (!empty($address)) ? $address->apartment : '' }} type="text" name="apartment" id="apartment" placeholder="Enter Your Apartment" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <input value={{ (!empty($address)) ? $address->city : '' }} type="text" name="city" id="city" placeholder="Enter Your City" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input value={{ (!empty($address)) ? $address->state : '' }}  type="text" name="state" id="state" placeholder="Enter Your State" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8 col-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country_id" id="country_id" class="form-control">
                                                <option value="">Select a Country</option>
                                                @if ($countries->isNotEmpty())
                                                    @foreach ($countries as $country)
                                                        <option {{ (!empty($address) && $address->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4  col-6">
                                        <div class="form-group">
                                            <label for="zip">Zip</label>
                                            <input value={{ (!empty($address)) ? $address->zip : '' }}  type="text" name="zip" id="zip" placeholder="Enter Your Zip" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <button class="btn btn-primary">Update</button>
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
    $("#profileForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: '{{ route("account.updateProfile") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                if (response.status == true){

                    $('#profileForm #name').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#profileForm #email').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#profileForm #phone').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');

                    window.location.href = '{{ route("account.profile") }}'

                } else {
                    var errors = response.errors;
                    if(errors.name){
                        $('#profileForm #name').addClass('is-invalid').siblings('p').html(errors.name).addClass('invalid-feedback');
                    } else {
                        $('#profileForm #name').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.email){
                        $('#profileForm #email').addClass('is-invalid').siblings('p').html(errors.email).addClass('invalid-feedback');
                    } else {
                        $('#profileForm #email').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.phone){
                        $('#profileForm #phone').addClass('is-invalid').siblings('p').html(errors.phone).addClass('invalid-feedback');
                    } else {
                        $('#profileForm #phone').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }
                }
            }
        })
    })


    $("#addressForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: '{{ route("account.updateAddress") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                if (response.status == true){

                    $('#name').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#email').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    $('#phone').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');

                    window.location.href = '{{ route("account.profile") }}'

                } else {
                    var errors = response.error;
                    if(errors.first_name){
                        $('#addressForm #first_name').addClass('is-invalid').siblings('p').html(errors.first_name).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #first_name').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.last_name){
                        $('#addressForm #last_name').addClass('is-invalid').siblings('p').html(errors.last_name).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #last_name').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.email){
                        $('#addressForm #email').addClass('is-invalid').siblings('p').html(errors.email).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #email').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.mobile){
                        $('#addressForm #mobile').addClass('is-invalid').siblings('p').html(errors.mobile).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #mobile').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.country_id){
                        $('#addressForm #country_id').addClass('is-invalid').siblings('p').html(errors.country_id).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #country_id').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.address){
                        $('#addressForm #address').addClass('is-invalid').siblings('p').html(errors.address).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #address').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.apartment){
                        $('#addressForm #apartment').addClass('is-invalid').siblings('p').html(errors.apartment).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #apartment').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.city){
                        $('#addressForm #city').addClass('is-invalid').siblings('p').html(errors.city).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #city').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.state){
                        $('#addressForm #state').addClass('is-invalid').siblings('p').html(errors.state).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #state').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.zip){
                        $('#addressForm #zip').addClass('is-invalid').siblings('p').html(errors.zip).addClass('invalid-feedback');
                    } else {
                        $('#addressForm #zip').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }
                }
            }
        })
    })
</script>
@endsection
