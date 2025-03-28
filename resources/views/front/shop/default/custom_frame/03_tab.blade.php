<nav>
    <div class="nav nav-tabs size-tab" id="nav-tab" role="tablist">
        <button class="nav-link {{ isset($selection['shape']) && $selection['shape'] == 'Rectangle' ? 'active' : '' }}" id="tabSize-first" data-bs-toggle="tab" data-bs-target="#size-first" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Recomended</button>
        <button class="nav-link {{ isset($selection['shape']) && $selection['shape'] == 'Square' ? 'active' : '' }}" id="tabSize-second" data-bs-toggle="tab" data-bs-target="#size-second" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Square</button>
        <button class="nav-link {{ isset($selection['shape']) && $selection['shape'] == 'Panoramic' ? 'active' : '' }}" id="tabSize-third" data-bs-toggle="tab" data-bs-target="#size-third" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Panoromic</button>
        <button class="nav-link {{ isset($selection['shape']) && $selection['shape'] == 'Large' ? 'active' : '' }}" id="tabSize-fourth" data-bs-toggle="tab" data-bs-target="#size-fourth" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Large</button>
        <button class="nav-link {{ isset($selection['shape']) && $selection['shape'] == 'Small' ? 'active' : '' }}" id="tabSize-ffth" data-bs-toggle="tab" data-bs-target="#size-fifth" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Small</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade active show" id="size-first" role="tabpanel" aria-labelledby="tabSize-first">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($recommended)
                    @foreach($recommended as $index => $value)
                        <div class="col-md-4 col-6">                              
                            <label class="custom-radio size {{ isset($selection['shape']) && $selection['shape'] == 'Rectangle' ? 'active' : ' ' }}" >
                                <input type="radio" name="size" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['shape']) &&  $selection['shape'] == 'Rectangle' ? 'checked' : ' ' }} > 
                                    <div class="object" style="height:{{ $value->height }}px; width:{{ $value->width }}px;"></div>
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-second" role="tabpanel" aria-labelledby="tabSize-second">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($square)
                    @foreach($square as $value)
                        <div class="col-md-4 col-6">  
                            <label class="custom-radio size {{ isset($selection['shape']) && $selection['shape'] == 'Square' ? 'active' : ' ' }}" >
                                <input type="radio" name="size" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['shape']) &&  $selection['shape'] == 'Square' ? 'checked' : ' ' }} > 
                                    <div class="object" style="height:{{ $value->height }}px; width:{{ $value->width }}px;"></div>
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-third" role="tabpanel" aria-labelledby="tabSize-third">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($panaromic)
                    @foreach($panaromic as $value)
                        <div class="col-md-4 col-6">  
                            <label class="custom-radio size {{ isset($selection['shape']) && $selection['shape'] == 'Panoramic' ? 'active' : ' ' }}" >
                                <input type="radio" name="size" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['shape']) &&  $selection['shape'] == 'Panoramic' ? 'checked' : ' ' }} > 
                                    <div class="object" style="height:{{ $value->height }}px; width:{{ $value->width }}px;"></div>
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-fourth" role="tabpanel" aria-labelledby="tabSize-fourth">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($large)
                    @foreach($large as $value)
                        <div class="col-md-4 col-6">  
                            <label class="custom-radio size {{ isset($selection['shape']) && $selection['shape'] == 'Large' ? 'active' : ' ' }}" >
                                <input type="radio" name="size" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['shape']) &&  $selection['shape'] == 'Large' ? 'checked' : ' ' }} > 
                                    <div class="object" style="height:{{ $value->height }}px; width:{{ $value->width }}px;"></div>
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-fifth" role="tabpanel" aria-labelledby="tabSize-ffth">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($small)
                    @foreach($small as $value)
                        <div class="col-md-4 col-6">  
                            <label class="custom-radio size {{ isset($selection['shape']) && $selection['shape'] == 'Small' ? 'active' : ' ' }}" >
                                <input type="radio" name="size" value="{{ $value->slug }}" class="frame-option"
                                    {{ isset($selection['shape']) &&  $selection['shape'] == 'Small' ? 'checked' : ' ' }} > 
                                    <div class="object" style="height:{{ $value->height }}px; width:{{ $value->width }}px;"></div>
                                    <p class="radio-label">{{ $value->name }}</p>
                                    <p>₹ {{ $value->price }}</p>   
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>