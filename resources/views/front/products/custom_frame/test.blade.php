@extends('front.layouts.app')

@section('content')

<div class="container-fluid" >
    <ol class="breadcrumb primary-color">
        <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
        <li class="breadcrumb-item">SECOND</li>
    </ol>  

    <div class="row">
        <div class="col-md-5 col-12">
            <h5 class="mt-1">Shape</h5>
                <div class="size-picker">
                    @foreach($shapes as $index => $value)
                        <div class="size-picker__item" >
                            <input type="radio" name="shape" value="{{ $value }}"  class="size-picker__input" id="shape_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="shape_{{ $loop->index + 1 }}" >{{ $value }}</label>
                        </div>
                    @endforeach
                </div> 
           
                <h5 class="mt-2">Size</h5>
                <div class="size-picker mt-2">
                    @foreach ($sizeData as $key => $size)
                        <div class="size-picker__item" >
                            <input type="radio" name="size" value="{{ $key }}" 
                                    data-price="{{ $size['price'] }}" class="size-picker__input" id="size_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="size_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2">Material</h5>
                <div class="size-picker mt-2">
                    @foreach ($materialData as $key => $size)
                        <div class="size-picker__item" >
                            <input type="radio" name="material" value="{{ $key }}" 
                                    data-price="{{ $size['price'] }}" class="size-picker__input" id="material_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="material_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2">Border</h5>
                <div class="size-picker mt-2">
                    @foreach ($borderData as $key => $border)
                        <div class="size-picker__item" >
                            <input type="radio" name="border" value="{{ $key }}" class="size-picker__input" id="border_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="border_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2"> Standard Frame</h5>
                <div class="size-picker mt-2">
                    @foreach ($standardFrame as $key => $frame)
                        <div class="size-picker__item" >
                            <input type="radio" name="standard_frame" value="{{ $key }}" class="size-picker__input" id="standardFrame_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="standardFrame_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2"> Premium Frame</h5>
                <div class="size-picker mt-2">
                    @foreach ($premiumFrame as $key => $frame)
                        <div class="size-picker__item" >
                            <input type="radio" name="premium_frame" value="{{ $key }}" class="size-picker__input" id="premiumFrame_{{ $loop->index + 1 }}">                              
                            <label class="size-picker__color" for="premiumFrame_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2">Hardware Style</h5>
                <div class="size-picker mt-2">
                    @foreach ($hardwareStyleData as $key => $hardware)
                        <div class="size-picker__item" >
                            <input type="radio" name="hardware_style" value="{{ $key }}" class="size-picker__input" id="hardwareStyle_{{ $loop->index + 1 }}">
                            <label class="size-picker__color" for="hardwareStyle_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

                <h5 class="mt-2">Display Option</h5>
                <div class="size-picker mt-2">
                    @foreach ($displayOption as $key => $option)
                        <div class="size-picker__item" >
                            <input type="radio" name="display_option" value="{{ $key }}" class="size-picker__input" id="displayOption_{{ $loop->index + 1 }}"> 
                            <label class="size-picker__color" for="displayOption_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>      
                
                <h5>Color Finishing</h5>
                <div class="size-picker mt-2">
                    @foreach ($colorFinishingBasic as $key => $option)
                        <div class="size-picker__item" >
                            <input type="radio" name="color_finishing_basic" value="{{ $key }}" class="size-picker__input" id="colorFinishingBasic_{{ $loop->index + 1 }}"> 
                            <label class="size-picker__color" for="colorFinishingBasic_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
                        </div>
                    @endforeach
                </div>

            </div>
            
        <div class="col-md-7 col-12">           
            <h2 id="finalPrice">₹{{ $product->price }}</h2>
            <div id="shapeDetails"></div>
            <div id="sizeDetails"></div>   
            <div id="materialDetails"></div>  
            <div id="borderDetails"></div>    
            <div id="standardFrameDetails"></div>
            <div id="premiumFrameDetails"></div>
            <div id="hardwareStyleDetails"></div>
            <div id="displayOptionDetails"></div>
            <div id="colorFinishingBasicDetails"></div>
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
        const shapeData = @json($shapeData);
        const sizeData = @json($sizeData);
        const materialData = @json($materialData);
        const borderData = @json($borderData);
        const standardFrame = @json($standardFrame);
        const premiumFrame = @json($premiumFrame);
        const displayOption = @json($displayOption);
        const colorFinishingBasic = @json($colorFinishingBasic);
        

        const size_1 = @json($recommended_data);
        const size_2 = @json($square_data);
        const size_3 = @json($panaromic_data);
        const size_4 = @json($large_data);
        const size_5 = @json($small_data);

        
        const wrapData = @json($wrapData);
        
        const floatFrame = @json($floatFrame);
        const hardwareStyleData = @json($hardwareStyleData);
        

        let basePrice = parseFloat({{ $product->price }}); 
        let finalPrice = basePrice;

        function updatePrice() {
            finalPrice = basePrice; // Reset price before recalculating
            
            // Update selected shape
            const selectedShape = document.querySelector('input[name="shape"]:checked');
            if (selectedShape) {
                let shape = shapeData[selectedShape.value];
                if (shape) {
                    finalPrice += shape.price || 0;
                    document.getElementById('shapeDetails').innerHTML = `
                        <h6>${shape.name}</h6>
                        <p>₹${shape.price.toFixed(2)}</p>
                    `;
                }
            }

            // Update selected shape
            const selectedMaterial = document.querySelector('input[name="material"]:checked');
            if (selectedMaterial) {
                let material = materialData[selectedMaterial.value];
                if (material) {
                    finalPrice += material.price || 0;
                    document.getElementById('materialDetails').innerHTML = `
                        <h6>${material.name}</h6>
                        <p>₹${material.price.toFixed(2)}</p>
                        
                    `;
                }
            }

            // Update selected size
            const selectedSize = document.querySelector('input[name="size"]:checked');
            if (selectedSize) {
                let size = sizeData[selectedSize.value];
                if (size) {
                    finalPrice += size.price || 0;
                    document.getElementById('sizeDetails').innerHTML = `
                        <h6>${size.name}</h6>
                        <p>Price: ₹${size.price.toFixed(2)}</p>
                        <p>Size: ${size.height} x ${size.width} inches</p>
                    `;
                }
            }

            const selectedBorder = document.querySelector('input[name="border"]:checked');
            if (selectedBorder) {
                let border = borderData[selectedBorder.value];
                if (border) {
                    finalPrice += border.price || 0;
                    document.getElementById('borderDetails').innerHTML = `
                        <h6>${border.name}</h6>
                        <p>₹${border.price.toFixed(2)}</p>                        
                    `;
                }
            }

            //Standard Frames
            const selectedFrame = document.querySelector('input[name="standard_frame"]:checked');
            if (selectedFrame) {
                let frame = standardFrame[selectedFrame.value];
                if (frame) {
                    finalPrice += frame.price || 0;
                    document.getElementById('standardFrameDetails').innerHTML = `
                        <h6>${frame.name}</h6>
                        <p>₹${frame.price.toFixed(2)}</p>
                        <img src="uploads/icons/hardware/option/${frame.image}" alt="${frame.name}" width="100">
                    `;
                }
            }

            //Premium Frames
            const selectedPremiumFrame = document.querySelector('input[name="premium_frame"]:checked');
            if (selectedPremiumFrame) {
                let frame = premiumFrame[selectedPremiumFrame.value];
                if (frame) {
                    finalPrice += frame.price || 0;
                    document.getElementById('premiumFrameDetails').innerHTML = `
                        <h6>${frame.name}</h6>
                        <p>₹${frame.price.toFixed(2)}</p>                        
                    `;
                }
            }

            //Hardware Style
            const selectedHardware = document.querySelector('input[name="hardware_style"]:checked');
            if (selectedHardware) {
                let hardware = hardwareStyleData[selectedHardware.value];
                if (hardware) {
                    finalPrice += hardware.price || 0;
                    document.getElementById('hardwareStyleDetails').innerHTML = `
                        <h6>${hardware.name}</h6>
                        <p>₹${hardware.price.toFixed(2)}</p>                        
                    `;
                }
            }

            //Display Option
            const selectedDisplay = document.querySelector('input[name="display_option"]:checked');
            if (selectedDisplay) {
                let display = displayOption[selectedDisplay.value];
                if (display) {
                    finalPrice += display.price || 0;
                    document.getElementById('displayOptionDetails').innerHTML = `
                        <h6>${display.name}</h6>
                        <p>₹${display.price.toFixed(2)}</p>
                    `;
                }
            }

            //Color finishing
            const selectedColorFinishing = document.querySelector('input[name="color_finishing_basic"]:checked');
            if (selectedColorFinishing) {
                let finishing = colorFinishingBasic[selectedColorFinishing.value];
                if (finishing) {
                    finalPrice += finishing.price || 0;
                    document.getElementById('colorFinishingBasicDetails').innerHTML = `
                        <h6>${finishing.name}</h6>
                        <p>Price: ₹${finishing.price.toFixed(2)}</p>
                        <img src="/images/${finishing.image}" alt="${finishing.name}" width="100">
                    `;
                }
            }



            // Update final price display
            document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
            document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        }

        // Attach event listeners to all radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        // Set initial values on page load
        document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
});
   
</script>

@endsection