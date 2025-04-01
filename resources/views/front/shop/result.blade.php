@extends('front.layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <section class="section-6">
        <div class="container">
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                <li class="breadcrumb-item active">Search Results</li>
            </ol>
           
            <h4 class="mb-4">Search result for "{{ request('search') }}"</h4>
            <div class="row">
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        @php
                            $productImage = $product->product_images->first();
                        @endphp

                        <div class="col-md-2 col-6">
                            <div class="product-image position-relative">
                                <a href="{{ route('front.product',$product->slug) }}" class="product-img">
                                    @if (!empty($productImage->image1))
                                        <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                    @else
                                        <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                </a>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('front.product',$product->slug) }}">
                                    <h5>{{ Str::limit($product->name, 30, '...') }}</h5>
                                </a>

                                <div class="price mt-2">
                                    <h5>₹ {{ $product->price }}
                                        @if ($product->compare_price > 0)
                                            <span class="text-underline"><del>₹ {{ $product->compare_price }}</del></span>
                                        @endif
                                    </h5>
                                </div>
                                
                                <a href="{{ route('front.product',$product->slug) }}" class="btn btn-primary mt-3">View Product</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card p-5">
                        <div class="text-center">
                            <?xml version="1.0" encoding="utf-8"?>
                                <svg width="100px" height="100px" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 16V14.5M12.5 9V13M20.5 12.5C20.5 16.9183 16.9183 20.5 12.5 20.5C8.08172 20.5 4.5 16.9183 4.5 12.5C4.5 8.08172 8.08172 4.5 12.5 4.5C16.9183 4.5 20.5 8.08172 20.5 12.5Z" stroke="#121923" stroke-width="1.2"/>
                            </svg>
                            <h4>No data found</h4>
                        </div>
                    </div>
                @endif    
            </div>  
            
            {{ $products->withQueryString()->links() }}
    </div>
</section> 
@endsection