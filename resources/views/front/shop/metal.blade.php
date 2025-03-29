@extends('front.layouts.app')

@section('content')
    <section class="section-6 mt-3">
        <div class="container">
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Metal Prints</li>
            </ol>

            @php
                use Illuminate\Support\Str;
            @endphp

            <div class="row">
                <div class="col-md-9">
                    <div class="row mb-3">
                        <div class="col-md-10 col-8"><h3>Metal Prints Products</h3></div>
                    </div>
                    <div class="row">  
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                @php
                                    $productImage = $product->product_images->first();
                                @endphp

                                <div class="col-md-4 col-12">
                                    <div class="product-image position-relative">
                                        <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                                            @if (!empty($productImage->image1))
                                                <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                            @else
                                                <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                            @endif
                                        </a>

                                        <div class="product-action">
                                            <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)">
                                                <i class="far fa-heart"></i>
                                            </a>
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
                                        <a href="{{ route('front.product',$product->slug) }}">
                                            <h5>{{ Str::limit($product->name, 30, '...') }}</h5>
                                        </a>

                                        <div class="price mt-2 mb-2">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5>₹ {{ $product->price }}
                                                        @if ($product->compare_price > 0)
                                                            <span class="text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                                        @endif
                                                    </h5>
                                                </div>
                                                <div class="col-4">
                                                                                        
                                                </div>
                                            </div>
                                        </div>
                                        
                                        {{-- if product related to Tshirt it will load below code --}}
                                        @if(!$product->metal_type || $product->metal_type == 't_shirt')
                                            <div class="row mt-3">
                                                <div class="col-md-6 col-6">
                                                    <div class="form-group">
                                                        <select name="size" id="size" class="form-control">
                                                            <option value="">Select Size</option>
                                                            <option value="Small" {{ old('size', $product->size ?? '') == 'Small' ? 'selected' : '' }}>Small</option>
                                                            <option value="Medium" {{ old('size', $product->size ?? '') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                                            <option value="Large" {{ old('size', $product->size ?? '') == 'Large' ? 'selected' : '' }}>Large</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-6">
                                                    <div class="form-group">
                                                        <select name="color" id="color" class="form-control">
                                                            <option value="">Select Color</option>
                                                            <option value="Red" {{ old('color', $product->color ?? '') == 'Red' ? 'selected' : '' }}>Red</option>
                                                            <option value="Blue" {{ old('color', $product->color ?? '') == 'Blue' ? 'selected' : '' }}>Blue</option>
                                                            <option value="Green" {{ old('color', $product->color ?? '') == 'Green' ? 'selected' : '' }}>Green</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                        @endif

                                        <a href="{{ route('front.product',$product->slug) }}" class="btn btn-primary mt-3">View Product</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif      
                    </div>  

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