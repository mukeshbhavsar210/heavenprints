@extends('front.layouts.app')

@section('content')

<div class="container" >
    <ol class="breadcrumb primary-color">
        <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
        <li class="breadcrumb-item">{{ $product->name }}</li>
    </ol>  

    <div class="row">
        <div class="col-md-5 col-12">
            <div class="slider-for heightFix">
                @if ($product->product_images)
                    @foreach ($product->product_images as $key => $productImage)
                        @for ($i = 1; $i <= 5; $i++) 
                            @php 
                                $imageField = 'image' . $i; 
                            @endphp
                    
                            @if (!empty($productImage->$imageField)) 
                                <div class="carousel-item {{ ($key == 0 && $i == 1) ? 'active' : '' }}">
                                    <img style="width: 450px" class="img-thumbnail" src="{{ asset('uploads/products/small/'.$productImage->$imageField) }}" alt="Image {{ $i }}">
                                </div>
                            @endif
                        @endfor
                    @endforeach
                @endif
            </div>
            <div class="slider-nav">
                @if ($product->product_images)
                    @foreach ($product->product_images as $key => $productImage)
                        @for ($i = 1; $i <= 5; $i++) 
                            @php 
                                $imageField = 'image' . $i; 
                            @endphp
                    
                            @if (!empty($productImage->$imageField)) 
                                <div class="carousel-item {{ ($key == 0 && $i == 1) ? 'active' : '' }}">
                                    <img style="width: 80px;" class="img-thumbnail" src="{{ asset('uploads/products/small/'.$productImage->$imageField) }}" alt="Image {{ $i }}">
                                </div>
                            @endif
                        @endfor
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-md-7 col-12">           
            <h1>{{ $product->name }}</h1>

            <div class="d-flex mt-3 mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(99 Reviews)</small>
            </div>

            <div class="priceHover mb-3">                    
                <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    ₹<span id="finalPrice">{{ $product->price }}</span>            
                </h4>

                <div class="breakups" aria-labelledby="dropdownMenuButton">
                    @if(session()->has('selected_product'))
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>Size:</p>
                                <p class="red">
                                    {{ session('selected_product.sizeRadios') }} 
                                    ₹<span id="sizePrice">0</span> 
                                </p>
                            </div>
                            <a class="icon-edit" href="{{ url()->previous() }}"></a>
                        {{-- 
                        ₹<span id="framePrice">0</span>
                        <span id="wrapWrapPrice">₹0</span>
                        <span id="wrapFramePrice">₹0</span>
                        <span id="hardwareStylePrice">₹0</span>
                        <span id="hardwareDisplayPrice">₹0</span>
                        <span id="hardwareFinishingPrice">₹0</span>
                        <span id="laminationPrice">₹0</span>
                        <span id="retouchingPrice">₹0</span>
                        <span id="proofPrice">₹0</span> 
                        <strong>Custom Size 1:</strong> {{ session('selected_product.custom_size_1') }}
                        <strong>Custom Size 2:</strong> {{ session('selected_product.custom_size_2') }}--}}
                        </div>
                    @else
                        <p>No product selected.</p>
                    @endif
                </div>
            </div>

            {{-- <h3>₹<span id="finalPrice">{{ $product->price }}</span></h3> --}}

            {{-- <h3>₹<span id="finalPrice2">{{ $product->price }}</span></h3> --}}
            {{-- <input type="text" id="finalPriceInput" name="final_price" value=""> --}}
            {{-- <input type="text" id="finalPriceInput" name="price" value="{{ $product->price }}"> --}}
            <input type="hidden" name="category_name" id="category_name" value="{{ $product->metal_type }}">
            <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

            <form action="{{ route('frame.total') }}" method="post">                        
                @csrf

                <div class="groupDetails">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <p class="mt-3"><b>Metal Shapes:</b></p>
                        </div>
                        <div class="col-md-9 col-12">
                            {{-- @foreach ($shapePrices as $shape => $price)
                                <label>
                                    <input type="radio" name="shape" value="{{ $shape }}" data-price="{{ $price }}">
                                    {{ $shape }} - ${{ number_format($price, 2) }}
                                </label><br>
                            @endforeach --}}
                        
                            <div class="size-picker">
                                @foreach($shapes as $index => $value)
                                    <div class="size-picker__item" >
                                        <input type="radio" name="shape" value="{{ $value }}" class="size-picker__input" id="metalShape_{{ $loop->index + 1 }}">
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
                                        <input type="radio" name="size" value="{{ $value }}" class="size-picker__input" id="metalSize_{{ $loop->index + 1 }}">
                                        <label class="size-picker__color" for="metalSize_{{ $loop->index + 1 }}" >{{ $value }}</label>
                                    </div>
                                @endforeach
                            </div>
            
                            <div class="row mt-4">
                                <div class="col-md-2 col-12">
                                    <p class="mt-2"><b>Custom:</b></p>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="twoDropdowns">
                                        <div class="itemDD">                                                   
                                            <select id="customSizeSelect_01" class="form-control" name="custom_size_1">
                                                @foreach($dropdown_1 as $index => $value)
                                                    <option value="{{ $value }}"  >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="itemDD"> 
                                            <p class="mt-1">X</p>
                                        </div>
                                        <div class="itemDD">
                                            <select id="customSizeSelect_02" class="form-control" name="custom_size_2" >
                                                @foreach($dropdown_2 as $index => $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="product_id" value="{{ $product->id }}">  
                            <input type="hidden" id="finalPriceInput" name="total" value="{{ $product->price }}">
                            <span style="display: none" id="finalPrice2" >{{ $product->price }}</span>                                                            
                            <input type="hidden" name="name" value="{{ $product->metal_type }}"> 
                            <button type="submit" class="btn btn-primary mb-4">Create Frame</button>
                        </form>

                        <p class="mt-2">No Risk, Lowest Prices Guaranteed <br />
                        Exclusive Bulk Order Deal!</p>
                    </div>  
                </div>
            </div>                
        </div>
    </div>
</div>            

<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

    //Main Calculation
    document.addEventListener('DOMContentLoaded', function () {
        const shapePrices = { 'Square': 100.00, 'Rectangle': 200.00, 'Panoramic': 300.00, 'Large': 400.00, 'Small': 500.00 };
        const sizePrices = { '8" x 8"': 100.00, '10" x 10"': 200.00, '12x12': 300.00, '16x16': 400.00, '20x20': 500.00, '24x24': 600.00 };
        const customSizePrices1 = { 8: 50.00, 10: 100.00, 12: 200.00, 14: 300.00, 16: 400.00, 18: 500.00, 20: 600.00 };
        const customSizePrices2 = { 8: 50.00, 10: 100.00, 12: 200.00, 14: 300.00, 16: 400.00, 18: 500.00, 20: 600.00 };

        //let basePrice = {{ $product->price }};
        let basePrice = parseFloat({{ $product->price }}); 
        let finalPrice = basePrice;

        function updatePrice() {
            finalPrice = basePrice; // Reset to base price before calculating

            // Get selected shape price
            const selectedShape = document.querySelector('input[name="shape"]:checked');
            if (selectedShape) {
                finalPrice += shapePrices[selectedShape.value] || 0;
            }

            const selectedSize = document.querySelector('input[name="size"]:checked');
            if (selectedSize) {
                finalPrice += sizePrices[selectedSize.value] || 0;
            }
            
            //Custom value 01
            const selectedCustomSize = parseInt(document.getElementById('customSizeSelect_01').value);
            if (selectedCustomSize && customSizePrices1[selectedCustomSize]) {
                finalPrice += customSizePrices1[selectedCustomSize];                
            } 

            //Custom value 01
            const selectedCustomSize_02 = parseInt(document.getElementById('customSizeSelect_02').value);
            if (selectedCustomSize_02 && customSizePrices1[selectedCustomSize_02]) {
                finalPrice += customSizePrices1[selectedCustomSize_02];                
            } 

            document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
            document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        }

        // **Attach event listeners**
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });
       
         // Add event listener for dropdown selection
        document.getElementById('customSizeSelect_01').addEventListener('change', updatePrice);
        document.getElementById('customSizeSelect_02').addEventListener('change', updatePrice);

        // Store calculated price in a hidden input to send via AJAX
        document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
    });   
       
	window.addEventListener("scroll", function() {
		let header = document.getElementById("mainWrapper");
		if (window.scrollY > 100) {
			header.classList.add("sticky-header");
		} else {
			header.classList.remove("sticky-header");
		}
	});
</script>

@endsection