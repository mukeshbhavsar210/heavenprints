<nav>
    <div class="nav nav-tabs product-tab" id="nav-tab" role="tablist">
        <button class="nav-link {{ isset($selection['category_name']) && $selection['category_name'] == 'canvas' ? 'active' : '' }}" id="nav-canvas" data-bs-toggle="tab" data-bs-target="#nav_1" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Canvas</button>
        <button class="nav-link {{ isset($selection['category_name']) && $selection['category_name'] == 'acrylic' ? 'active' : ' ' }}" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Acrylic</button>
        <button class="nav-link {{ isset($selection['category_name']) && $selection['category_name'] == 'metal' ? 'active' : ' ' }}" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_3" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Metal</button>
        <button class="nav-link {{ isset($selection['category_name']) && $selection['category_name'] == 'wood' ? 'active' : ' ' }}" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_4" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Wood</button>
        <button class="nav-link {{ isset($selection['category_name']) && $selection['category_name'] == 'others' ? 'active' : ' ' }}" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_5" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Other</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade {{ isset($selection['category_name']) && $selection['category_name'] == 'canvas' ? 'active show' : ' ' }}" id="nav_1" role="tabpanel" aria-labelledby="nav-canvas">        
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($canvas)
                    @foreach($canvas as $value)
                        <div class="col-md-3 col-6"> 
                            <label class="custom-radio product {{ isset($selection['category_name']) && $selection['category_name'] == 'canvas' ? 'active' : ' ' }}" >
                                <input {{ $value->types }} type="radio" name="frame" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['category_name']) &&  $selection['category_name'] == 'canvas' ? 'checked' : ' ' }} > 
                                    <img class="icon" src="{{ asset('uploads/icons/products/canvas/'.$value->image) }}" alt="" />
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>Start at</p>
                                    <p>₹ {{ $value->price }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade {{ isset($selection['category_name']) && $selection['category_name'] == 'acrylic' ? 'active show' : ' ' }}" id="nav_2" role="tabpanel" aria-labelledby="nav-acrylic">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($acrylic)
                    @foreach($acrylic as $value)
                        <div class="col-md-3 col-6"> 
                            <label class="custom-radio product {{ isset($selection['category_name']) && $selection['category_name'] == 'acrylic' ? 'active' : ' ' }}" >                                    
                                <input type="radio" name="frame" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['category_name']) && $selection['category_name'] == 'acrylic' ? 'checked' : ' ' }} > 
                                    <img class="icon" src="{{ asset('uploads/icons/products/acrylic/'.$value->image) }}" alt="" />
                                    <p class="radio-label">{{ $value->name }} - {{ $value->type }}</p>
                                    <p>Start at</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade {{ isset($selection['category_name']) && $selection['category_name'] == 'metal' ? 'active show' : ' ' }}" id="nav_3" role="tabpanel" aria-labelledby="nav-metal">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($metal)
                    @foreach($metal as $value)
                        <div class="col-md-3 col-6">  
                            <label class="custom-radio product {{ isset($selection['category_name']) && $selection['category_name'] == 'metal' ? 'active' : ' ' }}" >
                                <input type="radio" name="frame" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['category_name']) && $selection['category_name'] == 'metal' ? 'checked' : ' ' }} > 
                                    <img class="icon" src="{{ asset('uploads/icons/products/metal/'.$value->image) }}" alt="" />
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>Start at</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade {{ isset($selection['category_name']) && $selection['category_name'] == 'wood' ? 'active show' : ' ' }}" id="nav_4" role="tabpanel" aria-labelledby="nav-wood">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($wood)
                    @foreach($wood as $value)
                        <div class="col-md-3 col-6"> 
                            <label class="custom-radio product {{ isset($selection['category_name']) && $selection['category_name'] == 'wood' ? 'active' : ' ' }}" >
                                <input type="radio" name="frame" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['category_name']) && $selection['category_name'] == 'wood' ? 'checked' : ' ' }} > 
                                    <img class="icon" src="{{ asset('uploads/icons/products/wood/'.$value->image) }}" alt="" />
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>Start at</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif 
            </div>
        </div>
    </div>

    <div class="tab-pane fade {{ isset($selection['category_name']) && $selection['category_name'] == 'others' ? 'active show' : ' ' }}" id="nav_5" role="tabpanel" aria-labelledby="nav-others">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($others)
                    @foreach($others as $value)
                        <div class="col-md-3 col-6"> 
                            <label class="custom-radio product {{ isset($selection['category_name']) && $selection['category_name'] == 'others' ? 'active' : ' ' }}" >
                                <input type="radio" name="frame" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['category_name']) && $selection['category_name'] == 'others' ? 'checked' : ' ' }} > 
                                    <img class="icon" src="{{ asset('uploads/icons/products/other/'.$value->image) }}" alt="" />
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>Start at</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>