<div class="wrap-container">
    <h5 class="title-wrap">Lamination Options</h5>
    <div class="container">
        <div class="row" >
            @foreach ($laminationOption as $key => $value)
                <div class="col-md-{{ $value['class'] }}">                     
                    <label class="custom-radio-small lamination" >
                        <input type="radio" name="lamination_option" value="{{ $key }}" class="frame-option" data-name="{{ $value['name'] }}" data-price="{{ $value['price'] }}">  
                        <p class="radio-label">{{ $value['name'] }} (₹ {{ $value['price'] }})</p>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="wrap-container mt-3">
    <h5 class="title-wrap">Minor Photo Retouching</h5>
    <div class="container">
        <div class="row">
            @foreach ($retouchingOption as $key => $value)
                <div class="col-md-6 col-6 customCheckbox">                  
                    <input id="retouching_02_{{ $loop->index }}" type="checkbox" name="retouching_option" value="{{ $key }}" class="frame-option" data-name="{{ $value['name'] }}" data-price="{{ $value['price'] }}"> 
                    <label for="retouching_02_{{ $loop->index }}" class="lamination" >
                        {{ $value['name'] }}
                    </label>
                </div>
            @endforeach
            <p class="mt-2">Extra Minor Retouch Price: ₹ 299.00</p>
        </div>
    </div>        
</div>

<div class="wrap-container">
    <h5 class="title-wrap">Major Retouching</h5>
    <textarea rows="3" cols="3" id="major" name="major"  class="form-control" data-name="{{ $value['name'] }}" data-price="{{ $value['price'] }}"></textarea>
</div>

<div class="wrap-container mt-3">
    <h5 class="title-wrap">Proof Request</h5>
    @foreach ($proofOption as $key => $value)
        <div class="customCheckbox">                  
            <input id="proof_{{ $loop->index }}" type="checkbox" name="proof" value="{{ $key }}" class="frame-option" data-name="{{ $value['name'] }}" data-price="{{ $value['price'] }}"> 
            <label for="proof_{{ $loop->index }}" class="lamination" >
                {{ $value['name'] }}
            </label>
        </div>
    @endforeach

    <p style="font-size: 12px; margin-top:10px;">Proof Request Price: ₹49.00<br />
        Note: All prints manufactured by CanvasChamp are Hand made and might have a +- 1 Inch variation from the size ordered.</p>
</div>
