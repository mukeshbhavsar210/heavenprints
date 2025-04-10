<div class="image-upload-wrapper mt-3s">
    <div style="{{ !$image ? 'display:block;' : 'display:none;' }}" >
        <div class="card">
            <div class="card-header">
                <h5>Upload your Photo</h5>
            </div>
            <div class="card-body">
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

            <p class="text-center mt-2 mb-3">Upload your photo wants to print on product.<br />
                File types accepted: PNG and JPG (Up to 15MB)</p>
        </div>
    </div>
</div>
    <div class="preview text-center" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
        <div class="card">
            <div class="card-header">
                <h5>Uploaded Photo</h5>
            </div>
            <div class="card-body">
                @if ($image)
                    <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                    <button class="btn btn-danger mt-2" id="deleteImage">Delete</button>            
                @endif
            </div>
        </div>
    </div>
</div>