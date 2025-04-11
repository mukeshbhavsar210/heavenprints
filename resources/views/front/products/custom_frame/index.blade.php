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
		<div class="logoWrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-5 d-flex">
						<a href="{{ route('front.home') }}" class="mainLogo" title="{{ $settings->name }}">
							<img src="{{ asset('uploads/logo/'.$settings->image) }}" alt="" />
						</a>
					</div>

					<div class="col-md-9 col-7">
						<div class="pull-right rightLogin">
                            <div class="nameTotal">
                                <div class="d-flex">
                                    <div class="priceHover  mt-2">   
                                        <h4 type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            ₹<span id="finalPrice">
                                                @if(session()->has('finalPriceData') && isset(session('finalPriceData')['finalPrice']))
                                                    {{ number_format(session('finalPriceData')['finalPrice'], 2) }}
                                                @else
                                                    0.00
                                                @endif
                                                <input type="hidden" id="sessionPrice" value="{{ session('finalPriceData.finalPrice', 0) }}">
                                        </h4>

                                        {{-- ₹<span id="finalPrice">
                                            @php
                                                $finalPriceData = session('finalPriceData', []);
                                                $finalPrice = isset($finalPriceData['finalPrice']) ? $finalPriceData['finalPrice'] : 0;
                                            @endphp
                                            {{ number_format($finalPrice, 2) }}
                                        </span>
                                        <input type="hidden" id="sessionPrice" value="{{ $finalPrice }}"> --}}
                        
                                        <div class="breakups" aria-labelledby="dropdownMenuButton">    
                                            <div id="productDetails"></div>
                                            <div id="wrapDetails"></div>
                                            <div id="sizeDetails"></div>   
                                            <div id="materialDetails"></div>
                                            <div id="borderDetails"></div>    
                                            <div id="frameBorderDetails"></div>
                                            <div id="standardFrameDetails"></div>
                                            <div id="premiumFrameDetails"></div>
                                            <div id="hardwareStyleDetails"></div>
                                            <div id="displayOptionDetails"></div>
                                            <div id="displayLaminationDetails"></div>
                                            <div id="displayRetouchingDetails"></div>
                                            <div id="productDetails"></div>
                                            <div id="displayProofDetails"></div>
                                            <div id="colorFinishingBasicDetails"></div>
                                        </div>
                                    </div>

                                    <a class="btn btn-primary mt-1 hideMobile" href="javascript:void(0);" onclick="addToCartCustomize({{ $product->id }})">
                                        Add To Cart
                                    </a>                                    
    
                                    <a href="{{ route('front.cart') }}" class="ml-5 d-flex pt-2 relative hideMobile">
                                        <?xml version="1.0" encoding="utf-8"?>
                                        <svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.692 17.95C10.6909 18.5286 10.2212 18.9968 9.64268 18.996C9.06414 18.9953 8.59564 18.5259 8.59601 17.9474C8.59638 17.3688 9.06547 16.9 9.64401 16.9C9.92222 16.9003 10.1889 17.0111 10.3855 17.208C10.582 17.4049 10.6923 17.6718 10.692 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.281 17.95C16.2799 18.5286 15.8102 18.9968 15.2317 18.996C14.6531 18.9953 14.1846 18.5259 14.185 17.9474C14.1854 17.3688 14.6545 16.9 15.233 16.9C15.5112 16.9003 15.7779 17.0111 15.9745 17.208C16.171 17.4049 16.2813 17.6718 16.281 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1 7.80005H9.99303L9.29303 13.4C9.29303 14.1732 9.91983 14.8 10.693 14.8L18.5 14C18.9917 13.9998 19.4472 13.7417 19.7 13.32L21.3 9.92005C21.5593 9.48764 21.5661 8.9492 21.3177 8.51041C21.0694 8.07163 20.6042 7.80029 20.1 7.80005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M7.364 9.639C7.77821 9.639 8.114 9.30322 8.114 8.889C8.114 8.47479 7.77821 8.139 7.364 8.139V9.639ZM4.5 8.139C4.08579 8.139 3.75 8.47479 3.75 8.889C3.75 9.30322 4.08579 9.639 4.5 9.639V8.139ZM7.364 11.972C7.77821 11.972 8.114 11.6362 8.114 11.222C8.114 10.8078 7.77821 10.472 7.364 10.472V11.972ZM6.432 10.472C6.01779 10.472 5.682 10.8078 5.682 11.222C5.682 11.6362 6.01779 11.972 6.432 11.972V10.472ZM9.2653 7.98152C9.36555 8.38342 9.77262 8.62796 10.1745 8.52771C10.5764 8.42746 10.821 8.02038 10.7207 7.61848L9.2653 7.98152ZM9.324 5.118L10.0517 4.93648L10.0505 4.93171L9.324 5.118ZM9.171 5V5.75002L9.1754 5.74999L9.171 5ZM6.5 4.25C6.08579 4.25 5.75 4.58579 5.75 5C5.75 5.41422 6.08579 5.75 6.5 5.75V4.25ZM7.364 8.139H4.5V9.639H7.364V8.139ZM7.364 10.472H6.432V11.972H7.364V10.472ZM10.7207 7.61848L10.0517 4.93648L8.5963 5.29952L9.2653 7.98152L10.7207 7.61848ZM10.0505 4.93171C9.94713 4.52862 9.58273 4.24758 9.1666 4.25002L9.1754 5.74999C8.90333 5.75158 8.66508 5.56784 8.59751 5.3043L10.0505 4.93171ZM9.171 4.25H6.5V5.75H9.171V4.25Z" fill="#000000"/>
                                        </svg>
                                        <div class="cartCount">{{ Cart::count() }}</div>
                                    </a>
                                </div>  
                            </div>
							
                            <button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <?xml version="1.0" encoding="utf-8"?>
                                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.5 11.75C6.08579 11.75 5.75 12.0858 5.75 12.5C5.75 12.9142 6.08579 13.25 6.5 13.25V11.75ZM18.5 13.25C18.9142 13.25 19.25 12.9142 19.25 12.5C19.25 12.0858 18.9142 11.75 18.5 11.75V13.25ZM6.5 15.75C6.08579 15.75 5.75 16.0858 5.75 16.5C5.75 16.9142 6.08579 17.25 6.5 17.25V15.75ZM18.5 17.25C18.9142 17.25 19.25 16.9142 19.25 16.5C19.25 16.0858 18.9142 15.75 18.5 15.75V17.25ZM6.5 7.75C6.08579 7.75 5.75 8.08579 5.75 8.5C5.75 8.91421 6.08579 9.25 6.5 9.25V7.75ZM18.5 9.25C18.9142 9.25 19.25 8.91421 19.25 8.5C19.25 8.08579 18.9142 7.75 18.5 7.75V9.25ZM6.5 13.25H18.5V11.75H6.5V13.25ZM6.5 17.25H18.5V15.75H6.5V17.25ZM6.5 9.25H18.5V7.75H6.5V9.25Z" fill="#000000"/>
                                </svg>
                            </button>
									
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="page-header">
			<div class="container">
				<nav class="navbar navbar-expand-xl" id="navbar" >
					<div class="row">
						<div class="col-md-8 col-12">
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
																@if($category->slug == 'neon')
																	<a class="dropdown-item nav-link" href="{{ route('neon.products',[$category->slug,$subCategory->slug])}}">
																		<div class="nav_thumb"> 
																			<img src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
																			<p class="nav_name">{{ $subCategory->name }}</p>
																		</div>																	
																	</a>
																@else
																	<a class="dropdown-item nav-link" href="{{ route('front.shop',[$category->slug,$subCategory->slug])}}">
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
						<div class="col-md-4 col-12">
                            
						</div>
					</div>
				</nav>
			</div>
		</div>	
    </header>
    
