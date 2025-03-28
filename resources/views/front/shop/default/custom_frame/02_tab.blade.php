    <div class="image-upload-wrapper">
        <p>File types accepted: PNG, JPG and BMP (Up to 25MB)</p>
        <div style="{{ !$image ? 'display:block;' : 'display:none;' }}" >
            <div class="demo-image-default">
                <div class="upload-control">
                    <input type="file" id="image" accept="image/*">
                    <i class="fa fa-upload" aria-hidden="true"></i> Upload an Image
                    <p>Maximum upload size: 25MB per file</p>
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
                <img  id="previewImage2" src="{{ session('uploaded_image') ? asset('storage/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                <button class="btn btn-danger" id="deleteImage"><i class="fa fa-times"></i></button>            
            @endif
        </div> 
    </div> 