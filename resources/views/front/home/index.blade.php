@extends('front.layouts.app')

@section('content')

    @if (getBanners()->isNotEmpty())
        <div id="homeBanner">
            @foreach (getBanners() as $key => $value)
                <div>
                    <img class="w-100 h-100" src="{{ asset('uploads/banners/'.$value->image) }}" alt="Image">
                    <div class="container relative">
                        <div class="banner-details">
                            <h3>{{ $value->name }}</h3>
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach                    
        </div>
    @endif
    
<div class="container">
    <section class="section-3" >
        <div class="section-title">
            <h2>Categories</h2>
        </div>
        <div class="row pb-3">   
            @if($categories->isNotEmpty())
                @foreach ($categories as $value)
                <div class="col-md-3 col-6">
                    <div class="cat-card">
                        <div class="left">
                            <a href="{{ route('front.shop',[$value->slug_category])}}">
                                <div class="nav_thumb"> 
                                    <img src="{{ asset('uploads/category/'.$value->image) }}" alt="" />
                                </div>																	
                            </a>
                        </div>
                        <div class="right">
                            <div class="cat-data">
                                <h5 class="mb-1">{{ $value->name }}</h5>
                                <a href="{{ route('front.shop',[$value->slug_category])}}"><b>{{ $value->products_count }}</b> Products</a>
                            </div>
                        </div>
                    </div>
                </div>                   
                @endforeach                
            @endif                    
        </div>    
    </section>

    @if ($featuredProducts->isNotEmpty())
        <section class="section-4 mt-2">           
            <div class="section-title"><h2>Featured Products</h2></div>
            <div class="row pb-3">
                @foreach ($featuredProducts as $product)
                    @php
                        $productImage = $product->product_images->first();
                    @endphp
                    <div class="col-md-3 col-6">                           
                        <div class="product-image position-relative">

                            <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                                @if (!empty($productImage->image))
                                    <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image) }}" >
                                @else
                                    <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                @endif
                            </a>

                            <div class="product-action">
                                <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>

                                @if ($product->track_qty == 'Yes')
                                    @if ($product->qty > 0)
                                        <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                    @else
                                        <a class="btn btn-primary" href="javascript:void(0);">
                                            <i class="fa fa-shopping-cart"></i> Out of Stock
                                        </a>
                                    @endif
                                @else
                                <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="mt-2">
                            <a class="h5" href="{{ route('front.product',$product->slug) }}">{{ $product->name }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>₹ {{ $product->price }}</strong></span>
                                @if ($product->compare_price > 0)
                                    <span class="h6 text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                @endif
                            </div>
                        </div>                           
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if ($latestProducts->isNotEmpty())       
        <div class="section-title mt-3"><h2>Latest Products</h2></div>
            <div class="row">
                @foreach ($latestProducts as $product)
                    @php
                        $productImage = $product->product_images->first();
                    @endphp
                        <div class="col-md-3 col-6">
                            <div class="product-image position-relative">
                                <a href="" class="product-img">
                                    @if (!empty($productImage->image))
                                        <img class="card-img-top" src="{{ asset('uploads/product/small/'.$productImage->image) }}" >
                                    @else
                                        <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                </a>
                                <div class="product-action">
                                    
                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>

                                    @if ($product->track_qty == 'Yes')
                                        @if ($product->qty > 0)
                                            <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>
                                        @else
                                            <a class="btn btn-dark" href="javascript:void(0);">
                                                <i class="fa fa-shopping-cart"></i> Out of Stock
                                            </a>
                                        @endif
                                    @else
                                    <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2">
                                <a class="h5" href="{{ route('front.product',$product->slug) }}">{{ $product->name }}</a>
                                <div class="price mt-2">
                                    <p class="h5"><strong>₹ {{ $product->price }}</strong>
                                        @if ($product->compare_price > 0)
                                            <span class="h6 text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                    {{-- <div class="autoplay">
                        <div>
                            <div class="product-image position-relative">
                                <a href="" class="product-img">
                                    @if (!empty($productImage->image))
                                        <img class="card-img-top" src="{{ asset('uploads/product/small/'.$productImage->image) }}" >
                                    @else
                                        <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                </a>
                                <div class="product-action">
                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>
                                    @if ($product->track_qty == 'Yes')
                                        @if ($product->qty > 0)
                                            <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </a>
                                        @else
                                            <a class="btn btn-dark" href="javascript:void(0);">
                                                <i class="fa fa-shopping-cart"></i> Out of Stock
                                            </a>
                                        @endif
                                    @else
                                    <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </a>
                                    @endif

                                    @if($product->metal_type)
                                        <p class="selectedCategory">{{ $product->metal_type }}</p>
                                    @endif 
                                </div>
                            </div>
                            <div class="mt-3">
                                <a class="h5" href="{{ route('front.product',$product->slug) }}">{{ $product->name }}</a>
                                <div class="price mt-2">
                                    <p class="h5"><strong>₹ {{ $product->price }}</strong>
                                        @if ($product->compare_price > 0)
                                            <span class="h6 text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
        @endif
    </div>    
@endsection