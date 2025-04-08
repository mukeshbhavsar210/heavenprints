@extends('front.products.custom_frame.common')

@section('content')
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
                                        <a class="nav-link active" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
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
                                <div class="tab-pane fade show active" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
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
@endsection