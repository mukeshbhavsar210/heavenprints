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

	<header id="mainWrapper">		
		<div class="page-header">
			<div class="container">
				<nav class="navbar navbar-expand-xl" id="navbar" >
					<div class="row">
                        <div class="col-md-2 col-4 mt-3">
                            <a href="{{ route('front.home') }}"  title="{{ $settings->name }}">
                                <img src="{{ asset('uploads/logo/'.$settings->image) }}" alt="" />
                            </a>
                        </div>

						<div class="col-md-5 col-2">
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
						</div>

						<div class="col-md-5 col-6">
                            <div class="nameTotal">
                                <div class="d-flex">
                                    <div class="priceHover mt-2">                    
                                        <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            ₹<span id="finalPrice">
                                            @foreach ($firstTotals as $value)
                                                {{ $value->total }}
                                            @endforeach
                                        </h4>
                        
                                        <div class="breakups" aria-labelledby="dropdownMenuButton">    
                                            <div id="wrapDetails"></div>
                                            <div id="sizeDetails"></div>   
                                            <div id="materialDetails_01"></div>
                                            <div id="materialDetails_02"></div>
                                            <div id="materialDetails_03"></div>
                                            <div id="materialDetails_04"></div>
                                            <div id="materialDetails_05"></div>
                                            <div id="borderDetails"></div>    
                                            <div id="standardFrameDetails"></div>
                                            <div id="premiumFrameDetails"></div>
                                            <div id="hardwareStyleDetails"></div>
                                            <div id="displayOptionDetails"></div>
                                            <div id="displayLaminationDetails"></div>
                                            <div id="displayRetouchingDetails"></div>
                                            <div id="displayProductDetails"></div>
                                            <div id="displayProofDetails"></div>
                                            <div id="colorFinishingBasicDetails"></div>
    
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
    
                                    <a class="btn btn-primary mt-1" href="javascript:void(0);" onclick="addToCart_Metal({{ $product->id }})">Add To Cart</a>

                                    <button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <?xml version="1.0" encoding="utf-8"?>
                                        <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.5 11.75C6.08579 11.75 5.75 12.0858 5.75 12.5C5.75 12.9142 6.08579 13.25 6.5 13.25V11.75ZM18.5 13.25C18.9142 13.25 19.25 12.9142 19.25 12.5C19.25 12.0858 18.9142 11.75 18.5 11.75V13.25ZM6.5 15.75C6.08579 15.75 5.75 16.0858 5.75 16.5C5.75 16.9142 6.08579 17.25 6.5 17.25V15.75ZM18.5 17.25C18.9142 17.25 19.25 16.9142 19.25 16.5C19.25 16.0858 18.9142 15.75 18.5 15.75V17.25ZM6.5 7.75C6.08579 7.75 5.75 8.08579 5.75 8.5C5.75 8.91421 6.08579 9.25 6.5 9.25V7.75ZM18.5 9.25C18.9142 9.25 19.25 8.91421 19.25 8.5C19.25 8.08579 18.9142 7.75 18.5 7.75V9.25ZM6.5 13.25H18.5V11.75H6.5V13.25ZM6.5 17.25H18.5V15.75H6.5V17.25ZM6.5 9.25H18.5V7.75H6.5V9.25Z" fill="#000000"/>
                                        </svg>
                                    </button>
    
                                    <button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#searchWrapper" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <?xml version="1.0" encoding="utf-8"?>
                                        <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2"/>
                                        <path d="M14 14L16 16" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 11.5C15 13.433 13.433 15 11.5 15C9.567 15 8 13.433 8 11.5C8 9.567 9.567 8 11.5 8C13.433 8 15 9.567 15 11.5Z" stroke="#323232" stroke-width="2"/>
                                        </svg>
                                    </button>
    
                                    <a href="{{ route('front.cart') }}" class="ml-5 d-flex pt-2 relative">
                                        <?xml version="1.0" encoding="utf-8"?>
                                        <svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.692 17.95C10.6909 18.5286 10.2212 18.9968 9.64268 18.996C9.06414 18.9953 8.59564 18.5259 8.59601 17.9474C8.59638 17.3688 9.06547 16.9 9.64401 16.9C9.92222 16.9003 10.1889 17.0111 10.3855 17.208C10.582 17.4049 10.6923 17.6718 10.692 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.281 17.95C16.2799 18.5286 15.8102 18.9968 15.2317 18.996C14.6531 18.9953 14.1846 18.5259 14.185 17.9474C14.1854 17.3688 14.6545 16.9 15.233 16.9C15.5112 16.9003 15.7779 17.0111 15.9745 17.208C16.171 17.4049 16.2813 17.6718 16.281 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1 7.80005H9.99303L9.29303 13.4C9.29303 14.1732 9.91983 14.8 10.693 14.8L18.5 14C18.9917 13.9998 19.4472 13.7417 19.7 13.32L21.3 9.92005C21.5593 9.48764 21.5661 8.9492 21.3177 8.51041C21.0694 8.07163 20.6042 7.80029 20.1 7.80005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.364 9.639C7.77821 9.639 8.114 9.30322 8.114 8.889C8.114 8.47479 7.77821 8.139 7.364 8.139V9.639ZM4.5 8.139C4.08579 8.139 3.75 8.47479 3.75 8.889C3.75 9.30322 4.08579 9.639 4.5 9.639V8.139ZM7.364 11.972C7.77821 11.972 8.114 11.6362 8.114 11.222C8.114 10.8078 7.77821 10.472 7.364 10.472V11.972ZM6.432 10.472C6.01779 10.472 5.682 10.8078 5.682 11.222C5.682 11.6362 6.01779 11.972 6.432 11.972V10.472ZM9.2653 7.98152C9.36555 8.38342 9.77262 8.62796 10.1745 8.52771C10.5764 8.42746 10.821 8.02038 10.7207 7.61848L9.2653 7.98152ZM9.324 5.118L10.0517 4.93648L10.0505 4.93171L9.324 5.118ZM9.171 5V5.75002L9.1754 5.74999L9.171 5ZM6.5 4.25C6.08579 4.25 5.75 4.58579 5.75 5C5.75 5.41422 6.08579 5.75 6.5 5.75V4.25ZM7.364 8.139H4.5V9.639H7.364V8.139ZM7.364 10.472H6.432V11.972H7.364V10.472ZM10.7207 7.61848L10.0517 4.93648L8.5963 5.29952L9.2653 7.98152L10.7207 7.61848ZM10.0505 4.93171C9.94713 4.52862 9.58273 4.24758 9.1666 4.25002L9.1754 5.74999C8.90333 5.75158 8.66508 5.56784 8.59751 5.3043L10.0505 4.93171ZM9.171 4.25H6.5V5.75H9.171V4.25Z" fill="#000000"/>
                                        </svg>
                                        <div class="cartCount">{{ Cart::count() }}</div>
                                    </a>

                                    @if (Auth::check())
                                        <a href="{{ route('account.profile')}}" class="btn btn-secondary loginBtn mt-1">My Account</a>
                                    @else
                                        <a href="{{ route('account.login')}}" class="btn btn-secondary loginBtn mt-1">Login</a>
                                    @endif
                                </div>  
                            </div>
						</div>
					</div>
				</nav>
			</div>
		</div>
    </header>

    <div class="customizeFrames">
        <nav class="frame_mobile_menu">
            <div class="toggle-wrap" onclick="toggleMenu(this)">
                <span class="toggle-bar"></span>
            </div>
        </nav>

        <div class="row">                                           
            <div class="col-md-5">
                <aside>  
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
                </aside>         
            </div>
                
            <div class="col-md-7 col-12">
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
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>

