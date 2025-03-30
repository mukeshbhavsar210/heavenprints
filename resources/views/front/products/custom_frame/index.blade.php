<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                            {{ $product->price }}
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
                    Custom 2: <span id="selected_custom_size2"></span>,
                    Price: </p>
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
    


    