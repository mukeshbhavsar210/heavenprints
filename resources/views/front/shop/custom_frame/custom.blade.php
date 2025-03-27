<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('front.layouts.app')

@section('content')

<div class="container-fluid">            
    <div class="customizeFrames">
    <div class="row">                   
        <div class="col-md-5 no-padd">
            <div class="controls">
                <div class="leftControl">
                    <ul class="nav nav-pills framesVerTabs" >
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_01" data-bs-toggle="pill" data-bs-target="#pills-products">
                                <span class="icon icon_product"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_02" data-bs-toggle="pill" data-bs-target="#pills-upload">
                                <span class="icon icon_product"></span>
                                Upload
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_03" data-bs-toggle="pill" data-bs-target="#pills-size">
                                <span class="icon icon_size"></span>
                                Select Size
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_04" data-bs-toggle="pill" data-bs-target="#pills-border">
                                <span class="icon icon_wrap"></span>
                                Wrap & Border
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_05" data-bs-toggle="pill" data-bs-target="#pills-hardware">
                                <span class="icon icon_hardwae"></span>
                                Hardware & Finish
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_06" data-bs-toggle="pill" data-bs-target="#pills-options">
                                <span class="icon icon_options"></span>
                                Options
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="rightControl">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-products" role="tabpanel" aria-labelledby="tab_01">
                            @include('front.shop.custom_frame.01_tab')
                        </div>
                        <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="tab_02">
                            @include('front.shop.custom_frame.02_tab')
                        </div>
                        <div class="tab-pane fade" id="pills-size" role="tabpanel" aria-labelledby="tab_03">
                            @include('front.shop.custom_frame.03_tab') 
                        </div>
                        <div class="tab-pane fade" id="pills-border" role="tabpanel" aria-labelledby="tab_04">
                            <div class="paddWrapper">
                                @include('front.shop.custom_frame.04_tab')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-hardware" role="tabpanel" aria-labelledby="tab_05">
                            <div class="paddWrapper">
                                @include('front.shop.custom_frame.05_tab')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-options" role="tabpanel" aria-labelledby="tab_06">
                            <div class="paddWrapper">
                                @include('front.shop.custom_frame.06_tab')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 no-padd"> 
            <div class="calculation-main">
                <h3>₹<span id="grandTotal">{{ isset($selection['price']) ? $selection['price'] : '0' }}</span></h3>
                <button onclick="customFrame()" class="btn btn-primary btm-sm ml-3">Add to Cart</button>
            </div>
            <div class="frame-generate">
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th>Frame</th>
                            <th>Size</th>
                            <th>Wrap</th>
                            <th>Frame</th>
                            <th>Style</th>
                            <th>Display</th>
                            <th>Finishing</th>
                            <th>Lamination</th>
                            <th>Retouching</th>
                            <th>Proof</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span id="framePrice">₹0</span></td>
                            <td><span id="sizePrice">₹0 </span></td>
                            <td><span id="wrapWrapPrice">₹0</span></td>
                            <td><span id="wrapFramePrice">₹0</span></td>
                            <td><span id="hardwareStylePrice">₹0</span></td>
                            <td><span id="hardwareDisplayPrice">₹0</span></td>
                            <td><span id="hardwareFinishingPrice">₹0</span></td>
                            <td><span id="laminationPrice">₹0</span></td>
                            <td><span id="retouchingPrice">₹0</span></td>
                            <td><span id="proofPrice">₹0</span></td>
                        </tr>
                    </tbody>
                </table>     --}}
                
                {{-- <p><strong>Category:</strong> {{ $selection['category_name'] ?? '' }}, 
                    <strong>Size:</strong> {{ $selection['size'] ?? '' }},
                    <strong>Custom Size 1:</strong> {{ $selection['custom_size_1'] ?? '' }},
                    <strong>Custom Size 2:</strong> {{ $selection['custom_size_2'] ?? '' }}</p> --}}
                
                <div class="renderFrame">                
                    <div class="mainImg">
                        <div class="leftControl"></div>
                        <div class="create-your-prints">
                            <div class="h-scale" style="margin-left: 20px; width: 380px;">
                                <span id="scalewidth">10 inch</span>
                            </div>
                            <div class="v-scale" style="margin-top: 20px; height: 380px;">
                                <span id="scalewidth">10 inch</span>
                            </div>
                            <div class="preview-img">
                                <div class="preview" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
                                    <div id="frameDetails">
                                        <div class="wrapBorder {{ session('frame_class', 'default-class') }}">
                                            <div class="border">
                                                <div class="top-left"></div>
                                                <div class="top-right"></div>
                                                <div class="bottom-left"></div>
                                                <div class="bottom-right"></div>

                                                <div id="image">
                                                    <img id="previewImage1" src="{{ session('uploaded_image') ? asset('storage/' . session('uploaded_image')) : '' }}" 
                                                    style=" display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rightControl"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection


