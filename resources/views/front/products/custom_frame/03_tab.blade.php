<nav>
    <div class="nav nav-tabs size-tab" id="nav-tab" role="tablist">
        <button class="nav-link {{ $value->shape == 'Rectangle' ? 'active' : '' }}" id="tabSize-first" data-bs-toggle="tab" data-bs-target="#size-first" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Recomended</button>
        <button class="nav-link {{ $value->shape == 'Square' ? 'active' : '' }}" id="tabSize-second" data-bs-toggle="tab" data-bs-target="#size-second" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Square</button>
        <button class="nav-link {{ $value->shape == 'Panoramic' ? 'active' : '' }}" id="tabSize-third" data-bs-toggle="tab" data-bs-target="#size-third" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Panoromic</button>
        <button class="nav-link {{ $value->shape == 'Large' ? 'active' : '' }}" id="tabSize-fourth" data-bs-toggle="tab" data-bs-target="#size-fourth" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Large</button>
        <button class="nav-link {{ $value->shape == 'Small' ? 'active' : '' }}" id="tabSize-ffth" data-bs-toggle="tab" data-bs-target="#size-fifth" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Small</button>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade active show" id="size-first" role="tabpanel" aria-labelledby="tabSize-first">
        <div class="paddWrapper">
            <div class="radio-group row">
                @foreach ($sizeData as $key => $value)
                    <div class="col-md-4 col-6">
                        <label class="custom-radio size" >
                            <input type="radio" name="size" value="{{ $key }}" data-price="{{ $value['price'] }}" class="frame-option" >
                            <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                            <p>{{ $value['name'] }}</p>
                            <p>₹{{ $value['price'] }}</p>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-second" role="tabpanel" aria-labelledby="tabSize-second">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($square_data)
                    @foreach ($square_data as $key => $value)
                        <div class="col-md-4 col-6">     
                            <label class="custom-radio size" >
                                <input type="radio" name="size" value="{{ $key }}" class="frame-option" id="custom_metalSize_{{ $loop->index + 1 }}"> 
                                <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                                <p class="radio-label">{{ $value['name'] }}</p>
                                <p>₹{{ number_format($value['price'], 2) }}</p>
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
                @if($panaromic_data)
                @foreach ($panaromic_data as $key => $value)
                    <div class="col-md-4 col-6">     
                        <label class="custom-radio size" >
                            <input type="radio" name="size" value="{{ $key }}" class="frame-option" id="custom_metalSize_{{ $loop->index + 1 }}"> 
                            <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                            <p class="radio-label">{{ $value['name'] }}</p>
                            <p>₹{{ number_format($value['price'], 2) }}</p>
                        </label>
                    </div>
                @endforeach
            @endif

                

                {{-- @if($panaromic_data)
                    @foreach($panaromic_data as $size)
                        <div class="col-md-4 col-6">     
                            <label class="custom-radio size" >
                                <input type="radio" name="size" value="{{ $size['name'] }}" class="frame-option" id="custom_metalSize_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $size['height'] }}px; width:{{ $size['width'] }}px;"></div>
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                        </div>
                    @endforeach
                @endif --}}
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-fourth" role="tabpanel" aria-labelledby="tabSize-fourth">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($large_data)
                    @foreach($large_data as $size)
                        <div class="col-md-4 col-6">     
                            <label class="custom-radio size" >
                                <input type="radio" name="size" value="{{ $size['name'] }}" class="frame-option" id="custom_metalSize_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $size['height'] }}px; width:{{ $size['width'] }}px;"></div>
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="size-fifth" role="tabpanel" aria-labelledby="tabSize-ffth">
        <div class="paddWrapper">
            <div class="radio-group row">
                @if($small_data)
                    @foreach($small_data as $size)
                        <div class="col-md-4 col-6">     
                            <label class="custom-radio size" >
                                <input type="radio" name="size" value="{{ $size['name'] }}" class="frame-option" id="custom_metalSize_{{ $loop->index + 1 }}">
                                <div class="object" style="height:{{ $size['height'] }}px; width:{{ $size['width'] }}px;"></div>
                                <p class="radio-label">{{ $size['name'] }}</p>
                                <p>₹{{ number_format($size['price'], 2) }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>