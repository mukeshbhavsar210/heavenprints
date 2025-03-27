@php
    $settings = \App\Models\Setting::first();
@endphp


@extends('front.layouts.app')

@section('content')

<section class="section-5">
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item">{{ $page->name }}</li>
        </ol>    
    </div>
</section>

@if ($page->slug == 'contact-us')
    <div class="container">
        <h1 class="pageTitle">{{ $page->name }}</h1>
    </div>    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3 pe-lg-5">
                {!! $page->content !!}

                <ul>
                    <li>Address: {{ $settings->address }}</li>
                    <li>Call: {{ $settings->phone }}</li>
                    <li>Whatsapp: {{ $settings->whatsapp }}</li>
                    <li>Email: {{ $settings->email }}</li>                    
                </ul>	
            </div>

            <div class="col-md-6">
                <form class="shake" role="form" method="post" id="contactForm" name="contactForm">
                    <div class="mb-3">
                        <div class="form-group">
                        <label class="mb-2" for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name"  data-error="Please enter your name">
                        <p class="help-block with-errors"></p>
                    </div>

                    <div class="form-group">                    
                        <label class="mb-2" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email"  data-error="Please enter your Email">
                        <p class="help-block with-errors"></p>
                    </div>

                    <div class="form-group">
                        <label class="mb-2">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject"  data-error="Please enter your message subject">
                        <p class="help-block with-errors"></p>
                    </div>

                    <div class="form-group">
                        <label for="message" class="mb-2">Message</label>
                        <textarea class="form-control" rows="5" id="message" name="message"  data-error="Write your message"></textarea>
                        <p class="help-block with-errors"></p>
                    </div>

                    <div class="form-submit">
                        <button class="btn btn-primary" type="submit" id="form-submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>    
@else
    <div class="container">
        <h1 class="pageTitle">{{ $page->name }}</h1>
        {!! $page->content !!}
    </div>
@endif

@endsection

@section('customJs')
<script>
    $('#contactForm').change(function(event){
        event.preventDefault();

        element = $(this);
        //$("button[type=submit]").prop('disabled', true);

        $.ajax({
            url: '{{ route("front.sendContactEmail") }}',
            type: 'post',
            data: ${this}.serializeArray(),
            dataType: 'json',
            success: function(response){
                //$("button[type=submit]").prop('disabled', false);
                if(response["status"] == true){
                    $("#slug").val(response["slug"]);
                }
            }
        });
    })
</script>
@endsection
