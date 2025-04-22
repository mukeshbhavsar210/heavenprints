@extends('admin.layouts.app')

@section('content')

<div class="card mainPage">
    
    @include('admin.message')

    <div class="card-header">
        <div class="row">
            <div class="col-sm-11 col-12">
                <h4 class="mt-1 mb-0">Order: #{{ $order->id }}</h4>
            </div>
            <div class="col-sm-1 col-12">
                <div class="pull-right">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="m-0" />
    <div class="row">
        <div class="col-md-9 col-12">
            <div class="card">
                <div class="card-header pt-3">
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col col-12">
                            @php
                                // First, fetch the selected address based on delivery_at type ('home' or 'office')
                                $selectedAddress = $order->user->customerAddresses->where('delivery_at', $order->delivery_at)->whereNotNull('delivery_at')->first();

                                // If no address found with the selected type, try to get the other type ('home' or 'office')
                                if (!$selectedAddress) {
                                    $otherType = $order->delivery_at === 'home' ? 'office' : 'home';
                                    $selectedAddress = $order->user->customerAddresses->where('delivery_at', $otherType)->whereNotNull('delivery_at')->first();
                                }
                            @endphp

                            @if($selectedAddress)
                                <address>        
                                    <h1 class="h5 mb-3">Shipping to - {{ ucfirst($selectedAddress->delivery_at) }} address</h1>
                                    <strong>{{ $order->user->first_name . ' ' . $order->user->last_name }}</strong> - <br>                                            
                                    {{ $selectedAddress->address }}<br>
                                    {{ $selectedAddress->apartment }}, {{ $selectedAddress->city }}, {{ $selectedAddress->zip }}, 
                                    {{ $selectedAddress->country->name }}<br>
                                    Phone: <a href="callto:{{ $order->user->phone }}">{{ $order->user->phone }}</a><br>
                                    Email: <a href="mailto:{{ $order->user->email }}">{{ $order->user->email }}</a>
                                </address>
                            @else
                                <p>No address found for the selected delivery type.</p>
                            @endif
                        </div>

                        <div class="col-sm-6 col-12">
                            <div class="row">
                                <div class="col-sm-6 text-right">Invoice</div>
                                <div class="col-sm-6"><b>#007612</b></div>
                            </div><br />

                            @foreach($order->payments as $payment)
                            @endforeach

                            <div class="row">
                                <div class="col-sm-6 text-right"><span>Order ID:</span></div>
                                <div class="col-sm-6"><b>{{ $order->id }}</b></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 text-right"><span>Payment ID:</span></div>
                                <div class="col-sm-6"><b>{{ $payment->razorpay_payment_id }} </b></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-right"><span>Total:</span></div>
                                <div class="col-sm-6"><b>₹ {{ number_format($order->grandtotal,2) }} </b></div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 text-right"><span>Order Date:</span></div>
                                <div class="col-sm-6">
                                    <b>
                                        @if (!empty($order->shipped_date))
                                            {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, y')}}
                                        @else
                                            n/a
                                        @endif
                                    </b>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 text-right"><span>Status:</span></div>
                                <div class="col-sm-6">
                                    @if ($order->status == 'pending')
                                        <span class="badge bg-danger">Pending</span>
                                    @elseif ($order->status == 'shipped')
                                        <span class="badge bg-info">Shipped</span>
                                    @elseif ($order->status == 'delivered')
                                        <span class="badge bg-success">Delivered</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="card-body table-responsive">
                    <table class="table datatable dataTable-table">
                        <thead class="table-light"> 
                            <tr>
                                <th>Photo</th>
                                <th>Product</th>
                                <th class="text-right" width="100">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)                                        
                                <tr>
                                    @if($item->category == 'Neon')
                                        <td>
                                            <svg class="invoice-svg" xmlns="http://www.w3.org/2000/svg">
                                                <text x="50%" y="50%" font-family="{{ $item->font }}" font-size="18px" fill="{{ $item->color }}" text-anchor="middle" alignment-baseline="middle">{{ $item->name }}</text>
                                            </svg>
                                        </td>
                                        <td>
                                            <div class="invoice-details">
                                                <b>Customize Neon</b><br />
                                                <div class="row mt-2">
                                                    <div class="col-md-2"><b>Font</b> </div>
                                                    <div class="col-md-10">: {{ $item->font }}</div>
                                                        
                                                    <div class="col-md-2"><b>Color</b></div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-2">: {{ $item->color }} </div>
                                                            <div class="col-md-10"><p style="background-color:{{ $item->color }}; border:1px #ccc solid; border-radius:100px; height:20px; width:20px;"></p></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2"><b>Size</b></div>
                                                    <div class="col-md-10">: {{ $item->size }}</div>
                                                </div>
                                            </div>
                                        </td>  
                                    @elseif($item->category == 'Frame')
                                        <td><img src="{{ asset('storage/' . $item->image ) }}" alt="Customised Frame" style="width: 100%; border-radius:6px;"></td>
                                        <td>
                                            <b>Frame: {{ $item->name }}</b>
                                            <div class="invoice-details">
                                                <div class="row mt-2">
                                                    @if(Str::startsWith($item->material, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Material</b> : {{ $item->category }}
                                                        </div>
                                                    @endif
                                                    @if(Str::startsWith($item->frame, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Wrap</b> : {{ $item->frame }}
                                                        </div>
                                                    @endif   
                                                    @if(Str::startsWith($item->border, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Border</b> : {{ $item->border }}
                                                        </div>
                                                    @endif
                                                    @if($item->wrap_wrap)
                                                        <div class="col-md-6">
                                                            <b>Wrap</b> : {{ $item->wrap_wrap }}
                                                        </div>
                                                    @endif 
                                                    @if(Str::startsWith($item->hardware_style, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Hardware</b> : {{ $item->hardware_style }}
                                                        </div>
                                                    @endif                                                                                                                                        
                                                    @if(Str::startsWith($item->hardware_display, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Display</b> : {{ $item->hardware_display }}
                                                        </div>
                                                    @endif
                                                    @if(Str::startsWith($item->lamination, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Lamination</b> : {{ $item->lamination }}
                                                        </div>
                                                    @endif 
                                                    @if(Str::startsWith($item->retouching, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Retouching</b> : {{ $item->retouching }}
                                                        </div>
                                                    @endif 
                                                    @if(Str::startsWith($item->hardware_finishing, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Finishing</b> : {{ $item->hardware_finishing }}
                                                        </div>
                                                    @endif 
                                                    @if(Str::startsWith($item->proof, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Proof</b> : {{ $item->proof }}
                                                        </div>
                                                    @endif
                                                    @if(Str::startsWith($item->minor, '0_'))
                                                    @else
                                                        <div class="col-md-6">
                                                            <b>Minor</b> : {{ $item->minor }}
                                                        </div>
                                                    @endif
                                                    @if($item->major)
                                                        <div class="col-md-6">
                                                            <b>Major</b> : {{ $item->major }}
                                                        </div>
                                                    @endif 
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td style="width: 200px">
                                            @if($item->product->images->isNotEmpty()) 
                                                <img src="{{ asset('uploads/products/small/' . $item->product->images->first()->image1) }}" alt="Product Image" class="img-thumbnail" style="100%">
                                            @else
                                                <img src="{{ asset('uploads/products/small/default.jpg') }}" alt="Default Image" style="width: 80px;">
                                            @endif
                                        </td>
                                        <td>
                                            <h4 class="mb-1">{{ $item->name }}</h4>
                                            <p style="font-size: 14px; margin:0;">
                                                @if($item->category)
                                                    <b>Selected:</b> {{ $item->category }},
                                                @endif 
                                                @if($item->size)
                                                    <b>Size:</b> {{ $item->size }}, 
                                                @endif 
                                                @if($item->color)
                                                    <b>Color:</b> {{ $item->color }}
                                                @endif 
                                                @if($item->font)
                                                    <b>Font:</b> {{ $item->font }}
                                                @endif <br />
                                                @if($item->selected_product_name)
                                                    <b>Product Name:</b> {{ $item->selected_product_name }}
                                                @endif <br />
                                                @if($item->selected_product)
                                                    <a href="#"data-toggle="modal" data-target="#largeModal">
                                                        <img src="{{ asset('uploads/icons/selection/' . $item->selected_product) }}" alt="Product Image" class="img-thumbnail mt-2" style="width:100px;">
                                                    </a>                                                            
                                                @endif                                                             
                                            </p>
                                                
                                            
                                                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Selected Product</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('uploads/icons/selection/' . $item->selected_product) }}" alt="Product Image" class="img-thumbnail" >
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                
                                                <!-- small modal -->
                                                <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Small Modal</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Modal Body</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if($item->selected_product)
                                                            <img src="{{ asset('uploads/icons/selection/' . $item->selected_product) }}" alt="Product Image" class="img-thumbnail">
                                                        @endif 
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </td>
                                
                                    @if($item->qty > 1)
                                        <td class="text-right">₹ {{ number_format($item->price,2) }}</td>
                                        <td class="text-center">{{ $item->qty }}</td>    
                                    @endif
                                    
                                    <td class="text-right">₹ {{ number_format($item->total,2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td @if($item->qty > 1) @endif class="text-right">Subtotal:</td>
                                <td class="text-right">₹ {{ number_format($order->subtotal,2) }}</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td  @if($item->qty > 1) @endif  class="text-right">Discount: {{ (!empty($order->coupon_code)) ? '('.$order->coupon_code.')' : '' }}</td>
                                <td class="text-right">₹ {{ number_format($order->discount,2) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  @if($item->qty > 1) @endif  class="text-right">Shipping:</td>
                                <td class="text-right">₹ {{ number_format($order->shipping,2) }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  @if($item->qty > 1) @endif  class="text-right">Grand Total:</td>
                                <th class="text-right">₹ {{ number_format($order->grandtotal,2) }}</th>
                            </tr>                                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">                                      
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                @csrf
                @method('PUT') 

                <h2 class="h4 mb-3">Order Status</h2>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status"  class="form-select">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="mb-3 mt-2">
                    <div class="form-group">
                        <label for="shipped_date">Shipped Date</label>
                        <input placeholder="Shipped Date" autocomplete="off" value="{{ $order->shipped_date }}" type="text" name="shipped_date" id="shipped_date" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
            <form action="" method="post" name="sendInvoiceEmail" id="sendInvoiceEmail" class="mt-3">
                <h2 class="h4 mb-3">Send Inovice Email</h2>
                <div class="mb-3">
                    <select name="userType" id="userType" class="form-select">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button class="btn btn-primary">Send</button>
            </form>                   
        </div>
    </div>
</div>
@endsection

@section('customJs')
    <script>
        $(document).ready(function(){
            $('#shipped_date').datetimepicker({
                format:'Y-m-d H:i:s',
            });
        });

        $("#changeOrderStatusForm").submit(function(event){
            event.preventDefault();
            var element = $(this);

            if (confirm("Are you sure you want to change status?")){
                $.ajax({
                    url: '{{ route("orders.changeOrderStatus",$order->id) }}',
                    type: 'post',
                    data: element.serializeArray(),
                    dataType: 'json',
                    success: function(response){
                        window.location.href='{{ route("orders.detail",$order->id ) }}';
                    }
                });
            }
        });

        $("#sendInvoiceEmail").submit(function(event){
            event.preventDefault();
            var element = $(this);

            if (confirm("Are you sure you want to send email?")){
                $.ajax({
                    url: '{{ route("orders.sendInvoiceEmail",$order->id) }}',
                    type: 'post',
                    data: element.serializeArray(),
                    dataType: 'json',
                    success: function(response){
                        window.location.href='{{ route("orders.detail",$order->id ) }}';
                    }
                });
            }
        });
    </script>
@endsection
