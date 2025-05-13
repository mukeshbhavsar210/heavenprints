@extends('admin.layouts.app')

@section('content')


@include('admin.message')

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="row">
                    <div class="col-sm-8 col-12 d-flex">
                        <h3>Pages</h3>  
                        <span class="counts">{{ $counts }}</span>                                  
                    </div>
                    <div class="col-sm-4 col-12 d-flex">
                        <div class="flexContainer">
                            <form action="" method="get" >
                                <div class="d-flex">
                                    <div class="card-title">
                                        <button type="button" onclick="window.location.href='{{ route('pages.index') }}'" class="btn btn-default btn-sm">
                                            <?xml version="1.0" encoding="utf-8"?>
                                                <svg width="20px" height="20px" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                                                <g fill="none" fill-rule="evenodd" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" transform="matrix(0 1 1 0 2.5 2.5)">
                                                <path d="m3.98652376 1.07807068c-2.38377179 1.38514556-3.98652376 3.96636605-3.98652376 6.92192932 0 4.418278 3.581722 8 8 8s8-3.581722 8-8-3.581722-8-8-8"/>
                                                <path d="m4 1v4h-4" transform="matrix(1 0 0 -1 0 6)"/>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                
                                    <div class="card-tools">
                                        <div class="input-group input-group searchMain">
                                            <input value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                
                                            <div class="input-group-append">
                                                <button type="submit" class="btn">
                                                    <i class="iconoir-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('pages.create') }}" class="btn btn-primary ">Create</a>
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
                            <th>Name</th>
                            <th>Category</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pages->isNotEmpty())
                            @foreach ($pages as $page)
                                <tr>
                                    <td><a href="{{ route('pages.edit', $page->id ) }}">{{ $page->id }}</a></td>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->category }}</td>
                                    <td>
                                        <a href="{{ route('pages.edit', $page->id ) }}">
                                            <i class="las la-pen text-secondary fs-18"></i>
                                        </a>
                                        <a href="#" onclick="deletePage({{ $page->id }})" class="text-danger w-4 h-4 mr-1">
                                            <i class="las la-trash-alt text-secondary fs-18"></i>
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
            {{ $pages->links() }}
        </div>
    </div>
@endsection

@section('customJs')
<script>
    function deletePage(id){
        var url = '{{ route("pages.delete","ID") }}'
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
                        window.location.href="{{ route('pages.index') }}"
                    }
                }
            });
        }
    }
</script>
@endsection
