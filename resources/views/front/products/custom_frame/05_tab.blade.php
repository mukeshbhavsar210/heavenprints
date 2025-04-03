<div class="wrap-container">
    <h5 class="title-wrap">Hardware Options & Style</h5>      
    <div class="container">  
        <div class="row" >
            @if($hardware_styles)
                @foreach($hardware_styles as $value)
                    <div class="col-md-3 col-6"> 
                        <label class="custom-radio hardware_style {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                            <input {{ $loop->first ? 'checked' : '' }} type="radio" name="hardware_style" value="{{ $value->slug }}" class="frame-option"
                                {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                <img src="{{ asset('uploads/icons/hardware/option/'.$value->image) }}" alt="" />
                            <p>{{ $value->name }}</p>
                            <p>₹ {{ $value->price }}</p>
                        </label> 
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Display Option</h5>
    <div class="container">
        <div class="row">
            @if($hardware_displays)
                @foreach($hardware_displays as $value)
                    <div class="col-md-6"> 
                        <label class="custom-radio-small hardware_display {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                            <input {{ $loop->first ? 'checked' : '' }} type="radio" name="hardware_display" value="{{ $value->slug }}" class="frame-option"
                                {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                            <p>{{ $value->name }} (₹ {{ $value->price }})</p>
                        </label>                            
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="wrap-container mt-4">
    <h5 class="title-wrap">Optional Color Finishing</h5>
    <p>Basic</p>        
    <div class="container">
        <div class="row" >
            @if($hardware_basic_finishings)
                @foreach($hardware_basic_finishings as $value)
                    <div class="col-md-3 col-6"> 
                        <label class="custom-radio hardware_style {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                            <input {{ $loop->first ? 'checked' : '' }} type="radio" name="hardware_finishing" value="{{ $value->slug }}" class="frame-option"
                                {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                <img src="{{ asset('uploads/icons/hardware/basic/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value->name }}</p>
                                <p>₹ {{ $value->price }}</p>
                        </label>                            
                    </div>
                @endforeach
            @endif
        </div>        
    </div>

    <p>Advance</p>
    <div class="container">
        <div class="row" >
            @if($hardware_advance_finishings)
                @foreach($hardware_advance_finishings as $value)
                    <div class="col-md-3 col-6"> 
                        <label class="custom-radio hardware_style {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                            <input {{ $loop->first ? 'checked' : '' }} type="radio" name="hardware_finishing" value="{{ $value->slug }}" class="frame-option"
                                {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                                <img class="icon" src="{{ asset('uploads/icons/'.$value->image) }}" alt="" />
                                <p class="radio-label">{{ $value->name }}</p>
                                <p>₹ {{ $value->price }}</p>
                        </label>                            
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
