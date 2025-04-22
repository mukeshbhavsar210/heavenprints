@extends('admin.layouts.app')

@section('content')

<div class="card mainPage">
    
    @include('admin.message')

    <div class="card-header">
        <div class="row">
            <div class="col-sm-11 col-12">
                <h4 class="mt-1 mb-0">Create Brand</h4>
            </div>
            <div class="col-sm-1 col-12">
                <div class="pull-right">
                    <a href="{{ route('brands.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="m-0" />
        <form action="" method="post" id="createBrandForm" name="createBrandForm">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                <input readonly type="hidden" name="slug" id="slug" class="form-control" placeholder="Slug">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <button type="submit" class="btn btn-primary mt-2">Create</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('customJs')
    <script>
        $("#createBrandForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("brands.store") }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);

                    if(response["status"] == true){

                        window.location.href="{{ route('brands.index') }}"

                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#slug').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                    } else {
                        var errors = response['errors']
                        
                        if(errors['name']){
                            $('#name').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['name']);
                        } else {
                            $('#name').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }

                        if(errors['slug']){
                            $('#slug').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['slug']);
                        } else {
                            $('#slug').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }

                    }

                }, error: function(jqXHR, exception) {
                    console.log("Something event wrong");
                }
            })
        });

        $('#name').change(function(){
            element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route("getSlug") }}',
                type: 'get',
                data: {title: element.val()},
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);
                    if(response["status"] == true){
                        $("#slug").val(response["slug"]);
                    }
                }
            });
        })
    </script>
@endsection
