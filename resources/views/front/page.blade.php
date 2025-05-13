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

<div class="container">
    <h1 class="pageTitle">{{ $page->name }}</h1>
    {!! $page->content !!}
</div>

@endsection

@section('customJs')
@endsection
