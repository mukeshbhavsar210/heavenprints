@extends('front.layouts.app')

@section('content')
    <section class="section-6 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-10">        
                    <ol class="breadcrumb primary-color">
                        <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ol>
                </div>
                <div class="col-md-4 col-2">
                    <button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#userAccountMobileMenu" aria-controls="userAccountMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <?xml version="1.0" encoding="utf-8"?>
                        <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5 11.75C6.08579 11.75 5.75 12.0858 5.75 12.5C5.75 12.9142 6.08579 13.25 6.5 13.25V11.75ZM18.5 13.25C18.9142 13.25 19.25 12.9142 19.25 12.5C19.25 12.0858 18.9142 11.75 18.5 11.75V13.25ZM6.5 15.75C6.08579 15.75 5.75 16.0858 5.75 16.5C5.75 16.9142 6.08579 17.25 6.5 17.25V15.75ZM18.5 17.25C18.9142 17.25 19.25 16.9142 19.25 16.5C19.25 16.0858 18.9142 15.75 18.5 15.75V17.25ZM6.5 7.75C6.08579 7.75 5.75 8.08579 5.75 8.5C5.75 8.91421 6.08579 9.25 6.5 9.25V7.75ZM18.5 9.25C18.9142 9.25 19.25 8.91421 19.25 8.5C19.25 8.08579 18.9142 7.75 18.5 7.75V9.25ZM6.5 13.25H18.5V11.75H6.5V13.25ZM6.5 17.25H18.5V15.75H6.5V17.25ZM6.5 9.25H18.5V7.75H6.5V9.25Z" fill="#000000"/>
                        </svg>
                    </button>
                </div>
            </div>            

            @php
                use Illuminate\Support\Str;
            @endphp

            <div class="row">
                <div class="col-md-3 sidebar">
                    <nav class="navbar navbar-expand-xl" id="navbar">
                        <div class="collapse navbar-collapse" id="userAccountMobileMenu">
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
                                                    <ul class="subCategory_listing">
                                                        @foreach ($category->sub_category as $subCategory)
                                                            <li><a href="{{ route("front.shop",[$category->slug,$subCategory->slug]) }}" class="nav-item nav-link {{ ($subCategorySelected == $subCategory->id) ? 'text-primary' : '' }}">{{ $subCategory->name }}</a></li>
                                                        @endforeach
                                                    </ul>
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
                    </nav>
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

                                <div class="col-md-4 col-6 mb-4">
                                    <div class="product-image position-relative ">
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

                                            @if($product->metal_type)
                                                <span class="selectedCategory">{{ $product->metal_type }}</span>    
                                            @endif

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

                                    <div class="price mt-2">
                                        <h5>{{ Str::limit($product->name, 20, '...') }}</h5>
                                        {{-- <a href="{{ route('front.product',$product->slug) }}" class="product-title">{{ Str::limit($product->name, 20, '...') }}</a> --}}
                                        <div class="product-price mt-1">
                                            ₹ {{ $formattedPrice = number_format($product->price, 2, '.', ''); }}
                                            @if ($product->compare_price > 0)
                                                <span class="text-underline"><del>₹ {{ $formattedPrice = number_format($product->compare_price, 2, '.', ''); }}</del></span>
                                            @endif
                                        </div>

                                        <div class="row mt-2 mb-2">
                                            <div class="col-md-6 col-6">
                                                @if(!empty($product->sizes))
                                                    @php
                                                        $decodedSizes = json_decode($product->sizes, true); // Decode as an array
                                                    @endphp
                                                    <div class="form-group">
                                                        @if(is_array($decodedSizes))                                                        
                                                            <select name="size" class="form-control">
                                                                <option value="">Select Size</option>
                                                                @foreach($decodedSizes as $size)
                                                                    <option value="{{ $size }}">{{ $size }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif     
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col-md-6 col-6">
                                                @if(!empty($product->colors))
                                                    @php
                                                        $decodedColors = json_decode($product->colors, true);
                                                    @endphp    
                                                    <div class="form-group">                                            
                                                        @if(is_array($decodedColors))
                                                            <select name="color" class="form-control">
                                                                <option value="">Select Color</option>
                                                                @foreach($decodedColors as $color)
                                                                    <option value="{{ $color }}">{{ ucfirst($color) }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        @if($product->metal_type == 'Others')
                                            <a href="{{ route('front.product.details',$product->slug) }}" class="btn btn-outline-primary">Customize</a>
                                        @else
                                            <a href="{{ route('front.product',$product->slug) }}" class="btn btn-outline-primary">Customize</a>
                                        @endif
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