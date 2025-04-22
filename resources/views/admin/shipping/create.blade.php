@extends('admin.layouts.app')

@section('content')


<div class="card mainPage">
    
    @include('admin.message')

    <div class="card-header">
        <div class="row">
            <div class="col-sm-11 col-12">
                <h4 class="mt-1 mb-0">Shipping Management</h4>
            </div>
            <div class="col-sm-1 col-12">
                <div class="pull-right">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <hr class="m-0" />
    <div class="card">
        <div class="card-body">
            <form action="" method="post" id="shippingForm" name="shippingForm">           
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <select name="country" id="country" class="form-select">
                                <option value="">Select a State</option>
                                @if ($countries->isNotEmpty())
                                    @foreach ($countries->unique('name') as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                    <option value="rest_of_world">Rest of the state</option>
                                @endif
                            </select>
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount">
                            <p></p>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
      
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Country Name</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>

                            @if ($shippingCharges->isNotEmpty())
                                @foreach ($shippingCharges as $shippingCharge)
                                <tr>
                                    <td><a href="{{ route('shipping.edit', $shippingCharge->id ) }}" >{{ $shippingCharge->id }}</a></td>
                                    <td>{{ ($shippingCharge->country_id == 'rest_of_world') ? 'Rest of the world' : $shippingCharge->name }}</td>
                                    <td>₹{{ $shippingCharge->amount }}.00</td>
                                    <td>
                                        <a href="{{ route('shipping.edit', $shippingCharge->id ) }}" class="btn btn-primary">Edit</a>
                                        <a href="javascript:void(0);" onclick="deleteRecord( {{ $shippingCharge->id}} )" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $("#shippingForm").submit(function(event){
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);

            $.ajax({
                url: '{{ route("shipping.store") }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response){
                    $("button[type=submit]").prop('disabled', false);

                    if(response["status"] == true){

                        window.location.href="{{ route('shipping.create') }}"



                    } else {
                        var errors = response['errors']
                        if(errors['country']){
                            $('#country').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['country']);
                        } else {
                            $('#country').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }

                        if(errors['amount']){
                            $('#amount').addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['amount']);
                        } else {
                            $('#amount').removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                        }

                    }

                }, error: function(jqXHR, exception) {
                    console.log("Something event wrong");
                }
            })
        });

        function deleteRecord(id){
            var url = '{{ route("shipping.delete","ID") }}'
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
                            window.location.href="{{ route('shipping.create') }}"
                        }
                    }
                });
            }
        }
    </script>
@endsection
