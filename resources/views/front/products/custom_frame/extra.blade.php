@extends('front.layouts.app')

@section('content')
<section class="section-6 mt-3">
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Shop</li>
        </ol>

        <div class="row">                                           
            <div class="col-md-5 col-12 ">
                <div class="slider-for productSlider heightFix">
                    <div class="image-container">
                        @php
                            $productImage = $product->product_images->first();
                        @endphp

                        @if($productSelection)
                            @foreach ($productSelection as $key => $value)
                                <img src="{{ asset('uploads/icons/selection/'.$value['image']) }}" alt="{{ $value['name'] }}" >
                            @endforeach
                        @endif
                   
                    <div class="zoom-box"></div>
                    </div>
                </div>
                <div class="slider-nav">
                    @if($productSelection)
                        @foreach ($productSelection as $key => $value)
                            <div class="col-md-3 col-6">     
                                <label class="custom-radio-wrap wrap_01" >
                                    <input type="radio" name="product_selection" value="{{ $key }}" data-image="{{ $value['image'] }}" data-name="{{ $value['name'] }}" data-price="{{ $value['price'] }}" class="frame-option" > 
                                    <div class="productImg">
                                        <img src="{{ asset('uploads/icons/selection/'.$value['image']) }}" alt="{{ $value['name'] }}" >
                                    </div>        
                                    <p>{{ $value['name'] }}</p>                                
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
                
            <div class="col-md-7 col-12">
                <h2 class="mb-2">{{ $product->name }}</h2>       
                <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    ₹<span id="finalPrice">
                        @if(session()->has('finalPriceData') && isset(session('finalPriceData')['finalPrice']))
                            {{ number_format(session('finalPriceData')['finalPrice'], 2) }}
                        @else
                            0.00
                        @endif
                        <input type="hidden" id="sessionPrice" value="{{ session('finalPriceData.finalPrice', 0) }}">
                </h4>

                <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">Add to Cart</a>

                <div id="productDetails"></div>
             
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image-upload-wrapper">
                                <div style="{{ !session('uploaded_image2') ? 'display:block;' : 'display:none;' }}">
                                    <div class="uploadPhoto">
                                        <div class="upload-control" class="dropzone" id="image2Dropzone">
                                            <input type="file" id="image2" accept="image/*">
                                            <div class="upload_logo">
                                                <span class="icon"></span>
                                                Upload an Image 2
                                                <p>Maximum upload size: 15MB per file</p>
                                            </div>
                                            <div id="progress-container2" class="mb-3" style="display:none; width: 100%; background: #ccc;">
                                                <div id="progress-bar2" style="width: 0%; height: 5px; border-radius:100px; background: green;"></div>
                                            </div>
                                            <button id="uploadBtn2" class="btn btn-primary">Upload</button>
                                            <button id="abortBtn2" class="btn btn-danger" style="display:none;">Abort</button>                    
                                        </div>
                                    </div>
                                </div>
                            
                                <p class="text-center mt-2 mb-3">File types accepted: PNG and JPG (Up to 15MB)</p>
                            
                                <div class="preview" id="imagePreview2" style="{{ session('uploaded_image2') ? 'display:block;' : 'display:none;' }}">
                                    @if (session('uploaded_image2'))
                                        <img id="previewImage2" src="{{ asset('uploads/custom_frames/' . session('uploaded_image2')) }}" style="display: block;" />
                                        <button class="btn btn-danger" id="deleteImage2"><i class="fa fa-times"></i></button>            
                                    @endif
                                </div> 
                            </div>  
                        </div>
                    </div>
                    </div>
                </div>

                <div class="preview" id="imagePreview2" style="{{ $image ? 'display:block;' : 'display:none;' }}">
                    <div id="frameDetails">
                        <div class="wrapBorder {{ session('selected_product.category_name') }}">
                            <div id="image">          
                                <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />                                                    
                            </div>                            
                        </div>
                    </div>
                </div>

                
                
            </div>
        </div> 
    </div>
</section>   
@endsection
    
