@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('admin.message')
        
        <form action="" method="post" name="productForm" id="productForm" enctype="multipart/form-data" >   
            @csrf       
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9 col-12">
                                    <label class="name">Name <span class="required">*</span></label>
                                    <input type="text" id="name" class="form-control" placeholder="Name" id="name" name="name">                                
                                    <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="">
                                    <p></p>
                                </div>

                                <div class="col-md-3 col-12">
                                    <label for="productType">Type <span class="required">*</span></label>
                                    <select id="productType" name="product_type" class="form-control" required>
                                        <option value="" disabled selected>Select Type</option> 
                                        <option value="Default">Default</option>
                                        <option value="Frame">Frame</option>                                        
                                        <option value="Neon">Neon</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row default_details hidden"> 
                                <div class="col-md-12 col-12">   
                                    <div class="form-group">          
                                        <input type="hidden" name="metal_type" value="t_shirt">
                                        <label for="size">Size</label>

                                        <div class="size-picker">
                                            @if($sizes)
                                                @foreach ($sizes as $index => $value)
                                                    <div class="size-picker__item">
                                                        <input type="checkbox" name="sizes[]" value="{{ $value->name }}" id="sizes_{{ $index }}" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="sizes_{{ $index }}">
                                                            <p>{{ $value->name }}</p>
                                                        </label>                                                                
                                                    </div>
                                                @endforeach
                                            @endif 
                                        </div>
                                        <p class="error"></p>                                           
                                    </div>  
                                </div>  

                                <div class="col-md-12 col-12" >
                                    <div class="form-group">
                                        <label for="colors">Colors</label>
                                        <div class="size-picker">
                                            @if($colors)
                                                @foreach ($colors as $index => $value)
                                                    <div class="size-picker__item">
                                                        <input type="checkbox" name="colors[]" value="{{ $value->name }}" id="colors_{{ $index }}" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colors_{{ $index }}">
                                                            <p>{{ $value->name }}</p>
                                                        </label>                                                                
                                                    </div>
                                                @endforeach
                                            @endif                                                                                            
                                        </div>
                                        <p class="error"></p>
                                    </div>
                                </div>  
                            </div>                                
                        
                            <div class="frame_details hidden"> 
                                <div class="row">
                                    <div class="col-md-12 col-12">  
                                        <div class="form-group">                                           
                                                <label for="size">Select material</label>
                                                <div class="size-picker">
                                                    @if($frameMaterials)
                                                        @foreach ($frameMaterials as $index => $value)
                                                            <div class="size-picker__item">
                                                                <input type="radio" name="metal_type" value="{{ $value->name }}" id="metalProduct_{{ $index }}" class="size-picker__input">
                                                                <label class="size-picker__color paddingControl" for="metalProduct_{{ $index }}">
                                                                    <p>{{ $value->name }}</p>
                                                                </label>                                                                
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <p class="error"></p>                                           
                                            </div>
                                        </div> 
                                        <div class="col-md-12 col-12 mb-3"> 
                                            <div class="row">
                                                <div class="col-md-3 col-6">                                            
                                                    <label class="height">Height <span class="required">*</span></label>
                                                    <input type="text" id="height" class="form-control" placeholder="Height" id="height" name="height">                                
                                                </div> 
                                                <div class="col-md-3 col-6">
                                                    <label class="width">Width <span class="required">*</span></label>
                                                    <input type="text" id="width" class="form-control" placeholder="Width" id="width" name="width">                                
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                </div>    
                                                
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="required">*</span></label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" cols="30" rows="3" class="form-control" ></textarea>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="shipping_returns">Shipping & Returns</label>
                                    <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="3" class="form-control"  ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 col-9">
                                    <h2 class="h4 mb-3">Media</h2>
                                </div>
                                <div class="col-md-2 col-3">
                                    <button type="button" id="addMoreImages" class="btn btn-primary">Add Image</button>
                                </div>
                            </div>

                            <div class="row">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="col" id="imageWrapper{{ $i }}" style="{{ $i == 1 ? '' : 'display: none;' }}">
                                        <label for="image{{ $i }}">Media {{ $i }} <span class="required">*</span></label>
                                        <div class="form-group">
                                            <input type="file" name="image{{ $i }}" id="fileInput{{ $i }}" class="fileInput" accept="image/*" hidden onchange="previewImage(this, {{ $i }})">
                                            <div id="dropZone{{ $i }}" class="drop-zone" onclick="triggerFileInput({{ $i }})">
                                                Drop files here <br /> Product {{ $i }}
                                            </div>
                                            <div class="preview-container" id="previewContainer{{ $i }}"></div>

                                            {{-- @error('image' . $i)
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror --}}
                                        </div>                                  
                                    </div> 
                                @endfor
                            </div>                            
                        </div>
                    </div>                     

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Pricing</h2>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="price">Price <span class="required">*</span></label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                    <p></p>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="compare_price">Compare at Price</label>
                                    <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                </div>
                            </div>                                        
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-1">Related products</h2>
                            <select multiple class="related-product" name="related_products[]" id="related_products">

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="h4  mb-3">Product category</h2>
                            <div class="mb-3">
                                <label for="category">Category <span class="required">*</span></label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a category</option>

                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="category">Sub category <span class="required">*</span></label>
                                <select name="sub_category" id="sub_category" class="form-control">
                                    <option value="">Select a Sub category</option>
                                </select>
                                <p></p>
                            </div>
                                <div class="mb-3">
                                    <label for="category">Product brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select a brand</option>

                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="card mb-3 " >
                        <div class="card-body">
                            <h2 class="h4 mb-3">Inventory</h2>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="sku">SKU (Stock Keeping Unit)</label>
                                    <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                    <p class="error"></p>
                                </div>

                                <div class="col-md-6 col-8">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                </div>

                                <div class="col-md-6 col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="track_qty" value="No" >
                                        <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" checked>
                                        <label for="track_qty" class="custom-control-label">Track <span class="required">*</span></label>
                                        <p></p>
                                    </div>
                                    <div>
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p class="mb-2"><b>Featured</b></p>                                        
                                    <div class="form-group">
                                        <select name="is_featured" id="is_featured" class="form-control">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <p class="mb-2"><b>Status</b></p>
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>               
        </form>
    </div>
