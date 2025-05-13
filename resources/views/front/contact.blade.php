@php
    $settings = \App\Models\Setting::first();
@endphp

@extends('front.layouts.app')

@section('content')

<section class="section-5">
    <div class="container">
        <ol class="breadcrumb primary-color">
            <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item">Contact us</li>
        </ol>    
    </div>
</section>

<div class="container">
    <h2 class="pageTitle">Contact Us</h2>
    <div class="row">
        <div class="col-md-6 col-12">
            <h3>Heaven Prints</h3>
            <ul>
                <li>{{ $settings->address }}</li>
                <li>Call: {{ $settings->phone }}</li>
                <li>Whatsapp: {{ $settings->whatsapp }}</li>
                <li>Email: {{ $settings->email }}</li>                    
            </ul>
            
            <p>Heavein Prints Help Center | 24x7 Customer Care Support</p>
        </div>
        <div class="col-md-6 col-12">
            @if(session('success'))
                <p style="background-color: green; color:#fff; padding:15px; border-radius:4px; width:100%;">{{ session('success') }}</p>
            @endif

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" required class="form-control"><br>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" required class="form-control"><br>
                </div>

                <div class="form-group">
                    <label>Subject:</label>
                    <input type="text" name="subject" required class="form-control"><br>
                </div>

                <div class="form-group">
                    <label>Message:</label>
                    <textarea name="message" rows="5" required class="form-control"></textarea><br>
                </div>

                <button type="submit"  class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>

@endsection