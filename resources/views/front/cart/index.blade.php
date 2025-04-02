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
                                    <div class="col-md-5 col-9"><b>Item</b></div>
                                    <div class="col-md-2 col-4"><b>Price</b></div>
                                    <div class="col-md-2 col-4"><b>Qty</b></div>
                                    <div class="col-md-2 col-4"><b>Total</b></div>
                                </div>
                            </div>
                        </div>
                        <hr />
                                            
                    @foreach ($cartContent as $item)
                        <div class="row">
                            <div class="col-md-2 col-3 productThumb">                                
                                @if($item->options->neon_light == 'NEON' || $item->options->neon_light == 'FLORO')
                                <div class="neon-thumb">
                                    <svg width="85px" height="85px" xmlns="http://www.w3.org/2000/svg">
                                        <text x="0" y="50%" font-family="{{ $item->options->neon_font }}" font-size="10" fill="{{ $item->options->neon_color }}" text-anchor="left" alignment-baseline="left">{{ $item->options->custom_neon }}</text>
                                    </svg>
                                </div>

                                @elseif ($item->options->category == 'Frame')
                                    @if($item->options->image)
                                        <img src="{{ asset('uploads/custom_frames/' . $item->options->image ) }}" alt="Customised Frame" >
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif

                                @elseif ($item->options->category == 'Metal_Frame')
                                    @if($item->options->image)
                                        <img src="{{ $item->options->image }}" alt="Customised Frame" style="width: 75px; height:75px; border-radius:3px;">    
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                @else                                            
                                    @if (!empty($item->options->productImage->image1))
                                        <img src="{{ asset('uploads/products/small/'.$item->options->productImage->image1) }}" >
                                    @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                    @endif
                                @endif  
                                <div class="hoverDelete">
                                    <button class="btn btn-sm btn-danger " onclick="deleteItem('{{ $item->rowId}}' );"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="col-md-10 col-9">
                                <div class="row">
                                    <div class="col-md-5 col-12"><h5>{{ $item->name }}</h5></div>
                                    <div class="col-md-1 col-6">₹{{ $item->price }}</div>
                                    <div class="col-md-2 col-4">
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
                                    <div class="col-md-2 col-4">
                                        <p style="text-align: right">₹{{ $item->price*$item->qty }}</p>
                                    </div>
                                    <div class="col-md-1 col-3">
                                        <button class="btn btn-sm btn-danger" onclick="deleteItem('{{ $item->rowId}}' );"><i class="fa fa-times"></i></button>
                                    </div>

                                    <div class="content">
                                        
                                        <div style="font-size: 12px;">
                                            <p class="mb-0">
                                                <span>
                                                    @if($item->options->category)
                                                        {{ $item->options->category }} <br />
                                                    @else
                                                        Main product <br />
                                                    @endif
                                                </span> 
                                                @if($item->options->neon_light == "NEON")
                                                    You selected: <span class="neon_lightSelected">{{ $item->options->neon_light }}</span><br />
                                                @endif
                                                @if($item->options->neon_light == "FLORO")
                                                    You selected: <span class="floro_lightSelected">{{ $item->options->neon_light }}</span><br />
                                                @endif
                                                @if($item->options->color)
                                                    Color: {{ $item->options->color }}
                                                @endif
                                                @if($item->options->size)
                                                    , Size: {{ $item->options->size }}
                                                @endif                                                 
                                                @if($item->options->shape) <br />
                                                    Shape: {{ $item->options->shape }} 
                                                @endif 
                                                @if($item->options->custom_size1 || $item->options->custom_size2)
                                                    , Custom Size: {{ $item->options->custom_size1 }}" x {{ $item->options->custom_size2 }}"
                                                @endif
                                            </p>
                                        </div> 
                                        <button class="toggle-btn toggle-btn-{{ $item->id }} btn btn-outline-dark btn-sm toggle-btn mt-2" data-id="{{ $item->id }}">Show More</button>
                                    </div>
                                </div>

                                <div class="more-content col-md-12 mt-3 more-content-{{ $item->id }}" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            @if($item->options->custom_neon )
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Text</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->custom_neon }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->neon_color)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Color</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->neon_color }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->neon_size)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Size</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->neon_size }}</div>
                                                    </div>
                                            @endif        
                                            @if($item->options->neon_font)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Font</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->neon_font }}</div>
                                                    </div>
                                            @endif   
                                            @if($item->options->size)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Size</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->size }}</div>
                                                    </div>
                                            @endif 
                                            @if($item->options->font)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Font</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->font }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->frame)
                                                                                                                    
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Frame</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->frame }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->wrap)
                                                                                                                    
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Wrap</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->wrap }}</div>
                                                    </div>
                                            @endif                                                                
                                            @if($item->options->border)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Border</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->border }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->wrap_wrap)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Wrap</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->wrap_wrap }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->hardware_style)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Style</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->hardware_style }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->hardware_display)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Display</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->hardware_display }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->lamination)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Lamination</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->lamination }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->retouching)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Retouching</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->retouching }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->hardware_finishing)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Finishing</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->hardware_finishing }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->proof)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Proof</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->proof }}</div>
                                                    </div>
                                            @endif
                                            @if($item->options->major)
                                                
                                                    <div class="row">
                                                        <div class="col-md-3 col-4"><b>Major</b></div>
                                                        <div class="col-md-9 col-8">: {{ $item->options->major }}</div>
                                                    </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-12">
                                            @if($item->options->neon_light == 'NEON' || $item->options->neon_light == 'FLORO')
                                                <div class="neon-thumb">
                                                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                                                        <text x="0" y="50%" font-family="{{ $item->options->neon_font }}" font-size="10" fill="{{ $item->options->neon_color }}" text-anchor="left" alignment-baseline="left">{{ $item->options->custom_neon }}</text>
                                                    </svg>
                                                </div>
                                            @elseif ($item->options->category == 'Frame')
                                                @if($item->options->image)
                                                    <img src="{{ asset('uploads/custom_frames/' . $item->options->image ) }}" alt="Customised Frame" >
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                @endif
                                            @elseif ($item->options->category == 'Metal_Frame')
                                                @if($item->options->image)
                                                    <img src="{{ $item->options->image }}" alt="Customised Frame" style="width: 75px; height:75px; border-radius:3px;">    
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                @endif                                    
                                            @else                                            
                                                @if (!empty($item->options->productImage->image1))
                                                    <img src="{{ asset('uploads/products/small/'.$item->options->productImage->image1) }}" >
                                                @else
                                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                                @endif
                                            @endif  
                                        </div>                                    
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


      
        $(".toggle-btn").click(function() {
            var id = $(this).data("id"); 
            var moreContent = $(".more-content-" + id);
            var button = $(".toggle-btn-" + id);

            if (moreContent.is(":visible")) {
                moreContent.hide();
                button.text("Show More");
            } else {
                moreContent.show();
                button.text("Show Less");
            }
        });
   
    </script>
@endsection
