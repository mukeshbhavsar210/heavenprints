@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Customize</h1>
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
        <form action="{{ route('customize.update',$customize->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <label for="status">Media</label>
                            <div class="form-group">
                                <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                                <div id="dropZone" class="drop-zone">
                                    Drop files here<br /> or click to upload.
                                </div>
                                <div class="preview-container" id="previewContainer">
                                    @if(!empty($customize->image))
                                        <img style="border-radius: 7px; width:100px" src="{{ asset('uploads/customize/'.$customize->image) }}" alt="" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-6">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option {{ ($customize->category == 'Product' ? 'selected' : '')}} value="Product">Product</option>
                                        <option {{ ($customize->category == 'Size' ? 'selected' : '')}} value="Size">Size</option>
                                        <option {{ ($customize->category == 'Wrap_border' ? 'selected' : '')}} value="Wrap_border">Wrap & Border</option>
                                        <option {{ ($customize->category == 'Hardware_finish' ? 'selected' : '')}} value="Hardware_finish">Hardware & Finish</option>
                                        <option {{ ($customize->category == 'Options' ? 'selected' : '')}} value="Options">Options</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label for="type">Type</label>
                                    <input type="type" value="{{ $customize->type}}" name="type" id="type" class="form-control" placeholder="Type">
                                    <p></p>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ $customize->name}}" name="name" id="name" class="form-control" placeholder="Name">
                                    <p></p>
                                </div>
                                <div class="col-md-4 col-6">
                                    <label for="price">Price</label>
                                    <input type="text" value="{{ $customize->price}}" name="price" id="price" class="form-control" placeholder="Price">
                                    <p></p>
                                </div>
                                <div class="col-md-2 col-12">
                                    <button type="submit" class="btn btn-primary mt-btn">Update</button>
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
        $("#categoryForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("customize.update",$customize->id) }}',
                type: 'put',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);

                    if(response["status"] == true){
                        window.location.href="{{ route('customize.index') }}"
                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                    } else {

                        if(response['notFound'] == true){
                            window.location.href="{{ route('customize.index') }}"
                        }

                        var errors = response['errors']
                        if(errors['name']){
                            $('#name').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['name']);
                        } else {
                            $('#name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }
                    }

                }, error: function(jqXHR, exception) {
                    console.log("Something event wrong");
                }
            })
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
