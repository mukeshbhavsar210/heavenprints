    <div class="image-upload-wrapper">
        <p class="text">File types accepted: PNG and JPG (Up to 15MB)</p>
        <div style="{{ !$image ? 'display:block;' : 'display:none;' }}" >
            <div class="demo-image-default">
                <div class="upload-control" class="dropzone " id="imageDropzone">
                    <input type="file" id="image" accept="image/*">
                    <div class="upload_logo">
                        <span class="icon"></span>
                        Upload an Image
                        <p>Maximum upload size: 15MB per file</p>
                    </div>
                    <div id="progress-container" class="mb-3" style="display:none; width: 100%; background: #ccc;">
                        <div id="progress-bar" style="width: 0%; height: 5px; border-radius:100px; background: green;"></div>
                    </div>
                    <button id="uploadBtn" class="btn btn-primary">Upload</button>
                    <button id="abortBtn" class="btn btn-danger" style="display:none;">Abort</button>                    
                </div>
            </div>
        </div>

        <div class="preview" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
            @if ($image)
                <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                <button class="btn btn-danger" id="deleteImage"><i class="fa fa-times"></i></button>            
            @endif
        </div> 
    </div>     