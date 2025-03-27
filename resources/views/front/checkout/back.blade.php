@extends('front.layouts.app')

@section('content')

<section class="section-5">
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
            <li class="breadcrumb-item">Checkout</li>
        </ol>
        
        <form id="razorpay-form" method="POST" action="{{ route('front.processCheckout') }}">
            @csrf
            <div class="row">
                <div class="col-md-8 col-12">
                    <h4>Shipping Address</h4>
                    
                    <div class="checkout-form mt-4">
                        <div class="row">                    
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value={{ (!empty($customerAddress)) ? $customerAddress->first_name : '' }}>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value={{ (!empty($customerAddress)) ? $customerAddress->last_name : '' }} >
                                    <p></p>
                                </div>
                            </div>                    
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value={{ (!empty($customerAddress)) ? $customerAddress->email : '' }}>
                                    <p></p>
                                </div>
                            </div>  
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No." value={{ (!empty($customerAddress)) ? $customerAddress->mobile : '' }}>
                                    <p></p>
                                </div>
                            </div>                                                                
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address" cols="30" rows="5" placeholder="Address" class="form-control" >{{ (!empty($customerAddress)) ? $customerAddress->address : '' }}</textarea>
                                    <p></p>
                                </div>
                            </div>   
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Apartment</label>
                                    <input type="text" name="apartment" id="apartment" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" value={{ (!empty($customerAddress)) ? $customerAddress->apartment : '' }}>
                                </div>                            
                                <div class="form-group mt-2">
                                    <label>City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="City" value={{ (!empty($customerAddress)) ? $customerAddress->city : '' }}>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select a Country</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option {{ (!empty($customerAddress) && $customerAddress->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                                @endforeach
                                                <option value="rest_of_world">Rest of the world</option>
                                            @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>                                               
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="State" value={{ (!empty($customerAddress)) ? $customerAddress->state : '' }}>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Zip" value={{ (!empty($customerAddress)) ? $customerAddress->zip : '' }}>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    <p></p>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <h5>Order Summery</h5>
                    
                    <div class="cart-summery">
                        @foreach (Cart::content() as $item)
                            <div class="row-summary">
                                <div>{{ $item->name }}</div>
                                <div>{{ $item->price*$item->qty }}</div>
                            </div>
                        @endforeach
                        <div class="row-summary">
                            <div>Subtotal</div>
                            <div><strong>₹{{ Cart::subtotal() }}</strong></div>
                        </div>
                        <div class="row-summary">
                            <div>Discount</div>
                            <div><strong id="discount_value">₹{{ $discount }}</strong></div>
                        </div>
                        <div class="row-summary">
                            <div>Shipping</div>
                            <div><strong id="shippingAmount">₹ {{ number_format($totalShiipingCharge,2) }}</strong></div>
                        </div>
                        <div class="row-summary">
                            <div>Total</div>
                            <div><strong id="grandTotal">₹{{ number_format($grandTotal,2) }}</strong></div>
                        </div>                        
                    </div>
                    
                    <div class="input-group apply-coupan mt-4">
                        <input type="text" placeholder="Coupon Code" class="form-control" name="discount_code" id="discount_code">
                        <button class="btn btn-dark" type="button" id="apply-discount">Apply Coupon</button>
                    </div>
                    
                    <div id="discount-response-wrapper">
                        @if (Session::has('code'))
                            <div class="mt-4" id="discount-response">
                                <strong>{{ Session::get('code')->code }}</strong>
                                <a class="btn btn-sm btn-danger" id="remove-discount"><i class="fa fa-times"></i></a>
                            </div>
                        @endif
                    </div>

                    <hr />
                   
                    <div class="mt-3">
                        <input type="text" id="grand_total" name="amount" value="1000">
                        <button type="submit" class="btn btn-primary w-100">Pay with Razorpay</button>
                    </div>
                </div>
            </div>
        </form>
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
    
                let grandTotal = document.getElementById('grand_total').value;
                let first_name = document.getElementById('first_name').value;
                let last_name = document.getElementById('last_name').value;
                let email = document.getElementById('email').value;
                let mobile = document.getElementById('mobile').value;
                let address = document.getElementById('address').value;
                let order_notes = document.getElementById('order_notes').value;
                let apartment = document.getElementById('apartment').value;
                let city = document.getElementById('city').value;
                let country = document.getElementById('country').value;
                let state = document.getElementById('state').value;
                let zip = document.getElementById('zip').value;
    
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
                            response.first_name = document.getElementById('first_name').value;
                            response.last_name = document.getElementById('last_name').value;
                            response.email = document.getElementById('email').value;
                            response.mobile = document.getElementById('mobile').value;
                            response.address = document.getElementById('address').value;
                            response.order_notes = document.getElementById('order_notes').value;
                            response.apartment = document.getElementById('apartment').value;
                            response.city = document.getElementById('city').value;
                            response.country = document.getElementById('country').value;
                            response.state = document.getElementById('state').value;
                            response.zip = document.getElementById('zip').value;
    
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
                                    window.location.href = "{{ route('order.success') }}";
                                } else {
                                    window.location.href = "{{ route('order.failed') }}";
                                }
                            })
                            .catch(error => console.error("Error:", error));
                        },
                        "prefill": {
                            "name": first_name,
                            "email": email,
                            "contact": mobile
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
                    if(errors.first_name){
                        $("#first_name").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.first_name)
                    } else {
                        $("#first_name").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                    }

                    if(errors.last_name){
                        $("#last_name").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.last_name)
                    } else {
                        $("#last_name").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                    }

                    if(errors.email){
                        $("#email").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.email)
                    } else {
                        $("#email").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
                    }

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

                   
                    if(errors.mobile){
                        $("#mobile").addClass('is-invalid').siblings("p").addClass('invalid-feedback').html(errors.mobile)
                    } else {
                        $("#mobile").removeClass('is-invalid').siblings("p").removeClass('invalid-feedback').html('')
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
</script>
@endsection
