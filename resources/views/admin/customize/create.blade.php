@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Create Customize</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('customize.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('admin.message')
        <form action="{{ route('customize.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-12">
                            <label for="status">Media</label>
                            <div class="form-group">
                                <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                                <div id="dropZone" class="drop-zone">
                                    Drop files here<br /> or click to upload.
                                </div>
                                <div class="preview-container" id="previewContainer"></div>
                            </div>
                        </div>
                        <div class="col-md-9 col-6">
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        <option value="first">First Level</option>                                        
                                        <option value="product">Product</option>
                                        <option value="size">Size</option>
                                        <option value="wrap_border">Wrap & Border</option>
                                        <option value="hardware_finish">Hardware & Finish</option>
                                        <option value="options">Options</option>
                                        <option value="frames">Frames</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label for="type">Type</label>
                                    <select id="type" name="type" class="form-control">
                                        <option value="">Select Type</option>
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-5 col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    <p></p>
                                </div>                                
                                <div class="col-md-3 col-6">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                    <p></p>
                                </div>
                                   
                                <div class="col-md-6 col-12">
                                    <button type="submit" class="btn btn-primary mt-btn">Create</button>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('customJs')
<script>

    const subcategories = {
        first: ['Shape', 'Size', 'Custom_1', 'Custom_2'],
        product: ['Canvas', 'Acrylic', 'Metal', 'Wood', 'Other'],
        size: ['Recommended', 'Square', 'Panoromic', 'Large', 'Small'],
        wrap_border: ['Wrap', 'Border',],
        hardware_finish: ['Hardware_Options_&_Style', 'Optional_Color_Finishing'],
        frames: ['Standard', 'Premium', 'Floating'],
        options: ['Minor_Photo_Retouching'],
    };

    document.getElementById('category').addEventListener('change', function () {
        const category = this.value;
        const subcatSelect = document.getElementById('type');

        // Clear old options
        subcatSelect.innerHTML = '<option value="">Select Type</option>';

        // Load new subcategories
        if (subcategories[category]) {
            subcategories[category].forEach(sub => {
                let option = document.createElement('option');
                option.value = sub.toLowerCase();
                option.textContent = sub;
                subcatSelect.appendChild(option);
            });
        }
    });


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


    
    </script>
@endsection