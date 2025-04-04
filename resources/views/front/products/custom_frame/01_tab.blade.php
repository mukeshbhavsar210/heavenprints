<nav>
    <div class="nav nav-tabs product-tab" id="nav-tab" role="tablist">
        <button class="nav-link active " id="nav-canvas" data-bs-toggle="tab" data-bs-target="#nav_1" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Canvas</button>
        <button class="nav-link" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_2" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Acrylic</button>
        <button class="nav-link" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_3" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Metal</button>
        <button class="nav-link" id="nav-acrylic" data-bs-toggle="tab" data-bs-target="#nav_4" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Wood</button>
        <button class="nav-link" id="nav-metal" data-bs-toggle="tab" data-bs-target="#nav_5" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Other</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade active show" id="nav_1" role="tabpanel" aria-labelledby="nav-canvas">        
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($canvas_data)
                    @foreach($canvas_data as $value)
                        <div class="col-md-3 col-6">     
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <img class="icon" src="{{ asset('uploads/icons/products/canvas/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value['name'] }} - {{ $value['type'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav_2" role="tabpanel" aria-labelledby="nav-acrylic">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($acrylic_data)
                    @foreach($acrylic_data as $value)
                        <div class="col-md-3 col-6">     
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <img class="icon" src="{{ asset('uploads/icons/products/acrylic/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value['name'] }} - {{ $value['type'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav_3" role="tabpanel" aria-labelledby="nav-metal">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($metal_data)
                    @foreach($metal_data as $value)
                        <div class="col-md-3 col-6">     
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <img class="icon" src="{{ asset('uploads/icons/products/metal/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value['name'] }} - {{ $value['type'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav_4" role="tabpanel" aria-labelledby="nav-wood">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($wood_data)
                    @foreach($wood_data as $value)
                        <div class="col-md-3 col-6">     
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <img class="icon" src="{{ asset('uploads/icons/products/wood/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value['name'] }} - {{ $value['type'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav_5" role="tabpanel" aria-labelledby="nav-others">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($others_data)
                    @foreach($others_data as $value)
                        <div class="col-md-3 col-6">     
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <img class="icon" src="{{ asset('uploads/icons/products/other/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value['name'] }} - {{ $value['type'] }}</p>
                                <p>Start at</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>