@extends('front.layouts.app')

@section('content')
    {{-- If Print Main Category selected it will only show --}}
    @if($product->product_type == 'Metal')
        @include('front.products.metal_final')
    @else  
        <section class="section-5">
            <div class="container">           
                <ol class="breadcrumb primary-color">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">{{ $product->name }}</li>
                </ol>         
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="slider-for">
                            @if ($product->product_images)
                                @foreach ($product->product_images as $key => $productImage)
                                    @for ($i = 1; $i <= 5; $i++) 
                                        @php 
                                            $imageField = 'image' . $i; 
                                        @endphp
                                
                                        @if (!empty($productImage->$imageField)) 
                                            <div class="carousel-item {{ ($key == 0 && $i == 1) ? 'active' : '' }}">
                                                <img style="width: 450px" class="img-thumbnail" src="{{ asset('uploads/products/small/'.$productImage->$imageField) }}" alt="Image {{ $i }}">
                                            </div>
                                        @endif
                                    @endfor
                                @endforeach
                            @endif
                        </div>
                        <div class="slider-nav">
                            @if ($product->product_images)
                                @foreach ($product->product_images as $key => $productImage)
                                    @for ($i = 1; $i <= 5; $i++) 
                                        @php 
                                            $imageField = 'image' . $i; 
                                        @endphp
                                
                                        @if (!empty($productImage->$imageField)) 
                                            <div class="carousel-item {{ ($key == 0 && $i == 1) ? 'active' : '' }}">
                                                <img style="width: 80px;" class="img-thumbnail" src="{{ asset('uploads/products/small/'.$productImage->$imageField) }}" alt="Image {{ $i }}">
                                            </div>
                                        @endif
                                    @endfor
                                @endforeach
                            @endif
                        </div>
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

                        <div class="mt-2 mb-3">{!! $product->short_description !!}</div>
                            @if($product->product_type != 'Metal')
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
                                            <div class=" product-card">
                                                <div class="product-image position-relative">
                                                    <a href="" class="product-img">
                                                        @if (!empty($productImage->image))
                                                            <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image) }}" >
                                                        @else
                                                            <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                        @endif
                                                    </a>
                                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>
                                                </div>

                                                <div class="card-body text-center">
                                                    <a class="h6 link" href="">{{ $relProduct->name }}</a>
                                                    <div class="price mt-2 mb-3">
                                                        <span class="h5"><strong>₹{{ $relProduct->price }}</strong></span>
                                                        @if ($relProduct->compare_price > 0)
                                                            <span class="h6 text-underline"><del>₹{{ $relProduct->compare_price }}</del></span>
                                                        @endif
                                                    </div>
                                                                                        
                                                    @if ($relProduct->track_qty == 'Yes')
                                                        @if ($relProduct->qty > 0)
                                                            <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                                                Add To Cart
                                                            </a>
                                                        @else
                                                            <a class="btn btn-dark" href="javascript:void(0);">
                                                                Out of Stock
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a class="btn btn-dark" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                                            Add To Cart
                                                        </a>
                                                    @endif
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
    @endif        
@endsection

<script>
    window.onload = function() {
        sessionStorage.clear();
    };
    window.onload = function() {
        sessionStorage.removeItem('shape');
    };
</script>
