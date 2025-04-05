@extends('front.layouts.app')

@section('content')

<div class="customizeFrames">
    <nav class="frame_mobile_menu">
        <div class="toggle-wrap" onclick="toggleMenu(this)">
            <span class="toggle-bar"></span>
        </div>
    </nav>

        <div class="row">                                           
            <div class="col-md-5">
                <div class="controls">                                         
                    <div class="leftControl">
                        <aside>  
                            <ul class="nav nav-pills framesVerTabs" >
                                <li class="nav-item">                               
                                    <a class="nav-link" id="tab_01" data-bs-toggle="pill" data-bs-target="#pills-products">
                                        <span class="icon icon_product_1"></span>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    @foreach ($firstTotals as $value)                                    
                                        <a class="nav-link {{ $value->name == $value->name ? 'active' : '' }}" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
                                            <span class="icon icon_product_2"></span>
                                            Upload
                                        </a>
                                    @endforeach                                
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
                        </aside>
                    </div>
                    
                    <div class="rightControl">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-products" role="tabpanel" aria-labelledby="tab_01">
                                @include('front.products.custom_frame.01_tab')
                            </div>
                            <div class="tab-pane fade {{ $value->name == $value->name ? 'show active' : '' }}" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
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
                <div class="nameTotal">
                    <div class="row">
                        <div class="col-md-8 col-6">
                            <h3>{{ $product->name }}</h3>
                            <h4 id="grandTotal">₹ {{ $product->price }}</h4>
                        </div>
                        <div class="col-md-4 col-6">
                            <div class="d-flex">
                                <div class="priceHover mt-2">                    
                                    <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        ₹<span id="finalPrice_not">
                                            @foreach ($firstTotals as $value)
                                                {{ $value->total }}
                                            @endforeach
                                        </h4>
                    
                                    <div class="breakups" aria-labelledby="dropdownMenuButton">
                                        @foreach ($firstTotals as $value)
                                            <div class="breakup-details">
                                                <div class="icon-tick"></div>
                                                <div class="text">
                                                    <p>Size:</p>
                                                    <p class="red">
                                                        {{ $value->size }}
                                                        ₹<span id="sizePrice">0</span> 
                                                    </p>
                                                </div>
                                                <a class="icon-edit" id="resetButton"></a>
                                            </div>

                                            <div class="breakup-details">
                                                <div class="icon-tick"></div>
                                                <div class="text">
                                                    <p>Shape:</p>
                                                    <p class="red">
                                                        {{ $value->shape }}
                                                        ₹<span id="sizePrice">0</span> 
                                                    </p>
                                                </div>
                                                <a class="icon-edit" id="resetButton"></a>
                                            </div>                                                
                                        @endforeach                                        
                                    </div>
                                </div>
    
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart_Metal({{ $product->id }})">Add To Cart</a>
                            </div>  
                        </div>
                    </div>
                </div>

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

    //Main Calculations
    document.addEventListener('DOMContentLoaded', function () {
        const size_1 = @json($recommended_data);
        const size_2 = @json($square_data);
        const size_3 = @json($panaromic_data);
        const size_4 = @json($large_data);
        const size_5 = @json($small_data);

        const materialData = @json($materialData);
        const wrapData = @json($wrapData);
        const borderData = @json($borderData);
        const standardFrame = @json($standardFrame);
        const premiumFrame = @json($premiumFrame);
        const floatFrame = @json($floatFrame);
        const hardwareStyleData = @json($hardwareStyleData);
        const displayOption = @json($displayOption);

        let basePrice = parseFloat(document.getElementById('finalPrice').innerText) || 0;
        let finalPrice = basePrice;

        function updatePrice() {
            let totalPrice = basePrice; // Start with base price

            // Loop through all radio groups and add selected value
            document.querySelectorAll('input[type="radio"]:checked').forEach(input => {
                let selectedValue = input.value;

                if (size_1[selectedValue]?.price) totalPrice += size_1[selectedValue].price;
                if (size_2[selectedValue]?.price) totalPrice += size_2[selectedValue].price;
                if (size_3[selectedValue]?.price) totalPrice += size_3[selectedValue].price;
                if (size_4[selectedValue]?.price) totalPrice += size_4[selectedValue].price;
                if (size_5[selectedValue]?.price) totalPrice += size_5[selectedValue].price;
                if (materialData[selectedValue]?.price) totalPrice += materialData[selectedValue].price;
                if (wrapData[selectedValue]?.price) totalPrice += wrapData[selectedValue].price;
                if (borderData[selectedValue]?.price) totalPrice += borderData[selectedValue].price;
                if (standardFrame[selectedValue]?.price) totalPrice += standardFrame[selectedValue].price;
                if (premiumFrame[selectedValue]?.price) totalPrice += premiumFrame[selectedValue].price;
                if (floatFrame[selectedValue]?.price) totalPrice += floatFrame[selectedValue].price;
                if (hardwareStyleData[selectedValue]?.price) totalPrice += hardwareStyleData[selectedValue].price;
                if (displayOption[selectedValue]?.price) totalPrice += displayOption[selectedValue].price;


                // if (size_1[selectedValue]) {
                //     totalPrice += size_1[selectedValue].price || 0;
                // }
                // if (size_2[selectedValue]) {
                //     totalPrice += size_2[selectedValue].price || 0;
                // }
                // if (size_3[selectedValue]) {
                //     totalPrice += size_3[selectedValue].price || 0;
                // }
                // if (size_4[selectedValue]) {
                //     totalPrice += size_4[selectedValue].price || 0;
                // }
                // if (size_5[selectedValue]) {
                //     totalPrice += size_5[selectedValue].price || 0;
                // }
                // if (materialData[selectedValue]) {
                //     totalPrice += materialData[selectedValue] || 0;
                // }
                // if (wrapData[selectedValue]) {
                //     totalPrice += wrapData[selectedValue].price || 0;
                // }
                // if (borderData[selectedValue]) {
                //     totalPrice += borderData[selectedValue].price || 0;
                // }
                // if (standardFrame[selectedValue]) {
                //     totalPrice += standardFrame[selectedValue].price || 0;
                // }
                // if (premiumFrame[selectedValue]) {
                //     totalPrice += premiumFrame[selectedValue].price || 0;
                // }
                // if (floatFrame[selectedValue]) {
                //     totalPrice += floatFrame[selectedValue].price || 0;
                // }
                // if (hardwareStyleData[selectedValue]) {
                //     totalPrice += hardwareStyleData[selectedValue].price || 0;
                // }
                // if (displayOption[selectedValue]) {
                //     totalPrice += displayOption[selectedValue].price || 0;
                // }
            });

            // Update the final price in HTML
            document.getElementById('finalPrice').innerText = totalPrice.toFixed(2);
        }

        // Add event listener to all radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        // Initialize price on page load
        updatePrice();
    });



    // document.addEventListener("DOMContentLoaded", function () {
    //     document.querySelectorAll('input[type="radio"]').forEach(radio => {
    //         let name = radio.name;
    //         let savedValue = localStorage.getItem(name);

    //         if (savedValue && radio.value === savedValue) {
    //             radio.checked = true;
    //         }

    //         radio.addEventListener("change", function () {
    //             localStorage.setItem(name, this.value);
    //         });
    //     });
    // });


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

    function toggleMenu(e) {
        e.classList.toggle("active");
        document.querySelector("aside").classList.toggle("active");
    }

    </script>
@endsection