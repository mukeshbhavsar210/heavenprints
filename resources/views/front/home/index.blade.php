@extends('front.layouts.app')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp


    @if (getBanners()->isNotEmpty())
        <div id="homeBanner">
            @foreach (getBanners() as $key => $value)
                <div>
                    <img class="w-100 h-100" src="{{ asset('uploads/banners/'.$value->image) }}" alt="Image">
                    {{-- <div class="container relative">
                        <div class="banner-details">
                            <h3>{{ $value->name }}</h3>
                            <p>{{ $value->description }}</p>
                        </div>
                    </div> --}}
                </div>
            @endforeach                    
        </div>
    @endif
    
<div class="container">
    {{-- <section class="section-3" >
        <div class="section-title">
            <h2>Categories</h2>
        </div>
        <div class="row pb-3">   
            @if (getCategories()->isNotEmpty())
                    @foreach (getCategories() as $category)
                        <div class="col-lg-3">
                            <div class="cat-card">
                                <div class="left">
                                    @if ($category->image != "")
                                        <img src="{{ asset('uploads/category/'.$category->image) }} " alt="" class="img-fluid">
                                    @endif
                                </div>
                                <div class="right">
                                    <div class="cat-data">
                                        <h2>{{$category->name}}</h2>
                                        <a href="{{ route('front.shop',[$value->slug])}}"><b>{{ $category->products_count }}</b> Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
        </div>    
    </section> --}}


    {{-- <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Featured Products</h2>
            </div>
            <div class="row pb-3">
                @if ($featuredProducts->isNotEmpty())
                    @foreach ($featuredProducts as $product)
                        @php
                            $productImage = $product->product_images->first();
                        @endphp
    
                        <div class="col-md-3">
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
                @endif
            </div>
        </div>
    </section> --}}
    
    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Latest Products</h2>
            </div>
            <div class="row pb-3">
                @if ($latestProducts->isNotEmpty())
                <div class="latestProducts">
                    @foreach ($latestProducts as $product)
                        @php
                            $productImage = $product->product_images->first();
                        @endphp
                            <div>
                                <div class="product-image position-relative">    
                                    <a href="" class="product-img">
                                        @if (!empty($productImage->image1))
                                            <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                        @else
                                            <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                        @endif
                                    </a>
    
                                    <div class="product-action">
                                        <a onclick="addToWishlist({{ $value->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>

                                        @if($product->metal_type)
                                            <span class="selectedCategory">{{ $product->metal_type }}</span>    
                                        @endif

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
                                <div class="mt-3">
                                    <h5 class="price-title">{{ Str::limit($product->name, 20, '...') }}</h5>
                                    <div class="product-price mt-1 mb-2">
                                        <span>₹ {{ $product->price }}</span>
                                        @if ($product->compare_price > 0)
                                            <span class="h6 text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                        @endif
                                    </div>

                                    @if($value->metal_type == 'Others')
                                        <a href="{{ route('front.shop',$product->slug) }}" class="btn btn-outline-primary">Customize</a>
                                    @else
                                        <a href="{{ route('front.product.details',$product->slug) }}" class="btn btn-outline-primary">Customize Product</a>
                                    @endif 
                                    
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>  
@endsection