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

            <h4 id="finalPrice">₹{{ $product->price }}</h4>

            {{-- <h3>₹<span id="finalPrice">{{ $product->price }}</span></h3> --}}

            {{-- <h3>₹<span id="finalPrice2">{{ $product->price }}</span></h3> --}}
            {{-- <input type="text" id="finalPriceInput" name="final_price" value=""> --}}
            {{-- <input type="text" id="finalPriceInput" name="price" value="{{ $product->price }}"> --}}
            
            <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

            <form action="{{ route('frame.total') }}" method="post">                        
                @csrf
                <input type="hidden" name="name" id="category_name" value="{{ $product->metal_type }}">
                
                <div class="groupDetails">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <p class="mt-3"><b>Metal Shapes:</b></p>
                        </div>
                        <div class="col-md-9 col-12">                        
                            <div class="size-picker">
                                @foreach($shapePrices as $shape => $price)
                                    <div class="size-picker__item" >
                                        <input type="radio" name="shape" value="{{ $shape }}"  class="size-picker__input" id="shape_{{ $loop->index + 1 }}">
                                        <label class="size-picker__color" for="shape_{{ $loop->index + 1 }}" >{{ $shape }}</label>
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
                                @foreach($sizePrices as $size => $price)
                                    <div class="size-picker__item" >
                                        <input type="radio" name="size" value="{{ $size }}" class="size-picker__input" id="size_{{ $loop->index + 1 }}">
                                        <label class="size-picker__color" for="size_{{ $loop->index + 1 }}" >{{ $size }}</label>
                                    </div>
                                @endforeach
                            </div>
            
                            <div class="row mt-4">
                                <div class="col-md-2 col-12">
                                    <p class="mt-2"><b>Custom:</b></p>
                                </div>
                                <div class="col-md-3 col-4">
                                    <div class="twoDropdowns">
                                        <div class="itemDD">                                                   
                                            <select id="customSizeSelect_01" class="form-control" name="custom_size_1">
                                                @foreach($customSizePrices1 as $value => $price)
                                                    <option value="{{ $value }}"  >{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="itemDD"> 
                                            <p class="mt-1">X</p>
                                        </div>
                                        <div class="itemDD">
                                            <select id="customSizeSelect_02" class="form-control" name="custom_size_2" >
                                                @foreach($customSizePrices2 as $value => $price)
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
                            <button type="submit" class="btn btn-primary mt-3 mb-3">Create Frame</button>
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
        const shapePrices = @json($shapePrices);
        const sizePrices = @json($sizePrices);
        const customSizePrices1 = @json($customSizePrices1);
        const customSizePrices2 = @json($customSizePrices2);

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