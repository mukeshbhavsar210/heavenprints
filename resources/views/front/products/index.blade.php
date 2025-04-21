@extends('front.layouts.app')

@section('content')       
<section>
    <div class="container" >
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item">{{ $product->name }}</li>
        </ol>  

        @php
            use Illuminate\Support\Str;
        @endphp

        <div class="row mt-4">
            <div class="col-md-5 col-12">
                <div class="slider-for heightFix" id='slideshow-items-container'>              
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
                <div id='lens'></div> 
                <div id='result'></div>
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

                <h4>₹<span id="finalPrice">{{ $product->price }}</span></h4> 
                (Rate: ₹{{ $product->per_inch }} x <span id="totalInches">0</span> inches = ₹<span id="subTotalInches">0</span>)
                <div class="mt-2 mb-3">{!! $product->short_description !!}</div>

                <form action="{{ route('store_total') }}" method="post" class="mt-3">                        
                    @csrf
                    <input type="hidden" name="name" id="category_name" value="{{ $product->metal_type }}">
                                     
                    <div class="row mt-4">
                        <div class="col-md-4 col-7">
                            <div class="twoDropdowns">
                                <div class="itemDD">
                                    <p class="mb-1">Height</p>
                                    <select id="customSizeSelect_01" class="form-select" name="custom_size_1">
                                        <option value="0">Select</option>
                                        @foreach($customSizePrices1 as $value => $item)                                                        
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="itemDD"> 
                                    <p style="margin-top: 30px;">X</p>
                                </div>
                                <div class="itemDD">
                                    <p class="mb-1">Width</p>
                                    <select id="customSizeSelect_02" class="form-select" name="custom_size_2" >
                                        <option value="0">Select</option>
                                        @foreach($customSizePrices1 as $value => $item)                                                        
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="row">
                        <div class="col-md-10 col-12">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">  
                            <input type="hidden" id="finalPriceInput" name="total" value="{{ $product->price }}">
                            <span style="display: none" id="finalPrice2" >{{ $product->price }}</span>                                                            
                            <input type="hidden" name="name" value="{{ $product->metal_type }}"> 
                            <button type="submit" class="btn btn-primary mt-3 mb-3 mr-4">Create Frame</button>
                        </form>

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
                    </div>  
                </div>
            </div>                
        </div>

            @if (!empty($relatedProducts))
                <section class="section-8">                                    
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>                    
                    <div class="latestProducts">
                        @foreach ($relatedProducts as $relProduct)                                
                        @php
                            $productImage = $relProduct->product_images->first();
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
                                <div class="product-action-home">
                                    <a onclick="addToWishlist({{ $product->id }})" class="whishlist" href="javascript:void(0)"><i class="far fa-heart"></i></a>
                                    @if ($relProduct->track_qty == 'Yes')
                                        @if ($relProduct->qty > 0)
                                            <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                                Add To Cart
                                            </a>
                                        @else
                                            <a class="btn btn-danger" href="javascript:void(0);">
                                                Out of Stock
                                            </a>
                                        @endif
                                    @else
                                        <a class="btn btn-primary" href="javascript:void(0);" onclick="addToCart({{ $relProduct->id }})">
                                            Add To Cart
                                        </a>
                                    @endif
                                </div>
                                </div>
                                <div class="mt-2">
                                <a class="h5" href="">{{ Str::limit($relProduct->name, 16, '...') }}</a>
                                <div class="price mt-1">
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
</section>       
@endsection

@section('customJs')
<script>
    //Main Calculation
    document.addEventListener('DOMContentLoaded', function () {
        const customSizePrices1 = @json($customSizePrices1);
        const customSizePrices2 = @json($customSizePrices1);

        let basePrice = parseFloat({{ $product->price }});
        let per_inch = parseFloat({{ $product->per_inch }});
        let finalPrice = basePrice;        

        function updatePrice() {      
            const selectedSize1 = parseInt(document.getElementById('customSizeSelect_01').value);
            const selectedSize2 = parseInt(document.getElementById('customSizeSelect_02').value);

            // Only proceed if both are selected
            if (!selectedSize1 || !selectedSize2) {
                return;
            }

            const width = customSizePrices1[selectedSize1] || 1;
            const height = customSizePrices2[selectedSize2] || 1;
            const area = width * height;

            finalPrice = basePrice + (per_inch * area);
            totalInches = area;
            subTotalInches = (per_inch * area);

            document.getElementById('totalInches').innerText = totalInches;
            document.getElementById('subTotalInches').innerText = subTotalInches.toFixed(2);
            document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
            document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        }

        // Add event listener for dropdown selection
        document.getElementById('customSizeSelect_01').addEventListener('change', updatePrice);
        document.getElementById('customSizeSelect_02').addEventListener('change', updatePrice);

        // Store calculated price in a hidden input to send via AJAX
        document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);

        updatePrice();
    });  
    
    

    //ZOOM OVER
    $(document).mousemove(function(e) {
            var x = e.clientX; var y = e.clientY;
            var x = e.clientX; var y = e.clientY;
            var imgx1 = $('.img-thumbnail').offset().left;
            var imgx2 = $('.img-thumbnail').outerWidth() + imgx1;
            var imgy1 = $('.img-thumbnail').offset().top;
            var imgy2 = $('.img-thumbnail').outerHeight() + imgy1;
            if ( x > imgx1 && x < imgx2 && y > imgy1 && y < imgy2 ) {
                $('#lens').show(); $('#result').show();
                imageZoom( $('.img-thumbnail'), $('#result'), $('#lens') );
            } else {
                $('#lens').hide(); $('#result').hide();
            }
        });

        function imageZoom( img, result, lens ) {
            result.width( img.innerWidth() ); result.height( img.innerHeight() );
            lens.width( img.innerWidth() / 2 ); lens.height( img.innerHeight() / 2 );
            result.offset({ top: img.offset().top, left: img.offset().left + img.outerWidth() + 10 });
            var cx = img.innerWidth() / lens.innerWidth(); var cy = img.innerHeight() / lens.innerHeight();

            result.css('backgroundImage', 'url(' + img.attr('src') + ')');
            result.css('backgroundSize', img.width() * cx + 'px ' + img.height() * cy + 'px');

            lens.mousemove(function(e) { moveLens(e); });
            img.mousemove(function(e) { moveLens(e); });
            lens.on('touchmove', function() { moveLens(); })
            img.on('touchmove', function() { moveLens(); })

            function moveLens(e) {
                var x = e.clientX - lens.outerWidth() / 2;
                var y = e.clientY - lens.outerHeight() / 2;
                if ( x > img.outerWidth() + img.offset().left - lens.outerWidth() ) { x = img.outerWidth() + img.offset().left - lens.outerWidth(); }
                if ( x < img.offset().left ) { x = img.offset().left; }
                if ( y > img.outerHeight() + img.offset().top - lens.outerHeight() ) { y = img.outerHeight() + img.offset().top - lens.outerHeight(); }
                if ( y < img.offset().top ) { y = img.offset().top; }
                lens.offset({ top: y, left: x });
                result.css('backgroundPosition', '-' + ( x - img.offset().left ) * cx  + 'px -' + ( y - img.offset().top ) * cy + 'px');
            }
        }
</script>
@endsection