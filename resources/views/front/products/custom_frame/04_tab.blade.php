<div class="wrap-container">
    <h5 class="title-wrap">Wrap</h5>
    <div class="radio-group row">
        
       
        @if($wrapData)
            @foreach ($wrapData as $key => $value)
                <div class="col-md-3 col-6">     
                    <label class="custom-radio-wrap wrap_01" >
                        <input type="radio" name="wrap" value="{{ $key }}" class="frame-option" > 
                        <div class="wrapMain"><img src="{{ asset('uploads/icons/wrap_borders/'.$value['image']) }}" alt="{{ $value['name'] }}" ></div>
                        <p class="radio-label">{{ $value['name'] }} - ₹{{ number_format($value['price'], 2) }}</p>
                    </label>
                </div>
            @endforeach
        @endif
    </div>    
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Border</h5>
    <div class="radio-group row">       
        @foreach ($borderData as $key => $value)
            <div class="col-md-3 col-6">     
                <label class="custom-radio-wrap wrap_01" >
                    <input type="radio" name="border" value="{{ $key }}" class="frame-option">
                    <div class="wrapMain"><img src="{{ asset('uploads/icons/wrap_borders/'.$value['image']) }}" alt="{{ $value['name'] }}" width="50"></div>
                    <p class="radio-label">{{ $value['name'] }}</p>
                </label>
            </div>
        @endforeach
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
                        @foreach ($standardFrame as $key => $value)
                            <div class="col-md-3 col-6">     
                                <label class="custom-radio wrap_03" >
                                <input type="radio" name="standard_frame" value="{{ $key }}" class="frame-option">
                                    <img class="icon" src="{{ asset('uploads/icons/wrap_borders/frames/standard/'.$value['image']) }}" alt="{{ $value['name'] }}" >
                                    <p class="radio-label">{{ $value['name'] }}</p>
                                    <p class="radio-label">{{ $value['price'] }}</p>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frame_two" aria-expanded="false" aria-controls="frame_two">Premium</button>
            <div id="frame_two" class="accordion-collapse collapse" data-bs-parent="#accordionFrames">
                <div class="accordion-body">
                    <div class="radio-group row">
                        @foreach ($premiumFrame as $key => $value)
                            <div class="col-md-3 col-6">     
                                <label class="custom-radio wrap_03" >
                                    <input type="radio" name="premium_frame" value="{{ $key }}" class="frame-option">
                                    <img class="icon" src="{{ asset('uploads/icons/wrap_borders/frames/premium/'.$value['image']) }}" alt="{{ $value['name'] }}" >
                                    <p class="radio-label">{{ $value['name'] }}</p>
                                    <p>₹ {{ $value['price'] }}</p>
                                </label>
                            </div>
                        @endforeach
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
