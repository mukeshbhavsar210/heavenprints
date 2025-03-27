<a class="model-preview" data-bs-toggle="modal" data-bs-target="#modal_{{ $item->id }}" >
    <div class="neon-thumb">
        <svg width="85px" height="85px" xmlns="http://www.w3.org/2000/svg">
            <text x="0" y="50%" font-family="{{ $item->options->font }}" font-size="10" fill="{{ $item->options->color }}" text-anchor="left" alignment-baseline="left">{{ $item->name }}</text>
        </svg>
    </div>
</a>

<!-- Modal -->
<div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Neon Preview</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background:#000;">
                <svg width="100%" height="auto" xmlns="http://www.w3.org/2000/svg">
                    <text x="50%" y="60%" font-family="{{ $item->options->font }}" font-size="80" fill="{{ $item->options->color }}" text-anchor="middle" alignment-baseline="middle">{{ $item->name }}</text>
                </svg>
            </div>
        </div>
    </div>
</div>