<div class="wrap-container">
    <h5 class="title-wrap">Wrap</h5>
    <div class="radio-group row">
            @php
                $colors = [
                    ['name' => 'Black', 'code' => '#000000'],
                    ['name' => 'White', 'code' => '#FFFFFF'],
                    ['name' => 'Blue', 'code' => '#0000FF'],
                    ['name' => 'Red', 'code' => '#FF0000'],
                    ['name' => 'Green', 'code' => '#008000']
                ];
            @endphp
        
            @foreach ($colors as $value)
                <div class="col-md-3 col-6">     
                    <label class="">
                        <input type="radio" name="color" value="{{ $value['name'] }}" />
                        <span>{{ $value['name'] }}</span>
                        <p class="radio-label">{{ $value['name'] }}</p>
                    </label>
                </div>
            @endforeach
        

        @if($wraps_data)
            @foreach($wraps_data as $value)
                <div class="col-md-3 col-6">     
                    <label class="custom-radio-wrap wrap_01" >
                        <input type="radio" name="wrap" value="{{ $value['name'] }}" class="frame-option" id="material_{{ $loop->index + 1 }}">
                        <div class="object" style="height:{{ $value['height'] }}px; width:{{ $value['width'] }}px;"></div>
                        <div class="wrapMain"><img src="{{ asset('uploads/icons/wrap_borders/'.$value->image) }}" alt="" /></div>
                        {{-- <img src="{{ asset('storage/' . $size['image']) }}" alt="{{ $size['name'] }}" width="50"> --}}
                        <p class="radio-label">{{ $value['name'] }} - ₹{{ number_format($value['price'], 2) }}</p>
                    </label>
                </div>
            @endforeach
        @endif

        {{-- @if($wraps_data)
            @foreach($wraps_data as $value)
                <div class="col-md-3 col-6"> 
                    <label class="custom-radio-wrap wrap_01 {{ session('frame_class') == $value->slug ? 'active' : '' }}" >
                        <input {{ $loop->first ? 'checked' : '' }} type="radio" name="wrap_wrap" value="{{ $value->slug }}" class="frame-option"
                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                            <div class="wrapMain"><img src="{{ asset('uploads/icons/wrap_borders/'.$value->image) }}" alt="" /></div>
                            <p class="radio-label">{{ $value->name }}<br />₹ {{ $value->price }}</p>
                    </label>                    
                </div>
            @endforeach
        @endif --}}
    </div>    
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Border</h5>
    <div class="radio-group row">
        @if($wrap_borders)
            @foreach($wrap_borders as $value)
                <div class="col-md-3 col-6"> 
                    <label class="custom-radio-wrap wrap_02 {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                        <input {{ $loop->first ? 'checked' : '' }} type="radio" name="wrap_border" value="{{ $value->slug }}" class="frame-option"
                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                            <div class="wrapMain"><img src="{{ asset('uploads/icons/wrap_borders/'.$value->image) }}" alt="" /></div>
                            <p class="radio-label">{{ $value->name }} <br />Free</p>
                    </label>                    
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Frames</h5>
    
    <div class="accordion accordion-flush" id="accordionFrames">
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frame_one" aria-expanded="false" aria-controls="frame_one">Standard</button>
            <div id="frame_one" class="accordion-collapse collapse" data-bs-parent="#accordionFrames">
                <div class="accordion-body">
                    <div class="radio-group row">
                        @if($standards)
                            @foreach($standards as $value)
                                <div class="col-md-3 col-6"> 
                                    <label class="custom-radio wrap_03 {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                                        <input type="radio" name="wrap_frame" value="{{ $value->slug }}" class="frame-option"
                                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                            <img class="icon" src="{{ asset('uploads/icons/wrap_borders/frames/standard/'.$value->image) }}" alt="" />
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
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frame_two" aria-expanded="false" aria-controls="frame_two">Premium</button>
            <div id="frame_two" class="accordion-collapse collapse" data-bs-parent="#accordionFrames">
                <div class="accordion-body">
                    <div class="radio-group row">
                        @if($premium)
                            @foreach($premium as $value)
                                <div class="col-md-3 col-6"> 
                                    <label class="custom-radio wrap_03 {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                                        <input type="radio" name="wrap_frame" value="{{ $value->slug }}" class="frame-option"
                                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                            <img class="icon" src="{{ asset('uploads/icons/wrap_borders/frames/premium/'.$value->image) }}" alt="" />
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
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frame_three" aria-expanded="false" aria-controls="frame_three">Floating</button>
            <div id="frame_three" class="accordion-collapse collapse" data-bs-parent="#accordionFrames">
                <div class="accordion-body">
                    <div class="radio-group row">
                        @if($floating)
                            @foreach($floating as $value)
                                <div class="col-md-3 col-6"> 
                                    <label class="custom-radio wrap_03 {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                                        <input type="radio" name="wrap_frame" value="{{ $value->slug }}" class="frame-option"
                                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                            <img class="icon" src="{{ asset('uploads/icons/wrap_borders/frames/floating/'.$value->image) }}" alt="" />
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
    </div>
</div>
