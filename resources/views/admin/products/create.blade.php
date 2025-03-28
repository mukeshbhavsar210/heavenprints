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
    <!-- Main content -->

    <section class="content">
        @include('admin.message')


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">

                            <form action="{{ route('products_new.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label>Product Name:</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                    {{-- <div class="col-md-6 col-12">                            
                                        <label>Upload Images:</label>
                                        <input type="file" name="images"  class="form-control"  multiple required>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label>Select Sizes:</label>
                                        <select name="sizes" multiple  class="form-control"  required>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                            
                                    <div class="col-md-6 col-12">
                                        <label>Select Colors:</label>
                                        <select name="colors" multiple  class="form-control"  required>
                                            <option value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Green">Green</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-6 col-12 mt-3">
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                        <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="Slug">
                                        {{-- <input type="hidden" readonly name="product_type" value="default" > --}}
                                        <p class="error"></p>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <label for="productType">Product Type:</label>
                                        <select id="productType" name="product_type" class="form-control">
                                            <option value="">Select Product</option>
                                            <option value="default">Default</option>
                                            <option value="metal">Metal</option>
                                            <option value="neon">Neon</option>
                                            <option value="mug">Mug</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="defaultDiv" class="hidden">
                                    <div class="row"> 
                                        <div class="col-md-12 col-12">   
                                            <div class="form-group">          
                                                
                                                <input type="hidden" name="metal_type" value="t_shirt">

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
                                        <div class="col-md-12 col-12">
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
                                                    <div class="size-picker__item" >
                                                        <input type="checkbox" name="colors[]" value="Orange" id="colorCheckbox_5" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="colorCheckbox_5">
                                                            <p>Green</p>
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
                                        <div class="col-md-6 col-12">   
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

                                <div id="neonDiv" class="hidden">
                                    <div class="row"> 
                                        <div class="col-md-6 col-12">   
                                            <div class="form-group">                                           
                                                <label for="size">Neon Products</label>
                                                <div class="size-picker">
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="product_type" value="neon" id="neonProduct_1" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="neonProduct_1">
                                                            <p>NEON</p>
                                                        </label>
                                                    </div>
                                                    <div class="size-picker__item" >
                                                        <input type="radio" name="product_type" value="floro" id="neonProduct_2" class="size-picker__input">
                                                        <label class="size-picker__color paddingControl" for="neonProduct_2">
                                                            <p>FLORO</p>
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
                                        <div class="form-group">
                                            <label for="description">Description</label>
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
                                    <div class="col-md-8 col-12">
                                        <h2 class="h4 mb-3">Media</h2>
                                        <div class="form-group">
                                            <input type="file" name="image[]" id="fileInput" multiple  accept="image/*" hidden>
                                            <div id="dropZone" class="drop-zone">
                                                Drop files here<br /> or click to upload.
                                            </div>
                                            <div class="preview-container" id="previewContainer"></div>
                                        </div>
                                    </div>


                                    {{-- <div class="col-md-8 col-12">
                                        <h2 class="h4 mb-3">Media</h2>
                                        <div id="image" class="dropzone dz-clickable mb-3">
                                            <div class="dz-message needsclick">
                                                <br>Drop files here or click to upload.<br><br>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-4 col-12">
                                        <h2 class="h4 mb-3">Pricing</h2>
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                                <p class="error"></p>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label for="compare_price">Compare at Price</label>
                                                <input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="row" id="product-gallery"></div>
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
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select a category</option>

                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="category">Sub category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select a Sub category</option>
                                    </select>
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

                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="sku">SKU (Stock Keeping Unit)</label>
                                        <input type="text" name="sku" id="sku" class="form-control" placeholder="sku">
                                        <p class="error"></p>
                                    </div>

                                    <div class="col-md-8 col-8">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode">
                                    </div>

                                    <div class="col-md-4 col-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="track_qty" value="No" >
                                            <input class="custom-control-input" type="checkbox" id="track_qty" name="track_qty" value="Yes" checked>
                                            <label for="track_qty" class="custom-control-label">Track</label>
                                        </div>
                                        <div>
                                            <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Qty">
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
            </div>
        </form>
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
                uploadButton.show(); // Show upload button after selecting image
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
            $('#defaultDiv, #metalDiv, #neonDiv, #mugDiv').hide();
            
            // Show the selected div
            if (selectedValue == 'default') {
                $('#defaultDiv').show();
            } else if (selectedValue == 'metal') {
                $('#metalDiv').show();
            } else if (selectedValue == 'neon') {
                $('#neonDiv').show();
            } else if (selectedValue == 'mug') {
                $('#mugDiv').show();
            }
        });
    
</script>
@endsection