@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Sub Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('sub-categories.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @include('admin.message')
        
        <form action="{{ route('sub-categories.update',$subCategory->id) }}" method="post" enctype="multipart/form-data" >
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
                                    @if(!empty($subCategory->image))
                                        <img style="border-radius: 7px; width:100px" src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select a category</option>
                                            @if($categories->isNotEmpty())
                                                @foreach ($categories as $category)
                                                    <option {{ ($subCategory->category_id == $category->id) ? 'selected' : ' ' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $subCategory->name }}">
                                        <input type="hidden" name="slug_sub_category" id="slug_sub_category"  value="{{ $subCategory->slug_sub_category }}">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option {{ ($subCategory->status == 1) ? 'selected' : ' ' }} value="1">Active</option>
                                            <option {{ ($subCategory->status == 0) ? 'selected' : ' ' }} value="0">Block</option>
                                        </select>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="showHome">Show on Home</label>
                                        <select name="showHome" id="showHome" class="form-control">
                                            <option {{ ($subCategory->showHome == 'Yes' ? 'selected' : '')}} value="Yes">Yes</option>
                                            <option  {{ ($subCategory->showHome == 'No' ? 'selected' : '')}} value="No">No</option>
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
                <a href="{{ route('sub-categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection

@section('customJs')
<script>
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
                    $("#slug_sub_category").val(response["slug"]);
                }
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
</script>
@endsection