<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
@yield('customJs')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  

    //Main Calculation
    document.addEventListener('DOMContentLoaded', function () {
        const productSelection = @json($productSelection);
                
        let basePrice = parseFloat(document.getElementById('finalPrice').innerText) || 0;
        let finalPrice = basePrice;

        function updatePrice() {
            finalPrice = basePrice; // Reset price before recalculating

            //Product selection
            const selectedProduct = document.querySelector('input[name="product_selection"]:checked');
            if (selectedProduct) {
                let product = productSelection[selectedProduct.value];
                if (product) {
                    finalPrice += product.price || 0;
                    document.getElementById('productDetails').innerHTML = `
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>${product.name}</h5>
                                </div>
                                <div class="card-body">
                                    <img class="picture" src="http://127.0.0.1:8000/uploads/icons/selection/${product.image}" alt="${product.name}" >                                                    
                                </div>
                                    <div class="card-footer">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Upload your image
                                    </button>
                                    </div>
                                </div>                                
                            </div>
                        </div>
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

        document.querySelectorAll('input[type="checkbox"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        // Set initial values on page load
        document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
    });


    function addToCartCustomize(id){
        let uploadedImageName = "{{ session('uploaded_image') }}";
		let image = uploadedImageName || 'No image found';
        let custom_name = $('input[name="product_selection"]:checked').data('name');
        let custom_image = $('input[name="product_selection"]:checked').data('image');
        let custom_price = $('input[name="product_selection"]:checked').data('price');

        //Comes price from Session or Calculations from customer
        let sessionPrice = $("#sessionPrice").val();
        let calculatedPrice = $("#finalPrice").text(); 
        let price = sessionPrice > 0 ? sessionPrice : calculatedPrice;        
        
        $.ajax({
            url: '{{ route("addToCart_customize") }}',
            type: 'post',
            data: {
				_token: '{{ csrf_token() }}',
				id: id,
                image: image,
                custom_name: custom_name,
                custom_image: custom_image,
                custom_price: custom_price,
                price: price 			
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

    function toggleMenu(e) {
        e.classList.toggle("active");
        document.querySelector("aside").classList.toggle("active");
    }   

    function checkSessionImage2() {
    $.ajax({
        url: "{{ route('check.image2') }}", 
        type: "GET",
        success: function (response) {
            if (response.image) {
                $("#previewImage2").attr("src", response.image).show();
                $("#imagePreview2").show();
                $("#deleteImage2").show();
                $("#uploadContainer2").hide();
            } else {
                $("#previewImage2").hide();
                $("#imagePreview2").hide();
                $("#deleteImage2").hide();
                $("#uploadContainer2").show();
            }
        }
    });
}

let xhr2;
$('#uploadBtn2').on('click', function () {
    let file = $('#image2')[0].files[0];
    if (!file) {
        alert("Please select an image!");
        return;
    }

    let formData = new FormData();
    formData.append('image2', file);

    $('#progress-container2').show();
    $('#progress-bar2').css('width', '0%');
    $('#abortBtn2').show();

    xhr2 = $.ajax({
        url: "{{ route('image.upload2') }}",
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
                    $('#progress-bar2').css('width', percent + '%');
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
            $('#abortBtn2').hide();
        },
        error: function () {
            alert("Upload failed!");
            $('#abortBtn2').hide();
        }
    });
});

$('#abortBtn2').on('click', function () {
    if (xhr2) {
        xhr2.abort();
        alert("Upload Aborted!");
        $('#progress-container2').hide();
        $('#abortBtn2').hide();
    }
});

// Delete Image 2
$("#deleteImage2").click(function () {
    $.ajax({
        url: "{{ route('delete.image2') }}",
        type: "POST",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        success: function () {
            $("#previewImage2").hide();
            $("#imagePreview2").hide();
            $("#deleteImage2").hide();
            location.reload();
        },
        error: function () {
            alert("Image deletion failed!");
        }
    });
});

checkSessionImage2();


document.addEventListener("DOMContentLoaded", () => {
    const imgContainer = document.querySelector(".image-container");
    const zoomBox = document.querySelector(".zoom-box");
    const expanded = document.querySelector(".expanded-view");
    const img = imgContainer.querySelector("img");

    // Hide zoom box and expanded view at first
    zoomBox.style.display = "none";
    expanded.style.display = "none";

    // Show zoom box on hover
    imgContainer.addEventListener("mouseenter", () => {
        zoomBox.style.display = "block";
        expanded.style.display = "block"; // Show expanded view
    });

    imgContainer.addEventListener("mousemove", (e) => {
        // Get mouse position
        const x = e.offsetX;
        const y = e.offsetY + window.scrollY; // Add scroll

        // Move zoom box
        zoomBox.style.transform = `translate(${x}px, ${y}px)`;

        // Update expanded view
        updateZoomView(x, y);
    });

    imgContainer.addEventListener("mouseleave", () => {
        zoomBox.style.display = "none"; 
        expanded.style.display = "none"; // Hide expanded view on mouse out
    });

    function updateZoomView(zoomX, zoomY) {
        const zoomScale = 2; // Adjust zoom level as needed
        const imgW = img.width * zoomScale;
        const imgH = img.height * zoomScale;

        expanded.style.backgroundSize = `${imgW}px ${imgH}px`;
        expanded.style.backgroundPosition = `-${zoomX * zoomScale}px -${zoomY * zoomScale}px`;
        expanded.style.backgroundImage = `url(${img.src})`;
    }
});

</script>
