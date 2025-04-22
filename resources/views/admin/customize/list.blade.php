@extends('admin.layouts.app')

@section('content')

@include('admin.message')

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-sm-8 col-12 d-flex">
                        <h3>Customize</h3>  
                        <span class="counts">{{ $counts }}</span>                                  
                    </div>
                    <div class="col-sm-4 col-12 d-flex">
                        <div class="flexContainer">
                            <form action="" method="get" >
                                <div class="d-flex">
                                    <div class="card-title">
                                        <button type="button" onclick="window.location.href='{{ route('customize.index') }}'" class="btn btn-default btn-sm">Reset</button>
                                    </div>
                
                                    <div class="card-tools">
                                        <div class="input-group input-group" style="width: 250px;">
                                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                
                                            <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('customize.create') }}" class="btn btn-primary ">Create</a>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>

        <div class="card-body pt-0">
            <table class="table datatable dataTable-table">
                <thead class="table-light">  
                    <tr>
                        <th width="60">ID</th>
                        <th>Image</th>   
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>                        
                        <th>Type</th>                                                    
                        <th width="100">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($customize->isNotEmpty())
                        @foreach ($customize as $value)
                            <tr>
                                <td><a href="{{ route('customize.edit', $value->id ) }}">{{ $value->id }}</a></td>
                                <td style="width: 100px;">
                                    @if (!empty($value->image))
                                        <img src="{{ asset('uploads/customize/'.$value->image) }}" class="img-thumbnail" width="75" >
                                        @else
                                        <img src="{{ asset('admin-assets/img/default-150x150.png') }}" alt="" class="img-thumbnail" width="75"  />
                                    @endif                                        
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>₹{{ $value->price }}</td>                                    
                                <td>{{ $value->category }}</td>
                                <td>{{ $value->type }}</td>                                
                                <td>    
                                    <a href="{{ route('customize.edit', $value->id ) }}">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>                                      
                                    <a href="#" onclick="deleteCustomize({{ $value->id }})" class="text-danger w-4 h-4 mr-1">
                                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>   
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Records not found</td>
                        </tr>
                    @endif
                </tbody>
            </table>            
        </div>
        <hr class="m-0" />
        <div class="card-body pb-0 clearfix">
            {{ $customize->links() }}
        </div>
    </div>
@endsection

@section('customJs')
<script>
    function deleteCustomize(id){

        var url = '{{ route("customize.delete","ID") }}'
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
                        window.location.href="{{ route('customize.index') }}"
                    }
                }
            });
        }
    }
</script>
@endsection
