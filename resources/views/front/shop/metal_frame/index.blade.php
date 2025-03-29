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
    <div class="col-md-9">
        <div class="row mb-3">
            <div class="col-md-10 col-8"><h3>Metal Products</h3></div>
          
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

    {{-- <div class="col-md-12 pt-5">
        {{ $products->withQueryString()->links() }}
    </div>  --}}
</div>
            
    </section>
@endsection

@section('customJs')
<script>
    //SVG
    document.getElementById("text-input2").addEventListener("input", function() {
        let text = this.value;

        fetch("{{ route('calculate.price') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ text: text })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById("rupees").innerText = data.price;
        })
        .catch(error => console.error("Error:", error));
    });

    //Change font size
      function changeFontSize(size) {
        const svg-container = document.getElementById('svg-container');
        const svg = svg-container.querySelector('svg');
        const text = svg.querySelector('text');

        // Adjust font-size based on selected size
        if (size === 'small') {
            text.setAttribute('font-size', '50px');
        } else if (size === 'medium') {
            text.setAttribute('font-size', '70px');
        } else if (size === 'large') {
            text.setAttribute('font-size', '90px');
        }
    }    
</script>


<script>
    let selectedFontSize = 40; // Default size

    function applySize(neon_size) {
        selectedFontSize = neon_size;
        updatePreview();
    }

    function updatePreview() {
        let text = $('#text').val() || "Preview Text";
        let fontColor = $('#color').val() || "#000000";
        let lightCategory = $('input[name="light_category"]:checked').val() || "Neon Selected";
        let neon_font = $('input[name="neon_font"]:checked').val() || "Passionate";
        let neon_color = $('input[name="neon_color"]:checked').val() || "#000000";
        let neon_size = $('input[name="neon_size"]:checked').val() || "#000000";
        let charCount = text.length;
        let price = charCount * 3000;
        let encodedFont = neon_font.replace(/\s+/g, '+'); // Convert "Times New Roman" -> "Times+New+Roman"
        let svgContent = `
            <svg width="100%" height="250" style="background: black"  xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=${encodedFont}&display=swap');
                        text {
                            font-family: '${neon_font}', sans-serif;
                        }
                    </style>
                </defs>
                <text x="50%" y="50%" font-family="${neon_font}" font-size="${selectedFontSize}" fill="${neon_color}" text-anchor="middle" alignment-baseline="middle">${text}</text>
            </svg>
        `;            

        $('#previewContainer').html(svgContent);
        $('#price').text(price);
    }
    

    $('#text').on('input', updatePreview);
    $('input[name="neon_font"]').on('change', updatePreview);
    $('input[name="neon_color"]').on('change', updatePreview);
</script>

@endsection