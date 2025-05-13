@extends('admin.layouts.app')

@section('content')

<div class="card mainPage">    
    @include('admin.message')

    <div class="card-header">
        <div class="row">
            <div class="col-sm-11 col-9">
                <h4 class="mt-1 mb-0">Edit Product</h4>
            </div>
            <div class="col-sm-1 col-3">
                <div class="pull-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>

    <hr class="m-0" />
    
    <form action="" method="post" name="edit_productForm" id="edit_productForm" enctype="multipart/form-data" >   
        @csrf      
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="row">
                        <div class="col-md-9 col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="required">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                            </div>
                            <p></p>
                        </div> 
                        <div class="col-md-3 col-12">
                            <div class="form-group">                                           
                                @if($frameMaterials)
                                    <div class="form-group">
                                        <label for="metal_type">Select Type <span class="required">*</span></label>
                                        <select name="metal_type" id="metal_type" class="form-select">
                                            <option value="">Select Type</option>
                                            @foreach ($frameMaterials as $value)
                                                <option value="{{ $value->name }}" 
                                                    {{ isset($product->metal_type) && $product->metal_type == $value->name ? 'selected' : '' }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <p class="error"></p>                                           
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote" >{{ $product->description }}</textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote" >{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipping_returns">Shipping & Returns</label>
                                <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="10" class="summernote"  >{{ $product->shipping_returns }}</textarea>
                            </div>
                        </div>

                        <hr />

                        <div class="col-md-10 col-8">
                            <h2 class="h4 mb-3">Media</h2>
                        </div>
                        <div class="col-md-2 col-4">
                            <div class="pull-right">
                                <button type="button" id="addMoreImages" class="btn btn-primary">Add Image</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        @for ($i = 1; $i <= 5; $i++)
                            @php
                                $imageExists = isset($productImages->{'image' . $i}) && !empty($productImages->{'image' . $i});
                            @endphp
                    
                            <div class="col" id="imageWrapper{{ $i }}" style="{{ $i == 1 ? '' : 'display: none;' }}">
                                <div class="form-group">
                                    <label for="image{{ $i }}">Photo {{ $i }} <span class="required">*</span></label>
                                    <div class="form-group">
                                        <input type="file" name="image{{ $i }}" id="fileInput{{ $i }}" class="fileInput" accept="image/*" hidden onchange="previewImage(this, {{ $i }})" {{ $imageExists ? 'disabled' : '' }}> {{-- Disable if image exists --}}
                                        <div id="dropZone{{ $i }}" 
                                                class="drop-zone {{ $imageExists ? 'disabled-dropzone' : '' }}" 
                                                onclick="{{ $imageExists ? '' : 'triggerFileInput(' . $i . ')'}}">
                                            @if ($imageExists)
                                                <img src="{{ asset('uploads/products/small/' . $productImages->{'image' . $i}) }}" class="uploaded-preview">
                                                <p>Image {{ $i }} Uploaded</p>
                                            @else
                                                Photo {{ $i }}
                                            @endif
                                        </div>
                        
                                        <div class="preview-container" id="previewContainer{{ $i }}" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                    
                    @if ($productImages->isNotEmpty())
                        <div id="product-gallery">
                            <h6 class="mt-3">Uploaded Images</h6>
                            <div class="row">
                                @foreach ($productImages as $image)
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if (!empty($image->{'image' . $i})) <!-- Check if image exists -->
                                            <div class="col image-container" id="image-row-{{ $image->id }}-{{ $i }}">
                                                <input type="hidden" name="image{{ $i }}" value="{{ $image->id }}">
                                                <img src="{{ asset('uploads/products/small/'.$image->{'image'.$i}) }}" class="img-thumbnail" />
                                                <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }}, {{ $i }})" class="deleteCardImg ">
                                                    <?xml version="1.0" encoding="utf-8"?>
                                                <svg width="27px" height="27px" viewBox="0 0 1024 1024" fill="#ffffff" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill="" /><path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill="" /><path d="M328 340.8l32-31.2 348 348-32 32z" fill="" /></svg>
                                                </a>
                                                <div class="image_flex">
                                                    <p class="photo_number">Photo {{ $i }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endfor
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p>No images uploaded yet.</p>
                    @endif

                    <hr />
                    
                    <h2 class="h4 mb-2">Pricing </h2>
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <div class="form-group">
                            <label for="compare_price">Price <span class="required">*</span></label>
                            <div class="input-group">                                            
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"></path>
                                    </svg>
                                </span>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                </div>
                            <p></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label for="compare_price">Compare at Price</label>
                            <div class="input-group">                                            
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"></path>
                                    </svg>
                                </span>
                                <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ $product->compare_price }}">
                                </div>              
                            </div>                          
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                            <label for="per_inch">Per inch</label>
                            <div class="input-group">                                            
                                <span class="input-group-text" id="basic-addon1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z"></path>
                                    </svg>
                                </span>
                                <input type="text" name="per_inch" id="per_inch" class="form-control" placeholder="Per Inch" value="{{ $product->per_inch }}">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="custom-control custom-checkbox">
                                <div class="form-group">
                                    <input type="hidden" name="track_qty" value="No" >
                                    <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" {{ ($product->track_qty == 'Yes') ? 'checked' : ' ' }}>
                                    <label for="track_qty" class="custom-control-label">Track <span class="required">*</span></label>
                                </div>
                            </div>
                            <div>
                                <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{ $product->qty }}">
                                <p class="error"></p>
                            </div>
                        </div>
                        
                    </div>                            

                    <hr />
                    
                    <h2 class="h4 mb-1">Related products</h2>
                    <select multiple class="related-product" name="related_products[]" id="related_products">
                        @if (!empty($relatedProducts))
                            @foreach ($relatedProducts as $relProduct)
                                <option selected value="{{ $relProduct->id }}">{{ $relProduct->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="col-md-3 col-12">
                    <div class="row">
                        <div class="col-md-6 col-6">
                            @php
                                $selectedSizes = [];
                                if (!empty($product->sizes)) {
                                    if (is_string($product->sizes)) {
                                        if (str_contains($product->sizes, '[')) {
                                            $selectedSizes = json_decode($product->sizes, true);
                                        } else {
                                            $selectedSizes = explode(',', $product->sizes);
                                        }
                                    }
                                }
                            @endphp
                            <div class="form-group">
                                <label for="sizes">Sizes</label>
                                <div class="dropdown ">                                            
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Select Sizes</span>
                                        <span class="caret"></span>
                                        </button>
                                    <ul class="dropdown-menu colorSize">                                                
                                        @if($sizes)
                                            @foreach ($sizes as $index => $value)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" name="sizes[]" value="{{ $value->name }}" class="option justone"
                                                            @if(in_array($value->name, $selectedSizes)) checked @endif>
                                                        {{ $value->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <p class="error"></p>
                            </div>
                        </div>

                        <div class="col-md-6 col-6">
                            @php
                                $selectedColors = [];
                        
                                if (!empty($product->colors)) {
                                    if (is_string($product->colors)) {
                                        // If colors are stored as a JSON array
                                        if (str_contains($product->colors, '[')) {
                                            $selectedColors = json_decode($product->colors, true);
                                        } else {
                                            // If colors are stored as a comma-separated string
                                            $selectedColors = explode(',', $product->colors);
                                        }
                                    }
                                }
                            @endphp
                            <div class="form-group">
                                <label for="colors">Colors</label>
                                <div class="dropdown">                                        
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span>Select Colors</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu colorSize">
                                        @if($colors)
                                            @foreach ($colors as $index => $value)
                                                <li>
                                                    <label>
                                                        <input type="checkbox" name="colors[]" value="{{ $value->name }}" class="option justone"
                                                            @if(in_array($value->name, $selectedColors)) checked @endif>
                                                        {{ $value->name }}
                                                    </label>                                                       
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <p class="error"></p>
                            </div>
                        </div>
                    
                        <div class="col-md-12 col-12" id="custom_products">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Height</label>
                                        <select id="customSizeSelect_01" class="form-select" name="custom_height" required>
                                            <option value="0">Select</option>
                                            @foreach($customSizePrices1 as $value => $item)          
                                                <option value="{{ $value }}" 
                                                    {{ isset($product->custom_height) && $product->custom_height == $value ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>      
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                           
                                <div class="col">
                                    <div class="form-group">
                                        <label>Width</label>
                                        <select id="customSizeSelect_02" class="form-select" name="custom_width" required >
                                            <option value="0">Select</option>
                                            @foreach($customSizePrices1 as $value => $item)             
                                            <option value="{{ $value }}" 
                                                {{ isset($product->custom_width) && $product->custom_width == $value ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>       
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="default_products" class="hidden">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                    <label class="height">Height</label>
                                        <input type="text" id="height" class="form-control" placeholder="Height"  name="height" value="{{ $product->height }}">                                
                                    </div>
                                </div> 
                                <div class="col-md-6 col-6">
                                    <div class="form-group">
                                        <label class="width">Width</label>
                                        <input type="text" id="width" class="form-control" placeholder="Width"  name="width" value="{{ $product->width }}">                                
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                        
                    <hr />
                
                    <h2 class="h4  mb-3">Product Category</h2>
                    <div class="form-group">                            
                        <label for="category">Category <span class="required">*</span></label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Select a Category</option>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $value)
                                    <option  value="{{ $value->id }}" {{ ($product->category_id == $value->id) ? 'selected' : '' }} 
                                        {{ $value->id == 296 ? 'disabled' : '' }} >{{ $value->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        <p class="error"></p>
                    </div>
                    <div class="form-group">
                        <label for="category">Sub Category <span class="required">*</span></label>
                        <select name="sub_category" id="sub_category" class="form-select">
                            <option value="">Select a Sub Category </option>

                            @if ($subCategories->isNotEmpty())
                                @foreach ($subCategories as $subCategory)
                                    <option {{ ($product->sub_category_id == $subCategory->id) ? 'selected' : '' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="brand">Product Brand</label>
                        <select name="brand" id="brand" class="form-select">
                            <option value="">Select a Brand</option>

                            @if ($brands->isNotEmpty())
                                @foreach ($brands as $brand)
                                    <option {{ ($product->brand_id == $brand->id) ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                        
                    <hr />
                    
                    <h2 class="h4 mb-2">Inventory</h2>
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="sku">SKU (Stock Keeping Unit)</label>
                                <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                <p class="error"></p>
                            </div>
                        
                            <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}">
                            </div>
                        
                            <div class="form-group mt-2">
                                <label>Status</label>  
                                <select name="status" id="status" class="form-select">
                                    <option {{ ($product->status == 1 ? 'selected' : '' )}} value="1">Active</option>
                                    <option  {{ ($product->status == 0 ? 'selected' : '' )}} value="0">Block</option>
                                </select>                                
                            </div>
                        </div>
                    </div>                            
                </div>
            </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
        </div> 
    </div>         
    </form>    
@endsection

@section('customJs')
<script>    
function deleteImage(imageId, slotNumber) {
        if (!confirm("Are you sure you want to delete this image?")) return;

        $.ajax({
            url: "{{ route('products.image.delete') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                image_id: imageId
            },
            success: function(response) {
                if (response.success) {
                    //alert("Image deleted successfully!");
                    location.reload(); // Refresh the page after deletion
                    $("#image-row-" + slotNumber).fadeOut(300, function() { 
                        $(this).html('<p>No image uploaded for slot ' + slotNumber + '</p>').fadeIn();
                    });
                } else {
                    alert("Error deleting image.");
                }
            },
            error: function() {
                alert("Something went wrong. Please try again.");
            }
        });
    }


$("#edit_productForm").submit(function(event){
    event.preventDefault();
        $("button[type='submit']").prop('disabled', true);

        var formData = new FormData(this);
        formData.append('_method', 'PUT');

        $.ajax({
            url: '{{ route("products.update",$product->id) }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response){
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
            error: function(JQXHR, exception){
                console.log("Something went wrong");
            }
        })
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

    //Dropzone
    let dropZone = $('#dropZone');
    let fileInput = $('#fileInput');
    let previewContainer = $('#previewContainer');
    let uploadButton = $('#uploadButton');

    // Click to open file selector
    dropZone.on('click', function () {
        fileInput.click();
    });

    // File input change event
    fileInput.on('change', function (event) {
        handleFiles(event.target.files);
    });

    // Drag over event
    dropZone.on('dragover', function (event) {
        event.preventDefault();
        dropZone.addClass('dragover');
    });

    // Drag leave event
    dropZone.on('dragleave', function () {
        dropZone.removeClass('dragover');
    });

    // Drop event
    dropZone.on('drop', function (event) {
        event.preventDefault();
        dropZone.removeClass('dragover');
        let files = event.originalEvent.dataTransfer.files;
        handleFiles(files);
    });


    function handleFiles(files) {
        if (files.length > 0) {
            let file = files[0];

            // Show image preview
            let reader = new FileReader();
            reader.onload = function (e) {
                previewContainer.html(`
                    <div class="preview-container">
                        <img src="${e.target.result}" class="preview-image">
                        <button type="button" class="delete-btn" onclick="removeImage()">×</button>
                    </div>
                `);
                uploadButton.show();
            };
            reader.readAsDataURL(file);

            // Assign file to input
            fileInput.prop('files', files);
        }
    }

    function removeImage() {
        $('#previewContainer').html('');
        $('#fileInput').val('');
        $('#uploadButton').hide();
    }

    //ToggleeClass for Dropdown top main
    $('#productType').on('change', function () {
        var selectedValue = $(this).val();
        // Hide all divs first
        $('.default_details, .customize_details').hide();
        
        // Show the selected div
        if (selectedValue == 'Default') {
            $('.default_details').show();                    
        } else if (selectedValue == 'Customize') {
            $('.customize_details').show();
        } 
    });    

        $('.dropdown-menu').on('click', function(e) {
            if($(this).hasClass('dropdown-menu-form')) {
          e.stopPropagation();
          }
        });

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


    $("input[type='checkbox'].justone").change(function(){
        var a = $("input[type='checkbox'].justone");
        if(a.length == a.filter(":checked").length){
            $('.selectall').prop('checked', true);
            $(".select-text").html(' Deselect');
        }
        else {
            $('.selectall').prop('checked', false);
            $(".select-text").html(' Select');
        }
    var total = $('input[name="options[]"]:checked').length;
    $(".dropdown-text").html('(' + total + ') Selected');
    });


    //ToggleeClass for Dropdown top main
    $('#metal_type').on('change', function () {
        var selectedValue = $(this).val();

        // Hide both divs initially
        $('#default_products, #custom_products').hide();

        if (selectedValue === 'Others') {
            $('#default_products').show();
        } else {
            $('#custom_products').show();
        }
    });

</script>
@endsection