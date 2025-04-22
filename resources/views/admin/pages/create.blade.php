@extends('admin.layouts.app')

@section('content')

<div class="card mainPage">
    
    @include('admin.message')

    <div class="card-header">
        <div class="row">
            <div class="col-sm-11 col-12">
                <h4 class="mt-1 mb-0">Create Page</h4>
            </div>
            <div class="col-sm-1 col-12">
                <div class="pull-right">
                    <a href="{{ route('pages.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="m-0" />
        <form action="" method="post" id="pageForm" name="pageForm">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 col-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                <input type="hidden" readonly name="slug" id="slug" class="form-control" placeholder="slug">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="category">Status</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="about_us">About us</option>
                                    <option value="insrpiration">Insrpiration</option>
                                    <option value="products">Our Products</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" class="summernote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
               
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('pages.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>                    
                </div>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
@endsection

@section('customJs')
    <script>
        $("#pageForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route("pages.store") }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);

                    if(response["status"] == true){

                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        $('#slug').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback').html("");

                        window.location.href="{{ route('pages.index') }}"

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
