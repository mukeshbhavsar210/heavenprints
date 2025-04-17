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
            <div class="col-md-3 col-12">
                <aside>
                    @include('front.account.common.sidebar')
                </aside>
            </div>
            <div class="col-md-9 col-12">   
                @include('front.account.common.message')      
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 col-8">
                                <h2 class="h5 mt-1">Personal Information</h2>    
                            </div>
                            <div class="col-md-2 col-4">                                
                            </div>
                        </div>
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
           
                <div class="row mt-3">   
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10 col-10">
                                        <h5>Home</h5>
                                    </div>
                                    <div class="col-md-2 col-2">
                                        @if($home_address)
                                            <a href="#" onclick="deleteAddress({{ $home_address->id }})" class="text-danger addressDelete">
                                                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">  
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">                                                
                                                <form action="" id="home_addressForm" name="home_addressForm">
                                                    <div class="row">   
                                                        <div class="col-md-6 col-4">  
                                                            <div class="form-group">                                  
                                                                <label for="type">Select Type</label>
                                                                <select name="type" id="type" class="form-select">
                                                                    <option value="home">Home</option>
                                                                    <option value="office">Office</option>
                                                                </select>
                                                                <p></p>                                    
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-8">
                                                            <div class="form-group">
                                                                <label for="apartment">Apartment</label>
                                                                <input value="" type="text" name="apartment" id="apartment" placeholder="Enter Your Apartment" class="form-control">                                                                
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                                                                <p></p>
                                                            </div>                                                                       
                                                        </div>                                                                           
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="City">City</label>
                                                                <input value="" type="text" name="city" id="city" placeholder="Enter Your City" class="form-control">
                                                                <p></p>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-7 col-6">
                                                                    <div class="form-group">
                                                                        <label for="country">State</label>
                                                                        <select name="country_id" id="country_id" class="form-select">
                                                                            <option value="">Select</option>
                                                                            @if ($countries->isNotEmpty())
                                                                                @foreach ($countries as $country)
                                                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5 col-6">
                                                                    <div class="form-group">
                                                                        <label for="zip">Pin Code</label>
                                                                        <input value=""  type="text" name="zip" id="zip" placeholder="Pin" class="form-control">
                                                                        <p></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>                                                    
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save Address</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if($home_address)
                                    {{ (!empty($home_address)) ? $home_address->apartment : '' }},<br />
                                    {{ (!empty($home_address)) ? $home_address->address : '' }},<br />   
                                    {{ (!empty($home_address)) ? $home_address->city : '' }} - {{ (!empty($home_address)) ? $home_address->zip : '' }}.<br />
                                    {{ (!empty($home_address)) ? $home_address->country->name : '' }}                    

                                @else
                                    <p>Please Add Home Address</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add address
                                    </button>
                                @endif        
                            </div>
                        </div>
                    </div>      
                    <div class="col-md-6 col-12 mt-3_mobile">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-10 col-10">
                                        <h5>Office</h5>
                                    </div>
                                    <div class="col-md-2 col-2">
                                        @if($office_address)
                                            <a href="#" onclick="deleteAddress({{ $office_address->id }})" class="text-danger addressDelete">
                                                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($office_address)
                                    {{ (!empty($office_address)) ? $office_address->apartment : '' }},<br />
                                    {{ (!empty($office_address)) ? $office_address->address : '' }},<br />   
                                    {{ (!empty($office_address)) ? $office_address->city : '' }} - {{ (!empty($office_address)) ? $office_address->zip : '' }}.<br />             
                                    {{ (!empty($office_address)) ? $office_address->country->name : '' }}.  
                                @else
                                    <p>Please Add Office Address</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add address
                                    </button>
                                @endif
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

    function deleteAddress(id){
        var url = '{{ route("address.delete","ID") }}'
        var newUrl = url.replace("ID",id)

        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response["status"]){
                        window.location.href="{{ route('account.profile') }}"
                    }
                }
            });
        }
        }

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
