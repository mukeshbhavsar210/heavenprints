@extends('admin.layouts.app')

@section('content')

@include('admin.message')

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-sm-8 col-12 d-flex">
                        <h3>Products</h3>  
                        <span class="counts">{{ $counts }}</span>                                  
                    </div>
                    <div class="col-sm-4 col-12 d-flex">
                        <div class="flexContainer">
                            <form action="" method="get" >
                                <div class="d-flex">
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
                            <a href="{{ route('products.create') }}" class="btn btn-primary ">Create</a>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>


        <div class="card-body pt-0">
            <div class="table-responsive">

                @php
                    use Illuminate\Support\Str;
                @endphp

                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-top-0">
                                <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'order' => ($sortBy === 'name' && $order === 'asc') ? 'desc' : 'asc']) }}">
                                    Product 
                                    @if($sortBy === 'name')
                                        {{ $order === 'asc' ? '↑' : '↓' }}
                                    @endif
                                </a>
                            </th>
                            <th class="border-top-0">
                                <a href="{{ request()->fullUrlWithQuery(['sort_by' => 'metal_type', 'order' => ($sortBy === 'metal_type' && $order === 'asc') ? 'desc' : 'asc']) }}">
                                    Material 
                                    @if($sortBy === 'metal_type')
                                        {{ $order === 'asc' ? '↑' : '↓' }}
                                    @endif
                                </a>
                            </th>
                            <th class="border-top-0">Size</th>
                            <th class="border-top-0">Color</th>
                            <th class="border-top-0">Price</th>
                            <th class="border-top-0">Sell</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach($products as $product)
                                @php
                                    $productImage = $product->product_images->first();
                                @endphp
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if (!empty($productImage->image1))
                                                <img src="{{ asset('uploads/products/small/'.$productImage->image1) }}" height="50"  class="me-3 align-self-center rounded" />
                                                @else
                                                <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" height="50"  class="me-3 align-self-center rounded"  />
                                            @endif                                     
                                            <div class="flex-grow-1 text-truncate"> 
                                                <h6 class="m-0">{{ Str::limit($product->name, 45, '...') }}</h6>
                                                <a class="fs-12 text-primary" href="{{ route('products.edit', $product->id) }}">{{ $product->id }}</a>                                        
                                            </div>
                                        </div>
                                    </td>                            
                                    <td>
                                        @if($product->metal_type)
                                            {{ $product->metal_type }}
                                        @endif  
                                        <p style="font-size:14px; margin-top:4px;">
                                            @if($product->per_inch)
                                                Rates: ₹{{ $product->per_inch }}
                                            @endif
                                        </p>
                                    </td> 
                                    <td>
                                        @if(!empty($product->sizes))
                                            @php
                                                $decodedSizes = json_decode($product->sizes, true); // Decode as an array
                                            @endphp

                                            @if(is_array($decodedSizes))
                                                <b>Size:</b> {{ implode(', ', $decodedSizes) }}
                                            @else
                                                <b>Size:</b> {{ $product->sizes }} <!-- Fallback in case it's not JSON -->
                                            @endif
                                        @endif
                                    </td>  
                                    <td>
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
                                    </td>                           
                                    <td>₹{{ $product->price }}<br />
                                        <del class="text-muted fs-10">
                                            @if($product->compare_price)
                                                Offer: {{ $product->compare_price }}
                                            @else
                                                <span>No Offer</span>
                                            @endif
                                        </del>   
                                    </td>  
                                    <td>
                                        @if ($product->qty > 0)
                                            <span class="badge bg-primary-subtle text-primary px-2">Stock</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger px-2">Out of Stock</span>
                                        @endif
                                        
                                        {{-- @if($product->sku)
                                            <span style="font-size:13px;">SKU: {{ $product->sku }}</span>
                                        @endif                                     --}}
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
                                    </td>   
                                    <td>                                
                                        <a href="{{ route('products.edit', $product->id ) }}">
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
        </div>

        <div class="card-body pb-0 clearfix">
            {{ $products->links() }}
        </div>          
    </div>    
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