@extends('front.layouts.app')

@section('content')

<div class="customizeFrames">
    <div class="row">                   
        <div class="col-md-5">
            <div class="controls">
                <div class="leftControl">
                    <ul class="nav nav-pills framesVerTabs" >
                        <li class="nav-item">
                            <a class="nav-link" id="tab_01" data-bs-toggle="pill" data-bs-target="#pills-products">
                                <span class="icon icon_product_1"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ session('selected_product.category_name') == 'canvas' ? 'active' : '' }}" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
                                <span class="icon icon_product_2"></span>
                                Upload
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_03" data-bs-toggle="pill" data-bs-target="#pills-size">
                                <span class="icon icon_product_3"></span>
                                Select Size
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_04" data-bs-toggle="pill" data-bs-target="#pills-border">
                                <span class="icon icon_product_4"></span>
                                Wrap & Border
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_05" data-bs-toggle="pill" data-bs-target="#pills-hardware">
                                <span class="icon icon_product_5"></span>
                                Hardware & Finish
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_06" data-bs-toggle="pill" data-bs-target="#pills-options">
                                <span class="icon icon_product_6"></span>
                                Options
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="rightControl">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="pills-products" role="tabpanel" aria-labelledby="tab_01">
                            @include('front.products.custom_frame.01_tab')
                        </div>
                        <div class="tab-pane fade {{ session('selected_product.category_name') == 'canvas' ? 'show active' : '' }}" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
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

        <div class="col-md-7"> 

            <div class="container">
                <h2>Frame Summary</h2>
                <p><strong>Name:</strong> {{ $frame->name }}</p>
                <p><strong>Size:</strong> {{ $frame->size }}</p>
                <p><strong>Shape:</strong> {{ $frame->shape }}</p>
                <p><strong>Total Price:</strong> {{ $frame->total }}</p>
        
                <a href="{{ route('front.shop', $frame->product_id) }}" class="btn btn-success">Continue Shopping</a>
            </div>


            <h3>{{ $product->name }}</h3>
            <div class="frame-generate">
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
                                        <div class="wrapBorder {{ session('selected_product.category_name') }}">
                                            <div class="border">
                                                <div class="top-left"></div>
                                                <div class="top-right"></div>
                                                <div class="bottom-left"></div>
                                                <div class="bottom-right"></div>
                                                
                                                <div id="image">          
                                                    <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />                                                    
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


    <script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
    
        document.addEventListener("DOMContentLoaded", function() {
            function setupRadioGroup(groupName, targetClass) {
                const targetDivs = document.querySelectorAll(`.${targetClass}`);
    
                function toggleActive() {
                    document.querySelectorAll(`input[name="${groupName}"]`).forEach(radio => {
                        radio.addEventListener("change", function() {
                            if (this.checked) {
                                localStorage.setItem(groupName, this.value); // Store selection
                                targetDivs.forEach(div => div.classList.add("active"));
                            }
                        });
                    });
                }
    
                // Retain selection on refresh
                const savedValue = localStorage.getItem(groupName);
                if (savedValue) {
                    let selectedRadio = document.querySelector(`input[name="${groupName}"][value="${savedValue}"]`);
                    if (selectedRadio) {
                        selectedRadio.checked = true;
                        targetDivs.forEach(div => div.classList.add("active"));
                        targetDivs.forEach(div => div.classList.add("show"));
                    }
                }
    
                toggleActive();
            }
    
            // Apply function to both groups using class names
            setupRadioGroup("shape", "upload");
            setupRadioGroup("shape", "upload_right");
        });
           
        //Add to cart for METAL FRAME
        function addToCart_Metal(id){
            let size =  $('input[name="size"]:checked').val() + '_₹' + $('#sizePrice').text();
            let frame = $('input[name="frame"]:checked').val() + '_₹' + $('#framePrice').text() ;
            let uploadedImageName = "{{ session('uploaded_image') }}";
            let image = uploadedImageName || 'No image found';
            let wrap_wrap = $('input[name="wrap_wrap"]:checked').val() + '_₹' + $('#wrapWrapPrice').text();
            let major = $('#major').val();        
            let border = $('input[name="wrap_border"]:checked').val() + '_₹' + $('#wrapBorderPrice').text();
            let wrap_frame = $('input[name="wrap_frame"]:checked').val() + '_₹' + $('#wrapFramePrice').text();
            let hardware_style = $('input[name="hardware_style"]:checked').val() + '_₹' + $('#hardwareStylePrice').text();
            let hardware_display = $('input[name="hardware_display"]:checked').val() + '_₹' + $('#hardwareDisplayPrice').text();
            let lamination = $('input[name="lamination"]:checked').val() + '_₹' + $('#laminationPrice').text();
            let proof = $('input[name="proof"]:checked').val() + '_₹' + $('#proofPrice').text();
            let retouching = $('input[name="retouching"]:checked').val() + '_₹' + $('#retouchingPrice').text();
            let hardware_finishing = $('input[name="hardware_finishing"]:checked').val() + '_₹' + $('#retouchingPrice').text();
            let price = $('#grandTotal').text();
            
            $.ajax({
                url: '{{ route("front.addToCart_metal") }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token
                    id: id,
                    size: size, 
                    frame: frame, 
                    image: image, 
                    wrap_wrap: wrap_wrap,
                    major: major, 
                    border: border, 
                    wrap_frame: wrap_frame, hardware_style: hardware_style,
                    hardware_display: hardware_display, lamination: lamination, proof: proof, 
                    retouching: retouching, hardware_finishing: hardware_finishing, 
                    price: price,
                },
                dataType: 'json',
                success: function(response){
                    if(response.status == true){
                        window.location.href= "{{ route('front.cart') }}";
                    } else {
                        alert(response.message);
                    }
                }
            })
        }
    
        window.addEventListener("scroll", function() {
            let header = document.getElementById("mainWrapper");
            if (window.scrollY > 100) {
                header.classList.add("sticky-header");
            } else {
                header.classList.remove("sticky-header");
            }
        });
    
        //Main Calculation
        document.addEventListener('DOMContentLoaded', function () {
            const shapePrices = { 'Square': 100.00, 'Rectangle': 200.00, 'Panoramic': 300.00, 'Large': 400.00, 'Small': 500.00 };
            //let shapePrices = @json($shapePrices);
            let square = @json($square_data);
            let recommended = @json($recommended_data);
            let panaromic = @json($panaromic_data);
            let large = @json($large_data);
            let small = @json($small_data);
    
            //material
            let canvas = @json($canvas_data);
            let acrylic = @json($acrylic_data);
            let metal = @json($metal_data);
            let wood = @json($wood_data);
            let others = @json($others_data);
    
            //wrap
            let wrap = @json($wraps_data);
    
            const colorPrices = { 'Black': 100.00, 'White': 120.00, 'Blue': 150.00, 'Red': 180.00, 'Green': 200.00 }; // Color prices
            
            
            
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
    
                // **Get selected material price**
                // const selectedMaterial = document.querySelector('input[name="material"]:checked');
                // if (selectedMaterial) {
                //     finalPrice += materialPrices[selectedMaterial.value] || 0;
                // }
                
                // document.querySelectorAll('input[name="shape"]').forEach((radio) => {
                //     radio.addEventListener('change', function() {
                //         let selectedShape = document.querySelector('input[name="shape"]:checked');
    
                //         let finalPrice = 0; // Reset final price before calculating
    
                //         if (selectedShape) {
                //             finalPrice += parseFloat(shapePrices[selectedShape.value]) || 0;
                //         }
    
                //         document.getElementById('finalPrice').innerText = `$${finalPrice.toFixed(2)}`;
                //     });
                // });
    
    
                // Get selected size price
                const selectedSize = document.querySelector('input[name="size"]:checked');
                if (selectedSize) {
                    let allSizes = [...square, ...recommended, ...panaromic, ...large, ...small, ...canvas]; 
                    let sizeDetail = allSizes.find(size => size.name === selectedSize.value);
    
                    if (sizeDetail) {
                        finalPrice += sizeDetail.price;
                    }
                }
    
                // Get selected size price
                const selectedMaterial = document.querySelector('input[name="material"]:checked');
                if (selectedMaterial) {
                    let allMaterial = [...canvas, ...acrylic, ...metal, ...wood, ...others]; 
                    let materialDetail = allMaterial.find(material => material.name === selectedMaterial.value);
    
                    if (materialDetail) {
                        finalPrice += materialDetail.price;
                    }
                }
    
    
                // **Get selected color price**
                const selectedColor = document.querySelector('input[name="color"]:checked');
                if (selectedColor) {
                    finalPrice += colorPrices[selectedColor.value] || 0;
                }
    
    
                // const selectedWrap = document.querySelector('input[name="wrap"]:checked');
                // if (selectedWrap) {
                //     finalPrice += wrap[selectedWrap.value] || 0;
                // }
    
    
                // Get selected size price
                // const selectedWrap = document.querySelector('input[name="wrap"]:checked');
                // if (selectedWrap) {
                //     let allWrap = [...wrap, ]; 
                //     let wrapDetail = allWrap.find(wrap => wrap.name === selectedWrap.value);
    
                //     if (wrapDetail) {
                //         finalPrice += wrapDetail.price;
                //     }
                // }
    
                
    
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
                document.getElementById('finalPrice2').innerText = finalPrice.toFixed(2);
                document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
            }
    
            // **Attach event listeners**
            document.querySelectorAll('input[name="shape"]').forEach(input => {
                input.addEventListener('change', updatePrice);
            });
    
            document.querySelectorAll('input[name="size"]').forEach(input => {
                input.addEventListener('change', updatePrice);
            });
    
            document.querySelectorAll('input[name="material"]').forEach(input => {
                input.addEventListener('change', updatePrice);
            });
    
            document.querySelectorAll('input[name="color"]').forEach(input => {
                input.addEventListener('change', updatePrice);
            });
    
            document.querySelectorAll('input[name="wrap"]').forEach(input => {
                input.addEventListener('change', updatePrice);
            });
    
             // Add event listener for dropdown selection
            document.getElementById('customSizeSelect_01').addEventListener('change', updatePrice);
            document.getElementById('customSizeSelect_02').addEventListener('change', updatePrice);
    
            // Store calculated price in a hidden input to send via AJAX
            document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
            document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
        });
    
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
    
    $(".toggle-btn").click(function() {
        var id = $(this).data("id"); 
        var moreContent = $(".more-content-" + id);
        var button = $(".toggle-btn-" + id);
    
        if (moreContent.is(":visible")) {
            moreContent.hide();
            button.text("Show More");
        } else {
            moreContent.show();
            button.text("Show Less");
        }
    });
    
    
        document.addEventListener('DOMContentLoaded', function () {
            function updateCartPrice() {
                let rowId = document.getElementById('rowId').value; // Get row ID
                let qty = document.getElementById('qty').value; // Get quantity
                let newPrice = document.getElementById('finalPrice').innerText.trim(); // Get updated price
    
                fetch('/update-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        rowId: rowId,
                        qty: qty,
                        new_price: newPrice
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert('Cart updated successfully!');
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error updating cart:', error));
            }
    
            // Call updateCartPrice when final price updates
            document.getElementById('customSizeSelect').addEventListener('change', updateCartPrice);
        });
</script>

@endsection