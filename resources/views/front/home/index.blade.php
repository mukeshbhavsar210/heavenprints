@extends('front.layouts.app')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp


    @if (getBanners()->isNotEmpty())
        <div id="homeBanner">
            @foreach (getBanners() as $key => $value)
                <div>
                    <div class="loader"></div>
                    <img class="w-100 h-100" data-lazy="{{ asset('uploads/banners/'.$value->image) }}" alt="">                  
                </div>
            @endforeach                    
        </div>
    @endif
    
<div class="container mobile-container">
    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Latest Products</h2>
            </div>
        </div>
        <div class="pb-3">
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
                                        <div class="loader"></div>
                                        <img class="card-img-top" data-lazy="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                    @else
                                        <img class="card-img-top" data-lazy="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                </a>

                                <div class="product-action">
                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)">
                                        <div id="heart-container">
                                            <input type="checkbox" id="toggle">
                                                <div id="twitter-heart"></div>
                                            </input>
                                        </div>
                                    </a>

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
                                
                                @if($product->metal_type == 'Others')
                                    <a href="{{ request()->root() }}/product/details/{{ $product->slug }}" class="btn btn-primary">Customize</a>
                                @else
                                <a href="{{ request()->root() }}/product/{{ $product->slug }}" class="btn btn-primary">Customize</a>
                                @endif 
                            </div>
                        </div>                            
                    @endforeach
                @endif                    
            </div>
        </div>        
    </section>
</div>  
@endsection