@extends('front.layouts.app')

@section('content')

    <section class="section-5 pt-3 pb-3 mb-3">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ol>
            </div>
        </div>
    </section>

    @if (Session::has('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

<section class="section-9 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-7">  
                <div class="sub-title mb-4"><h2>Shipping Address</h2></div> 

                <form id="razorpay-form" method="POST" action="{{ route('front.processCheckout') }}" >
                    @csrf   

                    @php
                        $user = Auth::user();
                        $savedAddress = $user->customerAddress;
                    @endphp
                
                    <div class="card">
                        <label>                       
                            <div class="card-header">
                                <input type="radio" name="address_option" value="existing" checked>
                                <strong>Home Address</strong>
                            </div>
                            <div class="card-body">
                                @auth
                                    @if(Auth::user()->shippingAddress)
                                        <div class="row">                                                                
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea name="existing_address" id="existing_address" cols="30" rows="5" placeholder="Address" class="form-control" >{{ Auth::user()->shippingAddress->address }}</textarea>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Apartment</label>
                                                    <input type="text" name="existing_apartment" id="existing_apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" value={{ Auth::user()->shippingAddress->apartment }}>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label>City</label>
                                                    <input type="text" name="existing_city" id="existing_city" class="form-control" placeholder="City" value={{ Auth::user()->shippingAddress->city }}>
                                                    <p></p>
                                                </div>
                                            </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input type="text" name="existing_country" id="existing_country" class="form-control" placeholder="Zip" value={{ Auth::user()->shippingAddress->country->name }}>

                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Pin code</label>
                                                            <input type="text" name="existing_zip" id="existing_zip" class="form-control" placeholder="Zip" value={{ Auth::user()->shippingAddress->zip }}>
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                <div class="form-group">
                                                    <label>Notes</label>
                                                    <textarea name="existing_order_notes" id="existing_order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                                    <p></p>
                                                </div>
                                             
                                            </div>                                                                    
                                        </div> 
                                    @endif
                                @endauth
                            </label>                   
                        </div>
                    </div>
        
                    <!-- Add New Address -->
                    <div class="card mt-3">
                        <div class="card-header">
                            <label>
                                <input type="radio" name="address_option" value="new">
                                <strong>Add New Address</strong>
                            </label>
                        </div>
                        
                        <div class="card-body">                       
                            <div id="new-address-form" style="display: none;">
                                <div class="row">  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" id="address" cols="30" rows="5" placeholder="Address" class="form-control" >{{ (!empty($customerAddress)) ? $customerAddress->address : '' }}</textarea>
                                            <p></p>
                                        </div>
            
                                        <div class="form-group">
                                            <label>Notes</label>
                                            <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                            <p></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Apartment</label>
                                            <input type="text" name="apartment" id="apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" value={{ (!empty($customerAddress)) ? $customerAddress->apartment : '' }}>
                                        </div>
            
                                        <div class="row mt-3">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" id="city" class="form-control" placeholder="City" value={{ (!empty($customerAddress)) ? $customerAddress->city : '' }}>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Pin code</label>
                                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip" value={{ (!empty($customerAddress)) ? $customerAddress->zip : '' }}>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select name="country" id="country" class="form-control">
                                                        <option value="">Select a State</option>
                                                            @if ($countries->isNotEmpty())
                                                                @foreach ($countries as $country)
                                                                    <option {{ (!empty($customerAddress) && $customerAddress->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                                                @endforeach
                                                                <option value="rest_of_world">Rest of the state</option>
                                                            @endif
                                                    </select>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                    
                                </div>                                           
                            </div>
                        </div>
                    </div>
                    </div>
                   
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="sub-title"><h2>Order Summery</h3></div>                    
                        @foreach (Cart::content() as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->name }}</p>
                                <p>₹{{ $item->price*$item->qty }}</p>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <p>Subtotal</p>
                            <p>₹{{ Cart::subtotal() }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Discount</p>
                            <p id="discount_value">₹{{ number_format($discount,2) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Shipping</p>
                            <p id="shippingAmount">₹ {{ number_format($totalShiipingCharge,2) }}</p>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p>Total</p>
                            <p id="grandTotal">₹{{ number_format($grandTotal,2) }}</p>
                            {{-- <input type="text" id="grandTotal" value="{{ $grandTotal }}"> --}}
                        </div>
                                               
                        <div class="input-group apply-coupan mt-1">
                            <input type="text" placeholder="Coupon Code" class="form-control" name="discount_code" id="discount_code">
                            <button class="btn btn-dark" type="button" id="apply-discount">Apply Coupon</button>
                        </div>
                        
                        <div id="discount-response-wrapper">
                            @if (Session::has('code'))
                                <div class="mt-4" id="discount-response">
                                    {{ Session::get('code')->code }}
                                    <a class="btn btn-sm btn-danger" id="remove-discount"><i class="fa fa-times"></i></a>
                                </div>
                            @endif
                        </div>
    
                        <hr />
                       
                        <div class="mt-3">
                            <input type="hidden" name="amount" id="grand_total" value="{{ number_format($grandTotal, 2, '.', '') }}" class="form-control" readonly>
                            <button type="submit" class="btn btn-primary w-100">Make Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let razorpayForm = document.getElementById('razorpay-form');
    
        if (razorpayForm) {
            razorpayForm.addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                let address = document.getElementById('address').value;
                let apartment = document.getElementById('apartment').value;
                let city = document.getElementById('city').value;
                let country = document.getElementById('country').value;
                let zip = document.getElementById('zip').value;
                let order_notes = document.getElementById('order_notes').value;

                let existing_address = document.getElementById('existing_address').value;
                let existing_apartment = document.getElementById('existing_apartment').value;
                let existing_city = document.getElementById('existing_city').value;
                let existing_country = document.getElementById('existing_country').value;
                let existing_zip = document.getElementById('existing_zip').value;
                let existing_order_notes = document.getElementById('existing_order_notes').value;

                let grandTotal = document.getElementById('grand_total').value;
                    
                // Send data to Laravel to generate an order_id
                fetch("{{ route('front.processCheckout') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ 
                        amount: grandTotal, 
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.order_id) {
                        alert("Error: Order ID not generated");
                        return;
                    }
    
                    // Configure Razorpay options
                    var options = {
                        "key": data.key,
                        "amount": data.amount,
                        "currency": data.currency,
                        "name": "Your Store",
                        "description": "Order Payment",
                        "order_id": data.order_id,
                        "handler": function (response) {
                            response.amount = grandTotal * 100;
                            response.address = address;
                            response.order_notes = order_notes;
                            response.apartment = apartment;
                            response.city = city;
                            response.country = country;
                            response.zip = zip;
    
                            // Send payment details to Laravel for verification
                            fetch("{{ route('verify.payment') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                                },
                                body: JSON.stringify(response)
                            })
                            .then(verifyResponse => verifyResponse.json())
                            .then(verifyData => {
                                if (verifyData.status === "success") {       
                                    var orderUrl = "{{ route('order.success', ['order' => 'orderId']) }}".replace(':orderId', data.order_id);
                                    window.location.href = orderUrl;
                                } else {
                                    window.location.href = "{{ route('order.failed') }}";
                                }
                            })
                            .catch(error => console.error("Error:", error));
                        },
                        "prefill": {
                            //"name": first_name,
                            //"email": email,
                            //"contact": mobile
                        }
                    };
    
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                })
                .catch(error => console.error("Error:", error));
            });
        } else {
            console.error("Error: #razorpay-form not found");
        }
    });
