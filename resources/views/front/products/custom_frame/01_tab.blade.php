@php
    $tabs = [
        ['name' => 'Canvas', 'id' => 'nav-canvas', 'target' => '#nav_1'],
        ['name' => 'Acrylic', 'id' => 'nav-acrylic', 'target' => '#nav_2'],
        ['name' => 'Metal', 'id' => 'nav-metal', 'target' => '#nav_3'],
        ['name' => 'Wood', 'id' => 'nav-wood', 'target' => '#nav_4'],
        ['name' => 'Others', 'id' => 'nav-others', 'target' => '#nav_5'],
    ];
@endphp

<nav>
    <div class="nav nav-tabs product-tab" id="nav-tab" role="tablist">
        @foreach ($tabs as $tab)
            <button class="nav-link {{ $value->name == $tab['name'] ? 'active' : '' }}" 
                    id="{{ $tab['id'] }}" 
                    data-bs-toggle="tab" 
                    data-bs-target="{{ $tab['target'] }}" 
                    type="button" 
                    role="tab" 
                    aria-controls="{{ str_replace('#', '', $tab['target']) }}" 
                    aria-selected="{{ $value->name == $tab['name'] ? 'true' : 'false' }}">
                {{ $tab['name'] }}
            </button>
        @endforeach
    </div>
</nav>

    <h5 class="mt-1">Shape</h5>
    <div class="size-picker">
        @foreach($shapes as $index => $value)
            <div class="size-picker__item" >
                <input type="radio" name="shape" value="{{ $value }}"  class="size-picker__input" id="shape_{{ $loop->index + 1 }}">
                <label class="size-picker__color" for="shape_{{ $loop->index + 1 }}" >{{ $value }}</label>
            </div>
        @endforeach
    </div> 

    <h5 class="mt-2">Material</h5>
    <div class="size-picker mt-2">
        @foreach ($materialData as $key => $size)
            <div class="size-picker__item" >
                <input type="radio" name="material" value="{{ $key }}" 
                        data-price="{{ $size['price'] }}" class="size-picker__input" id="material_{{ $loop->index + 1 }}">
                <label class="size-picker__color" for="material_{{ $loop->index + 1 }}" >{{ $size['name'] }}</label>
            </div>
        @endforeach
    </div>

<div class="tab-content" id="nav-tabContent">
    @foreach ($firstTotals as $value)
        <div class="tab-pane fade {{ $value->name == 'Canvas' ? 'active show' : '' }}" id="nav_1" role="tabpanel" aria-labelledby="nav-canvas">        
            <div class="paddWrapper">
                <div class="radio-group row">
                    {{-- @foreach ($materialData as $key => $price)
                        <div class="col-md-3 col-6">                                 
                            <label class="custom-radio product" >
                                <input type="radio" name="material" value="{{ $key }}"> {{ $key }} (₹{{ $price }})
                            </label>
                        </div>
                    @endforeach --}}

                    {{-- @if($canvas_data)
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
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ $value->name == 'Acrylic' ? 'active show' : '' }}" id="nav_2" role="tabpanel" aria-labelledby="nav-acrylic">
            <div class="paddWrapper">
                <div class="radio-group row">
                    {{-- @if($acrylic_data)
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
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ $value->name == 'Metal' ? 'active show' : '' }}" id="nav_3" role="tabpanel" aria-labelledby="nav-metal">
            <div class="paddWrapper">
                <div class="radio-group row">
                    {{-- @if($metal_data)
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
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ $value->name == 'Wood' ? 'active show' : '' }}" id="nav_4" role="tabpanel" aria-labelledby="nav-wood">
            <div class="paddWrapper">
                <div class="radio-group row">
                    {{-- @if($wood_data)
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
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="tab-pane fade {{ $value->name == 'Others' ? 'active show' : '' }}" id="nav_5" role="tabpanel" aria-labelledby="nav-others">
            <div class="paddWrapper">
                <div class="radio-group row">
                    {{-- @if($others_data)
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
                    @endif --}}
                </div>
            </div>
        </div>
    @endforeach 
</div>