<script>
    function customFrame() {
        let uploadedImageName = "{{ session('uploaded_image') }}";
        let image = uploadedImageName || 'No image found';
        let major = $('#major').val();      
        let frame = $('input[name="frame"]:checked').val() + ' - ₹ ' + $('#framePrice').text() ;
        let size =  $('input[name="size"]:checked').val() + ' - ₹ ' + $('#sizePrice').text();
        let wrap_wrap = $('input[name="wrap_wrap"]:checked').val() + ' - ₹ ' + $('#wrapWrapPrice').text();
        let border = $('input[name="wrap_border"]:checked').val() + ' - ₹ ' + $('#wrapBorderPrice').text();
        let wrap_frame = $('input[name="wrap_frame"]:checked').val() + ' - ₹ ' + $('#wrapFramePrice').text();
        let hardware_style = $('input[name="hardware_style"]:checked').val() + ' - ₹ ' + $('#hardwareStylePrice').text();
        let hardware_display = $('input[name="hardware_display"]:checked').val() + ' - ₹ ' + $('#hardwareDisplayPrice').text();
        let lamination = $('input[name="lamination"]:checked').val() + ' - ₹ ' + $('#laminationPrice').text();
        let proof = $('input[name="proof"]:checked').val() + ' - ₹ ' + $('#proofPrice').text();
        let retouching = $('input[name="retouching"]:checked').val() + ' - ₹ ' + $('#retouchingPrice').text();
        let hardware_finishing = $('input[name="hardware_finishing"]:checked').val() + ' - ₹ ' + $('#retouchingPrice').text();
        let price = $('#grandTotal').text();
        
        $.ajax({
            url: "{{ route('cart.add') }}",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                image: image, frame: frame, size: size, wrap_wrap: wrap_wrap,
                border: border, wrap_frame: wrap_frame, hardware_style: hardware_style,
                hardware_display: hardware_display, lamination: lamination, major: major, proof: proof, 
                retouching: retouching, hardware_finishing: hardware_finishing, price: price,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                window.location.href = "{{ route('front.cart') }}";
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }


    $(document).ready(function () {
        $(".frame-option").change(function () {
            let parentLabel = $(this).closest("label");
            let frameName = $(this).val().toLowerCase();
            $(".wrapBorder").removeClass().addClass("wrapBorder " + frameName);
            $.ajax({
                url: "/store-frame",
                method: "POST",
                data: {
                    frame_class: frameName,
                    _token: $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    console.log("Frame stored in session:", response);
                }
            });
        });        

     // Update Options in Real Time
     $("input[type='radio']").change(function () {
        let formData = {
            _token: '{{ csrf_token() }}',
            frame: $("input[name='frame']:checked").val(),
            size: $("input[name='size']:checked").val(),
            wrap_wrap: $("input[name='wrap_wrap']:checked").val(),
            wrap_frame: $("input[name='wrap_frame']:checked").val(),
            hardware_style: $("input[name='hardware_style']:checked").val(),
            hardware_display: $("input[name='hardware_display']:checked").val(),
            hardware_finishing: $("input[name='hardware_finishing']:checked").val(),
            lamination: $("input[name='lamination']:checked").val(),
            retouching: $("input[name='retouching']:checked").val(),            
            proof: $("input[name='proof']:checked").val(),  
        };

        $.post("{{ route('update.options') }}", formData, function (response) {
            $("#framePrice").text(response.frame_price);
            $("#sizePrice").text(response.size_price);
            $("#wrapWrapPrice").text(response.wrap_wrap_price);
            $("#wrapFramePrice").text(response.wrap_frame_price);            
            $("#hardwareStylePrice").text(response.hardware_style_price);
            $("#hardwareDisplayPrice").text(response.hardware_display_price);
            $("#hardwareFinishingPrice").text(response.hardware_finishing_price);
            $("#laminationPrice").text(response.lamination_price);
            $("#retouchingPrice").text(response.retouching_price);
            $("#proofPrice").text(response.proof_price);
            
            // Calculate Grand Total
            let grandTotal =    parseInt(response.frame_price) + 
                                parseInt(response.size_price) + 
                                parseInt(response.wrap_wrap_price) +
                                parseInt(response.wrap_frame_price) +
                                parseInt(response.hardware_style_price) +
                                parseInt(response.hardware_display_price) +
                                parseInt(response.hardware_finishing_price) +
                                parseInt(response.lamination_price) +
                                parseInt(response.retouching_price) +
                                parseInt(response.proof_price);

            // Update Grand Total
            $("#grandTotal").text(grandTotal);
        });
    });

    function checkSessionImage() {
        $.ajax({
            url: "{{ route('check.image') }}",
            type: "GET",
            success: function (response) {
                if (response.image) {
                    $("#previewImage1").attr("src", response.image).show();
                    $("#imagePreview").show();
                    $("#deleteImage").show();
                    $("#uploadContainer").hide(); // Hide upload button if image exists
                } else {
                    $("#previewImage1").hide();
                    $("#imagePreview").hide();
                    $("#deleteImage").hide();
                    $("#uploadContainer").show(); // Show upload button if no image
                }
            }
        });
    }

    let xhr;
    $('#uploadBtn').on('click', function () {
        let file = $('#image')[0].files[0];
        if (!file) {
            alert("Please select an image!");
            return;
        }

        let formData = new FormData();
        formData.append('image', file);

        $('#progress-container').show();
        $('#progress-bar').css('width', '0%');
        $('#abortBtn').show();

        xhr = $.ajax({
            url: "{{ route('image.upload') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            xhr: function () {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (event) {
                    if (event.lengthComputable) {
                        let percent = Math.round((event.loaded / event.total) * 100);
                        $('#progress-bar').css('width', percent + '%');
                    }
                });
                return xhr;
            },
            success: function (response) {
                if (response.success) {
                    setTimeout(function() {
                        location.reload();
                    }, 100);
                }
                $('#abortBtn').hide();
            },
            error: function () {
                alert("Upload failed!");
                $('#abortBtn').hide();
            }
        });
    });

    $('#abortBtn').on('click', function () {
        if (xhr) {
            xhr.abort();
            alert("Upload Aborted!");
            $('#progress-container').hide();
            $('#abortBtn').hide();
        }
    }); 

    // Delete Image
    $("#deleteImage").click(function () {
        $.ajax({
            url: "{{ route('delete.image') }}",
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            success: function () {
                $("#previewImage1").hide();
                $("#imagePreview").hide();
                $("#deleteImage").hide();
                location.reload();
            },
            error: function () {
                alert("Image deletion failed!");
            }
        });
    });
    checkSessionImage();
});
</script>