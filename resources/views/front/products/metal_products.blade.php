<form action="{{ route('store.selection') }}" method="POST" >
    @csrf
    <input type="text" name="category_name" value="{{ $product->metal_type }}" style="display: none;">

    <input type="hidden" name="price" value="">
    <h4 class="mb-4">₹<span id="grandTotal">{{ session('grandTotal', '0.00') }}</span></h4>

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
                                <select id="custom-size-1" class="form-control" name="custom_size_1">
                                    @foreach($dropdown_1 as $index => $value)
                                        <option value="{{ $value }}" {{ old('custom_size_1') == $value || ($index === 0 && !old('custom_size_1')) ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="itemDD">
                                <select id="custom-size-2" class="form-control" name="custom_size_2" >
                                    @foreach($dropdown_2 as $index => $value)
                                        <option value="{{ $value }}" {{ old('custom_size_2') == $value || ($index === 0 && !old('custom_size_2')) ? 'selected' : '' }} >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Create Now</button>
                <p class="mt-5">No Risk, Lowest Prices Guaranteed <br />
                Exclusive Bulk Order Deal!</p>
            </div>
        </div>
    </div>
</form>

<script>
    function customMetalFrame(event) {
        if (event) event.preventDefault(); // Prevent form submission if called on a button click

        let image = "{{ asset('uploads/metal_frames/metal-prints-square_2.jpg') }}";
        let grandTotal = $('#grandTotal').text();
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
                grandTotal: grandTotal,
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
    const totalDisplay = document.getElementById('grandTotal');
    const priceInput = document.querySelector('input[name="price"]'); // Hidden input

    // Price mapping
    const shapePrices = { 'Square': 400.00, 'Rectangle': 800.00, 'Panoramic': 1600.00, 'Large': 2000.00, 'Small': 200.00, };
    const sizePrices = { '8x8': 100.00, '10x10': 200.00, '12x12': 300.00, '16x16': 400.00, '20x20': 500.00, '24x24': 600.00 };
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
            body: JSON.stringify({ grandTotal: totalPrice })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Stored in session:", data.grandTotal);
        })
        .catch(error => console.error("Error storing grandTotal:", error));
    }

    // Event listeners for real-time update
    [...shapeRadios, ...sizeRadios].forEach(radio => radio.addEventListener('change', updateTotal));
    customSizeDropdown1.addEventListener('change', updateTotal);
    customSizeDropdown2.addEventListener('change', updateTotal);

    // Initial call to update total when page loads
    updateTotal();
});
</script>