</section>
@endsection

@section('customJs')
<script>
    $("#productForm").submit(function(event) {
        event.preventDefault();
        $("button[type='submit']").prop('disabled', true);

        var formData = new FormData(this);

        $.ajax({
            url: '{{ route("products.store") }}',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                $("button[type='submit']").prop('disabled', false);
                var errors = response.errors;
                if(response.status == false) {
                    if(errors.name) {
                        $("#name").siblings("p").addClass('invalid-feedback').html(errors.name);
                        $("#name").addClass('is-invalid');
                    } else {
                        $("#name").siblings("p").removeClass('invalid-feedback').html();
                        $("#name").removeClass('is-invalid');
                    }
                    if(errors.price) {
                        $("#price").siblings("p").addClass('invalid-feedback').html(errors.price);
                        $("#price").addClass('is-invalid');
                    } else {
                        $("#price").siblings("p").removeClass('invalid-feedback').html();
                        $("#price").removeClass('is-invalid');
                    }
                    if(errors.category) {
                        $("#category").siblings("p").addClass('invalid-feedback').html(errors.category);
                        $("#category").addClass('is-invalid');
                    } else {
                        $("#category").siblings("p").removeClass('invalid-feedback').html();
                        $("#category").removeClass('is-invalid');
                    }                    
                    if(errors.qty) {
                        $("#qty").siblings("p").addClass('invalid-feedback').html(errors.qty);
                        $("#qty").addClass('is-invalid');
                    } else {
                        $("#qty").siblings("p").removeClass('invalid-feedback').html();
                        $("#qty").removeClass('is-invalid');
                    }                    
                    $.each(response.errors, function(key, value) {
                        let inputField = $("#" + key); // Match input field with error
                        inputField.addClass("is-invalid");
                        inputField.siblings(".text-danger").html(value);
                    });
                } else {
                    $("#name").siblings("p").removeClass('invalid-feedback').html();
                    $("#name").removeClass('is-invalid');
                    $("#price").siblings("p").removeClass('invalid-feedback').html();
                    $("#price").removeClass('is-invalid');
                    $("#category").siblings("p").removeClass('invalid-feedback').html();
                    $("#category").removeClass('is-invalid');
                    $("#qty").siblings("p").removeClass('invalid-feedback').html();
                    $("#qty").removeClass('is-invalid');

                    window.location.href="{{ route('products.index') }}"
                }
            },
            error: function(JQXHR, exception) {
                $("button[type='submit']").prop('disabled', false);

                alert("Something went wrong while submitting the form. Please try again later.");
                console.log("Something went wrong");
            }
        });
    });

    
    $('.related-product').select2({
        ajax: {
            url: '{{ route('products.getProducts') }}',
            dataType: 'json',
            tags: true,
            multiple: true,
            minimumInputLength: 3,
            processResults: function (data) {
                return {
                    results: data.tags
                };
            }
        }
    });

    $("#category").change(function(){
        var category_id = $(this).val();
        $.ajax({
            url: '{{ route("product-subcategories.index") }}',
            type: 'get',
            data: {category_id:category_id},
            dataType: 'json',
            success: function(response) {
                $("#sub_category").find("option").not(":first").remove();
                $.each(response["subCategories"],function(key,item){
                    $("#sub_category").append(`<option value='${item.id}' >${item.name}</option>`)
                })
            },
            error: function(){
                console.log("Something went wrong")
            }
        });
    })

    $('#name').change(function(){
        element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response){
                $("button[type=submit]").prop('disabled', false);
                if(response["status"] == true){
                    $("#slug").val(response["slug"]);
                }
            }
        });
    })

    //ToggleeClass for Dropdown top main
    $('#productType').on('change', function () {
        var selectedValue = $(this).val();
        // Hide all divs first
        $('.default_details, .frame_details, .neon_details').hide();
        
        // Show the selected div
        if (selectedValue == 'Default') {
            $('.default_details').show();
        } else if (selectedValue == 'Frame') {
            $('.frame_details').show();
        } else if (selectedValue == 'Neon') {
            $('.neon_details').show();
        }
    });       

        $('.dropdown-menu').on('click', function(e) {
            if($(this).hasClass('dropdown-menu-form')) {
          e.stopPropagation();
          }
        });

    //Dropzone
    // Function to trigger file input when drop zone is clicked
    function triggerFileInput(index) {
        document.getElementById(`fileInput${index}`).click();
    }

    // Function to handle file input change
    $('.fileInput').on('change', function () {
        let index = this.id.replace('fileInput', ''); // Extract index from ID
        handleFile(this.files[0], index);
    });

    // Function to handle drag & drop
    $('.drop-zone').on('dragover', function (event) {
        event.preventDefault();
        $(this).addClass('dragover');
    });

    $('.drop-zone').on('dragleave', function () {
        $(this).removeClass('dragover');
    });

    $('.drop-zone').on('drop', function (event) {
        event.preventDefault();
        $(this).removeClass('dragover');

        let index = this.id.replace('dropZone', ''); // Extract index from ID
        let file = event.originalEvent.dataTransfer.files[0];

        handleFile(file, index);
    });

    // Function to handle image preview
    function handleFile(file, index) {
        if (!file) return;

        let reader = new FileReader();
        reader.onload = function (e) {
            let previewContainer = $(`#previewContainer${index}`);

            // Clear previous preview
            previewContainer.html(`
                <div class="preview-box">
                    <img src="${e.target.result}" class="preview-image">
                    <button type="button" class="delete-btn" onclick="removeImage(${index})">×</button>
                </div>
            `);
        };
        reader.readAsDataURL(file);
    }

    // Function to remove image preview
    function removeImage(index) {
        $(`#previewContainer${index}`).html(''); // Clear preview
        $(`#fileInput${index}`).val(''); // Reset file input
    }
