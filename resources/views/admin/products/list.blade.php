@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Products</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">

        @include('admin.message')

        <div class="card">
            <form action="" method="get" >
                <div class="card-header">
                    <div class="card-title">
                        <button type="button" onclick="window.location.href='{{ route('products.index') }}'" class="btn btn-default btn-sm">Reset</button>
                    </div>

                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body table-responsive p-0">
                @php
                    use Illuminate\Support\Str;
                @endphp

                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th width="80"></th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach($products as $product)
                            @php
                                $productImage = $product->product_images->first();
                            @endphp
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <a href="{{ route('front.product',$product->slug) }}" target="_blank" >
                                        @if (!empty($productImage->image1))
                                            <img src="{{ asset('uploads/products/small/'.$productImage->image1) }}" class="img-thumbnail" width="75" >
                                            @else
                                            <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" class="img-thumbnail" width="75"  />
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    <h5 class="mb-0">{{ Str::limit($product->name, 30, '...') }}</h5>
                                    <span style="font-size:14px;">
                                        @if(!empty($product->sizes))
                                            @php
                                                $decodedSizes = json_decode($product->sizes, true); // Decode as an array
                                            @endphp

                                            @if(is_array($decodedSizes))
                                                , <b>Size:</b> {{ implode(', ', $decodedSizes) }}
                                            @else
                                                , <b>Size:</b> {{ $product->sizes }} <!-- Fallback in case it's not JSON -->
                                            @endif
                                        @endif

                                        {{-- @if (!empty($product->sizes))
                                            <b>Size:</b>
                                            @foreach(json_decode($product->sizes) as $size)
                                                {{ $size }},
                                            @endforeach
                                        @endif --}}

                                        @if(!empty($product->colors))
                                            @php
                                                $decodedColors = json_decode($product->colors, true); // Decode as an array
                                            @endphp

                                            @if(is_array($decodedColors))
                                                , <b>Color:</b> {{ implode(', ', $decodedColors) }}
                                            @else
                                                , <b>Color:</b> {{ $product->colors }} <!-- Fallback in case it's not JSON -->
                                            @endif
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    @if($product->product_type == 'Neon') 
                                        <span class="neon_product">{{ $product->product_type }}</span><br />
                                    @elseif($product->product_type == 'Metal')
                                        <span class="metal_product">{{ $product->product_type }}</span><br />
                                    @else 
                                        <span class="default_product">{{ $product->product_type }}</span><br />
                                    @endif

                                    <span style="font-size:14px;">
                                        @if($product->metal_type)
                                            ({{ $product->metal_type }})
                                        @endif
                                    </span>
                                </td>
                                <td>₹{{ $product->price }}<br />
                                    <span style="font-size:14px;">
                                        @if($product->compare_price)
                                            Offer: {{ $product->compare_price }}
                                        @else
                                            <span>No Offer</span>
                                        @endif
                                    </span>      
                                </td>
                                <td>{{ $product->qty }} <span style="font-size:14px;">Stock</span><br />
                                    <span style="font-size:14px;">{{ $product->sku }}</span>                                    
                                </td>
                                <td>
                                    @if ($product->status == 1)
                                        <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif                               
                                    <a href="{{ route('products.edit', $product->id) }}" class="ml-1">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                
                                    <a href="#" onclick="deleteProduct( {{ $product->id }} )" class="text-danger w-4 h-4">
                                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                          </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>Records not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customJs')

<script>
    function deleteProduct(id){
        var url = '{{ route("products.delete","ID") }}'
        var newUrl = url.replace("ID",id)

        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                success: function(response){
                    if(response["status"]){
                        window.location.href="{{ route('products.index') }}"
                    } else {
                        window.location.href="{{ route('products.index') }}"
                    }
                }
            });
        }
    }
</script>
@endsection