<script>
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	
	//Add to cart
	function addToCart(id){
		let size = $("select[name='size']").val();
    	let color = $("select[name='color']").val();		
		
        $.ajax({
            url: '{{ route("front.addToCart") }}',
            type: 'post',
            data: {
				_token: '{{ csrf_token() }}', // Include CSRF token
				id: id,
				size: size,
				color: color,
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

    function addToWishlist(id){
        $.ajax({
            url: '{{ route("front.addToWishlist",) }}',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(response.status == true){
                    $("#wishlistModal .modal-body").html(response.message);
                    $("#wishlistModal").modal('show');
                } else {
                    window.location.href= "{{ route('account.login') }}";
                    //alert(response.message);
                }
            }
        })

		window.onscroll = function() {myFunction()};
		var navbar = document.getElementById("mainWrapper");
		var sticky = navbar.offsetTop;

		function myFunction() {
			if (window.pageYOffset >= sticky) {
				navbar.classList.add("sticky")
			} else {
				navbar.classList.remove("sticky");
			}
		}
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

@yield('customJs')


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
        const canvas_material_data = @json($canvas_material_data);
        const acrylic_material_data = @json($acrylic_material_data);
        const metal_material_data = @json($metal_material_data);
        const wood_material_data = @json($wood_material_data);
        const other_material_data = @json($other_material_data);
        const hardwareStyleData = @json($hardwareStyleData);
        const borderData = @json($borderData);
        const standardFrame = @json($standardFrame);
        const premiumFrame = @json($premiumFrame);        
        const displayOption = @json($displayOption);
        const retouchingOption = @json($retouchingOption);
        const proofOption = @json($proofOption);
        const laminationOption = @json($laminationOption);
        const colorFinishingBasic = @json($colorFinishingBasic);
        const productSelection = @json($productSelection);
        const wrapData = @json($wrapData);
                
        // const floatFrame = @json($floatFrame);
        
        let basePrice = parseFloat(document.getElementById('finalPrice').innerText) || 0;
        let finalPrice = basePrice;

        function updatePrice() {
            finalPrice = basePrice; // Reset price before recalculating
            
            // Update selected wrap
            const selectedWrap = document.querySelector('input[name="wrap"]:checked');
            if (selectedWrap) {
                let wrap = wrapData[selectedWrap.value];
                if (wrap) {
                    finalPrice += wrap.price || 0;
                    document.getElementById('wrapDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${wrap.name}</p>
                                <p class="red">₹${wrap.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
                    `;
                }
            }

            // Update selected Canvas material
            const selectedMaterial_01 = document.querySelector('input[name="canvas_material"]:checked');
            if (selectedMaterial_01) {
                let material_01 = canvas_material_data[selectedMaterial_01.value];
                if (material_01) {
                    finalPrice += material_01.price || 0;
                    document.getElementById('materialDetails_01').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${material_01.name}</p>
                                <p class="red">₹${material_01.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                        
                    `;
                }
            }

            // Update selected Canvas material
            const selectedMaterial_02 = document.querySelector('input[name="acrylic_material"]:checked');
            if (selectedMaterial_02) {
                let material_02 = acrylic_material_data[selectedMaterial_02.value];
                if (material_02) {
                    finalPrice += material_02.price || 0;
                    document.getElementById('materialDetails_02').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${material_02.name}</p>
                                <p class="red">₹${material_02.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                                                
                    `;
                }
            }

            // Update selected Metal material
            const selectedMaterial_03 = document.querySelector('input[name="metal_material"]:checked');
            if (selectedMaterial_03) {
                let material_03 = metal_material_data[selectedMaterial_03.value];
                if (material_03) {
                    finalPrice += material_03.price || 0;
                    document.getElementById('materialDetails_03').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${material_03.name}</p>
                                <p class="red">₹${material_03.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>  
                        
                    `;
                }
            }

            // Update selected Wood material
            const selectedMaterial_04 = document.querySelector('input[name="wood_material"]:checked');
            if (selectedMaterial_04) {
                let material_04 = wood_material_data[selectedMaterial_04.value];
                if (material_04) {
                    finalPrice += material_04.price || 0;
                    document.getElementById('materialDetails_03').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${material_04.name}</p>
                                <p class="red">₹${material_04.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>  
                        
                    `;
                }
            }

            // Update selected Wood material
            const selectedMaterial_05 = document.querySelector('input[name="other_material"]:checked');
            if (selectedMaterial_05) {
                let material_05 = other_material_data[selectedMaterial_05.value];
                if (material_05) {
                    finalPrice += material_05.price || 0;
                    document.getElementById('materialDetails_03').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${material_05.name}</p>
                                <p class="red">₹${material_05.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                          
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${size.name}</p>
                                <p class="red">₹${size.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
                    `;
                }
            }

            const selectedBorder = document.querySelector('input[name="border"]:checked');
            if (selectedBorder) {
                let border = borderData[selectedBorder.value];
                if (border) {
                    finalPrice += border.price || 0;
                    document.getElementById('borderDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${border.name}</p>
                                <p class="red">₹${border.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                       
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${frame.name}</p>
                                <p class="red">₹${frame.price.toFixed(2)}</p>
                                <img src="uploads/icons/hardware/option/${frame.image}" alt="${frame.name}" width="100">
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${frame.name}</p>
                                <p class="red">₹${frame.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                       
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${hardware.name}</p>
                                <p class="red">₹${hardware.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                       
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${display.name}</p>
                                <p class="red">₹${display.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
                    `;
                }
            }

            //Lamination Option
            const selectedLamination = document.querySelector('input[name="lamination_option"]:checked');
            if (selectedLamination) {
                let lamination = displayOption[selectedLamination.value];
                if (lamination) {
                    finalPrice += lamination.price || 0;
                    document.getElementById('displayLaminationDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${lamination.name}</p>
                                <p class="red">₹${lamination.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
                    `;
                }
            }

            //Retouching Option
            const selectedRetouching = document.querySelector('input[name="retouching_option"]:checked');
            if (selectedRetouching) {
                let retouching = retouchingOption[selectedRetouching.value];
                if (retouching) {
                    finalPrice += retouching.price || 0;
                    document.getElementById('displayRetouchingDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${retouching.name}</p>
                                <p class="red">₹${retouching.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
                    `;
                }
            }

            //Product selection
            const selectedProduct = document.querySelector('input[name="product_selection"]:checked');
            if (selectedProduct) {
                let product = productSelection[selectedProduct.value];
                if (product) {
                    finalPrice += product.price || 0;
                    document.getElementById('displayProductDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${product.name}</p>
                                <p class="red">₹${product.price.toFixed(2)}</p>
                                <img src="http://127.0.0.1:8000/uploads/icons/selection/${product.image}" alt="${product.name}" width="100">
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>                                                
                    `;
                }
            }

            //Proof Option
            const selectedProof = document.querySelector('input[name="proof"]:checked');
            if (selectedProof) {
                let proof = proofOption[selectedProof.value];
                if (proof) {
                    finalPrice += proof.price || 0;
                    document.getElementById('displayProofDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${proof.name}</p>
                                <p class="red">₹${proof.price.toFixed(2)}</p>
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
                        </div>
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
                        <div class="breakup-details">
                            <div class="icon-tick"></div>
                            <div class="text">
                                <p>${finishing.name}</p>
                                <p class="red">₹${finishing.price.toFixed(2)}</p>
                                <img src="/images/${finishing.image}" alt="${finishing.name}" width="100">
                            </div>
                            <a class="icon-edit" id="resetButton"></a>
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

</body>
</html>