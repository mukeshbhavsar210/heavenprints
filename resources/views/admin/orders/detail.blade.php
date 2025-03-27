@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order: #{{ $order->id }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                @include('admin.message')
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header pt-3">
                            <h1 class="h5 mb-3">Shipping Address</h1>
                            <div class="row invoice-info">
                                <div class="col-sm-7 invoice-col">
                                    <address>
                                        <h4>{{ $order->customerAddress->first_name.' '.$order->customerAddress->last_name.'' }} </h4>
                                        {{ $order->customerAddress->apartment }},
                                        {{ $order->customerAddress->address }}<br>
                                        {{ $order->customerAddress->city }},
                                        {{ $order->customerAddress->zip }}.
                                        {{ $order->customerAddress->countryName }}
                                        {{ $order->countryName }}<br>
                                        Phone: {{ $order->customerAddress->mobile }},<br>
                                        Email: {{ $order->customerAddress->email }},
                                    </address>
                                </div>

                                <div class="col-sm-5">
                                    <div class="row">
                                        <div class="col-sm-6 text-right">Invoice</div>
                                        <div class="col-sm-6"><b>#007612</b></div>
                                    </div>

                                    @foreach($order->payments as $payment)
                                    @endforeach

                                    <div class="row">
                                        <div class="col-sm-6 text-right"><span>Payment ID:</span></div>
                                        <div class="col-sm-6"><b>{{ $payment->razorpay_payment_id }} </b></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 text-right"><span>Order ID:</span></div>
                                        <div class="col-sm-6"><b>{{ $order->id }}</b></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 text-right"><span>Total:</span></div>
                                        <div class="col-sm-6"><b>₹ {{ number_format($order->grandtotal,2) }} - {{ $payment->status }}</b></div>
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

                                    <div class="row">
                                        <div class="col-sm-6 text-right"><span>Shipped Date:</span></div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-body table-responsive p-3">
                                <table class="table table-striped">
                                    <thead>
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
                                                    <td style="width: 100px">
                                                        @if($item->product->images->isNotEmpty()) 
                                                            <img src="{{ asset('uploads/product/small/' . $item->product->images->first()->image) }}" alt="Product Image" class="img-thumbnail" style="width: 80px;">
                                                        @else
                                                            <img src="{{ asset('uploads/product/small/default.jpg') }}" alt="Default Image" style="width: 80px;">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <h5>{{ $item->name }}</h5>
                                                        <p style="font-size: 14px; margin:0;">
                                                            @if($item->size)
                                                                <b>Size:</b> {{ $item->size }}
                                                            @endif 
                                                            @if($item->color)
                                                                <b>Color:</b> {{ $item->color }}
                                                            @endif 
                                                        </p>
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

                    <div class="col-md-3">
                        <div class="card">
                            <form action="" method="post" name="changeOrderStatusForm" id="changeOrderStatusForm">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Order Status</h2>
                                    <div class="mb-3">
                                        <select name="status" id="status" class="form-control">
                                            <option value="pending" {{ ($order->status == 'pending') ? 'selected' : ''}}>Pending</option>
                                            <option value="shipped" {{ ($order->status == 'shipped') ? 'selected' : ''}}>Shipped</option>
                                            <option value="delivered" {{ ($order->status == 'delivered') ? 'selected' : ''}}>Delivered</option>
                                            <option value="cancelled" {{ ($order->status == 'cancelled') ? 'selected' : ''}}>Cancelled</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="shipped_date">Shipped Date</label>
                                        <input placeholder="Shipped Date" autocomplete="off" value="{{ $order->shipped_date }}" type="text" name="shipped_date" id="shipped_date" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" name="sendInvoiceEmail" id="sendInvoiceEmail">
                                    <h2 class="h4 mb-3">Send Inovice Email</h2>
                                    <div class="mb-3">
                                        <select name="userType" id="userType" class="form-control">
                                            <option value="customer">Customer</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
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
