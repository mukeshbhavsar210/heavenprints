    <section class="section-5">
        <div class="container">           
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
                    
                    <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

                        {{-- Original: {{ $product->price }} <br /> --}}

                        <input type="hidden" name="price" value="{{ $product->price }} " id="price">
                        <h4 class="mb-4">₹<span id="grandTotal_first">{{ $product->price }} </span></h4>
                        <input type="hidden" name="category_name" id="category_name" value="{{ $product->metal_type }}">

                        <div class="groupDetails">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <p class="mt-3"><b>Metal Shapes:</b></p>
                                </div>
                                <div class="col-md-9 col-12">
                                    <div class="size-picker">
                                        @foreach($shapes as $index => $value)
                                            <div class="size-picker__item" >
                                                <input {{ $loop->first ? 'checked' : '' }} type="radio" name="shape" value="{{ $value }}" class="size-picker__input" id="metalShape_{{ $loop->index + 1 }}">
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
                                                <input {{ $loop->first ? 'checked' : '' }} type="radio" name="size" value="{{ $value }}" class="size-picker__input" id="metalSize_{{ $loop->index + 1 }}">
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
                                                    <select id="custom_size_1" class="form-control" name="custom_size_1">
                                                        @foreach($dropdown_1 as $index => $value)
                                                            <option value="{{ $value }}"  >{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="itemDD"> 
                                                    <p class="mt-1">X</p>
                                                </div>
                                                <div class="itemDD">
                                                    <select id="custom_size_2" class="form-control" name="custom_size_2" >
                                                        @foreach($dropdown_2 as $index => $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('custom.frame.product',$product->slug) }}" id="saveOptions" class="btn btn-primary mt-1">Create</a>
                                    
                                    <p class="mt-2">No Risk, Lowest Prices Guaranteed <br />
                                    Exclusive Bulk Order Deal!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $("#saveOptions").click(function (e) {
            e.preventDefault(); // Prevent default action (optional)

            let sizeRadios = document.querySelector('input[name="size"]:checked')?.value || "";
            let category_name = document.getElementById("category_name").value;
            let shapeRadios = document.querySelector('input[name="shape"]:checked')?.value || "";
            let customSizeDropdown1 = document.getElementById("custom_size_1").value;
            let customSizeDropdown2 = document.getElementById("custom_size_2").value;
            let priceInput = document.getElementById("price").value;
            
            $.ajax({
                url: "{{ route('save.session') }}", // Define a route to store session data
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: "{{ $product->id }}", // Example data to store
                    sizeRadios: sizeRadios,
                    category_name: category_name,
                    shapeRadios: shapeRadios,
                    customSizeDropdown1: customSizeDropdown1,
                    customSizeDropdown2: customSizeDropdown2,
                    priceInput: priceInput
                },
                success: function (response) {
                    console.log("Session data saved:", response);
                    window.location.href = "{{ route('custom.frame.product', $product->slug) }}"; // Redirect after saving
                },
                error: function (xhr) {
                    console.error("Error saving session data:", xhr);
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const shapeRadios = document.querySelectorAll('input[name="shape"]');
        const sizeRadios = document.querySelectorAll('input[name="size"]');
        const customSizeDropdown1 = document.getElementById('custom_size_1');
        const customSizeDropdown2 = document.getElementById('custom_size_2');
        const totalDisplay = document.getElementById('grandTotal_first');
        const priceInput = document.querySelector('input[name="price"]'); // Hidden input
    
        // Price mapping
        const shapePrices = { 'Square': 400.00, 'Rectangle': 800.00, 'Panoramic': 1600.00, 'Large': 2000.00, 'Small': 200.00, };
        const sizePrices = { '8" x 8"': 100.00, '10" x 10"': 200.00, '12x12': 300.00, '16x16': 400.00, '20x20': 500.00, '24x24': 600.00 };
        const customSizePrices1 = { '8': 50.00, '10': 100.00, '12': 200.00, '14': 300.00, '16': 400.00, '18': 500.00, '20': 600.00 };
        const customSizePrices2 = { ...customSizePrices1 };
    
        function updateTotal() {
            const selectedShape = [...shapeRadios].find(radio => radio.checked)?.value;
            const selectedSize = [...sizeRadios].find(radio => radio.checked)?.value;
            const selectedCustomSize1 = customSizeDropdown1.value;
            const selectedCustomSize2 = customSizeDropdown2.value;
    
            let totalPrice = 0;
            if (selectedShape) totalPrice += shapePrices[selectedShape] || 0;
            if (selectedSize) totalPrice += sizePrices[selectedSize] || 0;
            if (selectedCustomSize1) totalPrice += customSizePrices1[selectedCustomSize1] || 0;
            if (selectedCustomSize2) totalPrice += customSizePrices2[selectedCustomSize2] || 0;
    
            // Update UI
            totalDisplay.textContent = totalPrice.toFixed(2);
            priceInput.value = totalPrice.toFixed(2); // Store in hidden input
    
            // Send updated total to Laravel session via AJAX
            fetch("{{ route('store.total') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                body: JSON.stringify({ grandTotal_first: totalPrice })
            })
            .then(response => response.json())
            // .then(data => {
            //     console.log("Stored in session:", data.grandTotal_first);
            // })
            .catch(error => console.error("Error storing grandTotal_first:", error));
        }
    
        // Event listeners for real-time update
        [...shapeRadios, ...sizeRadios].forEach(radio => radio.addEventListener('change', updateTotal));
        customSizeDropdown1.addEventListener('change', updateTotal);
        customSizeDropdown2.addEventListener('change', updateTotal);
    
        // Initial call to update total when page loads
        updateTotal();
    });
</script>