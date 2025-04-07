@extends('front.layouts.app')

@section('content')
    <section class="section-6 mt-3">
        <div class="container">
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Frames</li>
            </ol>

            @php
                use Illuminate\Support\Str;
            @endphp

            <h3 class="mb-4">Frame Products</h3>

            @if ($products->isNotEmpty())  
                <div class="customProducts">
                    @foreach ($products as $product)
                        @php
                            $productImage = $product->product_images->first();
                        @endphp                
                        <div>
                            <div class="product-image position-relative">     
                                <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                                    @if (!empty($productImage->image1))
                                        <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                    @else
                                        <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                </a>                        
                                <div class="product-action-home">
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
    
                            <div class="price mt-2">
                                <a class="product-title" href="{{ route('front.product',$product->slug) }}">{{ Str::limit($product->name, 16, '...') }}</a>                
                                <div class="product-price">
                                    <span>₹{{ $formattedPrice = number_format($product->price, 2, '.', ''); }}</span>
                                    @if ($product->compare_price > 0)
                                        <span class="h6 text-underline"><del>₹{{ $formattedPrice = number_format($product->compare_price, 2, '.', ''); }}</del></span>
                                    @endif
                                </div>
                            </div>   
                            
                            <a href="{{ route('customize.product',$product->slug) }}" class="btn btn-primary mt-1">View Product</a>
                        </div>
                    @endforeach
                </div>
            @endif 

            <div class="row">
                    <div class="col-md-12 pt-5">
                        {{ $products->withQueryString()->links() }}
                    </div> 
                </div>
            </div> 
        </div>
    </section>
@endsection

@section('customJs')
@endsection