@extends('front.layouts.app')

@section('content')

<section>
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
            <li class="breadcrumb-item active">Customise Neon</li>
        </ol>
              
        <div class="row">                   
            <div class="col-md-7 col-12">   
                <div class="svgGenerate stickySVG">
                    <div id="previewContainer">
                        <svg id="previewSVG" width="100%" height="250" style="background: black" xmlns="http://www.w3.org/2000/svg" >
                            <text x="50%" y="50%" font-family="Passionate" font-size="50" fill="white" text-anchor="middle" alignment-baseline="middle">Text Preview</text>
                        </svg>
                    </div>                        
                    {{-- <button class="btn btn-primary" onclick="downloadSVG()" >Download SVG</button> --}}
                </div>
            </div>
                    
            <div class="col-md-5 col-12">
                <h2 id="neon-form" class="mobile_margin">Customize Neon</h2>  
                <h2 id="floro-form" class="mobile_margin d-none">Customize FloRo Lights</h2>  

                <div class="categoryPicker">
                    <div class="categoryPicker__item" >
                        <input checked type="radio" name="light_category" value="You selected: NEON Light" id="neonBtn" class="categoryPicker__input" >
                        <label for="neonBtn" class="categoryPicker__color">I want NEON Light</label>
                    </div>
                    <div class="categoryPicker__item" >
                        <input type="radio" name="light_category" value="You selected: FLORO Light" id="floroBtn" class="categoryPicker__input">
                        <label for="floroBtn" class="categoryPicker__color" >I want FLORO Light</label>
                    </div>
                </div>
                
                <h3>₹<span id="price">0</span></h3>
                
                <p class="mb-1 mt-3"><b>Type your text</b></p>   
                <input type="text" id="text" placeholder="Enter text" class="fotm-control">

                @php
                    $randomNumber = rand(100000, 999999);
                @endphp

                <input type="hidden" id="neon_id" value="{{ $randomNumber }}" readonly>
                
                <!-- Font Selection -->
                <p class="mb-1 mt-4"><b>Pick your font</b></p>
                <div class="fontScroll">
                    <div class="font-picker">
                        @foreach ($fonts as $font)
                            <div class="font-picker__item" >
                                <input type="radio" name="font" value="{{ $font }}" onchange="updatePreview()" {{ $loop->first ? 'checked' : '' }} id="font_{{ $loop->index + 1 }}" class="font-picker__input">
                                <label class="font-picker__color" for="font_{{ $loop->index + 1 }}">
                                    <span style="font-family:{{ $font }};">{{ $font }}</span>    
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card-body p-0 mt-3" id="neon-body">
                    <div class="groupDetails">
                        <p><b>Select your color</b></p>
                        <div class="color-picker">
                            @foreach ($colors as $value)
                                <div class="color-picker__item" >
                                    <input type="radio" name="color" value="{{ $value }}" onchange="updatePreview()" {{ $loop->first ? 'checked' : '' }}  class="color-picker__input" id="color_{{ $loop->index + 1 }}">
                                    <label class="color-picker__color" for="color_{{ $loop->index + 1 }}"  style="background-color: {{ $value }};"></label>
                                </div>
                            @endforeach
                        </div>                       
                    </div>    
                </div>

                <div class="groupDetails">
                    <p>Pick Your Size?</p>
                    <div class="pickSize">
                        <div class="size-picker">
                            <div class="size-picker__item" >
                                <input checked type="radio" name="size" value="Regular" onclick="applySize(50)" id="size_picker_01" class="size-picker__input">
                                <label class="size-picker__color" for="size_picker_01">
                                    <h6>Regular</h6>
                                    <p>Width:3" <br/> Height:10"</p>
                                </label>
                            </div>

                            <div class="size-picker__item" >
                                <input type="radio" name="size" value="Medium" onclick="applySize(60)" id="size_picker_02" class="size-picker__input">
                                <label class="size-picker__color" for="size_picker_02">
                                    <h6>Medium</h6>
                                    <p>Width:3" <br/> Height:10"</p>
                                </label>
                            </div>

                            <div class="size-picker__item" >
                                <input type="radio" name="size" value="Large" onclick="applySize(70)" id="size_picker_03" class="size-picker__input">
                                <label class="size-picker__color" for="size_picker_03">
                                    <h6>Large</h6>
                                    <p>Width:3" <br/> Height:10"</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" onclick="saveSVG()">Add to Cart</button>
            </div>
        </div>

        <div class="accordion accordion-flush mt-5" id="faq">
            <h3 class="mb-3">Frequently Asked Questions</h3>
            <div class="accordion-item">
                <div class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-1" aria-expanded="false" aria-controls="collapseOne-1">
                        <h6>How much does a customized neon sign cost?</h6>
                    </button>
                </div>
                
                <div id="collapseOne-1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p>The prices for regular custom neon sign signs start at Rs. 2100/- These are highly competitive prices, especially for the quality and support that we provide you; from the design stage through shipment and delivery.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-2" aria-expanded="false" aria-controls="collapseOne-1">
                        <h6>I have my own design/logo. Can I get it customised into a neon sign?</h6>
                    </button>
                </div>
                
                <div id="collapseOne-2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p>Yes, we can customise your logo or any design into a neon sign. Please reach out to us on <a href="https://wa.link/neonattack" target="_blank" aria-describedby="a11y-new-window-external-message" rel="noopener">WhatsApp at</a> and send us your logo, reference image, or design and we will share a virtual mockup of the neon sign with you.</p>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="accordion-item">
                <div class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-3" aria-expanded="false" aria-controls="collapseOne-3">
                        <h6>How long will it take to deliver my neon sign?</h6>
                    </button>
                </div>
                <div id="collapseOne-3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p class="para">All our unique neon signs are handmade after your order is received. Standard orders take 10-14 working days, Express Orders take 4-6 working days to deliver. You can select the shipping method at checkout.
                            </p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="accordion-item">
                <div class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-4" aria-expanded="false" aria-controls="collapseOne-4">
                        <h6>Can you do a rush order? </h6>
                    </button>
                </div>
                <div id="collapseOne-4" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p class="para">Yes, we can prioritise your order in production and ship it via air if you choose “Express Order” as a shipping method at checkout. It will cost you Rs. 2000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header" id="headingFifth">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-5" aria-expanded="false" aria-controls="collapseOne-5">
                        <h6>If I customize a sign using the online neon sign maker, what will be its exact size? </h6>
                    </button>
                </div>
                <div id="collapseOne-5" class="accordion-collapse collapse" aria-labelledby="headingFifth" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p class="para">The size of your customised neon sign depends on the font you choose. But generally, the height of our large signs is between 14-16 inches and the medium signs are around 11-13 inches. The length of the sign is determined by the number of letters and fonts that you use. For further details, you can refer to our size chart.</p>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="accordion-item">
                <div class="accordion-header" id="headingSixth">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-6" aria-expanded="false" aria-controls="collapseOne-6">
                        <h6>What are the small marks on my sign?</h6>
                    </button>
                </div>
                <div id="collapseOne-6" class="accordion-collapse collapse" aria-labelledby="headingSixth" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="navbar-nav">
                            <p class="para">Since our neon signs are handmade, sometimes there are small marks on the acrylic or glue marks where the PVC tube has been attached to the acrylic. In these rare instances where the marks are evident, they are always minor and invisible when the sign is switched on. </p>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let selectedFontSize = 40; // Default size

    function applySize(size) {
        selectedFontSize = size;
        updatePreview();
    }

    function updatePreview() {
        let text = $('#text').val() || "Preview Text";
        let fontColor = $('#color').val() || "#000000";
        let lightCategory = $('input[name="light_category"]:checked').val() || "Neon Selected";
        let font = $('input[name="font"]:checked').val() || "Passionate";
        let color = $('input[name="color"]:checked').val() || "#000000";
        let size = $('input[name="size"]:checked').val() || "#000000";
        let charCount = text.length;
        let price = charCount * 3000;
        let encodedFont = font.replace(/\s+/g, '+'); // Convert "Times New Roman" -> "Times+New+Roman"
        let svgContent = `
            <svg width="100%" height="250" style="background: black"  xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=${encodedFont}&display=swap');
                        text {
                            font-family: '${font}', sans-serif;
                        }
                    </style>
                </defs>
                <text x="50%" y="50%" font-family="${font}" font-size="${selectedFontSize}" fill="${color}" text-anchor="middle" alignment-baseline="middle">${text}</text>
            </svg>
        `;            

        $('#previewContainer').html(svgContent);
        $('#price').text(price);
    }

    function downloadSVG() {
        let svgContent = $('#previewContainer').html();
        let blob = new Blob([svgContent], { type: "image/svg+xml" });
        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "generated.svg";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function saveSVG() {
        let svgData = $('#previewContainer').html();
        let text = $('#text').val();
        let neon_id = $('#neon_id').val();
        let color = $('input[name="color"]:checked').val();
        let size = $('input[name="size"]:checked').val();
        let light_category = $('input[name="light_category"]:checked').val();
        let font = $('input[name="font"]:checked').val();
        let price = $('#price').text();

        $.ajax({
            url: "{{ route('save.svg') }}",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                neon_id: neon_id,
                text: text,                
                color: color,
                size: size,
                font: font,
                price: price,
                light_category: light_category,
                svg: svgData,                
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                //alert("You successfully added to cart!");
                window.location.href = "{{ route('front.cart') }}";
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }

    $('#text').on('input', updatePreview);
    $('input[name="font"]').on('change', updatePreview);
    $('input[name="color"]').on('change', updatePreview);

    $('.toggle-radio').change(function () {
        let selectedOptions = $('input[name="option"]:checked').map(function () {
            return this.value;
        }).get();

        if (selectedOptions.includes("option1") && selectedOptions.includes("option2")) {
            $("#hiddenDiv").show();
        } else {
            $("#hiddenDiv").hide();
        }
    });
</script>
@endsection