</script>

@section('customJs')
    <script>
        $("#orderForm").submit(function(event){
            event.preventDefault();

            $('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: '{{ route("front.processCheckout") }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response){
                    var errors = response.errors;
                    $('button[type="submit"]').prop('disabled', false);

                    //front thankyou page
                    if(response.status == false){
                        if(errors.country){
                            $("#country").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.country)
                        } else {
                            $("#country").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                        }

                        if(errors.address){
                            $("#address").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.address)
                        } else {
                            $("#address").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                        }

                        if(errors.state){
                            $("#state").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.state)
                        } else {
                            $("#state").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                        }

                        if(errors.city){
                            $("#city").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.city)
                        } else {
                            $("#city").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                        }

                    } else {
                        window.location.href="{{ url('thanks/') }}/"+response.orderId;
                    }

                }
            });
        });

        $("#country").change(function(){
            $.ajax({
                url: '{{ route("front.getOrderSummary") }}',
                type: 'post',
                data: {country_id: $(this).val()},
                dataType: 'json',
                success: function(response){
                    if(response.status == true)
                        $("#shippingAmount").html(response.shippingCharge);
                        $("#grandTotal").html(response.grandTotal);                        
                        $("#grand_total").val(response.grandTotal); // This is your input
                    }
            });
        });

        $("#apply-discount").click(function(){
            $.ajax({
                url: '{{ route("front.applyDiscount") }}',
                type: 'post',
                data: {code: $("#discount_code").val(), country_id: $('#country').val()},
                dataType: 'json',
                success: function(response){
                    if(response.status == true) {
                        $("#shippingAmount").html(response.shippingCharge);
                        $("#grandTotal").html(response.grandTotal);
                        $("#discount_value").html(response.discount);
                        $("#discount-response-wrapper").html(response.discountString);
                    } else {
                        $("#discount-response-wrapper").html("<span class='text-danger'>"+response.message+"</span>");
                    }
                }
            })
        });

        $('body').on('click','#remove-discount',function(){
            $.ajax({
                url: '{{ route("front.removeCoupon") }}',
                type: 'post',
                data: {country_id: $('#country').val()},
                dataType: 'json',
                success: function(response){
                    if(response.status == true) {
                        $("#shippingAmount").html(response.shippingCharge);
                        $("#grandTotal").html(response.grandTotal);
                        $("#discount_value").html(response.discount);
                        $("#discount-response").html();
                        $("#discount_code").val('');
                    }
                }
            })
        })


        document.querySelectorAll('input[name="shipping_address"]').forEach(radio => {
            radio.addEventListener('change', function () {
                document.getElementById('custom_address_section').style.display = 
                    (this.value === 'custom') ? 'block' : 'none';
            });
        });

        function updateGrandTotalInput() {
            let grandTotalText = document.getElementById('grand_total').innerText;
            let cleanedTotal = grandTotalText.replace(/[₹,]/g, '').trim(); // Remove ₹ and commas
            document.getElementById('grand_total').value = cleanedTotal;
        }


        document.querySelectorAll('input[name="address_option"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                const form = document.getElementById('new-address-form');
                form.style.display = (this.value === 'new') ? 'block' : 'none';
            });
        });

       

    </script>
@endsection