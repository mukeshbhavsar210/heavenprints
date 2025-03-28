@extends('front.layouts.app')

@section('content')

    <section>
        <div class="container">
            <ol class="breadcrumb primary-color">
                <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
                    
            <div class="row">
                @if (Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (Cart::count() > 0)
                    <div class="col-md-9 col-12 mainCart">
                        <hr class="first" />
                        <div class="row">
                            <div class="col-md-2 col-3"><b>Photo</b></div>
                            <div class="col-md-10 col-9">
                                <div class="row">
                                    <div class="col-md-6 col-9"><b>Item</b></div>
                                    <div class="col-md-2 col-4"><b>Qty</b></div>
                                    <div class="col-md-2 col-4"><b>Total</b></div>
                                    <div class="col-md-2 col-4"><b>Remove</b></div>
                                </div>
                            </div>
                        </div>
                        <hr />
                                            
                    @foreach ($cartContent as $item)
                        <div class="row">
                            <div class="col-md-2 col-3 productThumb">                                
                                @if($item->options->neon_light == 'NEON' || $item->options->neon_light == 'FLORO')
                                    @include('front.cart.neon')

                                @elseif ($item->options->category == 'Frame')
                                    @include('front.cart.frame')

                                @elseif ($item->options->category == 'Metal_Frame')
                                    @include('front.cart.metal')
                                    
                                @else                                            
                                    @if (!empty($item->options->productImage->image))
                                        <a class="model-preview" data-bs-toggle="modal" data-bs-target="#defaultModal_{{ $item->id }}">
                                            <img src="{{ asset('uploads/product/small/'.$item->options->productImage->image) }}" >
                                        </a>

                                        <div class="modal fade" id="defaultModal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Preview</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('uploads/product/small/'.$item->options->productImage->image) }}" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                @endif  
                            </div>
                            <div class="col-md-10 col-9">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <h5 class="mt-3">{{ $item->name }}
                                            <span style="font-size: 13px; color:#666;">
                                                @if($item->options->category)
                                                    ({{ $item->options->category }})
                                                @else
                                                    (Default)
                                                @endif
                                            </span>   
                                            @if($item->options->category == 'Frame')
                                                <a class="model-preview" data-bs-toggle="modal" data-bs-target="#modalDetails_{{ $item->id }}">
                                                    <span style="font-size: 13px; color:#666;">View details</span>
                                                </a>                                                
                                            @endif
                                        </h5>

                                        @include('front.cart.options')
                                        
                                    </div>
                                    {{-- <div class="col-md-1 col-6">₹{{ $item->price }}</div> --}}
                                    <div class="col-md-2 col-4 ">
                                        <div class="input-group quantity mx-auto" >
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus p-2 pt-1 pb-1 sub" data-id="{{ $item->rowId }}">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm  border-0 text-center" value="{{ $item->qty }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus p-2 pt-1 pb-1 add" data-id="{{ $item->rowId }}">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-4">₹{{ $item->price*$item->qty }}</div>
                                    <div class="col-md-2 col-3">
                                        <button class="btn btn-sm btn-danger" onclick="deleteItem('{{ $item->rowId}}' );"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr />
                @endforeach
                </div>

                <div class="col-md-3  col-12">
                    <h5>Cart Summery</h5>
                
                    @foreach (Cart::content() as $item)
                        <div class="d-flex justify-content-between mb-2 mt-3">
                            <p class="mb-0">{{ $item->name }} X {{ $item->qty }}</p>
                            <p class="mb-0">₹{{ $item->price*$item->qty }}</p>
                        </div>
                    @endforeach

                    <hr />
                    <div class="d-flex justify-content-between summary-end">
                        <p><b>Subtotal</b></p>
                        <p><b>₹{{ Cart::subtotal() }}</b></p>
                    </div>
                    <div class="pt-3">
                        <a href="{{ route('front.checkout') }}" class="btn-primary btn btn-block w-100">Proceed to Checkout</a>
                    </div>                                               
                </div>
            @else

                <div class=col-md-12>
                    <div class="card">
                        <div class="card-body">
                            <div class="cartWrapper">
                                <?xml version="1.0" encoding="utf-8"?>
                                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.864 16.4552C4.40967 18.6379 4.68251 19.7292 5.49629 20.3646C6.31008 21 7.435 21 9.68486 21H14.3155C16.5654 21 17.6903 21 18.5041 20.3646C19.3179 19.7292 19.5907 18.6379 20.1364 16.4552C20.9943 13.0234 21.4233 11.3075 20.5225 10.1538C19.6217 9 17.853 9 14.3155 9H9.68486C6.14745 9 4.37875 9 3.47791 10.1538C2.94912 10.831 2.87855 11.702 3.08398 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M19.5 9.5L18.7896 6.89465C18.5157 5.89005 18.3787 5.38775 18.0978 5.00946C17.818 4.63273 17.4378 4.34234 17.0008 4.17152C16.5619 4 16.0413 4 15 4M4.5 9.5L5.2104 6.89465C5.48432 5.89005 5.62128 5.38775 5.90221 5.00946C6.18199 4.63273 6.56216 4.34234 6.99922 4.17152C7.43808 4 7.95872 4 9 4" stroke="#1C274C" stroke-width="1.5"/>
                                    <path d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4C15 4.55228 14.5523 5 14 5H10C9.44772 5 9 4.55228 9 4Z" stroke="#1C274C" stroke-width="1.5"/>
                                </svg>
                                <h4>Your cart is empty!</h4>
                                <p>Explore our wide selection and find something you like</p>
                                <a href="{{ route('front.home') }}" class="btn btn-primary">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>    
    </section>
@endsection

@section('customJs')
    <script>
        $('.add').click(function(){
            var qtyElement = $(this).parent().prev(); // Qty Input
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue < 10) {
                qtyElement.val(qtyValue+1);
                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId,newQty)
            }
        });

        $('.sub').click(function(){
            var qtyElement = $(this).parent().next();
            var qtyValue = parseInt(qtyElement.val());
            if (qtyValue > 1) {
                qtyElement.val(qtyValue-1);
                var rowId = $(this).data('id');
                var newQty = qtyElement.val();
                updateCart(rowId,newQty)
            }
        });

        function updateCart(rowId,qty){
            $.ajax({
                url: '{{ route("front.updateCart") }}',
                type: 'post',
                data: {rowId:rowId, qty:qty},
                dataType: 'json',
                success: function(response){
                    window.location.href='{{ route("front.cart") }}';
                }
            })
        }

        function deleteItem(rowId){
            if(confirm("Are you sure you want to delete?")){
                $.ajax({
                    url: '{{ route("front.deleteItem.cart") }}',
                    type: 'post',
                    data: {rowId:rowId},
                    dataType: 'json',
                    success: function(response){
                        window.location.href='{{ route("front.cart") }}';
                    }
                })
            }
        }
    </script>
@endsection
