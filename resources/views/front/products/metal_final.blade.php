<div id="oldDiv">
    <section class="section-5">
        <div class="container">           
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item">{{ $product->name }}</li>
            </ol>

            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="slider-for">
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
                    <p>{{ $product->metal_type }}</p>

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
                                        <div class="col-md-5 col-12">
                                            <div class="twoDropdowns">
                                                <div class="itemDD">                                                   
                                                    <select id="custom_size_1" class="form-control" name="custom_size_1">
                                                        @foreach($dropdown_1 as $index => $value)
                                                            <option value="{{ $value }}"  >{{ $value }}</option>
                                                        @endforeach
                                                    </select>
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
                                    
                                    <button type="submit" class="btn btn-primary mt-3" id="saveOptions">Create Now</button>
                                    
                                    <p class="mt-5">No Risk, Lowest Prices Guaranteed <br />
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

<div id="newDiv" style="display: none;">
    <div class="container-fluid">            
        <div class="customizeFrames">
            <div class="row">                   
                <div class="col-md-5 no-padd">
                    <div class="controls">
                        <div class="leftControl">
                            <ul class="nav nav-pills framesVerTabs" >
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab_01" data-bs-toggle="pill" data-bs-target="#pills-products">
                                        <span class="icon icon_product"></span>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
                                        <span class="icon icon_product"></span>
                                        Upload
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_03" data-bs-toggle="pill" data-bs-target="#pills-size">
                                        <span class="icon icon_size"></span>
                                        Select Size
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_04" data-bs-toggle="pill" data-bs-target="#pills-border">
                                        <span class="icon icon_wrap"></span>
                                        Wrap & Border
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_05" data-bs-toggle="pill" data-bs-target="#pills-hardware">
                                        <span class="icon icon_hardwae"></span>
                                        Hardware & Finish
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab_06" data-bs-toggle="pill" data-bs-target="#pills-options">
                                        <span class="icon icon_options"></span>
                                        Options
                                    </a>
                                </li>
                            </ul>
                        </div>
    
                        <div class="rightControl">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="tab_01">
                                    @include('front.products.custom_frame.01_tab')
                                </div>
                                <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
                                    @include('front.products.custom_frame.02_tab')
                                </div>
                                <div class="tab-pane fade" id="pills-size" role="tabpanel" aria-labelledby="tab_03">
                                    @include('front.products.custom_frame.03_tab') 
                                </div>
                                <div class="tab-pane fade" id="pills-border" role="tabpanel" aria-labelledby="tab_04">
                                    <div class="paddWrapper">
                                        @include('front.products.custom_frame.04_tab')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-hardware" role="tabpanel" aria-labelledby="tab_05">
                                    <div class="paddWrapper">
                                        @include('front.products.custom_frame.05_tab')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-options" role="tabpanel" aria-labelledby="tab_06">
                                    <div class="paddWrapper">
                                        @include('front.products.custom_frame.06_tab')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-7 no-padd"> 
                    <div class="calculation-main">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>{{ $product->name }}</h3>                                
                            </div> 
                            <div class="col-md-4">
                                ₹<span id="selectedPrice">{{ isset($selection['price']) ? $selection['price'] : '0' }}</span>
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart_Metal({{ $product->id }})">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                            </div> 
                        </div>
                        
                        <h3>₹<span id="grandTotal">{{ isset($selection['price']) ? $selection['price'] : '0' }}</span></h3>
                        
                        <button onclick="customFrame()" class="btn btn-primary btm-sm ml-3">Add to Cart</button>
                    </div>

                    <div class="frame-generate">
                        <p>Shape: <span id="selectedShape"></span>,
                            Size: <span id="selectedSize"></span>, 
                            Category: <span id="selectedCategory"></span>,    
                        Custom 1: <span id="selected_custom_size1"></span>,
                        Custom 2: <span id="selected_custom_size2"></span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Frame</th>
                                    <th>Size</th>
                                    <th>Wrap</th>
                                    <th>Frame</th>
                                    <th>Style</th>
                                    <th>Display</th>
                                    <th>Finishing</th>
                                    <th>Lamination</th>
                                    <th>Retouching</th>
                                    <th>Proof</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span id="framePrice">₹0</span></td>
                                    <td><span id="sizePrice">₹0 </span></td>
                                    <td><span id="wrapWrapPrice">₹0</span></td>
                                    <td><span id="wrapFramePrice">₹0</span></td>
                                    <td><span id="hardwareStylePrice">₹0</span></td>
                                    <td><span id="hardwareDisplayPrice">₹0</span></td>
                                    <td><span id="hardwareFinishingPrice">₹0</span></td>
                                    <td><span id="laminationPrice">₹0</span></td>
                                    <td><span id="retouchingPrice">₹0</span></td>
                                    <td><span id="proofPrice">₹0</span></td>
                                </tr>
                            </tbody>
                        </table>    
                        
                        {{-- <p><strong>Category:</strong> {{ $selection['category_name'] ?? '' }}, 
                            <strong>Size:</strong> {{ $selection['size'] ?? '' }},
                            <strong>Custom Size 1:</strong> {{ $selection['custom_size_1'] ?? '' }},
                            <strong>Custom Size 2:</strong> {{ $selection['custom_size_2'] ?? '' }}</p> --}}
                        
                        <div class="renderFrame">                
                            <div class="mainImg">
                                <div class="leftControl"></div>
                                <div class="create-your-prints">
                                    <div class="h-scale" style="margin-left: 20px; width: 380px;">
                                        <span id="scalewidth">10 inch</span>
                                    </div>
                                    <div class="v-scale" style="margin-top: 20px; height: 380px;">
                                        <span id="scalewidth">10 inch</span>
                                    </div>
                                    <div class="preview-img">
                                        <div class="preview" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
                                            <div id="frameDetails">
                                                <div class="wrapBorder {{ session('frame_class', 'default-class') }}">
                                                    <div class="border">
                                                        <div class="top-left"></div>
                                                        <div class="top-right"></div>
                                                        <div class="bottom-left"></div>
                                                        <div class="bottom-right"></div>
        
                                                        <div id="image">
                                                            <img id="previewImage1" src="{{ session('uploaded_image') ? asset('storage/' . session('uploaded_image')) : '' }}" 
                                                            style=" display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rightControl"></div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        const shapeRadios = document.querySelectorAll('input[name="shape"]');
        //Storing selected values in Session with first showing div
        document.getElementById("saveOptions").addEventListener("click", function() {
            let sizeRadios = document.querySelector('input[name="size"]:checked')?.value || "";
            let category_name = document.getElementById("category_name").value;
            let shapeRadios = document.querySelector('input[name="shape"]:checked')?.value || "";
            let customSizeDropdown1 = document.getElementById("custom_size_1").value;
            let customSizeDropdown2 = document.getElementById("custom_size_2").value;
            let priceInput = document.getElementById("price").value;
    
            fetch("{{ route('save.session') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ 
                    sizeRadios: sizeRadios, 
                    category_name: category_name,
                    shapeRadios: shapeRadios,
                    customSizeDropdown1: customSizeDropdown1,
                    customSizeDropdown2: customSizeDropdown2,
                    priceInput: priceInput
                 })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("oldDiv").style.display = "none";
                    document.getElementById("newDiv").style.display = "block";
    
                    document.getElementById("selectedSize").textContent = sizeRadios;
                    document.getElementById("selectedCategory").textContent = category_name;
                    document.getElementById("selectedShape").textContent = shapeRadios;
                    document.getElementById("selected_custom_size1").textContent = customSizeDropdown1;
                    document.getElementById("selected_custom_size2").textContent = customSizeDropdown2;
                    document.getElementById("selectedPrice").textContent = priceInput;
                }
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
    
    <script>
        $(document).ready(function () {
            $(".frame-option").change(function () {
                let parentLabel = $(this).closest("label");
                let frameName = $(this).val().toLowerCase();
                $(".wrapBorder").removeClass().addClass("wrapBorder " + frameName);
                $.ajax({
                    url: "/store-frame",
                    method: "POST",
                    data: {
                        frame_class: frameName,
                        _token: $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (response) {
                        console.log("Frame stored in session:", response);
                    }
                });
            });        
    
         // Update Options in Real Time
         $("input[type='radio']").change(function () {
            let formData = {
                _token: '{{ csrf_token() }}',
                frame: $("input[name='frame']:checked").val(),
                size: $("input[name='size']:checked").val(),
                wrap_wrap: $("input[name='wrap_wrap']:checked").val(),
                wrap_frame: $("input[name='wrap_frame']:checked").val(),
                hardware_style: $("input[name='hardware_style']:checked").val(),
                hardware_display: $("input[name='hardware_display']:checked").val(),
                hardware_finishing: $("input[name='hardware_finishing']:checked").val(),
                lamination: $("input[name='lamination']:checked").val(),
                retouching: $("input[name='retouching']:checked").val(),            
                proof: $("input[name='proof']:checked").val(),  
            };
    
            $.post("{{ route('update.options') }}", formData, function (response) {
                $("#framePrice").text(response.frame_price);
                $("#sizePrice").text(response.size_price);
                $("#wrapWrapPrice").text(response.wrap_wrap_price);
                $("#wrapFramePrice").text(response.wrap_frame_price);            
                $("#hardwareStylePrice").text(response.hardware_style_price);
                $("#hardwareDisplayPrice").text(response.hardware_display_price);
                $("#hardwareFinishingPrice").text(response.hardware_finishing_price);
                $("#laminationPrice").text(response.lamination_price);
                $("#retouchingPrice").text(response.retouching_price);
                $("#proofPrice").text(response.proof_price);
                
                // Calculate Grand Total
                let grandTotal =    parseInt(response.frame_price) + 
                                    parseInt(response.size_price) + 
                                    parseInt(response.wrap_wrap_price) +
                                    parseInt(response.wrap_frame_price) +
                                    parseInt(response.hardware_style_price) +
                                    parseInt(response.hardware_display_price) +
                                    parseInt(response.hardware_finishing_price) +
                                    parseInt(response.lamination_price) +
                                    parseInt(response.retouching_price) +
                                    parseInt(response.proof_price);
    
                // Update Grand Total
                $("#grandTotal").text(grandTotal);
            });
        });
    
        function checkSessionImage() {
            $.ajax({
                url: "{{ route('check.image') }}",
                type: "GET",
                success: function (response) {
                    if (response.image) {
                        $("#previewImage1").attr("src", response.image).show();
                        $("#imagePreview").show();
                        $("#deleteImage").show();
                        $("#uploadContainer").hide(); // Hide upload button if image exists
                    } else {
                        $("#previewImage1").hide();
                        $("#imagePreview").hide();
                        $("#deleteImage").hide();
                        $("#uploadContainer").show(); // Show upload button if no image
                    }
                }
            });
        }
    
        let xhr;
        $('#uploadBtn').on('click', function () {
            let file = $('#image')[0].files[0];
            if (!file) {
                alert("Please select an image!");
                return;
            }
    
            let formData = new FormData();
            formData.append('image', file);
    
            $('#progress-container').show();
            $('#progress-bar').css('width', '0%');
            $('#abortBtn').show();
    
            xhr = $.ajax({
                url: "{{ route('image.upload') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                xhr: function () {
                    let xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (event) {
                        if (event.lengthComputable) {
                            let percent = Math.round((event.loaded / event.total) * 100);
                            $('#progress-bar').css('width', percent + '%');
                        }
                    });
                    return xhr;
                },
                success: function (response) {
                    if (response.success) {
                        setTimeout(function() {
                            location.reload();
                        }, 100);
                    }
                    $('#abortBtn').hide();
                },
                error: function () {
                    alert("Upload failed!");
                    $('#abortBtn').hide();
                }
            });
        });
    
        $('#abortBtn').on('click', function () {
            if (xhr) {
                xhr.abort();
                alert("Upload Aborted!");
                $('#progress-container').hide();
                $('#abortBtn').hide();
            }
        }); 
    
        // Delete Image
        $("#deleteImage").click(function () {
            $.ajax({
                url: "{{ route('delete.image') }}",
                type: "POST",
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function () {
                    $("#previewImage1").hide();
                    $("#imagePreview").hide();
                    $("#deleteImage").hide();
                    location.reload();
                },
                error: function () {
                    alert("Image deletion failed!");
                }
            });
        });
        checkSessionImage();
    });
</script> 
