@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        @include('admin.message')

        <form action="" method="post" name="edit_productForm" id="edit_productForm" enctype="multipart/form-data" >   
            @csrf      
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 col-12">
                                        <label for="name">Name <span class="required">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                        <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                        <p></p>
                                    </div>
                                    <div class="col-md-3 col-12">
                                        <label for="productType">Type <span class="required">*</span></label>
                                        <select id="productType" name="product_type" class="form-control" >
                                            <option value="" disabled selected>Select Type</option> 
                                            <option {{ ($product->product_type == 'Default' ? 'selected' : '')}} value="Default">Default</option>
                                            <option {{ ($product->product_type == 'Metal' ? 'selected' : '')}} value="Metal">Metal</option>
                                            <option {{ ($product->product_type == 'Neon' ? 'selected' : '')}} value="Neon">Neon</option>                                                                                  
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="row default_details hidden">  
                                    <div class="col-md-12 col-12" >
                                        <input type="hidden" name="metal_type" value="t_shirt">
                                        <div class="form-group">                                           
                                            <label for="size">Size</label>

                                            @php
                                                $selectedSizes = json_decode($product->sizes, true); 
                                            @endphp

                                            <div class="size-picker">
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Small", $selectedSizes ?? []) ? 'checked' : '' }} name="sizes[]" value="Small" id="size_1" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="size_1">
                                                        <p>Small</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Medium", $selectedSizes ?? []) ? 'checked' : '' }} name="sizes[]" value="Medium" id="size_2" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="size_2">
                                                        <p>Medium</p>
                                                    </label>
                                                </div>  
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Large", $selectedSizes ?? []) ? 'checked' : '' }} name="sizes[]" value="Large" id="size_3" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="size_3">
                                                        <p>Large</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("XL", $selectedSizes ?? []) ? 'checked' : '' }} name="sizes[]" value="XL" id="size_4" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="size_4">
                                                        <p>XL</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("XXL", $selectedSizes ?? []) ? 'checked' : '' }} name="sizes[]" value="XXL" id="size_5" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="size_5">
                                                        <p>XXL</p>
                                                    </label>
                                                </div>                                                   
                                            </div>
                                            <p class="error"></p>                                           
                                        </div>  
                                    </div>  
                                    <div class="col-md-12 col-12" >
                                        <div class="form-group">
                                            <label for="colors">Colors</label>

                                            @php
                                                $selectedColors = json_decode($product->colors, true); 
                                            @endphp

                                            <div class="size-picker">
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Red", $selectedColors ?? []) ? 'checked' : '' }} name="colors[]" value="Red" id="colorCheckbox_1" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="colorCheckbox_1">
                                                        <p>Red</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Blue", $selectedColors ?? []) ? 'checked' : '' }} name="colors[]" value="Blue" id="colorCheckbox_2" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="colorCheckbox_2">
                                                        <p>Blue</p>
                                                    </label>
                                                </div>  
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Black", $selectedColors ?? []) ? 'checked' : '' }} name="colors[]" value="Black" id="colorCheckbox_3" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="colorCheckbox_3">
                                                        <p>Black</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Green", $selectedColors ?? []) ? 'checked' : '' }} name="colors[]" value="Green" id="colorCheckbox_4" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="colorCheckbox_4">
                                                        <p>Green</p>
                                                    </label>
                                                </div>
                                                <div class="size-picker__item" >
                                                    <input type="checkbox" {{ in_array("Orange", $selectedColors ?? []) ? 'checked' : '' }} name="colors[]" value="Orange" id="colorCheckbox_5" class="size-picker__input">
                                                    <label class="size-picker__color paddingControl" for="colorCheckbox_5">
                                                        <p>Orange</p>
                                                    </label>
                                                </div>                                                   
                                            </div>
                                            <p class="error"></p>
                                        </div>
                                    </div>  
                                </div>                                
                            
                                <div class="metal_details hidden"> 
                                    <div class="row"> 
                                        <div class="col-md-12 col-12">   
                                            <div class="form-group">                                           
                                                <label for="size">Metal Products</label>
                                                <div class="size-picker">
                                                    <div class="size-picker__item" >
                                                        <input {{ ($product->metal_type == "canvas" ? 'checked' : '' )}} type="radio" name="metal_type" value="canvas" id="metalProduct_1" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_1">
                                                            <p>Canvas</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input {{ ($product->metal_type == "acrylic" ? 'checked' : '' )}} type="radio" name="metal_type" value="acrylic" id="metalProduct_2" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_2">
                                                            <p>Acrylic</p>
                                                        </label>
                                                    </div>  
                                                    <div class="size-picker__item" >
                                                        <input {{ ($product->metal_type == "metal" ? 'checked' : '' )}} type="radio" name="metal_type" value="metal" id="metalProduct_3" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_3">
                                                            <p>Metal</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input {{ ($product->metal_type == "wood" ? 'checked' : '' )}} type="radio" name="metal_type" value="wood" id="metalProduct_4" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_4">
                                                            <p>Wood</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input {{ ($product->metal_type == "others" ? 'checked' : '' )}} type="radio" name="metal_type" value="others" id="metalProduct_5" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_5">
                                                            <p>Others</p>
                                                        </label>
                                                    </div>                                                   
                                                </div>
                                                <p class="error"></p>                                           
                                            </div>  
                                        </div>   
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote" >{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="short_description">Short Description</label>
                                        <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote" >{{ $product->short_description }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="shipping_returns">Shipping & Returns</label>
                                        <textarea name="shipping_returns" id="shipping_returns" cols="30" rows="10" class="summernote"  >{{ $product->shipping_returns }}</textarea>
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
                                        @php
                                            $imageExists = isset($productImages->{'image' . $i}) && !empty($productImages->{'image' . $i});
                                        @endphp
                                
                                        <div class="col" id="imageWrapper{{ $i }}" style="{{ $i == 1 ? '' : 'display: none;' }}">
                                            <label for="image{{ $i }}">Media {{ $i }} <span class="required">*</span></label>
                                            <div class="form-group">
                                                <input type="file" name="image{{ $i }}" id="fileInput{{ $i }}" 
                                                       class="fileInput" accept="image/*" hidden 
                                                       onchange="previewImage(this, {{ $i }})" 
                                                       {{ $imageExists ? 'disabled' : '' }}> {{-- Disable if image exists --}}
                                
                                                <div id="dropZone{{ $i }}" 
                                                     class="drop-zone {{ $imageExists ? 'disabled-dropzone' : '' }}" 
                                                     onclick="{{ $imageExists ? '' : 'triggerFileInput(' . $i . ')'}}">
                                                    @if ($imageExists)
                                                        <img src="{{ asset('uploads/products/small/' . $productImages->{'image' . $i}) }}" class="uploaded-preview">
                                                        <p>Image {{ $i }} Uploaded</p>
                                                    @else
                                                        Drop files here <br /> Product {{ $i }}
                                                    @endif
                                                </div>
                                
                                                <div class="preview-container" id="previewContainer{{ $i }}"></div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                

                                @if ($productImages->isNotEmpty())
                                        <div id="product-gallery">
                                            <h6>Uploaded Images</h6>
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
                                                                    <p class="photo_number">Picture: {{ $i }}</p>
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

                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-2">Pricing </h2>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="compare_price">Price <span class="required">*</span></label>
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                        <p></p>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="compare_price">Compare at Price</label>
                                        <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ $product->compare_price }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-1">Related products</h2>
                                <select multiple class="related-product " name="related_products[]" id="related_products">
                                    @if (!empty($relatedProducts))
                                        @foreach ($relatedProducts as $relProduct)
                                            <option selected value="{{ $relProduct->id }}">{{ $relProduct->title }}</option>
                                        @endforeach
                                    @endif
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
                                            @foreach ($categories as $value)
                                                <option {{ ($product->category_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category <span class="required">*</span></label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select a Sub category </option>

                                        @if ($subCategories->isNotEmpty())
                                            @foreach ($subCategories as $subCategory)
                                                <option {{ ($product->sub_category_id == $subCategory->id) ? 'selected' : '' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="brand">Product brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select a brand</option>

                                        @if ($brands->isNotEmpty())
                                            @foreach ($brands as $brand)
                                                <option {{ ($product->brand_id == $brand->id) ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-2">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku" value="{{ $product->sku }}">
                                        <p class="error"></p>
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}">
                                    </div>

                                    <div class="col-md-6 col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" value="No" >
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" {{ ($product->track_qty == 'Yes') ? 'checked' : ' ' }}>
                                            <label for="track_qty" class="custom-control-label">Track <span class="required">*</span></label>
                                        </div>

                                        <div>
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty" value="{{ $product->qty }}">
                                            <p class="error"></p>
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
                                                <option {{ ($product->is_featured == 'No' ? 'selected' : '')}} value="No" >No</option>
                                                <option  {{ ($product->is_featured == 'Yes' ? 'selected' : '')}} value="Yes" >Yes</option>
                                            </select>
                                            <p class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <p class="mb-2"><b>Status</b></p>  
                                        <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option {{ ($product->status == 1 ? 'selected' : '' )}} value="1">Active</option>
                                            <option  {{ ($product->status == 0 ? 'selected' : '' )}} value="0">Block</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </section>
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
    $('.default_details, .metal_details, .tshirt_details').hide();
    
    // Show the selected div
    if (selectedValue == 'Default') {
        $('.default_details').show();
    } else if (selectedValue == 'Metal') {
        $('.metal_details').show();
    } else if (selectedValue == 'Neon') {
        $('.tshirt_details').show();
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
</script>
@endsection