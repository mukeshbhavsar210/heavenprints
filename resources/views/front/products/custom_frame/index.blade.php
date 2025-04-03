<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	@php
		$settings = \App\Models\Setting::first();
	@endphp

	<title>{{ $settings->business_line }}</title>
	<meta name="description" content="{{ $settings->description }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/ion.rangeSlider.min.css') }}" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
	<header >
		<div class="customFrameWrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-1 col-4">
						<a href="{{ route('front.home') }}" class="text-decoration-none" title="{{ $settings->name }}">
							<img src="{{ asset('uploads/logo/'.$settings->image) }}" alt="" />
						</a>
					</div>

                    <div class="col-md-8 col-1">  
                        <button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.5 11.75C6.08579 11.75 5.75 12.0858 5.75 12.5C5.75 12.9142 6.08579 13.25 6.5 13.25V11.75ZM18.5 13.25C18.9142 13.25 19.25 12.9142 19.25 12.5C19.25 12.0858 18.9142 11.75 18.5 11.75V13.25ZM6.5 15.75C6.08579 15.75 5.75 16.0858 5.75 16.5C5.75 16.9142 6.08579 17.25 6.5 17.25V15.75ZM18.5 17.25C18.9142 17.25 19.25 16.9142 19.25 16.5C19.25 16.0858 18.9142 15.75 18.5 15.75V17.25ZM6.5 7.75C6.08579 7.75 5.75 8.08579 5.75 8.5C5.75 8.91421 6.08579 9.25 6.5 9.25V7.75ZM18.5 9.25C18.9142 9.25 19.25 8.91421 19.25 8.5C19.25 8.08579 18.9142 7.75 18.5 7.75V9.25ZM6.5 13.25H18.5V11.75H6.5V13.25ZM6.5 17.25H18.5V15.75H6.5V17.25ZM6.5 9.25H18.5V7.75H6.5V9.25Z" fill="#000000"/>
                            </svg>
                        </button>

                         <h5>{{ $product->name }}</h5>
                        <nav class="navbar " id="navbar" >
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    @if (getCategories()->isNotEmpty())
                                        @foreach (getCategories() as $category )
                                            <li class="nav-item dropdown">
                                                <button class="btn dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ $category->name }}
                                                </button>
                                                @if ($category->sub_category->isNotEmpty())
                                                    <ul class="dropdown-menu dropdown-menu-dark">
                                                        @foreach ($category->sub_category as $subCategory)
                                                            <li>
                                                                @if($category->slug_category == 'neon')
                                                                    <a class="dropdown-item nav-link" href="{{ route('neon.products',[$category->slug_category,$subCategory->slug_sub_category])}}">
                                                                        <div class="nav_thumb"> 
                                                                            <img src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
                                                                            <p class="nav_name">{{ $subCategory->name }}</p>
                                                                        </div>																	
                                                                    </a>
                                                                @elseif($category->slug_category == 'frames')
                                                                    <a class="dropdown-item nav-link" href="{{ route('metal.products',[$category->slug_category,$subCategory->slug_sub_category])}}">
                                                                        <div class="nav_thumb"> 
                                                                            <img src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
                                                                            <p class="nav_name">{{ $subCategory->name }}</p>
                                                                        </div>																	
                                                                    </a>
                                                                @else	
                                                                    <a class="dropdown-item nav-link" href="{{ route('front.shop',[$category->slug_category,$subCategory->slug_sub_category])}}">
                                                                        <div class="nav_thumb"> 
                                                                            <img src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
                                                                            <p class="nav_name">{{ $subCategory->name }}</p>
                                                                        </div>																	
                                                                    </a>
                                                                @endif																
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </nav>      
                    </div>

					<div class="col-md-3 col-7">
                        <div class="row">
                            <div class="col-md-7 col-6">
                                {{-- ₹<span id="selectedPrice">{{ isset($selection['price']) ? $selection['price'] : '0' }}</span> --}}
                                
                                <div class="priceHover">
                                    <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: right">
                                        ₹<span id="grandTotal">{{ session('selected_product.price') }}</span>
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
                                                <div class="text">
                                                    <p>{{ session('selected_product.category_name') }} </p>
                                                    <p class="red">                                                        
                                                        ₹<span id="framePrice">0</span>
                                                    </p>
                                                </div>
                                            {{-- <span id="wrapWrapPrice">₹0</span>
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
                            </div>

                            <div class="col-md-5 col-6">
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart_Metal({{ $product->id }})">Add To Cart</a>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
</header>

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
            

            {{-- <div class="mt-5">
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
            </div> 

           --}}
            
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
                                        <div class="wrapBorder {{ session('frame_class', 'default-class') }}">
                                            <div class="border">
                                                <div class="top-left"></div>
                                                <div class="top-right"></div>
                                                <div class="bottom-left"></div>
                                                <div class="bottom-right"></div>
                                                
                                                <div id="image">          
                                                    <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />                                              
                                                    {{-- <img id="previewImage1" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}"  
                                                    style=" display: {{ session('uploaded_image') ? 'block' : 'none' }};" />--}}
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


<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>

<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
                retouching: retouching, hardware_finishing: hardware_finishing, price: price,
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
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>

</body>
</html>