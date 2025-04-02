@extends('front.layouts.app')

@section('content')
    <section class="section-6 mt-3">
        <div class="container">
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Shop</li>
            </ol>

            @php
                use Illuminate\Support\Str;
            @endphp

            <div class="row">
                <div class="col-md-3 sidebar">
                    <div class="sub-title mt-3"><h2>Categories</h3></div>                    
                    <div class="accordion accordion-flush" id="accordionExample">                    
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $key => $category)
                                <div class="accordion-item">
                                    @if ($category->sub_category->isNotEmpty())
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $key }}" aria-expanded="false" aria-controls="collapseOne-{{ $key }}">
                                                {{ $category->name }}
                                            </button>
                                        </h2>
                                    @else
                                        <a href="{{ route("front.shop",$category->slug) }}" class="nav-item nav-link  {{ ($categorySelected == $category->id) ? 'text-primary' : '' }}">{{ $category->name }}</a>
                                    @endif

                                    @if ($category->sub_category->isNotEmpty())
                                        <div id="collapseOne-{{ $key }}" class="accordion-collapse collapse {{ ($categorySelected == $category->id) ? 'show' : ' '}}" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <div class="navbar-nav">
                                                    @foreach ($category->sub_category as $subCategory)
                                                        <a href="{{ route("front.shop",[$category->slug,$subCategory->slug]) }}" class="nav-item nav-link {{ ($subCategorySelected == $subCategory->id) ? 'text-primary' : '' }}">{{ $subCategory->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                    {{-- Categories filters end  --}}
                                        
                    @if ($brands->isNotEmpty())
                        <div class="sub-title mt-5"><h2>Brand</h3></div>  
                        @foreach ($brands as $brand)
                            <div class="form-check mb-2">
                                <input {{ (in_array($brand->id, $brandsArray)) ? 'checked' : '' }} class="form-check-input brand-label" type="checkbox" name="brand[]" value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                <label class="form-check-label" for="brand-{{ $brand->id }}">
                                    {{ $brand->name }}
                                </label>
                            </div>
                        @endforeach
                    @endif                           
                    {{-- Brand filters end --}}                    
                    
                    <div class="sub-title mt-5"><h2>Price</h3></div>                    
                    <input type="text" class="js-range-slider" name="my_range" value="" />
                    {{-- Price filters end --}}
                </div>

                <div class="col-md-9">
                    <div class="row mb-3">
                        <div class="col-md-10 col-8"><h3>Products</h3></div>
                        <div class="col-md-2 col-4">
                            <select name="sort" id="sort" class="form-control">
                                <option value="Latest" {{ ($sort == 'latest') ? 'selected' : ' ' }}>Latest</option>
                                <option value="price_desc" {{ ($sort == 'price_desc') ? 'selected' : ' ' }}>Price High</option>
                                <option value="price_asc" {{ ($sort == 'price_asc') ? 'selected' : ' ' }}>Price Low</option>
                            </select>
                        </div>
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
                                        
                                        <div class="row mt-3">
                                            <div class="col-md-6 col-6">
                                                <div class="form-group">
                                                    <select name="size" id="size" class="form-control">
                                                        <option value="">Size</option>
                                                        <option value="Small" {{ old('size', $product->size ?? '') == 'Small' ? 'selected' : '' }}>Small</option>
                                                        <option value="Medium" {{ old('size', $product->size ?? '') == 'Medium' ? 'selected' : '' }}>Medium</option>
                                                        <option value="Large" {{ old('size', $product->size ?? '') == 'Large' ? 'selected' : '' }}>Large</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-6">
                                                <div class="form-group">
                                                    <select name="color" id="color" class="form-control">
                                                        <option value="">Color</option>
                                                        <option value="Red" {{ old('color', $product->color ?? '') == 'Red' ? 'selected' : '' }}>Red</option>
                                                        <option value="Blue" {{ old('color', $product->color ?? '') == 'Blue' ? 'selected' : '' }}>Blue</option>
                                                        <option value="Green" {{ old('color', $product->color ?? '') == 'Green' ? 'selected' : '' }}>Green</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <a href="{{ route('front.product',$product->slug) }}" class="btn btn-primary mt-3">View Product</a> --}}
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
<script>
    if (window.location.pathname === "neon-sign") {
        document.getElementById("myDiv").style.display = "block";
    }

    $(".brand-label").change(function(){
        apply_filters();
    });

    rangeSlider = $(".js-range-slider").ionRangeSlider({
        type: "double",
        min: 0,
        max: 1000,
        from: {{ ($priceMin) }},
        to: {{ ($priceMax) }},
        step: 10,
        skin: "round",
        max_position: "+",
        prefix: "₹",
        onFinish: function(){
            apply_filters()
        }
    });

    var slider = $(".js-range-slider").data("ionRangeSlider");

    $("#sort").change(function(){
        apply_filters()
    });


    function apply_filters(){
        var brands = [];
        $(".brand-label").each(function(){
            if ($(this).is(":checked") == true){
                brands.push($(this).val());
            }
        });

        var url = '{{ url()->current() }}?';

        //Brand filter
        if (brands.length > 0) {
            url += '&brand='+brands.toString();
        }

        //Price range filter
        url += '&price_min='+slider.result.from+'&price_max='+slider.result.to;

        //Sorting filter
        var keyword = $('#search').val();
        if(keyword.length > 0){
            url += '&search='+keyword;
        }

        url += '&sort='+$("#sort").val();

        window.location.href = url;
    }
</script>

@endsection