<main class="customMain">
    <div class="container">
        <div class="row">                                           
            <div class="col-md-6 col-2 noPadMobile">                                 
                <div class="row">                                           
                    <div class="col-md-2 col-12 noPadMobile"> 
                        <div class="leftControl" id="left">                            
                            <ul class="nav nav-pills framesVerTabs" >
                                <li class="nav-item {{ $product->metal_type == 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_01" data-bs-toggle="pill" data-bs-target="#pills-products">
                                        <span class="icon icon_product_1"></span>
                                        Products                                       
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" onclick="toggleMenu(this)" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
                                        <span class="icon icon_product_2"></span>
                                        Upload
                                    </a>
                                </li>
                                <li class="nav-item {{ $product->metal_type == 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_03" data-bs-toggle="pill" data-bs-target="#pills-size">
                                        <span class="icon icon_product_3"></span>
                                        Select Size
                                    </a>
                                </li>
                                <li class="nav-item {{ $product->metal_type == 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_04" data-bs-toggle="pill" data-bs-target="#pills-border">
                                        <span class="icon icon_product_4"></span>
                                        Wrap & Border
                                    </a>
                                </li>
                                <li class="nav-item {{ $product->metal_type == 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_05" data-bs-toggle="pill" data-bs-target="#pills-hardware">
                                        <span class="icon icon_product_5"></span>
                                        Hardware & Finish
                                    </a>
                                </li>
                                <li class="nav-item {{ $product->metal_type == 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_06" data-bs-toggle="pill" data-bs-target="#pills-options">
                                        <span class="icon icon_product_6"></span>
                                        Options
                                    </a>
                                </li>
                                <li class="nav-item {{ $product->metal_type !== 'Others' ? 'd-none' : '' }}">
                                    <a class="nav-link" onclick="toggleMenu(this)" id="tab_07" data-bs-toggle="pill" data-bs-target="#product-options">
                                        <span class="icon icon_product_6"></span>
                                        Select Product
                                    </a>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                    <div class="col-md-10 col-9 noPad_left"> 
                        <aside>
                            <div class="rightControl">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade {{ $product->metal_type == 'Others' ? 'd-none' : '' }}" id="pills-products" role="tabpanel" aria-labelledby="tab_01">
                                        @include('front.products.custom_frame.01_tab')
                                    </div>
                                    <div class="tab-pane fade show active" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
                                        @include('front.products.custom_frame.02_tab')
                                    </div>
                                    <div class="tab-pane fade {{ $product->metal_type == 'Others' ? 'd-none' : '' }}" id="pills-size" role="tabpanel" aria-labelledby="tab_03">
                                        @include('front.products.custom_frame.03_tab') 
                                    </div>
                                    <div class="tab-pane fade {{ $product->metal_type == 'Others' ? 'd-none' : '' }}" id="pills-border" role="tabpanel" aria-labelledby="tab_04">
                                        <div class="paddWrapper">
                                            @include('front.products.custom_frame.04_tab')
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{ $product->metal_type == 'Others' ? 'd-none' : '' }}" id="pills-hardware" role="tabpanel" aria-labelledby="tab_05">
                                        <div class="paddWrapper">
                                            @include('front.products.custom_frame.05_tab')
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{ $product->metal_type == 'Others' ? 'd-none' : '' }}" id="pills-options" role="tabpanel" aria-labelledby="tab_06">
                                        <div class="paddWrapper">
                                            @include('front.products.custom_frame.06_tab')
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{ $product->metal_type !== 'Others' ? 'd-none' : '' }}" id="product-options" role="tabpanel" aria-labelledby="tab_07">
                                        <div class="paddWrapper">
                                            @include('front.products.custom_frame.07_tab')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>                           
                </div>                         
            </div>
                
            <div class="col-md-6 col-10">
                <nav class="frame_mobile_menu">
                    <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCartCustomize({{ $product->id }})">
                        Add To Cart
                    </a> 

                    <div class="toggle-wrap" onclick="toggleMenu(this)">
                        <span class="toggle-bar"></span>
                    </div>
                </nav>

                {{-- @if(!empty($finalPriceData))
                    <ul>
                        <li><strong>Size:</strong> {{ $finalPriceData['size'] }}</li>
                        <li><strong>Shape:</strong> {{ $finalPriceData['shape'] }}</li>
                        <li><strong>Custom Size 1:</strong> {{ $finalPriceData['custom_size_1'] }}</li>
                        <li><strong>Custom Size 2:</strong> {{ $finalPriceData['custom_size_2'] }}</li>
                    </ul>
                @else
                    <p>No session data found.</p>
                @endif --}}                            
               
                <div class="create-your-prints">                               
                    <div class="preview" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
                        <div id="image">          
                            <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />                                                    
                        </div>
                    </div>                               
                </div>
            </div>
        </div> 
    </div>        