</script>

<script>
        let currentIndex = 1; // Start from 1
        const maxFields = 5;  // Maximum 5 fields

        function triggerFileInput(index) {
            document.getElementById(`fileInput${index}`).click();
        }

        function addImageField() {
            if (currentIndex >= maxFields) {
                alert("You can only upload up to 5 images.");
                return;
            }

            currentIndex++;
            let newField = `
                <div class="col image-field" id="imageField${currentIndex}">
                    <label for="image${currentIndex}">Media ${currentIndex}</label>
                    <div class="form-group">
                        <input type="file" name="image${currentIndex}" id="fileInput${currentIndex}" class="fileInput" accept="image/*" hidden>
                        <div id="dropZone${currentIndex}" class="drop-zone" onclick="triggerFileInput(${currentIndex})">
                            Drop Product ${currentIndex}
                        </div>
                        <div class="preview-container" id="previewContainer${currentIndex}"></div>
                    </div>
                </div>
            `;

            document.getElementById("imageFields").insertAdjacentHTML('beforeend', newField);
        }


        let currentImageIndex = 1;

    // Show the next image input when clicking "Add More"
    document.getElementById("addMoreImages").addEventListener("click", function () {
        if (currentImageIndex < 5) {
            currentImageIndex++;
            document.getElementById("imageWrapper" + currentImageIndex).style.display = "block";
        }
    });

    // Function to trigger file input
    function triggerFileInput(index) {
        document.getElementById("fileInput" + index).click();
    }

    // Function to preview image
    function previewImage(input, index) {
        let previewContainer = document.getElementById("previewContainer" + index);
        previewContainer.innerHTML = ""; // Clear existing preview

        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                let imgElement = document.createElement("img");
                imgElement.src = e.target.result;
                imgElement.classList.add("img-thumbnail");
                imgElement.style.width = "100%"; // Set preview size
                previewContainer.appendChild(imgElement);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection