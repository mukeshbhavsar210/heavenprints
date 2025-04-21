@extends('front.layouts.app')

@section('content')

    <section class="section-5 pt-4">
        <div class="container">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('front.cart') }}">Cart</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ol>
           

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

        <div class="row mt-4">
            <div class="col-md-8 col-12">  
                <form id="razorpay-form" method="POST" action="{{ route('front.processCheckout') }}" >
                    @csrf

                    @if(Auth::check())
                    
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mt-2 mb-2">Please select Delivery address</h6>
                        </div>
                        <div class="card-body">
                            <div class="addressRadio">
                                @if($homeAddress)
                                    <div class="addressRadio__item" >
                                        <input type="radio" name="address_type" value="home" id="home" class="addressRadio__input">
                                        <label class="addressRadio__color" for="home">Home</label>
                                    </div>
                                @endif
                                @if($officeAddress)
                                    <div class="addressRadio__item" >
                                        <input type="radio" name="address_type" value="office" id="office" class="addressRadio__input">
                                        <label class="addressRadio__color" for="office">Office</label>
                                    </div>
                                @endif
                            </div>                       

                            <hr />                       

                            <div class="mt-3" id="home_address_div" >
                                @if($homeAddress)
                                    <p>                                 
                                        {{ $homeAddress->apartment }},<br />
                                        {{ $homeAddress->address }},<br />
                                        {{ $homeAddress->city }} - {{ $homeAddress->zip }},<br />
                                        {{ $homeAddress->country->name }},<br />
                                    </p>               
                                @endif

                                <input type="hidden" name="delivery_at" value="home">

                                <select name="country" id="country" class="form-control d-none">
                                    @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option {{ (!empty($homeAddress) && $homeAddress->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                                                
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="3" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    <p></p>
                                </div>   
                            </div>

                            <div class="mt-3" id="office_address_div" style="display: none;">            
                                @if($officeAddress)
                                    <p>
                                        {{ $officeAddress->apartment }},<br />
                                        {{ $officeAddress->address }},<br />
                                        {{ $officeAddress->city }} - {{ $officeAddress->zip }},<br />
                                        {{ $officeAddress->country->name }}.
                                    </p>
                                @endif

                                <input type="hidden" name="delivery_at" value="office">
                            
                                <select name="country" id="country" class="form-control d-none">                                        
                                    @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option {{ (!empty($officeAddress) && $officeAddress->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="3" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    <p></p>
                                </div>                                                                                                                                                                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="col-md-4 col-12 mt-3_mobile">
                    <div class="sub-title mb-4"><h2>Order Summery</h2></div>
                            @foreach (Cart::content() as $item)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->name }}</p>
                                    <p>₹{{ $item->price*$item->qty }}</p>
                                </div>
                            @endforeach                         
                            
                            <hr class="mt-0" >

                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Subtotal</p>
                                <p class="mb-2">₹{{ Cart::subtotal() }}</p>
                            </div>

                            <div id="discount_label">
                                @if (Session::has('code'))                                         
                                @endif
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Shipping</p>
                                <p id="shippingAmount" class="mb-2">₹ {{ number_format($totalShiipingCharge,2) }}</p>
                            </div>
                            <hr class="mt-1 mb-2" />
                            <div class="d-flex justify-content-between">
                                <p><b>To Pay</b></p>
                                <p id="grandTotal"><b>₹{{ number_format($grandTotal,2) }}</b></p>
                            </div>

                            @if($discountCode->isNotEmpty())
                                @foreach ($discountCode as $value)
                                    <a class="toggle-btn" href="javascript:void{0}">Discount?</a>
                                    <div class="discount_wrapper" style="display: none;">
                                        <div id="discount-response-wrapper" >
                                            @if (Session::has('code'))
                                                <div id="discount-response">
                                                    <div class="card-body p-2">
                                                        {{ Session::get('code')->code }}
                                                        <a id="remove-discount"><i class="fa fa-times"></i></a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="input-group apply-coupan mt-1" >
                                            <input type="text" placeholder="Coupon Code" class="form-control" name="discount_code" id="discount_code">
                                            <button class="btn btn-secondary" type="button" id="apply-discount">Apply Coupon</button>
                                        </div>

                                        <p class="mt-2">{{ $value->code }}</p>
                                    </div>
                                @endforeach
                            @endif

                            <div class="mt-2">
                                <input type="hidden" name="amount" id="grand_total" value="{{ number_format($grandTotal, 2, '.', '') }}" class="form-control" readonly>
                                <button type="submit" class="btn btn-primary w-100" id="payment-btn" disabled>Make Payment</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>        
</section>

@endsection
@section('customJs')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let razorpayForm = document.getElementById('razorpay-form');
    
        if (razorpayForm) {
            razorpayForm.addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                let selectedType = $('input[name="address_type"]:checked').val();
                let country = document.getElementById('country').value;
                let order_notes = document.getElementById('order_notes').value;                
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
                            response.address_type = selectedType;
                            response.order_notes = document.getElementById('order_notes').value;                            
                            response.country = document.getElementById('country').value;                            
    
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
                                    window.location.href = "/thanks/" + verifyData.orderId;
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

    function updateShipping(countryId) {
        $.ajax({
            url: '{{ route("front.getOrderSummary") }}',
            type: 'post',
            data: {
                country_id: countryId,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === true) {
                    $("#shippingAmount").html(response.shippingCharge);
                    $("#grandTotal").html(response.grandTotal);
                    $("#grand_total").val(response.grandTotal);
                }
            },
            error: function(xhr) {
                console.log("AJAX error:", xhr.responseText);
            }
        });
    }

    // When country is manually changed from the dropdown
    $("#country").change(function(){
        const selectedCountry = $(this).val();
        updateShipping(selectedCountry);
    });

    //Country shipping cost
    const homeAddress = @json($homeAddress);
    const officeAddress = @json($officeAddress);

    $('input[name="address_type"]').change(function () {
        let selectedType = $(this).val();
        let countryId = ''; 

        if (selectedType === 'home'  && homeAddress) {
            countryId = homeAddress.country_id;
        } else if (selectedType === 'office' && officeAddress) {
            countryId = officeAddress.country_id;
        }

        // Set country select and update shipping
        $('#country').val(countryId).trigger('change');
        updateShipping(countryId);
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
                    $("#discount_label").html("<div class='d-flex justify-content-between'><p class='mb-2'>Discount</p><p class='mb-2'>-"+response.discount+"</p></div>");
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
                    $("#discount-response").remove();
                    $("#discount_label").remove();
                    $("#discount_code").val('');
                }
            }
        })
    })

    //Dont' remove below code
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

    $('input[name="address_type"]').on('change', function () {
        let type = $(this).val();

        if (type === 'home') {
            $('#home_address_div').show();
            $('#office_address_div').hide();
        } else {
            $('#home_address_div').hide();
            $('#office_address_div').show();
        }
    });

    $(".toggle-btn").click(function() {
        var id = $(this).data("id"); 
        var moreContent = $(".discount_wrapper");
        var button = $(".toggle-btn");

        if (moreContent.is(":visible")) {
            moreContent.hide();
            button.text("Discount");
        } else {
            moreContent.show();
            button.text("Hide Discount");
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
            const paymentBtn = document.getElementById('payment-btn');
            const addressRadios = document.querySelectorAll('input[name="address_type"]');
            const warning = document.getElementById('address-warning');

            function checkAddressSelection() {
                const selected = document.querySelector('input[name="address_type"]:checked');
                paymentBtn.disabled = !selected;
                if (selected) {
                    warning.style.display = 'none';
                }
            }

            addressRadios.forEach(radio => {
                radio.addEventListener('change', checkAddressSelection);
            });

            document.getElementById('checkout-form').addEventListener('submit', function (e) {
                const selected = document.querySelector('input[name="address_type"]:checked');
                if (!selected) {
                    e.preventDefault();
                    warning.style.display = 'block';
                }
            });
        });
</script>
@endsection