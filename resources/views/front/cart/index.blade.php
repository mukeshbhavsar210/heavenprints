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
                        <div class="card mb-2 hideMobile">                                  
                            <div class="card-body py-2">
                                <div class="row">
                                    <div class="col-md-2 col-4"><b>Photo</b></div>
                                    <div class="col-md-10 col-8">
                                        <div class="row">
                                            <div class="col-md-7 col-6"><b>Item</b></div>                                            
                                            <div class="col-md-2 col-2"><b><p class="m-0" style="text-align: center">Qty</p></b></div>
                                            <div class="col-md-2 col-2"><b><p class="m-0" style="text-align: right">Total</p></b></div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                            
                        @foreach ($cartContent as $item)
                    
                        <div class="card mb-2">                                  
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-4 productThumb">                                
                                        @if($item->options->neon_light == 'NEON' || $item->options->neon_light == 'FLORO')
                                            <div class="neon-thumb">
                                                <svg width="85px" height="85px" xmlns="http://www.w3.org/2000/svg">
                                                    <text x="0" y="50%" font-family="{{ $item->options->neon_font }}" font-size="10" fill="{{ $item->options->neon_color }}" text-anchor="left" alignment-baseline="left">{{ $item->options->custom_neon }}</text>
                                                </svg>
                                            </div>
                                        @else                                            
                                            @if (!empty($item->options->productImage->image1))
                                                <img src="{{ asset('uploads/products/small/'.$item->options->productImage->image1) }}" >
                                            @else
                                                <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                            @endif
                                        @endif  
                                    </div>

                                    <div class="col-md-10 col-8">                                   
                                        <div class="row">
                                            <div class="col-md-7 col-12"><h5 class="mobileTitle">{{ $item->name }}</h5></div>
                                            {{-- <div class="col-md-1 col-3">₹{{ $item->price }}</div> --}}
                                            <div class="col-md-2 col-6">
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
                                            <div class="col-md-2 col-3">
                                                <p style="text-align: right" class="mobilePrice">₹{{ $item->price*$item->qty }}</p>
                                            </div>
                                            <div class="col-md-1 col-2" style="text-align: center">
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
                                                        {{-- @if($item->options->shape) <br />
                                                            Shape: {{ $item->options->shape }} 
                                                        @endif  --}}
                                                        {{-- @if($item->options->custom_size1 || $item->options->custom_size2)
                                                            , Custom Size: {{ $item->options->custom_size1 }}" x {{ $item->options->custom_size2 }}"
                                                        @endif --}}
                                                    </p>
                                                </div> 
                                                <button class="toggle-btn toggle-btn-{{ $item->id }} btn btn-outline-dark btn-sm toggle-btn mt-2" data-id="{{ $item->id }}">Show More</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                
                                    <div class="more-content mt-3 more-content-{{ $item->id }}" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-5 col-12">
                                                <div class="card">
                                                    <div class="card-header">Use my uploaded photo for print.</div>
                                                    <div class="card-body">                                          
                                                        @if($item->options->neon_light == 'NEON' || $item->options->neon_light == 'FLORO')
                                                            <div class="neon-thumb">
                                                                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                                                                    <text x="0" y="50%" font-family="{{ $item->options->neon_font }}" font-size="10" fill="{{ $item->options->neon_color }}" text-anchor="left" alignment-baseline="left">{{ $item->options->custom_neon }}</text>
                                                                </svg>
                                                            </div>
                                                        @elseif ($item->options->category == 'Customize')          
                                                            @if($item->options->image)
                                                                <img src="{{ asset('uploads/custom_frames/' . $item->options->image ) }}" alt="Customised Frame" >
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
                                            <div class="col-md-7 col-12">
                                                <div class="card">
                                                    <div class="card-header">Details</div>
                                                    <div class="card-body">
                                                        <div class="product_details_scroll">
                                                            @if($item->options->category == 'Customize')
                                                                @if($item->options->product_type)                                                                                                      
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Material Type</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->product_name }} ({{ $item->options->product_type }}) ₹{{ $item->options->product_price }}</div>
                                                                    </div>
                                                                    <hr />
                                                                @endif  
                                                                @if($item->options->custom_name )
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-3 col-3">
                                                                            <img src="http://127.0.0.1:8000/uploads/icons/selection/{{ $item->options->custom_image }}" style="width: 100%; border-radius:5px;" />
                                                                            </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Selected product for print</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->custom_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->custom_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif  
                                                                @if($item->options->size_name )
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-3 col-3">
                                                                        </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Size</h5>
                                                                            <p class="mb-0"><b>Size:</b> {{ $item->options->size_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->size_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif                                                             
                                                                @if($item->options->wrap_name )
                                                                    <div class="row mb-2 ">
                                                                        <div class="col-md-3 col-3">
                                                                            <img src="http://127.0.0.1:8000/uploads/icons/wrap_borders/{{ $item->options->wrap_image }}" style="width: 100%; border-radius:2px;" />
                                                                            </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Wrap</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->wrap_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->wrap_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif
                                                                @if($item->options->border_name )
                                                                    <div class="row mb-2 ">
                                                                        <div class="col-md-3 col-3">
                                                                            <img src="http://127.0.0.1:8000/uploads/icons/wrap_borders/{{ $item->options->border_image }}" style="width: 100%; border-radius:2px;" />
                                                                            </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Border</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->border_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->border_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif
                                                                @if($item->options->frame_name )
                                                                    <div class="row mb-2 ">
                                                                        <div class="col-md-3 col-3">
                                                                            <img src="http://127.0.0.1:8000/uploads/icons/wrap_borders/frames/{{ $item->options->frame_image }}" style="width: 100%; border-radius:2px;" />
                                                                            </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Frame</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->frame_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->frame_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif
                                                                @if($item->options->hardware_name )
                                                                    <div class="row mb-2 ">
                                                                        <div class="col-md-3 col-3">
                                                                            <img src="http://127.0.0.1:8000/uploads/icons/hardware/option/{{ $item->options->hardware_image }}" style="width: 100%; border-radius:2px;" />
                                                                            </div>
                                                                        <div class="col-md-9 col-9"> 
                                                                            <h5>Hardware</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->hardware_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->hardware_price }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <hr />
                                                                @endif

                                                                <div class="row mb-2">
                                                                    @if($item->options['display_name'] )                                                                
                                                                        <div class="col-md-6 col-12"> 
                                                                            <h5>Display</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->display_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->display_price }}</p>
                                                                        </div>                                                                
                                                                    @endif
                                                                    @if($item->options['lamination_name'] )
                                                                        <div class="col-md-6 col-12"> 
                                                                            <h5>Lamiation</h5>
                                                                            <p class="mb-0"><b>Name:</b> {{ $item->options->lamination_name }}</p>
                                                                            <p class="mb-0"><b>Price:</b> ₹{{ $item->options->lamination_price }}</p>
                                                                        </div>
                                                                    @endif                                                                                   
                                                                </div>

                                                                @if(!empty($item->options['retouch_names']))
                                                                    <hr />
                                                                    <div class="retouch-options">
                                                                        <h5 class="mb-2">Retouching Options:</h5>
                                                                        <ol>
                                                                            @foreach($item->options['retouch_names'] as $retouch)
                                                                                <li>{{ $retouch }}</li>
                                                                            @endforeach
                                                                        </ol>
                                                                        <p><strong>Retouching Price:</strong> ₹{{ $item->options['retouch_price'] }}</p>
                                                                    </div>
                                                                @endif

                                                                @if(!empty($item->options['proof_names']))
                                                                    <div class="retouch-options">
                                                                        <h6 class="mb-2">Proof:</h6>
                                                                        <p><strong>Proof:</strong> {{ $item->options->proof_names ?? 'No Proof Selected' }}</p>
                                                                        <p><strong>Price:</strong> ₹{{ number_format($item->options->proof_price, 2) }}</p>
                                                                    </div>
                                                                @endif

                                                            {{-- NEON product started --}}
                                                            @elseif($item->options->category == 'Neon light')
                                                                @if($item->options->custom_neon )
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Text</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->custom_neon }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->neon_color)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Color</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->neon_color }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->neon_size)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Size</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->neon_size }}</div>
                                                                    </div>
                                                                @endif        
                                                                @if($item->options->neon_font)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Font</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->neon_font }}</div>
                                                                    </div>
                                                                @endif   
                                                                @if($item->options->size)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Size</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->size }}</div>
                                                                    </div>
                                                                @endif 
                                                                @if($item->options->font)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Font</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->font }}</div>
                                                                    </div>
                                                                @endif                                                                                
                                                                @if($item->options->frame)                                                                                                                
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Frame</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->frame }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->wrap)                                                                                                                
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Wrap</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->wrap }}</div>
                                                                    </div>
                                                                @endif                                                                
                                                                @if($item->options->border)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Border</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->border }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->wrap_wrap)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Wrap</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->wrap_wrap }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->hardware_style)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Style</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->hardware_style }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->hardware_display)
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Display</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->hardware_display }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->lamination)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Lamination</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->lamination }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->retouching)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Retouching</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->retouching }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->hardware_finishing)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Finishing</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->hardware_finishing }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->proof)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Proof</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->proof }}</div>
                                                                    </div>
                                                                @endif
                                                                @if($item->options->major)                                            
                                                                    <div class="row">
                                                                        <div class="col-md-3 col-3"><b>Major</b></div>
                                                                        <div class="col-md-9 col-9">: {{ $item->options->major }}</div>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <p>Default</p>
                                                            @endif                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
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
