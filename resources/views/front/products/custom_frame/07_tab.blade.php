<div class="card">
    <div class="card-header">
        <h6>Select Product for Print your Photo</h6>
    </div>

    @php
        use Illuminate\Support\Str;
    @endphp

    <div class="card-body">
        <div class="radio-product row">
            @if ($productSelection->isNotEmpty())                      
                @foreach ($productSelection as $key => $product)
                    @php
                        $productImage = $product->product_images->first();
                    @endphp      

                    <div class="col-md-4 col-4 mb-2">   
                        <label class="custom-radio-wrap wrap_01" >  
                            <input type="radio" name="product_selection" value="{{ $key }}" data-image="{{ $productImage->image1 }}"  data-name="{{ $product->name }}" data-price="{{ $product->price }}" class="frame-option" > 
                            <div class="productImg">
                                @if (!empty($productImage->image1))
                                    <img src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                                @else
                                    <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                                @endif
                            </div>  
                            <p>{{ Str::limit($product->name, 15, '...') }}</p>
                            <p>₹{{ $product->price }}</p>
                        </label>                        
                    </div>
                @endforeach                        
            @endif   
        </div>
    </div>
</div>