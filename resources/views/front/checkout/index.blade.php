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
                <div class="col-md-8 col-12">  
                    <div class="sub-title mb-4"><h2>Shipping Address</h2></div> 
                    <form id="razorpay-form" method="POST" action="{{ route('front.processCheckout') }}" >
                        @csrf

                        @if(Auth::check())

                        <div class="pickSize mb-3">
                            <div class="size-picker">
                                <div class="size-picker__item" >
                                    <input checked type="radio" name="address_type" value="home" id="home" class="size-picker__input">
                                    <label class="size-picker__color" for="home">
                                        <h6>Home address</h6>
                                    </label>
                                </div>
                                <div class="size-picker__item" >
                                    <input type="radio" name="address_type" value="office" id="office" class="size-picker__input">
                                    <label class="size-picker__color" for="office">
                                        <h6>Office address</h6>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card" id="home_address_div" >
                            <div class="card-body">
                                <h6 class="mb-4">Please deliver at my HOME address</h6>
                                <p>
                                    {{ $homeAddress->apartment }},<br />
                                    {{ $homeAddress->address }},<br />
                                    {{ $homeAddress->city }} - {{ $homeAddress->zip }},<br />
                                    {{ $homeAddress->country->name }},<br />
                                </p>           
                                
                                <div class="form-group">
                                    <label>State</label>
                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select a State</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option {{ (!empty($homeAddress) && $homeAddress->country_id == $country->id) ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                                @endforeach
                                                <option value="rest_of_world">Rest of the state</option>
                                            @endif
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    <p></p>
                                </div>   
                            </div>
                        </div>

                        <div class="card" id="office_address_div" style="display: none;">            
                            <div class="card-body" >
                                <h6 class="mb-4">Please deliver at my OFFICE address</h6> 
                                <p>
                                    {{ $officeAddress->apartment }},<br />
                                    {{ $officeAddress->address }},<br />
                                    {{ $officeAddress->city }} - {{ $officeAddress->zip }},<br />
                                    {{ $officeAddress->country->name }}.</p>
                                    
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea name="order_notes" id="order_notes" cols="30" rows="2" placeholder="Order Notes (optional)" class="form-control"></textarea>
                                    <p></p>
                                </div>                                                                                                                                                                            
                            </div>
                            @endif
                        </div>
                    </div>
                
                    <div class="col-md-4 col-12">
                        <div class="sub-title mb-4"><h2>Order Summery</h2></div>
                                @foreach (Cart::content() as $item)
                                    <div class="d-flex justify-content-between">
                                        <p>{{ $item->name }}</p>
                                        <p>₹{{ $item->price*$item->qty }}</p>
                                    </div>
                                @endforeach
                                <hr class="mt-0" />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">₹{{ Cart::subtotal() }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount</p>
                                    <p id="discount_value" class="mb-2">₹{{ number_format($discount,2) }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Shipping</p>
                                    <p id="shippingAmount" class="mb-2">₹ {{ number_format($totalShiipingCharge,2) }}</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p>Total</p>
                                    <p id="grandTotal">₹{{ number_format($grandTotal,2) }}</p>
                                </div>

                                <div class="input-group apply-coupan mt-1">
                                    <input type="text" placeholder="Coupon Code" class="form-control" name="discount_code" id="discount_code">
                                    <button class="btn btn-secondary" type="button" id="apply-discount">Apply Coupon</button>
                                </div>
                                
                                <div id="discount-response-wrapper">
                                    @if (Session::has('code'))
                                        <div id="discount-response">
                                            <div class="card-body p-2">
                                                {{ Session::get('code')->code }}
                                                <a id="remove-discount"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            <div class="mt-2">
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
                        $("#discount-response").remove();
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


        $('input[name="address_option"]').on('change', function () {
            let selected = $(this).val();

            if (selected === 'existing') {
                $('#existing_address').show();
                $('#new_address').hide();
            } else {
                $('#existing_address').hide();
                $('#new_address').show();
            }
        });

        // On page load, make sure correct one is shown
        $(document).ready(function () {
            $('input[name="address_option"]:checked').trigger('change');
        });

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


        function updateShippingCost() {
            const checked = document.querySelector('input[name="country"]:checked');
            if (checked) {
                document.getElementById('shippingAmount').innerText = checked.value;
            }
        }

       
    </script>
@endsection