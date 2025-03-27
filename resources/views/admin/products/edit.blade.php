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
    <!-- Main content -->

    <section class="content">
        @include('admin.message')
        
        <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data" >
            @csrf        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                        <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                        <p class="error"></p>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label for="productType">Product Type:</label>
                                        <select id="productType" class="form-control">
                                            <option value="">Select Product</option>
                                            <option value="tshirt">T-Shirt</option>
                                            <option value="metal">Metal</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="tshirtDiv" class="hidden">
                                    <div class="row"> 
                                        <div class="col-md-12 col-12">   
                                            
                                            <input type="hidden" name="metal_type" value="t_shirt">

                                            <div class="form-group">                                           
                                                <label for="size">Size</label>
                                                <div class="size-picker">
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="sizes[]" value="Small" id="size_1" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="size_1">
                                                            <p>Small</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="sizes[]" value="Medium" id="size_2" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="size_2">
                                                            <p>Medium</p>
                                                        </label>
                                                    </div>  
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="sizes[]" value="Large" id="size_3" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="size_3">
                                                            <p>Large</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="sizes[]" value="XL" id="size_4" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="size_4">
                                                            <p>XL</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="sizes[]" value="XXL" id="size_5" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="size_5">
                                                            <p>XXL</p>
                                                        </label>
                                                    </div>                                                   
                                                </div>
                                                <p class="error"></p>                                           
                                            </div>  
                                        </div>  
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="colors">Colors</label>
                                                <div class="size-picker">
                                                    <div class="size-picker__item" >
                                                        <input  type="checkbox" name="colors[]" value="Red" id="colorCheckbox_1" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_1">
                                                            <p>Red</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="colors[]" value="Blue" id="colorCheckbox_2" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_2">
                                                            <p>Blue</p>
                                                        </label>
                                                    </div>  
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="colors[]" value="Black" id="colorCheckbox_3" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_3">
                                                            <p>Black</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="colors[]" value="Green" id="colorCheckbox_4" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_4">
                                                            <p>Green</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="colors[]" value="Orange" id="colorCheckbox_5" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_5">
                                                            <p>Orange</p>
                                                        </label>
                                                    </div>                                                   
                                                </div>
                                                <p class="error"></p>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            
                                <div id="metalDiv" class="hidden">
                                    <div class="row"> 
                                        <div class="col-md-12 col-12">   
                                            <div class="form-group">                                           
                                                <label for="size">Metal Products</label>
                                                <div class="size-picker">
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="metal_type" value="canvas" id="metalProduct_1" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_1">
                                                            <p>Canvas</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="metal_type" value="acrylic" id="metalProduct_2" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_2">
                                                            <p>Acrylic</p>
                                                        </label>
                                                    </div>  
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="metal_type" value="metal" id="metalProduct_3" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_3">
                                                            <p>Metal</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="metal_type" value="wood" id="metalProduct_4" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="metalProduct_4">
                                                            <p>Wood</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="metal_type" value="others" id="metalProduct_5" class="size-picker__input">
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
                                    <div class="col-md-8 col-12">
                                        <label for="status">Media</label>
                                        <div class="form-group">
                                            <input type="file" name="image[]" id="fileInput" accept="image/*" hidden multiple>
                                            <div id="dropZone" class="drop-zone">
                                                Drop files here<br /> or click to upload.
                                            </div>
                                            <div class="preview-container" id="previewContainer"></div>
                                        </div>
                                    </div>                              

                                <div class="col-md-4 col-12">
                                    <h2 class="h4 mb-2">Pricing</h2>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
                                            <p class="error"></p>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price" value="{{ $product->compare_price }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-gallery">
                                @if ($productImages->isNotEmpty())
                                <h6>Uploaded images</h6>
                                <div class="row">
                                    @foreach ( $productImages as $image)
                                        <div class="col-md-2 col-3" id="image-row-{{ $image->id }}">
                                            <div class="card">
                                                <input type="hidden" name="image_array[]" value="{{ $image->id }}" >
                                                <img class="img-thumbnail"  src="{{ asset('uploads/product/small/'.$image->image ) }}" />
                                                <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }})" class="deleteCardImg btn btn-denger">
                                                    <?xml version="1.0" encoding="utf-8"?>
                                                    <svg width="25px" height="25px" viewBox="0 0 1024 1024" fill="#ffffff" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill="" /><path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill="" /><path d="M328 340.8l32-31.2 348 348-32 32z" fill="" /></svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                @endif
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
                                    <label for="category">Category</label>
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
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select a Sub category</option>

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

                                    <div class="col-md-8 col-8">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode" value="{{ $product->barcode }}">
                                    </div>

                                    <div class="col-md-4 col-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" value="No" >
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" {{ ($product->track_qty == 'Yes') ? 'checked' : ' ' }}>
                                            <label for="track_qty" class="custom-control-label">Track</label>
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

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
@endsection

@section('customJs')
<script>
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
            $('#tshirtDiv, #metalDiv, #mugDiv').hide();
            
            // Show the selected div
            if (selectedValue == 'tshirt') {
                $('#tshirtDiv').show();
            } else if (selectedValue == 'metal') {
                $('#metalDiv').show();
            } else if (selectedValue == 'mug') {
                $('#mugDiv').show();
            }
        });

</script>

@endsection