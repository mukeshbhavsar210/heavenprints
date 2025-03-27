@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Configuration</h1>
            </div>            
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Banner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#tabs-2" role="tab">Settings</a>
            </li>            
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Social Media</a>
            </li>
        </ul>
      
        @include('admin.message')

        <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 col-10">
                                <h5>Home Banner</h5>
                            </div>
                            <div class="col-md-2 col-4">
                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addBanner">Add Banner</button>
                            </div>
                        </div>

                        <div class="modal fade drawer right-align" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">    
                                        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data" >
                                            @csrf                    
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <label for="status">Media</label>
                                                    <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                                                    <div id="dropZone" class="drop-zone">
                                                        Drop files here or click to upload.
                                                    </div>
                                                    <div class="preview-container" id="previewContainer">
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-4">
                                                    <div class="mb-3">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="0">Block</option>
                                                        </select>
                                                    </div>
                        
                                                    <div >
                                                        <label for="showHome">Show on Home</label>
                                                        <select name="showHome" id="showHome" class="form-control">
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="mb-3">
                                                        <label for="name">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                        <input type="hidden" readonly name="banner_slug" id="banner_slug" class="form-control" placeholder="">
                                                        <p></p>
                                                    </div>
                
                                                    <div class="mb-3">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control" cols="3" rows="3" placeholder="Description"></textarea>
                                                        <p></p>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    
                        @php
                            $banners = \App\Models\Banner::get();
                        @endphp
                        
                        @if ($banners->isNotEmpty())
                            <div class="row mt-3">
                                @foreach ($banners as $value)                               
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-md-10 col-12">
                                                        <h3 class="mb-0">{{ $value->name }}</h3>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        @if($value->status == 1)
                                                            <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        @else
                                                            <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                        @endif
                                                    
                                                        <a href="#" onclick="deleteBanner({{ $value->id }})"  class="text-danger">
                                                            <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                              </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <img src="{{ asset('uploads/banners/'.$value->image) }}" alt="" style="width: 100%;" />
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <p>{{ $value->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            @else
                            <div class="card text-center p-4 mt-3">
                                <p>No Banner created yet</p>
                            </div>
                        @endif
                </div>
            </div>
        </div>
            <div class="tab-pane " id="tabs-2" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <label for="status">Media</label>
                                    <input type="file" name="image" id="fileInput" accept="image/*" >
                                    {{-- <div class="form-group">
                                        <input type="file" name="image" id="fileInput" accept="image/*" hidden>
                                        <div id="dropZone" class="drop-zone">
                                            Drop files here or click to upload.
                                        </div>
                                        <div class="preview-container" id="previewContainer">
                                            @if(!empty($settings->image))
                                                <img style="width:200px" src="{{ asset('uploads/logo/'.$settings->image) }}" alt="" />
                                            @endif
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-9 col-12">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="name">Website Name</label>
                                                <input type="text" id="name"  placeholder="Name" name="name" class="form-control" value="{{ $settings->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="business_line">Business Line</label>
                                                <input type="text" id="business_line"  placeholder="Name" name="business_line" class="form-control" value="{{ $settings->business_line }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="phone">Phone</label>
                                                <input type="text" id="phone"  placeholder="Phone" name="phone" class="form-control" value="{{ $settings->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="whatsapp">Whatsapp</label>
                                                <input type="text" id="whatsapp"  placeholder="Whatsapp" name="whatsapp" class="form-control" value="{{ $settings->whatsapp }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" placeholder="Email" name="email" class="form-control" value="{{ $settings->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="address">Address</label>
                                                <textarea name="address" class="form-control" cols="5" rows="4">{{ $settings->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control" cols="5" rows="4">{{ $settings->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <button type="submit" class="btn btn-primary mb-4">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>     
                    </div>
                </div>           
            </div>
            <div class="tab-pane" id="tabs-3" role="tabpanel">
                <form action="{{ route('settings.socials') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')                        
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="facebook">Facebook</label>
                                        <input id="facebook" type="url" name="facebook" class="form-control" value="{{ $settings->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="instagram">Instagram</label>
                                        <input id="instagram" type="url" name="instagram" class="form-control" value="{{ $settings->instagram }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="twitter">Twitter</label>
                                        <input id="twitter" type="url" name="twitter" class="form-control" value="{{ $settings->twitter }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="pinterest">Pinterest</label>
                                        <input id="pinterest" type="url" name="pinterest" class="form-control" value="{{ $settings->pinterest }}">
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary mb-4">Save Social Media</button>
                                </div>
                            </div>
                        </div>                       
                    </form>
                </div>                    
            </div>
        </div>
        </div>
    </div>
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
                        $("#banner_slug").val(response["slug"]);
                    }
                }
            });
        })
   

    //Delete banner
    function deleteBanner(id){
        var url = '{{ route("banners.delete","ID") }}'
        var newUrl = url.replace("ID",id)
        if(confirm("Are you sure you want to delete?")){
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response["status"]){
                        window.location.href="{{ route('settings.index') }}"
                    }
                }
            });
        }
    }

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