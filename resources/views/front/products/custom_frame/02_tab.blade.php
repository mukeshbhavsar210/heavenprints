<div class="image-upload-wrapper">
    <div class="accordion" id="myAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Select Product
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                <div class="accordion-body">
                    <div class="radio-group row">
                        @if($productSelection)
                            @foreach ($productSelection as $key => $value)
                                <div class="col-md-3 col-4">     
                                    <label class="custom-radio-wrap wrap_01" >
                                        <input type="radio" name="product_selection" value="{{ $key }}" class="frame-option" > 
                                        <div class="productImg">
                                            <img src="{{ asset('uploads/icons/selection/'.$value['image']) }}" alt="{{ $value['name'] }}" >
                                            
                                        </div>        
                                        <p>{{ $value['name'] }}</p>                                
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Upload your photo wants to print on product.
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="accordion-body">
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

                    <p class="text-center mt-2 mb-3">File types accepted: PNG and JPG (Up to 15MB)</p>

                    <div class="preview" id="imagePreview" style="{{ $image ? 'display:block;' : 'display:none;' }}">
                        @if ($image)
                            <img id="previewImage2" src="{{ session('uploaded_image') ? asset('uploads/custom_frames/' . session('uploaded_image')) : '' }}" style="display: {{ session('uploaded_image') ? 'block' : 'none' }};" />
                            <button class="btn btn-danger" id="deleteImage"><i class="fa fa-times"></i></button>            
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>     