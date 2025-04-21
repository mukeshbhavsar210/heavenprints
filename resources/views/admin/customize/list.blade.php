@extends('admin.layouts.app')

@section('content')

<section class="content-header">
    <div class="container-fluid" id="adminHeader">
        <div class="row">
            <div class="col-sm-6 col-12 d-flex">
                <h1>Customize</h1>
                <span class="counts">{{ $counts }}</span>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('customize.create') }}" class="btn btn-primary">New</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @include('admin.message')

        <div class="card">
            <form action="" method="get" >
                <div class="card-header">
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

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Image</th>   
                            <th>Category</th>                        
                            <th>Type</th>                            
                            <th>Price</th>
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
                                    <td>{{ $value->category }}</td>
                                    <td>{{ $value->type }}</td>                                    
                                    <td>₹{{ $value->price }}</td>                                    
                                    <td>                                          
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
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
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
