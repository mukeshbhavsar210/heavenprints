<div class="radio-group row">
    @if ($productSelection->isNotEmpty())                      
        @foreach ($productSelection as $key => $product)
            @php
                $productImage = $product->product_images->first();
            @endphp                
            <div class="col-md-3 col-6 mb-3">   
                <label class="custom-radio-wrap wrap_01" >  
                    <input type="radio" name="product_selection" value="{{ $key }}" data-image="{{ $productImage->image1 }}"  data-name="{{ $product->name }}" data-price="{{ $product->price }}" class="frame-option" > 
                    <div class="productImg">
                        @if (!empty($productImage->image1))
                            <img class="card-img-top" src="{{ asset('uploads/products/small/'.$productImage->image1) }}" >
                        @else
                            <img class="card-img-top" src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
                        @endif
                    </div>  
                    <h6>{{ $product->name }}</h6>
                </label>                        
            </div>
        @endforeach                        
    @endif   
</div>