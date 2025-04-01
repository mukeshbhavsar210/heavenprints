<div class="wrap-container">
    <h5 class="title-wrap">Lamination Options</h5>
    <div class="container">
        <div class="row" >
            @if($laminations)
                @foreach($laminations as $value)
                    <div class="col-md-{{ $value->class }}"> 
                        <label class="custom-radio-small lamination {{ session('frame_class') == $value->slug ? 'active' : '' }}" >                                    
                            <input {{ $loop->first ? 'checked' : '' }} type="radio" name="lamination" value="{{ $value->slug }}" class="frame-option"
                                {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                            <p>{{ $value->name }} 
                                @if($value->price > 0)
                                    (₹ {{ $value->price }})    
                                @endif 
                            </p>
                        </label>                            
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="wrap-container mt-3">
    <h5 class="title-wrap">Minor Photo Retouching</h5>
    <div class="container">
        <div class="row">
            @if($modifications)
                @foreach($modifications as $value)
                    <div class="col-md-6 customCheckbox"> 
                        <input id="retouching_{{ $loop->index }}" type="checkbox" name="retouching" value="299" class="frame-option"
                            {{ session('frame_class') == $value->slug ? 'checked' : '' }}> 
                        <label for="retouching_{{ $loop->index }}" class="lamination {{ session('frame_class') == $value->slug ? 'active' : '' }}" >{{ $value->name }}</label>
                    </div>
                @endforeach
            @endif
            <p class="mt-2">Extra Minor Retouch Price: ₹ 299.00</p>
        </div>
    </div>        
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Major Retouching</h5>
    <textarea rows="3" cols="3" id="major" name="major"  class="form-control"></textarea>
</div>

<div class="wrap-container mt-3">
    <h5 class="title-wrap">Proof Request</h5>
    <div class="customCheckbox">
        <input type="checkbox" value="I want Proof" id="proof" name="proof">
        <label for="proof">Email with link to the design proof will be emailed within 24 hours and has to be approved online.
                Customers should approve their proof(s) as quickly as possible in order to avoid delays in production and shipping times.</label>
        <p>Proof Request Price: ₹49.00</p>
        <p>Note: All prints manufactured by CanvasChamp are Hand made and might have a +- 1 Inch variation from the size ordered.</p>
    </div>
</div>
