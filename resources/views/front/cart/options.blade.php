<div style="font-size: 12px;">
    <p class="m-0">
        @if($item->options->neon_light == "NEON")
            You selected: <span class="neon_lightSelected">{{ $item->options->neon_light }}</span><br />
        @endif
        @if($item->options->neon_light == "FLORO")
            You selected: <span class="floro_lightSelected">{{ $item->options->neon_light }}</span><br />
        @endif
        
        @if($item->options->custom_neon )
            Text: {{ $item->options->custom_neon }}
        @endif
        @if($item->options->neon_color)
            , Color: {{ $item->options->neon_color }}
        @endif
        @if($item->options->neon_size)
            , Size: {{ $item->options->neon_size }}
        @endif        
        @if($item->options->neon_font)
            , Font: {{ $item->options->neon_font }}
        @endif        
        @if($item->options->color)
            Color: {{ $item->options->color }}
        @endif
        @if($item->options->size)
            , Size: {{ $item->options->size }}
        @endif 
        {{-- @if($item->options->light_category)
            <br /><p class="lightSelected">{{ $item->options->light_category }}</p>
        @endif   --}}
        
        @if($item->options->shape) <br />
            Shape: {{ $item->options->shape }} 
        @endif 
        @if($item->options->custom_size1 || $item->options->custom_size2)
            , Custom Size: {{ $item->options->custom_size1 }}" x {{ $item->options->custom_size2 }}"
        @endif
    </p>
</div>      
                                        
<div class="modal fade" id="modalDetails_{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Frame Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if($item->options->category)
                        <div class="col-md-6">                                                                    
                            <div class="row">
                                <div class="col-md-3"><b>Category</b></div>
                                <div class="col-md-9">: {{ $item->options->category }} </div>
                            </div>
                        </div>                
                    @endif
                    @if($item->options->font)
                        <div class="col-md-6">                                                                    
                            <div class="row">
                                <div class="col-md-3"><b>Font</b></div>
                                <div class="col-md-9">: {{ $item->options->font }}</div>
                            </div>
                        </div>     
                    @endif
                    @if($item->options->frame)
                        <div class="col-md-6">                                                                    
                            <div class="row">
                                <div class="col-md-3"><b>Frame</b></div>
                                <div class="col-md-9">: {{ $item->options->frame }}</div>
                            </div>
                        </div>   
                    @endif
                    @if($item->options->wrap)
                        <div class="col-md-6">                                                                    
                            <div class="row">
                                <div class="col-md-3"><b>Wrap</b></div>
                                <div class="col-md-9">: {{ $item->options->wrap }}</div>
                            </div>
                        </div>
                    @endif                                                                
                    @if($item->options->border)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Border</b></div>
                                <div class="col-md-9">: {{ $item->options->border }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->wrap_wrap)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Wrap</b></div>
                                <div class="col-md-9">: {{ $item->options->wrap_wrap }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->hardware_style)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Style</b></div>
                                <div class="col-md-9">: {{ $item->options->hardware_style }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->hardware_display)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Display</b></div>
                                <div class="col-md-9">: {{ $item->options->hardware_display }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->lamination)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Lamination</b></div>
                                <div class="col-md-9">: {{ $item->options->lamination }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->retouching)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Retouching</b></div>
                                <div class="col-md-9">: {{ $item->options->retouching }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->hardware_finishing)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Finishing</b></div>
                                <div class="col-md-9">: {{ $item->options->hardware_finishing }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->proof)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Proof</b></div>
                                <div class="col-md-9">: {{ $item->options->proof }}</div>
                            </div>
                        </div>  
                    @endif
                    @if($item->options->major)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3"><b>Major</b></div>
                                <div class="col-md-9">: {{ $item->options->major }}</div>
                            </div>
                        </div>  
                    @endif
                </div> 
            </div>
        </div>
    </div>
</div>