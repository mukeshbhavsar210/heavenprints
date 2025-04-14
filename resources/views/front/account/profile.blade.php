@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-10">
                <ol class="breadcrumb primary-color">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
                </ol>
            </div>
            <div class="col-md-3 col-2">
                <nav class="frame_mobile_menu">
                    <div class="toggle-wrap" onclick="toggleMenu(this)">
                        <span class="toggle-bar" style="margin-top:0;"></span>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('front.account.common.message')
            </div>
            <div class="col-md-3 col-12">
                <aside>
                    @include('front.account.common.sidebar')
                </aside>
            </div>
            <div class="col-md-9 col-12">         
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 mt-1">Personal Information</h2>     
                    </div>         
                    <div class="card-body">
                    <form action="" id="profileForm" name="profileForm">
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input value={{ $user->first_name }} type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label for="name">Last Name</label>
                                    <input value={{ $user->last_name }} type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input value={{ $user->email }} type="text" name="email" id="email" placeholder="Enter Your Email" class="form-control">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input value={{ $user->phone }} type="text" name="phone" id="phone" placeholder="Enter Your Phone" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form> 
                </div>      
                </div>   
                
                <div class="mt-4 card">
                    <div class="card-header">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home Address</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Office Address</button>
                            </div>
                        </nav>
                    </div>    
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">                                

                                <form action="" id="home_addressForm" name="home_addressForm">
                                    <input value="home" type="hidden" name="type" >
                                    <div class="row">   
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ (!empty($home_address)) ? $home_address->address : '' }}</textarea>
                                                <p></p>
                                            </div>
                                        </div>           
                                        <div class="col-md-6 col-12">
                                            <div class="row">              
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="apartment">Apartment</label>
                                                        <input value={{ (!empty($home_address)) ? $home_address->apartment : '' }} type="text" name="apartment" id="apartment" placeholder="Enter Your Apartment" class="form-control">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="City">City</label>
                                                        <input value={{ (!empty($home_address)) ? $home_address->city : '' }} type="text" name="city" id="city" placeholder="Enter Your City" class="form-control">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country">State</label>
                                                        <select name="country_id" id="country_id" class="form-control">
                                                            <option value="">Select a State</option>
                                                            @if ($countries->isNotEmpty())
                                                                @foreach ($countries as $country)
                                                                    <option {{ (!empty($home_address) && $home_address->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="zip">Zip</label>
                                                        <input value={{ (!empty($home_address)) ? $home_address->zip : '' }}  type="text" name="zip" id="zip" placeholder="Enter Your Zip" class="form-control">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="d-flex">
                                        <button class="btn btn-primary">Update Address</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="{{ route('office.store') }}" method="post" enctype="multipart/form-data" >
                                    @csrf

                                    <input value="office" type="hidden" name="type" id="type" >

                                    <div class="row">     
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{ (!empty($office_address)) ? $office_address->address : '' }}</textarea>
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>           
                                        <div class="col-md-6 col-12">
                                            <div class="row">
                                                <div class="col-md-6">            
                                                    <div class="form-group">
                                                        <label for="apartment">Apartment</label>
                                                        <input value={{ (!empty($office_address)) ? $office_address->apartment : '' }} type="text" name="apartment" id="apartment" placeholder="Enter Your Apartment" class="form-control">
                                                        @error('apartment')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>  
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group">
                                                        <label for="City">City</label>
                                                        <input value={{ (!empty($office_address)) ? $office_address->city : '' }} type="text" name="city" id="city" placeholder="Enter Your City" class="form-control">
                                                        @error('city')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="country">State</label>
                                                        <select name="country_id" id="country_id" class="form-control">
                                                            <option value="">Select a State</option>
                                                            @if ($countries->isNotEmpty())
                                                                @foreach ($countries as $country)
                                                                    <option {{ (!empty($office_address) && $office_address->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('country_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12  mt-3">
                                                    <div class="form-group">
                                                        <label for="zip">Zip</label>
                                                        <input value={{ (!empty($office_address)) ? $office_address->zip : '' }} type="text" name="zip" id="zip" placeholder="Enter Your Zip" class="form-control">                                                
                                                    </div>
                                                </div>                                                 
                                            </div>
                                        </div>                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update Office Address</button>
                                </form>
                            </div>
                        </div>
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


    $("#home_addressForm").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: '{{ route("account.updateAddress") }}',
            type: 'post',
            data: $(this).serializeArray(),
            dataType: 'json',
            success: function(response){
                if (response.status == true){
                    window.location.href = '{{ route("account.profile") }}'
                } else {
                    var errors = response.error;
                   
                    if(errors.country_id){
                        $('#home_addressForm #country_id').addClass('is-invalid').siblings('p').html(errors.country_id).addClass('invalid-feedback');
                    } else {
                        $('#home_addressForm #country_id').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.address){
                        $('#home_addressForm #address').addClass('is-invalid').siblings('p').html(errors.address).addClass('invalid-feedback');
                    } else {
                        $('#home_addressForm #address').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.apartment){
                        $('#home_addressForm #apartment').addClass('is-invalid').siblings('p').html(errors.apartment).addClass('invalid-feedback');
                    } else {
                        $('#home_addressForm #apartment').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.city){
                        $('#home_addressForm #city').addClass('is-invalid').siblings('p').html(errors.city).addClass('invalid-feedback');
                    } else {
                        $('#home_addressForm #city').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }

                    if(errors.zip){
                        $('#home_addressForm #zip').addClass('is-invalid').siblings('p').html(errors.zip).addClass('invalid-feedback');
                    } else {
                        $('#home_addressForm #zip').removeClass('is-invalid').siblings('p').html('').removeClass('invalid-feedback');
                    }
                }
            }
        })
    })

    function toggleMenu(e) {
        e.classList.toggle("active");
        document.querySelector("aside").classList.toggle("active");        
    }   
</script>
@endsection
