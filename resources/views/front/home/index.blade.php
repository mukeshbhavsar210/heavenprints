@extends('front.layouts.app')

@section('content')

    @if (getBanners()->isNotEmpty())
        <div id="homeBanner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">                                
                @foreach (getBanners() as $key => $productImage)
                    <div class="carousel-item {{ ($key == 0) ? 'active' : ' ' }}">
                        <img class="w-100 h-100" src="{{ asset('uploads/banners/'.$productImage->image) }}" alt="Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
                <i class="fa fa-2x fa-angle-left text-dark"></i>
            </a>
            <a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
                <i class="fa fa-2x fa-angle-right text-dark"></i>
            </a>
        </div>
    @endif
    
    @if (getCategories()->isNotEmpty())
        <section class="section-3" style="margin-top: 30px;">
            <div class="container">
                <div class="section-title">
                    <h2>Categories</h2>
                </div>
                <div class="row pb-3">
                    @foreach (getCategories() as $category)
                        <div class="col-lg-3 col-6">
                            <div class="cat-card">
                                <div class="left">
                                    @if ($category->image != "")
                                        <img src="{{ asset('uploads/category/thumb/'.$category->image) }} " alt="" class="img-fluid">
                                    @endif
                                </div>
                                <div class="right">
                                    <div class="cat-data">
                                        <h2>{{$category->name}}</h2>
                                        <p>100 Products</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
   
    @if ($featuredProducts->isNotEmpty())
        <section class="section-4 pt-5">
            <div class="container">
                <div class="section-title"><h2>Featured Products</h2></div>
                <div class="row pb-3">
                    @foreach ($featuredProducts as $product)
                        @php
                            $productImage = $product->product_images->first();
                        @endphp
                        <div class="col-md-3 col-6">
                            <div class="card product-card">
                                <div class="product-image position-relative">
    
                                    <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                                        @if (!empty($productImage->image))
                                            <img class="card-img-top" src="{{ asset('uploads/product/small/'.$productImage->image) }}" >
                                        @else
                                            <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                        @endif
                                    </a>
    
                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>
    
                                    <div class="product-action">
                                        @if ($product->track_qty == 'Yes')
                                            @if ($product->qty > 0)
                                                <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </a>
                                            @else
                                                <a class="btn btn-dark" href="javascript:void(0);">
                                                    <i class="fa fa-shopping-cart"></i> Out of Stock
                                                </a>
                                            @endif
                                        @else
                                        <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $product->id }})">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body text-center mt-3">
                                    <a class="h6 link" href="product.php">{{ $product->title }}</a>
                                    <div class="price mt-2">
                                        <span class="h5"><strong>₹ {{ $product->price }}</strong></span>
                                        @if ($product->compare_price > 0)
                                            <span class="h6 text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

<div class="container">
    @if ($latestProducts->isNotEmpty())       
        <div class="section-title"><h2>Latest Products</h2></div>
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
