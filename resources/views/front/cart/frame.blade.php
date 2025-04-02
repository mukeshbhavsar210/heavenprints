<a class="model-preview" data-bs-toggle="modal" data-bs-target="#modal_{{ $item->id }}" >
    @if($item->options->image)
        <img src="{{ asset('uploads/custom_frames/' . $item->options->image ) }}" alt="Customised Frame" >
    @else
        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" />
    @endif
</a>
<!-- Modal -->
<div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Frame Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <img src="{{ asset('uploads/custom_frames/' . $item->options->image) }}" alt="Customised Frame" style="width: 100%; border-radius:3px;">
            </div>
        </div>
    </div>
</div>