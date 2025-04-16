@extends('front.layouts.app')

@section('content')
<section class="section-5 pt-4">
    <div class="container">       
        <div class="row">
            <div class="col-md-9 col-10">
                <ol class="breadcrumb primary-color">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                    <li class="breadcrumb-item">My Wishlist</li>
                </ol>
            </div>
            <div class="col-md-3 col-2">
                <nav class="frame_mobile_menu">
                    <div class="toggle-wrap" onclick="toggleMenu(this)">
                        <span class="toggle-bar" style="margin-top:0;"></span>
                    </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-12">
                <aside>
                    @include('front.account.common.sidebar')
                </aside>
            </div>
            <div class="col-md-9 col-12">
                @include('front.account.common.message')
                <h2 class="h5 mb-0 pt-2 pb-3">Wishlist <span class="counts">{{ $wishlistCount }}</span></h2>
                @if ($wishlists->isNotEmpty())                   
                    <div class="row">
                        @foreach ($wishlists as $wishlist)                    
                        <div class="col-md-6 col-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            @php
                                                $productImage = getProductImage($wishlist->product_id);
                                            @endphp
                                                                        
                                            <a href="{{ route('front.product',$wishlist->product->slug) }}">
                                                @if (!empty($productImage))
                                                    <img src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-8 col-8">
                                            <h5 class="mb-1">{{ $wishlist->product->name }}</h5>
                                        
                                            <span><strong>₹ {{ $wishlist->product->price }}</strong></span>
                                            @if ($wishlist->product->compare_price > 0)
                                                <span class="h6 text-underline"><del>₹ {{ $wishlist->product->compare_price }}</del></span>
                                            @endif
                                            
                                            <a href="javascript:void(0);" onclick="removeProduct({{ $wishlist->product_id }})" class="wishlistRemove" >
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <svg width="30px" height="30px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M667.8 362.1H304V830c0 28.2 23 51 51.3 51h312.4c28.4 0 51.4-22.8 51.4-51V362.2h-51.3z" fill="#CCCCCC" /><path d="M750.3 295.2c0-8.9-7.6-16.1-17-16.1H289.9c-9.4 0-17 7.2-17 16.1v50.9c0 8.9 7.6 16.1 17 16.1h443.4c9.4 0 17-7.2 17-16.1v-50.9z" fill="#CCCCCC" /><path d="M733.3 258.3H626.6V196c0-11.5-9.3-20.8-20.8-20.8H419.1c-11.5 0-20.8 9.3-20.8 20.8v62.3H289.9c-20.8 0-37.7 16.5-37.7 36.8V346c0 18.1 13.5 33.1 31.1 36.2V830c0 39.6 32.3 71.8 72.1 71.8h312.4c39.8 0 72.1-32.2 72.1-71.8V382.2c17.7-3.1 31.1-18.1 31.1-36.2v-50.9c0.1-20.2-16.9-36.8-37.7-36.8z m-293.5-41.5h145.3v41.5H439.8v-41.5z m-146.2 83.1H729.5v41.5H293.6v-41.5z m404.8 530.2c0 16.7-13.7 30.3-30.6 30.3H355.4c-16.9 0-30.6-13.6-30.6-30.3V382.9h373.6v447.2z" fill="#211F1E" /><path d="M511.6 798.9c11.5 0 20.8-9.3 20.8-20.8V466.8c0-11.5-9.3-20.8-20.8-20.8s-20.8 9.3-20.8 20.8v311.4c0 11.4 9.3 20.7 20.8 20.7zM407.8 798.9c11.5 0 20.8-9.3 20.8-20.8V466.8c0-11.5-9.3-20.8-20.8-20.8s-20.8 9.3-20.8 20.8v311.4c0.1 11.4 9.4 20.7 20.8 20.7zM615.4 799.6c11.5 0 20.8-9.3 20.8-20.8V467.4c0-11.5-9.3-20.8-20.8-20.8s-20.8 9.3-20.8 20.8v311.4c0 11.5 9.3 20.8 20.8 20.8z" fill="#211F1E" /></svg>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                    
                    @else
                    <div>
                    <div>
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="error-message">
                                    <?xml version="1.0" encoding="utf-8"?>
                                        <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.864 16.4552C4.40967 18.6379 4.68251 19.7292 5.49629 20.3646C6.31008 21 7.435 21 9.68486 21H14.3155C16.5654 21 17.6903 21 18.5041 20.3646C19.3179 19.7292 19.5907 18.6379 20.1364 16.4552C20.9943 13.0234 21.4233 11.3075 20.5225 10.1538C19.6217 9 17.853 9 14.3155 9H9.68486C6.14745 9 4.37875 9 3.47791 10.1538C2.94912 10.831 2.87855 11.702 3.08398 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M19.5 9.5L18.7896 6.89465C18.5157 5.89005 18.3787 5.38775 18.0978 5.00946C17.818 4.63273 17.4378 4.34234 17.0008 4.17152C16.5619 4 16.0413 4 15 4M4.5 9.5L5.2104 6.89465C5.48432 5.89005 5.62128 5.38775 5.90221 5.00946C6.18199 4.63273 6.56216 4.34234 6.99922 4.17152C7.43808 4 7.95872 4 9 4" stroke="#1C274C" stroke-width="1.5"/>
                                        <path d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4C15 4.55228 14.5523 5 14 5H10C9.44772 5 9 4.55228 9 4Z" stroke="#1C274C" stroke-width="1.5"/>
                                    </svg>
                                    <h5 class="mt-2 mb-2">Your wishlist is empty!</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
    <script>
        function removeProduct(id){
            $.ajax({
                url: '{{ route("account.removeProductFromWishlist") }}',
                type: 'post',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    if(response.status == true)
                        window.location.href="{{ route('account.wishlist') }}"
                    }
            });
        }

        function toggleMenu(e) {
            e.classList.toggle("active");
            document.querySelector("aside").classList.toggle("active");        
        }   
    </script>
@endsection