</main>
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
        const shapeData = @json($shapeData);
       
        //Select Product
        const canvas_material_data = @json($canvas_material_data);
        const acrylic_material_data = @json($acrylic_material_data);
        const metal_material_data = @json($metal_material_data);
        const wood_material_data = @json($wood_material_data);
        const other_material_data = @json($other_material_data);
        const hardwareStyleData = @json($hardwareStyleData);
        const recommended_data = @json($recommended_data);
        const square_data = @json($square_data);
        const panaromic_data = @json($panaromic_data);
        const large_data = @json($large_data);
        const small_data = @json($small_data);
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

            // Update selected Product
            const selectedOption = document.querySelector('input[name="product"]:checked');
            if (selectedOption) {
                let selectedType = selectedOption.dataset.type;
                let selectedData = null;

                // Match the selection with the correct dataset
                if (selectedType === "Canvas") {
                    selectedData = canvas_material_data[selectedOption.value];
                } else if (selectedType === "Acrylic") {
                    selectedData = acrylic_material_data[selectedOption.value];
                } else if (selectedType === "Metal") {
                    selectedData = metal_material_data[selectedOption.value];
                } else if (selectedType === "Wood") {
                    selectedData = wood_material_data[selectedOption.value];
                } else if (selectedType === "Other") {
                    selectedData = other_material_data[selectedOption.value];
                }

                if (selectedData) {
                    finalPrice += selectedData.price || 0;
                    document.getElementById('materialDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/products/${selectedData.image}" alt="${selectedData.name}" width="60">
                            </div>
                            <div class="text">
                                <h6>Material</h6>
                                <p>${selectedData.name}</p>
                                <p class="price">₹${selectedData.price.toFixed(2)}</p>
                            </div>
                            <a href="#" class="icon-tick"><span></span></a>
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
                    document.getElementById('productDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/selection/${product.image}">                                
                            </div>
                            <div class="text">
                                <h6>Selected Product</h6>
                                <p>${product.name}</p>
                                <p class="price">₹${product.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>                         
                        </div>                                                
                    `;
                }
            }           


            //Product Size
            const selectedSizeOption = document.querySelector('input[name="size"]:checked');
                if (selectedSizeOption) {
                    let selectedSizeType = selectedSizeOption.dataset.type; 
                    let selectedSizeData = null;

                    // Match the selection with the correct dataset
                    if (selectedSizeType === "Recommended") {
                        selectedSizeData = recommended_data[selectedSizeOption.value];
                    } else if (selectedSizeType === "Square") {
                        selectedSizeData = square_data[selectedSizeOption.value];
                    } else if (selectedSizeType === "Panoramic") {
                        selectedSizeData = panaromic_data[selectedSizeOption.value];
                    } else if (selectedSizeType === "Large") {
                        selectedSizeData = large_data[selectedSizeOption.value];
                    } else if (selectedSizeType === "Small") {
                        selectedSizeData = small_data[selectedSizeOption.value];
                    }

                    if (selectedSizeData) {
                        finalPrice += selectedSizeData.price || 0;
                        document.getElementById('sizeDetails').innerHTML = `
                            <div class="breakup-details">
                                <div class="photo">
                                    <div class="object" style="background-color: #bbbbbb; margin-top:4px; height:${selectedSizeData.height}px;  width:${selectedSizeData.width}px"></div>
                                </div>
                                <div class="text">
                                    <h6>Size</h6>
                                    <p>${selectedSizeData.name}</p>
                                    <p class="price">₹${selectedSizeData.price.toFixed(2)}</p>                                    
                                </div>
                                 <a href="#" class="icon-tick"><span></span></a>
                            </div>                        
                        `;
                    }
                }

            
            
                // Update selected wrap
            const selectedWrap = document.querySelector('input[name="wrap"]:checked');
            if (selectedWrap) {
                let wrap = wrapData[selectedWrap.value];
                if (wrap) {
                    finalPrice += wrap.price || 0;
                    document.getElementById('wrapDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/wrap_borders/${wrap.image}" alt="${wrap.name}">
                            </div>
                            <div class="text">
                                <h6>Material</h6>
                                <p>${wrap.name}</p>
                                <p class="price">₹${wrap.price.toFixed(2)}</p>
                            </div>
                            <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/wrap_borders/${border.image}" alt="${border.name}">
                            </div>
                            <div class="text">
                                <h6>Material</h6>
                                <p>${border.name}</p>
                                <p class="price">₹${border.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
                        </div>                       
                    `;
                }
            }


            const selectedFrameBorder = document.querySelector('input[name="frame_border"]:checked');
            if (selectedFrameBorder) {
                let selectedFrameType = selectedFrameBorder.dataset.type; // Get the type (Standard or Premium)
                let selectedFrameData = null;

                // Match the selection with the correct dataset
                if (selectedFrameType === "Standard") {
                    selectedFrameData = standardFrame[selectedFrameBorder.value];
                } else if (selectedFrameType === "Premium") {
                    selectedFrameData = premiumFrame[selectedFrameBorder.value];
                } 

                if (selectedFrameData) {
                    finalPrice += selectedFrameData.price || 0;
                    document.getElementById('standardFrameDetails').innerHTML = `
                        <div class="breakup-details">
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/wrap_borders/frames/${selectedFrameData.image}" alt="${selectedFrameData.name}">
                            </div>
                            <div class="text">
                                <h6>Material</h6>
                                <p>${selectedFrameData.name}</p>
                                <p class="price">₹${selectedFrameData.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/hardware/option/${hardware.image}" alt="${hardware.name}">
                            </div>
                            <div class="text">
                                <h6>Material</h6>
                                <p>${hardware.name}</p>
                                <p class="price">₹${hardware.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="text">
                                <h6>Display</h6>
                                <p>${display.name}</p>
                                <p class="price">₹${display.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="text">
                                <h6>Lamination</h6>
                                <p>${lamination.name}</p>
                                <p class="price">₹${lamination.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="text">
                                <h6>Lamination</h6>
                                <p>${retouching.name}</p>
                                <p class="price">₹${retouching.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="text">
                                <h6>Proof Request</h6>
                                <p>I want proof</p>
                                <p class="price">₹${proof.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
                            <div class="photo">
                                <img class="picture_01" src="http://127.0.0.1:8000/uploads/icons/hardware/basic/${finishing.image}" alt="${finishing.name}">
                            </div>
                            <div class="text">
                                <h6>Color Finishing</h6>
                                <p>${finishing.name}</p>
                                <p class="price">₹${finishing.price.toFixed(2)}</p>
                            </div>
                             <a href="#" class="icon-tick"><span></span></a>
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
        let product_type = $('input[name="common"]:checked').data('type');
        let product_name = $('input[name="common"]:checked').data('name');
        let product_price = $('input[name="common"]:checked').data('price');
        let custom_name = $('input[name="product_selection"]:checked').data('name');
        let custom_image = $('input[name="product_selection"]:checked').data('image');
        let custom_price = $('input[name="product_selection"]:checked').data('price');
        let size_type = $('input[name="size"]:checked').data('type');
        let size_name = $('input[name="size"]:checked').data('name');
        let size_price = $('input[name="size"]:checked').data('price');
        let wrap_name = $('input[name="wrap"]:checked').data('name');
        let wrap_image = $('input[name="wrap"]:checked').data('image');
        let wrap_price = $('input[name="wrap"]:checked').data('price');
        let border_name = $('input[name="border"]:checked').data('name');
        let border_image = $('input[name="border"]:checked').data('image');
        let border_price = $('input[name="border"]:checked').data('price');
        let frame_name = $('input[name="frame_border"]:checked').data('name');
        let frame_image = $('input[name="frame_border"]:checked').data('image');
        let frame_price = $('input[name="frame_border"]:checked').data('price');
        let hardware_name = $('input[name="hardware_style"]:checked').data('name');
        let hardware_image = $('input[name="hardware_style"]:checked').data('image');
        let hardware_price = $('input[name="hardware_style"]:checked').data('price');
        let display_name = $('input[name="display_option"]:checked').data('name');        
        let display_price = $('input[name="display_option"]:checked').data('price');
        let lamination_name = $('input[name="lamination_option"]:checked').data('name');        
        let lamination_price = $('input[name="lamination_option"]:checked').data('price');
        let major = $('textarea[name="major"]').val().trim(); 
        
        let retouch_names = [];
        let retouch_prices = 0;

        $('input[name="retouching_option"]:checked').each(function() {
            retouch_names.push($(this).data('name')); // Collect all selected names
            retouch_prices += parseFloat($(this).data('price')) || 0; // Sum all selected prices
        });

        let proof_names = [];
        let proof_prices = 0;

        let selectedProof = $('input[name="proof"]:checked');

        if (selectedProof.length > 0) {
            proof_names.push(selectedProof.data('name')); // Get the selected name
            proof_prices = 49;
        }

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
                product_type: product_type,
                product_name: product_name,
                product_price: product_price,    
                custom_name: custom_name,
                custom_image: custom_image,
                custom_price: custom_price,
                size_type: size_type,
                size_name: size_name,
                size_price: size_price,                
                wrap_name: wrap_name,
                wrap_image: wrap_image,
                wrap_price: wrap_price,
                border_name: border_name,
                border_image: border_image,
                border_price: border_price,
                frame_name: frame_name,
                frame_image: frame_image,
                frame_price: frame_price,
                hardware_name: hardware_name,
                hardware_image: hardware_image,
                hardware_price: hardware_price,
                display_name: display_name,
                display_price: display_price,
                lamination_name: lamination_name,
                lamination_price: lamination_price,
                retouch_names: retouch_names,
                retouch_prices: retouch_prices,
                proof_names: proof_names,
                proof_prices: proof_prices,
                major: major,
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
        document.querySelector("#left").classList.toggle("active");
    }   

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