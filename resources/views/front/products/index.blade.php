@extends('front.layouts.app')

@section('content')

    <section class="section-5">
        <div class="container">           
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item">{{ $product->name }}</li>
            </ol>

            {{-- @if ($products->isNotEmpty())
                @foreach($products as $product)
                    @php
                        $productImage = $product->product_images->first();
                    @endphp
                        @if ($productImage)
                            @php
                                // Loop through all image fields (image1 to image5)
                                $images = ['image1', 'image2', 'image3', 'image4', 'image5'];
                                $foundImage = false;
                            @endphp
                            
                            @foreach ($images as $imageField)
                                @if (!empty($productImage->$imageField))
                                    <img src="{{ asset('uploads/products/small/' . $productImage->$imageField) }}" 
                                            class="img-thumbnail" width="75">
                                    @php $foundImage = true; @endphp
                                @endif
                            @endforeach
                            
                            @if (!$foundImage)
                                <img src="{{ asset('admin-assets/img/default-150x150.png') }}" 
                                        alt="No Image" class="img-thumbnail" width="75">
                            @endif
                        @else
                            <img src="{{ asset('admin-assets/img/default-150x150.png') }}" 
                                    alt="No Image" class="img-thumbnail" width="75">
                        @endif
                    @endforeach
                @endif --}}

            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="slider-for">
                        @if ($product->product_images)
                            @foreach ($product->product_images as $key => $productImage)
                                <img class="img-thumbnail" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" alt="Image">
                            @endforeach
                        @endif
                    </div>
                    <div class="slider-nav">
                        @if ($product->product_images)
                            @foreach ($product->product_images as $key => $productImage)
                                <img class="img-thumbnail" src="{{ asset('uploads/product/small/'.$productImage->image) }}" alt="Image">
                            @endforeach
                        @endif
                    </div>
                    {{-- <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner bg-light">                    
                            @if ($product->product_images)
                                @foreach ($product->product_images as $key => $productImage)
                                    <div class="carousel-item {{ ($key == 0) ? 'active' : ' ' }}">
                                        <img class="w-100 h-100" src="{{ asset('uploads/product/large/'.$productImage->image) }}" alt="Image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>                     --}}
                </div>

                <div class="col-md-7 col-12">
                    <h1>{{ $product->name }}</h1>

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

                    @if($product->category_name != 'Prints')
                        <h4>₹{{ $product->price }}
                            @if ($product->compare_price > 0)
                                <span class="price text-secondary"><del> ₹{{ $product->compare_price }}</del></span>
                            @endif
                        </h4>
                    @endif
                
                    <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

                    {{-- If Print Main Category selected it will only show --}}
                    @if($product->category_name == 'Prints')
                        @include('front.products.metal_products')
                    @endif

                    @if($product->category_name != 'Prints')
                        @if ($product->track_qty == 'Yes')
                            @if ($product->qty > 0)
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">ADD TO CART</a>
                            @else
                                <a class="btn btn-primary" href="javascript:void(0);">OUT OF STOCK</a>
                            @endif
                        @else
                            <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">ADD TO CART</a>
                        @endif

                        <div class="productDetailsTabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Shipping & Returns</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    {!! $product->description !!}
                                </div>
                                <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                    {!! $product->shipping_returns !!}
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>  
                    @endif
                    
                    @if (!empty($relatedProducts))
                        <section class="pt-5 section-8">                                    
                            <div class="section-title">
                                <h2>Related Products</h2>
                            </div>
                            
                            <div id="related-products" class="carousel">                                
                                @foreach ($relatedProducts as $relProduct)                                
                                @php
                                    $productImage = $relProduct->product_images->first();
                                @endphp
                                    <div class="card product-card">
                                        <div class="product-image position-relative">
                                            <a href="" class="product-img">
                                                @if (!empty($productImage->image))
                                                    <img class="card-img-top" src="{{ asset('uploads/product/small/'.$productImage->image) }}" >
                                                @else
                                                    <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                @endif
                                            </a>
                                            <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>
            
                                            <div class="product-action">
                                                @if ($relProduct->track_qty == 'Yes')
                                                    @if ($relProduct->qty > 0)
                                                        <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                                        </a>
                                                    @else
                                                        <a class="btn btn-dark" href="javascript:void(0);">
                                                            <i class="fa fa-shopping-cart"></i> Out of Stock
                                                        </a>
                                                    @endif
                                                @else
                                                <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body text-center mt-3">
                                            <a class="h6 link" href="">{{ $relProduct->title }}</a>
                                            <div class="price mt-2">
                                                <span class="h5"><strong>₹{{ $relProduct->price }}</strong></span>
                                                @if ($relProduct->compare_price > 0)
                                                    <span class="h6 text-underline"><del>₹{{ $relProduct->compare_price }}</del></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>    
                    @endif
                </div> 
            </div>
        </div>
    </section>
@endsection