@extends('front.layouts.app')

@section('content')

<section class="section-6 mt-3">
    <div class="container">
        <div class="light-font mb-3">
            <ol class="breadcrumb primary-color mb-0">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Metal Frame</li>
            </ol>
        </div>
    </div>
</section> 

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img src="{{ asset('uploads/metal_frames/metal-prints-square_2.jpg') }}" alt="" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/metal_frames/metal-prints-square-size_2.jpg') }}" alt="" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/metal_frames/metal-prints-finishing_4.jpg') }}" alt="" />
                        </div>
                        
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/metal_frames/metal-prints-hardware-options_3.jpg') }}" alt="" />
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/metal_frames/metal-prints-thickness_4.jpg') }}" alt="" />
                        </div>

                        {{-- @if ($product->product_images)
                            @foreach ($product->product_images as $key => $productImage)
                                <div class="carousel-item {{ ($key == 0) ? 'active' : ' ' }}">
                                    <img class="w-100 h-100" src="{{ asset('uploads/product/large/'.$productImage->image) }}" alt="Image">
                                </div>
                            @endforeach
                        @endif --}}
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div> 
            </div>
            <div class="col-md-6 col-12">
                <h2 class="mb-4">Metal Frame</h2>

                <form method="POST" action="{{ route('frame.selection') }}">
                    @csrf
                    
                    <div class="groupDetails">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <p class="mt-3"><b>Metal Shapes:</b></p>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="size-picker">
                                    @foreach($shapes as $index => $value)
                                        <div class="size-picker__item" >
                                            <input type="radio" name="shape" value="{{ $value }}" {{ old('shape') == $value || ($index === 0 && !old('shape')) ? 'checked' : '' }} class="size-picker__input" id="metalShape_{{ $loop->index + 1 }}">
                                            <label class="size-picker__color" for="metalShape_{{ $loop->index + 1 }}" >{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="groupDetails">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <p class="mt-3"><b>Metal Sizes:</b></p>
                            </div>
                            <div class="col-md-9 col-12">
                                <div class="size-picker">
                                    @foreach($sizes as $index => $value)
                                        <div class="size-picker__item" >
                                            <input type="radio" name="size" value="{{ $value }}" {{ old('size') == $value || ($index === 0 && !old('size')) ? 'checked' : '' }}  class="size-picker__input" id="metalSize_{{ $loop->index + 1 }}">
                                            <label class="size-picker__color" for="metalSize_{{ $loop->index + 1 }}" >{{ $value }}</label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-2 col-12">
                                        <p class="mt-2"><b>Custom:</b></p>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <div class="twoDropdowns">
                                            <div class="itemDD">
                                                <select id="custom-size-1" name="custom_size_1">
                                                    @foreach($dropdown_1 as $index => $value)
                                                        <option value="{{ $value }}" {{ old('custom_size_1') == $value || ($index === 0 && !old('custom_size_1')) ? 'selected' : '' }} >{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="itemDD mt-2">X</div>                                            
                    
                                            <div class="itemDD">
                                                <select id="custom-size-2" name="custom_size_2" >
                                                    @foreach($dropdown_2 as $index => $value)
                                                        <option value="{{ $value }}" {{ old('custom_size_2') == $value || ($index === 0 && !old('custom_size_2')) ? 'selected' : '' }} >{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="customMetalFrame(event)" class="btn btn-primary right">Add to Cart</button>
                </form>

                <div class="row mt-5">
                    <div class="col-md-6 col-12">
                        <h4>₹<span id="total">{{ session('total', '0.00') }}</span></h4>
                        <p class="mt-3">-- No Risk, Lowest Prices Guaranteed --</p>
                    </div>
                    <div class="col-md-6 col-12">
                        <p class="mt-2">Exclusive Bulk Order Deal!</p>
                        <a href="{{ route('frame.front') }}" class="btn btn-secondary right">Create Frame</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection

<script>
    function customMetalFrame(event) {
        if (event) event.preventDefault(); // Prevent form submission if called on a button click

        let image = "{{ asset('uploads/metal_frames/metal-prints-square_2.jpg') }}";
        let price = $('#total').text();
        let metalShape = $('input[name="shape"]:checked').val();
        let metalSize = $('input[name="size"]:checked').val();
        let customSize1 = $('#custom-size-1').val();
        let customSize2 = $('#custom-size-2').val();

        // Override metalSize if a dropdown value is selected
        if (customSize1) {
            metalSize = customSize1;
        } else if (customSize2) {
            metalSize = customSize2;
        }

        // Ensure required values exist before making an AJAX call
        if (!metalShape || !metalSize) {
            alert("Please select a shape and size before adding to cart.");
            return;
        }
        
        $.ajax({
            url: "{{ route('cart.metalframe') }}",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                image: image,
                price: price,
                metalShape: metalShape,
                metalSize: metalSize,
                customSize1: customSize1,
                customSize2: customSize2,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = "{{ route('front.cart') }}";
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }


    document.addEventListener('DOMContentLoaded', function () {
        const shapeRadios = document.querySelectorAll('input[name="shape"]');
        const sizeRadios = document.querySelectorAll('input[name="size"]');
        const customSizeDropdown1 = document.getElementById('custom-size-1');
        const customSizeDropdown2 = document.getElementById('custom-size-2');
        const totalDisplay = document.getElementById('total');

        // Price mapping for dynamic total calculation
        const shapePrices = {
            'Square': 400.00,
            'Rectangle': 800.00,
            'Panoramic': 1600.00,
        };

        const sizePrices = {
            '8x8': 100.00,
            '10x10': 200.00,
            '12x12': 300.00,
            '16x16': 400.00,
            '20x20': 500.00,
            '24x24': 600.00,
        };

        const customSizePrices1 = {
            '8': 50.00,
            '9': 50.00,
            '10': 100.00,
            '11': 100.00,
            '12': 200.00,
            '13': 200.00,
            '14': 300.00,
            '15': 300.00,
            '16': 400.00,
            '17': 400.00,
            '18': 500.00,
            '19': 500.00,
            '20': 600.00,
            '21': 600.00,
            '22': 700.00,
            '23': 700.00,
            '24': 800.00,
            '25': 800.00,
            '26': 900.00,
            '27': 900.00,
            '28': 1000.00,
            '29': 1000.00,
            '30': 1100.00,
        };

        const customSizePrices2 = { ...customSizePrices1 };

        // Function to update total
        function updateTotal() {
            const selectedShape = [...shapeRadios].find(radio => radio.checked)?.value;
            const selectedSize = [...sizeRadios].find(radio => radio.checked)?.value;
            const selectedCustomSize1 = customSizeDropdown1.value;
            const selectedCustomSize2 = customSizeDropdown2.value;

            if (selectedShape && selectedSize && selectedCustomSize1 || selectedCustomSize2) {
                const shapePrice = shapePrices[selectedShape] || 0;
                const sizePrice = sizePrices[selectedSize] || 0;
                const customSizePrice1 = customSizePrices1[selectedCustomSize1] || 0;
                const customSizePrice2 = customSizePrices2[selectedCustomSize2] || 0;

                // Total calculation including custom size
                const totalPrice = shapePrice + sizePrice + customSizePrice1 + customSizePrice2;
                totalDisplay.textContent = totalPrice.toFixed(2);
            }
        }

        // Add event listeners to update total on selection change
        shapeRadios.forEach(radio => radio.addEventListener('change', updateTotal));
        sizeRadios.forEach(radio => radio.addEventListener('change', updateTotal));
        customSizeDropdown1.addEventListener('change', updateTotal);
        customSizeDropdown2.addEventListener('change', updateTotal);

        // Initial total calculation
        updateTotal();
    });
</script>