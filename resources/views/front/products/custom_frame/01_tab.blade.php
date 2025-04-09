<nav>
    <div class="nav nav-tabs product-tab" id="nav-tab" role="tablist">
        <button class="nav-link {{ session('finalPriceData.name') == 'Canvas' ? 'active' : '' }}" id="nav-canvas" data-bs-toggle="tab" data-bs-target="#nav_1" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Canvas</button>
        <button class="nav-link {{ session('finalPriceData.name') == 'Acrylic' ? 'active' : '' }}" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Acrylic</button>
        <button class="nav-link {{ session('finalPriceData.name') == 'Metal' ? 'active' : '' }}" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_3" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Metal</button>
        <button class="nav-link {{ session('finalPriceData.name') == 'Wood' ? 'active' : '' }}" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_4" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Wood</button>
        <button class="nav-link {{ session('finalPriceData.name') == 'Other' ? 'active' : '' }}" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_5" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Other</button>
    </div>
</nav>

<div class="tab-content mt-2" id="nav-tabContent">
   
        <div class="tab-pane fade {{ session('finalPriceData.name') == 'Canvas' ? 'active show' : '' }} " id="nav_1" role="tabpanel" aria-labelledby="nav-canvas">        
            <div class="paddWrapper">
                <div class="radio-group row">
                        @foreach ($canvas_material_data as $key => $size)
                            <div class="col-md-3 col-4">                                 
                                <label class="custom-radio product" >
                                    <input type="radio" name="product" value="{{ $key }}" class="frame-option" data-type="Canvas" data-name="{{ $size['name'] }}" data-price="{{ $size['price'] }}" >
                                    <img class="icon" src="{{ asset('uploads/icons/products/'.$size['image']) }}" alt="" />
                                    <p class="radio-label">{{ $size['name'] }}</p>
                                    <p>Start at</p>
                                    <p>₹{{ number_format($size['price'], 2) }}</p>
                                </label>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ session('finalPriceData.name') == 'Acrylic' ? 'active show' : '' }}" id="nav_2" role="tabpanel" aria-labelledby="nav-acrylic">
            <div class="paddWrapper">
                <div class="radio-group row">
                    @foreach ($acrylic_material_data as $key => $size)
                        <div class="col-md-3 col-4">                                 
                            <label class="custom-radio product" >
                                <input type="radio" name="product" value="{{ $key }}" class="frame-option" data-type="Acrylic" data-name="{{ $size['name'] }}" data-price="{{ $size['price'] }}" >
                                <img class="icon" src="{{ asset('uploads/icons/products/'.$size['image']) }}" alt="" />
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ session('finalPriceData.name') == 'Metal' ? 'active show' : '' }}" id="nav_3" role="tabpanel" aria-labelledby="nav-metal">
            <div class="paddWrapper">
                <div class="radio-group row">
                    @foreach ($metal_material_data as $key => $size)
                        <div class="col-md-3 col-4">                                 
                            <label class="custom-radio product" >
                                <input type="radio" name="product" value="{{ $key }}" class="frame-option" data-type="Metal" data-name="{{ $size['name'] }}" data-price="{{ $size['price'] }}" >
                                <img class="icon" src="{{ asset('uploads/icons/products/'.$size['image']) }}" alt="" />
                                <p class="radio-label">{{ $size['name'] }} </p>
                                <p>Start at</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ session('finalPriceData.name') == 'Wood' ? 'active show' : '' }}" id="nav_4" role="tabpanel" aria-labelledby="nav-wood">
            <div class="paddWrapper">
                <div class="radio-group row">
                    @foreach ($wood_material_data as $key => $size)
                        <div class="col-md-3 col-4">                                 
                            <label class="custom-radio product" >
                                <input type="radio" name="product" value="{{ $key }}" class="frame-option" data-type="Wood" data-name="{{ $size['name'] }}" data-price="{{ $size['price'] }}" >
                                <img class="icon" src="{{ asset('uploads/icons/products/'.$size['image']) }}" alt="" />
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ session('finalPriceData.name') == 'Other' ? 'active show' : '' }}" id="nav_5" role="tabpanel" aria-labelledby="nav-others">
            <div class="paddWrapper">
                <div class="radio-group row">
                    @foreach ($other_material_data as $key => $size)
                        <div class="col-md-3 col-4">                                 
                            <label class="custom-radio product" >
                                <input type="radio" name="product" value="{{ $key }}" class="frame-option" data-type="Other" data-name="{{ $size['name'] }}" data-price="{{ $size['price'] }}" >                                
                                <img class="icon" src="{{ asset('uploads/icons/products/'.$size['image']) }}" alt="" />
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
   
</div>