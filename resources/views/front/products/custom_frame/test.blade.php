


    <script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	

    document.addEventListener("DOMContentLoaded", function () {
            let showBtn = document.getElementById("showIframeBtn");
            let hideBtn = document.getElementById("hideIframeBtn");
            let iframeContainer = document.getElementById("iframeContainer");
            let defaultContent = document.getElementById("defaultContent");

            // Show iframe & Hide Default Content
            showBtn.addEventListener("click", function () {
                iframeContainer.style.display = "block";
                defaultContent.style.display = "none";  // Hide the default content
                showBtn.style.display = "none"; 
                hideBtn.style.display = "inline-block";
            });

            // Hide iframe & Show Default Content
            hideBtn.addEventListener("click", function () {
                iframeContainer.style.display = "none";
                defaultContent.style.display = "block";  // Show default content again
                showBtn.style.display = "inline-block"; 
                hideBtn.style.display = "none";
            });
        });


	//Add to cart for METAL FRAME
	function addToCart_Metal(id){
		let size =  $('input[name="size"]:checked').val() + '_₹' + $('#sizePrice').text();
		let frame = $('input[name="frame"]:checked').val() + '_₹' + $('#framePrice').text() ;
		let uploadedImageName = "{{ session('uploaded_image') }}";
		let image = uploadedImageName || 'No image found';
		let wrap_wrap = $('input[name="wrap_wrap"]:checked').val() + '_₹' + $('#wrapWrapPrice').text();
    	let major = $('#major').val();        
        let border = $('input[name="wrap_border"]:checked').val() + '_₹' + $('#wrapBorderPrice').text();
        let wrap_frame = $('input[name="wrap_frame"]:checked').val() + '_₹' + $('#wrapFramePrice').text();
        let hardware_style = $('input[name="hardware_style"]:checked').val() + '_₹' + $('#hardwareStylePrice').text();
        let hardware_display = $('input[name="hardware_display"]:checked').val() + '_₹' + $('#hardwareDisplayPrice').text();
        let lamination = $('input[name="lamination"]:checked').val() + '_₹' + $('#laminationPrice').text();
        let proof = $('input[name="proof"]:checked').val() + '_₹' + $('#proofPrice').text();
        let retouching = $('input[name="retouching"]:checked').val() + '_₹' + $('#retouchingPrice').text();
        let hardware_finishing = $('input[name="hardware_finishing"]:checked').val() + '_₹' + $('#retouchingPrice').text();
        let price = $('#grandTotal').text();
		
        $.ajax({
            url: '{{ route("front.addToCart_metal") }}',
            type: 'post',
            data: {
				_token: '{{ csrf_token() }}', // Include CSRF token
				id: id,
				size: size, 
				frame: frame, 
				image: image, 
				wrap_wrap: wrap_wrap,
				major: major, 
                border: border, 
				wrap_frame: wrap_frame, hardware_style: hardware_style,
                hardware_display: hardware_display, lamination: lamination, proof: proof, 
                retouching: retouching, hardware_finishing: hardware_finishing, 
                price: price,
			},
            dataType: 'json',
            success: function(response){
                if(response.status == true){
                    window.location.href= "{{ route('front.cart') }}";
                } else {
                    alert(response.message);
                }
            }
        })
    }

	window.addEventListener("scroll", function() {
		let header = document.getElementById("mainWrapper");
		if (window.scrollY > 100) {
			header.classList.add("sticky-header");
		} else {
			header.classList.remove("sticky-header");
		}
	});

    //Main Calculation
    document.addEventListener('DOMContentLoaded', function () {
        const shapePrices = { 'Square': 100.00, 'Rectangle': 200.00, 'Panoramic': 300.00, 'Large': 400.00, 'Small': 500.00 };
        //let shapePrices = @json($shapePrices);
        let square = @json($square_data);
        let recommended = @json($recommended_data);
        let panaromic = @json($panaromic_data);
        let large = @json($large_data);
        let small = @json($small_data);

        //material
        let canvas = @json($canvas_data);
        let acrylic = @json($acrylic_data);
        let metal = @json($metal_data);
        let wood = @json($wood_data);
        let others = @json($others_data);

        //wrap
        let wrap = @json($wraps_data);

        const colorPrices = { 'Black': 100.00, 'White': 120.00, 'Blue': 150.00, 'Red': 180.00, 'Green': 200.00 }; // Color prices
        
        
        
        const customSizePrices1 = { 8: 50.00, 10: 100.00, 12: 200.00, 14: 300.00, 16: 400.00, 18: 500.00, 20: 600.00 };
        const customSizePrices2 = { 8: 50.00, 10: 100.00, 12: 200.00, 14: 300.00, 16: 400.00, 18: 500.00, 20: 600.00 };

        //let basePrice = {{ $product->price }};
        let basePrice = parseFloat({{ $product->price }}); 
        let finalPrice = basePrice;

        function updatePrice() {
            finalPrice = basePrice; // Reset to base price before calculating

            // Get selected shape price
            const selectedShape = document.querySelector('input[name="shape"]:checked');
            if (selectedShape) {
                finalPrice += shapePrices[selectedShape.value] || 0;
            }

            // **Get selected material price**
            // const selectedMaterial = document.querySelector('input[name="material"]:checked');
            // if (selectedMaterial) {
            //     finalPrice += materialPrices[selectedMaterial.value] || 0;
            // }
            
            // document.querySelectorAll('input[name="shape"]').forEach((radio) => {
            //     radio.addEventListener('change', function() {
            //         let selectedShape = document.querySelector('input[name="shape"]:checked');

            //         let finalPrice = 0; // Reset final price before calculating

            //         if (selectedShape) {
            //             finalPrice += parseFloat(shapePrices[selectedShape.value]) || 0;
            //         }

            //         document.getElementById('finalPrice').innerText = `$${finalPrice.toFixed(2)}`;
            //     });
            // });


            // Get selected size price
            const selectedSize = document.querySelector('input[name="size"]:checked');
            if (selectedSize) {
                let allSizes = [...square, ...recommended, ...panaromic, ...large, ...small, ...canvas]; 
                let sizeDetail = allSizes.find(size => size.name === selectedSize.value);

                if (sizeDetail) {
                    finalPrice += sizeDetail.price;
                }
            }

            // Get selected size price
            const selectedMaterial = document.querySelector('input[name="material"]:checked');
            if (selectedMaterial) {
                let allMaterial = [...canvas, ...acrylic, ...metal, ...wood, ...others]; 
                let materialDetail = allMaterial.find(material => material.name === selectedMaterial.value);

                if (materialDetail) {
                    finalPrice += materialDetail.price;
                }
            }


            // **Get selected color price**
            const selectedColor = document.querySelector('input[name="color"]:checked');
            if (selectedColor) {
                finalPrice += colorPrices[selectedColor.value] || 0;
            }


            // const selectedWrap = document.querySelector('input[name="wrap"]:checked');
            // if (selectedWrap) {
            //     finalPrice += wrap[selectedWrap.value] || 0;
            // }


            // Get selected size price
            // const selectedWrap = document.querySelector('input[name="wrap"]:checked');
            // if (selectedWrap) {
            //     let allWrap = [...wrap, ]; 
            //     let wrapDetail = allWrap.find(wrap => wrap.name === selectedWrap.value);

            //     if (wrapDetail) {
            //         finalPrice += wrapDetail.price;
            //     }
            // }

            

            //Custom value 01
            const selectedCustomSize = parseInt(document.getElementById('customSizeSelect_01').value);
            if (selectedCustomSize && customSizePrices1[selectedCustomSize]) {
                finalPrice += customSizePrices1[selectedCustomSize];                
            } 

            //Custom value 01
            const selectedCustomSize_02 = parseInt(document.getElementById('customSizeSelect_02').value);
            if (selectedCustomSize_02 && customSizePrices1[selectedCustomSize_02]) {
                finalPrice += customSizePrices1[selectedCustomSize_02];                
            } 

            document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
            document.getElementById('finalPrice2').innerText = finalPrice.toFixed(2);
            document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        }

        // **Attach event listeners**
        document.querySelectorAll('input[name="shape"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        document.querySelectorAll('input[name="size"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        document.querySelectorAll('input[name="material"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        document.querySelectorAll('input[name="color"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

        document.querySelectorAll('input[name="wrap"]').forEach(input => {
            input.addEventListener('change', updatePrice);
        });

         // Add event listener for dropdown selection
        document.getElementById('customSizeSelect_01').addEventListener('change', updatePrice);
        document.getElementById('customSizeSelect_02').addEventListener('change', updatePrice);

        // Store calculated price in a hidden input to send via AJAX
        document.getElementById('finalPriceInput').value = finalPrice.toFixed(2);
        document.getElementById('finalPrice').innerText = finalPrice.toFixed(2);
    });

   
    $("#saveOptions").click(function (e) {
        e.preventDefault(); 

        let sizeRadios = document.querySelector('input[name="size"]:checked')?.value || "";
        let category_name = document.getElementById("category_name").value;
        let shapeRadios = document.querySelector('input[name="shape"]:checked')?.value || "";
        let customSizeDropdown1 = document.getElementById("customSizeSelect_01").value;
        let customSizeDropdown2 = document.getElementById("customSizeSelect_02").value;
        let priceInput = document.getElementById("finalPriceInput").value;

        $.ajax({
            url: "{{ route('save.session') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: "{{ $product->id }}", 
                sizeRadios: sizeRadios,
                category_name: category_name,
                shapeRadios: shapeRadios,
                customSizeDropdown1: customSizeDropdown1,
                customSizeDropdown2: customSizeDropdown2,
                priceInput: priceInput
            },
            success: function (response) {
                console.log("Session data saved:", response);
                window.location.href = "{{ route('custom.frame.product', $product->slug) }}";
            },
            error: function (xhr) {
                console.error("Error saving session data:", xhr);
            }
        });
    });  
    
    
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
        // $("input[type='radio']").change(function () {
        //     let formData = {
        //         _token: '{{ csrf_token() }}',
        //         frame: $("input[name='frame']:checked").val(),
        //         size: $("input[name='size']:checked").val(),
        //         wrap_wrap: $("input[name='wrap_wrap']:checked").val(),
        //         wrap_frame: $("input[name='wrap_frame']:checked").val(),
        //         hardware_style: $("input[name='hardware_style']:checked").val(),
        //         hardware_display: $("input[name='hardware_display']:checked").val(),
        //         hardware_finishing: $("input[name='hardware_finishing']:checked").val(),
        //         lamination: $("input[name='lamination']:checked").val(),
        //         retouching: $("input[name='retouching']:checked").val(),            
        //         proof: $("input[name='proof']:checked").val(),  
        //     };

        //     $.post("{{ route('update.options') }}", formData, function (response) {
        //         $("#framePrice").text(response.frame_price);
        //         $("#sizePrice").text(response.size_price);
        //         $("#wrapWrapPrice").text(response.wrap_wrap_price);
        //         $("#wrapFramePrice").text(response.wrap_frame_price);            
        //         $("#hardwareStylePrice").text(response.hardware_style_price);
        //         $("#hardwareDisplayPrice").text(response.hardware_display_price);
        //         $("#hardwareFinishingPrice").text(response.hardware_finishing_price);
        //         $("#laminationPrice").text(response.lamination_price);
        //         $("#retouchingPrice").text(response.retouching_price);
        //         $("#proofPrice").text(response.proof_price);
                
        //         // Calculate Grand Total
        //         let grandTotal =    parseInt(response.frame_price) + 
        //                             parseInt(response.size_price) + 
        //                             parseInt(response.wrap_wrap_price) +
        //                             parseInt(response.wrap_frame_price) +
        //                             parseInt(response.hardware_style_price) +
        //                             parseInt(response.hardware_display_price) +
        //                             parseInt(response.hardware_finishing_price) +
        //                             parseInt(response.lamination_price) +
        //                             parseInt(response.retouching_price) +
        //                             parseInt(response.proof_price);

        //         // Update Grand Total
        //         $("#grandTotal").text(grandTotal);
        //     });
        // });


    $("input[type='radio']").change(function () {
        let formData = {
            _token: '{{ csrf_token() }}',
            final_price: $("#finalPriceInput").val(),  // Send updated price
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

            // Add first level updated price (base + shape + size + custom sizes)
            let grandTotal = parseFloat($("#finalPriceInput").val()) + 
                            parseInt(response.frame_price) + 
                            parseInt(response.wrap_wrap_price) +
                            parseInt(response.wrap_frame_price) +
                            parseInt(response.hardware_style_price) +
                            parseInt(response.hardware_display_price) +
                            parseInt(response.hardware_finishing_price) +
                            parseInt(response.lamination_price) +
                            parseInt(response.retouching_price) +
                            parseInt(response.proof_price);

            // Update Grand Total
            $("#grandTotal").text(grandTotal.toFixed(2));
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

$(".toggle-btn").click(function() {
    var id = $(this).data("id"); 
    var moreContent = $(".more-content-" + id);
    var button = $(".toggle-btn-" + id);

    if (moreContent.is(":visible")) {
        moreContent.hide();
        button.text("Show More");
    } else {
        moreContent.show();
        button.text("Show Less");
    }
});


    document.addEventListener('DOMContentLoaded', function () {
        function updateCartPrice() {
            let rowId = document.getElementById('rowId').value; // Get row ID
            let qty = document.getElementById('qty').value; // Get quantity
            let newPrice = document.getElementById('finalPrice').innerText.trim(); // Get updated price

            fetch('/update-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    rowId: rowId,
                    qty: qty,
                    new_price: newPrice
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    alert('Cart updated successfully!');
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error updating cart:', error));
        }

        // Call updateCartPrice when final price updates
        document.getElementById('customSizeSelect').addEventListener('change', updateCartPrice);
    });
</script>