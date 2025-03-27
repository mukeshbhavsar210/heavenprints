<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	@php
		$settings = \App\Models\Setting::first();
	@endphp

	<title>{{ $settings->business_line }}</title>
	<meta name="description" content="{{ $settings->description }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/ion.rangeSlider.min.css') }}" />

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">
	<header>
		<div class="logoWrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-5 d-flex">
						<a href="{{ route('front.home') }}" class="text-decoration-none" title="{{ $settings->name }}">
							<img style="width: 130px;" src="{{ asset('uploads/logo/'.$settings->image) }}" alt="" />
						</a>
					</div>

					<div class="col-md-4 col-7">
						<div class="pull-right">
							<div class="d-flex">
								<button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<?xml version="1.0" encoding="utf-8"?>
									<svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6.5 11.75C6.08579 11.75 5.75 12.0858 5.75 12.5C5.75 12.9142 6.08579 13.25 6.5 13.25V11.75ZM18.5 13.25C18.9142 13.25 19.25 12.9142 19.25 12.5C19.25 12.0858 18.9142 11.75 18.5 11.75V13.25ZM6.5 15.75C6.08579 15.75 5.75 16.0858 5.75 16.5C5.75 16.9142 6.08579 17.25 6.5 17.25V15.75ZM18.5 17.25C18.9142 17.25 19.25 16.9142 19.25 16.5C19.25 16.0858 18.9142 15.75 18.5 15.75V17.25ZM6.5 7.75C6.08579 7.75 5.75 8.08579 5.75 8.5C5.75 8.91421 6.08579 9.25 6.5 9.25V7.75ZM18.5 9.25C18.9142 9.25 19.25 8.91421 19.25 8.5C19.25 8.08579 18.9142 7.75 18.5 7.75V9.25ZM6.5 13.25H18.5V11.75H6.5V13.25ZM6.5 17.25H18.5V15.75H6.5V17.25ZM6.5 9.25H18.5V7.75H6.5V9.25Z" fill="#000000"/>
									</svg>
								</button>

								<button class="navbar-toggler d-lg-none d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#searchWrapper" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<?xml version="1.0" encoding="utf-8"?>
									<svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2"/>
									<path d="M14 14L16 16" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M15 11.5C15 13.433 13.433 15 11.5 15C9.567 15 8 13.433 8 11.5C8 9.567 9.567 8 11.5 8C13.433 8 15 9.567 15 11.5Z" stroke="#323232" stroke-width="2"/>
									</svg>
								</button>

								<div class="talk d-none d-sm-block">
									<div class="icon">
										<svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M15.5562 14.5477L15.1007 15.0272C15.1007 15.0272 14.0181 16.167 11.0631 13.0559C8.10812 9.94484 9.1907 8.80507 9.1907 8.80507L9.47752 8.50311C10.1841 7.75924 10.2507 6.56497 9.63424 5.6931L8.37326 3.90961C7.61028 2.8305 6.13596 2.68795 5.26145 3.60864L3.69185 5.26114C3.25823 5.71766 2.96765 6.30945 3.00289 6.96594C3.09304 8.64546 3.81071 12.259 7.81536 16.4752C12.0621 20.9462 16.0468 21.1239 17.6763 20.9631C18.1917 20.9122 18.6399 20.6343 19.0011 20.254L20.4217 18.7584C21.3806 17.7489 21.1102 16.0182 19.8833 15.312L17.9728 14.2123C17.1672 13.7486 16.1858 13.8848 15.5562 14.5477Z" fill="#1C274C"></path>
											<path d="M13.2595 1.87983C13.3257 1.47094 13.7122 1.19357 14.1211 1.25976C14.1464 1.26461 14.2279 1.27983 14.2705 1.28933C14.3559 1.30834 14.4749 1.33759 14.6233 1.38082C14.9201 1.46726 15.3347 1.60967 15.8323 1.8378C16.8286 2.29456 18.1544 3.09356 19.5302 4.46936C20.906 5.84516 21.705 7.17097 22.1617 8.16725C22.3899 8.66487 22.5323 9.07947 22.6187 9.37625C22.6619 9.52466 22.6912 9.64369 22.7102 9.72901C22.7197 9.77168 22.7267 9.80594 22.7315 9.83125L22.7373 9.86245C22.8034 10.2713 22.5286 10.6739 22.1197 10.7401C21.712 10.8061 21.3279 10.53 21.2601 10.1231C21.258 10.1121 21.2522 10.0828 21.2461 10.0551C21.2337 9.9997 21.2124 9.91188 21.1786 9.79572C21.1109 9.56339 20.9934 9.21806 20.7982 8.79238C20.4084 7.94207 19.7074 6.76789 18.4695 5.53002C17.2317 4.29216 16.0575 3.59117 15.2072 3.20134C14.7815 3.00618 14.4362 2.88865 14.2038 2.82097C14.0877 2.78714 13.9417 2.75363 13.8863 2.7413C13.4793 2.67347 13.1935 2.28755 13.2595 1.87983Z" fill="#1C274C"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M13.4857 5.3293C13.5995 4.93102 14.0146 4.7004 14.4129 4.81419L14.2069 5.53534C14.4129 4.81419 14.4129 4.81419 14.4129 4.81419L14.4144 4.81461L14.4159 4.81505L14.4192 4.81602L14.427 4.81834L14.4468 4.8245C14.4618 4.82932 14.4807 4.8356 14.5031 4.84357C14.548 4.85951 14.6074 4.88217 14.6802 4.91337C14.8259 4.97581 15.0249 5.07223 15.2695 5.21694C15.7589 5.50662 16.4271 5.9878 17.2121 6.77277C17.9971 7.55775 18.4782 8.22593 18.7679 8.7154C18.9126 8.95991 19.009 9.15897 19.0715 9.30466C19.1027 9.37746 19.1254 9.43682 19.1413 9.48173C19.1493 9.50418 19.1555 9.52301 19.1604 9.53809L19.1665 9.55788L19.1688 9.56563L19.1698 9.56896L19.1702 9.5705C19.1702 9.5705 19.1707 9.57194 18.4495 9.77798L19.1707 9.57194C19.2845 9.97021 19.0538 10.3853 18.6556 10.4991C18.2607 10.6119 17.8492 10.3862 17.7313 9.99413L17.7276 9.98335C17.7223 9.96832 17.7113 9.93874 17.6928 9.89554C17.6558 9.8092 17.5887 9.66797 17.4771 9.47938C17.2541 9.10264 16.8514 8.53339 16.1514 7.83343C15.4515 7.13348 14.8822 6.73078 14.5055 6.50781C14.3169 6.39619 14.1757 6.32909 14.0893 6.29209C14.0461 6.27358 14.0165 6.26254 14.0015 6.25721L13.9907 6.25352C13.5987 6.13564 13.3729 5.72419 13.4857 5.3293Z" fill="#1C274C"></path>
										</svg>
									</div>
									<div class="icon-text">
										<span class="small-text">Talk to us</span>
										<span class="big-text">{{ $settings->phone }}</span>
									</div>
								</div>

								@if (Auth::check())
									<a href="{{ route('account.profile')}}" class="btn btn-primary loginBtn mt-1">My Account</a>
								@else
									<a href="{{ route('account.login')}}" class="btn btn-primary loginBtn mt-1">Login</a>
								@endif
								<a href="{{ route('front.cart') }}" class="ml-3 d-flex pt-2 relative">
									<?xml version="1.0" encoding="utf-8"?>
									<svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M10.692 17.95C10.6909 18.5286 10.2212 18.9968 9.64268 18.996C9.06414 18.9953 8.59564 18.5259 8.59601 17.9474C8.59638 17.3688 9.06547 16.9 9.64401 16.9C9.92222 16.9003 10.1889 17.0111 10.3855 17.208C10.582 17.4049 10.6923 17.6718 10.692 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M16.281 17.95C16.2799 18.5286 15.8102 18.9968 15.2317 18.996C14.6531 18.9953 14.1846 18.5259 14.185 17.9474C14.1854 17.3688 14.6545 16.9 15.233 16.9C15.5112 16.9003 15.7779 17.0111 15.9745 17.208C16.171 17.4049 16.2813 17.6718 16.281 17.95V17.95Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M20.1 7.80005H9.99303L9.29303 13.4C9.29303 14.1732 9.91983 14.8 10.693 14.8L18.5 14C18.9917 13.9998 19.4472 13.7417 19.7 13.32L21.3 9.92005C21.5593 9.48764 21.5661 8.9492 21.3177 8.51041C21.0694 8.07163 20.6042 7.80029 20.1 7.80005Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M7.364 9.639C7.77821 9.639 8.114 9.30322 8.114 8.889C8.114 8.47479 7.77821 8.139 7.364 8.139V9.639ZM4.5 8.139C4.08579 8.139 3.75 8.47479 3.75 8.889C3.75 9.30322 4.08579 9.639 4.5 9.639V8.139ZM7.364 11.972C7.77821 11.972 8.114 11.6362 8.114 11.222C8.114 10.8078 7.77821 10.472 7.364 10.472V11.972ZM6.432 10.472C6.01779 10.472 5.682 10.8078 5.682 11.222C5.682 11.6362 6.01779 11.972 6.432 11.972V10.472ZM9.2653 7.98152C9.36555 8.38342 9.77262 8.62796 10.1745 8.52771C10.5764 8.42746 10.821 8.02038 10.7207 7.61848L9.2653 7.98152ZM9.324 5.118L10.0517 4.93648L10.0505 4.93171L9.324 5.118ZM9.171 5V5.75002L9.1754 5.74999L9.171 5ZM6.5 4.25C6.08579 4.25 5.75 4.58579 5.75 5C5.75 5.41422 6.08579 5.75 6.5 5.75V4.25ZM7.364 8.139H4.5V9.639H7.364V8.139ZM7.364 10.472H6.432V11.972H7.364V10.472ZM10.7207 7.61848L10.0517 4.93648L8.5963 5.29952L9.2653 7.98152L10.7207 7.61848ZM10.0505 4.93171C9.94713 4.52862 9.58273 4.24758 9.1666 4.25002L9.1754 5.74999C8.90333 5.75158 8.66508 5.56784 8.59751 5.3043L10.0505 4.93171ZM9.171 4.25H6.5V5.75H9.171V4.25Z" fill="#000000"/>
									</svg>
									<div class="cartCount">{{ Cart::count() }}</div>
								</a>	
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="page-header">
			<div class="container">
				<nav class="navbar navbar-expand-xl" id="navbar" >
					<div class="row">
						<div class="col-md-9 col-12">
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item dropdown">
										<a class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
											Customize
										</a>
										<ul class="dropdown-menu dropdown-menu-dark">
											<li>
												<a class="dropdown-item nav-link" href="{{ route('front.neon')}}">
													<div class="nav_thumb"> 
														<img src="{{ asset('uploads/sub_category/neon.jpg') }}" alt="" />
														<p class="nav_name">Neon</p>
													</div>			
												</a>
											</li>
										</ul>							
									</li>

									@if (getCategories()->isNotEmpty())
										@foreach (getCategories() as $category )
											<li class="nav-item dropdown">
												<button class="btn dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false">
													{{ $category->name }}
												</button>
				
												@if ($category->sub_category->isNotEmpty())
													<ul class="dropdown-menu dropdown-menu-dark">
														@foreach ($category->sub_category as $subCategory)
															<li>
																<a class="dropdown-item nav-link" href="{{ route('front.shop',[$category->slug_category,$subCategory->slug_sub_category])}}">
																	<div class="nav_thumb"> 
																		<img src="{{ asset('uploads/sub_category/'.$subCategory->image) }}" alt="" />
																		<p class="nav_name">{{ $subCategory->name }}</p>
																	</div>																	
																</a>
															</li>
														@endforeach
													</ul>
												@endif
											</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-12">
							<div class="collapse navbar-collapse mt-2" id="searchWrapper">
								<form action="{{ route('front.search') }}" >
									<div class="input-group pull-right">
										<input value="{{ Request::get('search') }}" type="text" placeholder="Search For Products" class="form-control" name="search" id="search">
										<button type="submit" class="input-group-text">
											<i class="fa fa-search"></i>
										</button>
									</div>
								</form>					
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
</header>

<main>
    @yield('content')
</main>

<footer>
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-6">
					<h6>About us</h6>
					<ul class="mt-3">
						@if(staticPages()->isNotEmpty())
							@foreach (staticPages() as $page)
								<li><a href="{{ route('front.page',$page->slug) }}" title="{{ $page->name }}">{{ $page->name }}</a></li>
							@endforeach
						@endif
					</ul>					
				</div>
				<div class="col-md-3 col-6">
					<h6>Inspiration</h6>
					<ul id="menu_inspi">
						<li><a href="/refer-a-friend">Refer and Earn</a></li>
						<li><a href="/sizes-prices">Pricing and Options</a></li>
						<li><a href="/coupons-codes-and-deals">Special Offers</a></li>
						<li><a href="/blog">Read our Latest Blog</a></li>
						<li><a href="/inspiration-photos-gallery">Idea Gallery</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-6">					
					<h6>Our Products</h6>
					{{-- @if (allProducts()->isNotEmpty())
						<ul>
							@foreach (allProducts() as $value )
								<li>
									<a href="{{ route('front.shop',[$category->slug_category,$subCategory->slug_sub_category])}}">
										{{ $value->name }}
									</a>
								</li>
							@endforeach
						</ul>
					@endif --}}

					<ul>
						<li><a href="/photo-pillows">Photo Pillows</a></li>
						<li><a href="/photo-calendars">Photo Calendars</a></li>
						<li><a href="/photo-mugs">Photo Mug</a></li>
						<li><a href="/photo-prints">Photo Prints</a></li>
						<li><a href="/poster-prints">Poster Prints</a></li>
						<li><a href="/photo-magnets">Photo Magnets</a></li>
						<li><a href="/magic-mugs">Magic Photo Mugs</a></li>
					</ul>					
				</div>
				<div class="col-md-4 col-12">
					<h6>Contact</h6>
					<ul>
						<li>
							<?xml version="1.0" encoding="utf-8"?>
								<svg width="22px" height="22px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.5562 14.5477L15.1007 15.0272C15.1007 15.0272 14.0181 16.167 11.0631 13.0559C8.10812 9.94484 9.1907 8.80507 9.1907 8.80507L9.47752 8.50311C10.1841 7.75924 10.2507 6.56497 9.63424 5.6931L8.37326 3.90961C7.61028 2.8305 6.13596 2.68795 5.26145 3.60864L3.69185 5.26114C3.25823 5.71766 2.96765 6.30945 3.00289 6.96594C3.09304 8.64546 3.81071 12.259 7.81536 16.4752C12.0621 20.9462 16.0468 21.1239 17.6763 20.9631C18.1917 20.9122 18.6399 20.6343 19.0011 20.254L20.4217 18.7584C21.3806 17.7489 21.1102 16.0182 19.8833 15.312L17.9728 14.2123C17.1672 13.7486 16.1858 13.8848 15.5562 14.5477Z" fill="#1C274C"/>
								<path d="M13.2595 1.87983C13.3257 1.47094 13.7122 1.19357 14.1211 1.25976C14.1464 1.26461 14.2279 1.27983 14.2705 1.28933C14.3559 1.30834 14.4749 1.33759 14.6233 1.38082C14.9201 1.46726 15.3347 1.60967 15.8323 1.8378C16.8286 2.29456 18.1544 3.09356 19.5302 4.46936C20.906 5.84516 21.705 7.17097 22.1617 8.16725C22.3899 8.66487 22.5323 9.07947 22.6187 9.37625C22.6619 9.52466 22.6912 9.64369 22.7102 9.72901C22.7197 9.77168 22.7267 9.80594 22.7315 9.83125L22.7373 9.86245C22.8034 10.2713 22.5286 10.6739 22.1197 10.7401C21.712 10.8061 21.3279 10.53 21.2601 10.1231C21.258 10.1121 21.2522 10.0828 21.2461 10.0551C21.2337 9.9997 21.2124 9.91188 21.1786 9.79572C21.1109 9.56339 20.9934 9.21806 20.7982 8.79238C20.4084 7.94207 19.7074 6.76789 18.4695 5.53002C17.2317 4.29216 16.0575 3.59117 15.2072 3.20134C14.7815 3.00618 14.4362 2.88865 14.2038 2.82097C14.0877 2.78714 13.9417 2.75363 13.8863 2.7413C13.4793 2.67347 13.1935 2.28755 13.2595 1.87983Z" fill="#1C274C"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M13.4857 5.3293C13.5995 4.93102 14.0146 4.7004 14.4129 4.81419L14.2069 5.53534C14.4129 4.81419 14.4129 4.81419 14.4129 4.81419L14.4144 4.81461L14.4159 4.81505L14.4192 4.81602L14.427 4.81834L14.4468 4.8245C14.4618 4.82932 14.4807 4.8356 14.5031 4.84357C14.548 4.85951 14.6074 4.88217 14.6802 4.91337C14.8259 4.97581 15.0249 5.07223 15.2695 5.21694C15.7589 5.50662 16.4271 5.9878 17.2121 6.77277C17.9971 7.55775 18.4782 8.22593 18.7679 8.7154C18.9126 8.95991 19.009 9.15897 19.0715 9.30466C19.1027 9.37746 19.1254 9.43682 19.1413 9.48173C19.1493 9.50418 19.1555 9.52301 19.1604 9.53809L19.1665 9.55788L19.1688 9.56563L19.1698 9.56896L19.1702 9.5705C19.1702 9.5705 19.1707 9.57194 18.4495 9.77798L19.1707 9.57194C19.2845 9.97021 19.0538 10.3853 18.6556 10.4991C18.2607 10.6119 17.8492 10.3862 17.7313 9.99413L17.7276 9.98335C17.7223 9.96832 17.7113 9.93874 17.6928 9.89554C17.6558 9.8092 17.5887 9.66797 17.4771 9.47938C17.2541 9.10264 16.8514 8.53339 16.1514 7.83343C15.4515 7.13348 14.8822 6.73078 14.5055 6.50781C14.3169 6.39619 14.1757 6.32909 14.0893 6.29209C14.0461 6.27358 14.0165 6.26254 14.0015 6.25721L13.9907 6.25352C13.5987 6.13564 13.3729 5.72419 13.4857 5.3293Z" fill="#1C274C"/>
								</svg>
								: {{ $settings->phone }}
							</li>
						<li>
							<?xml version="1.0" encoding="UTF-8" standalone="no"?>
							<svg width="20px" height="20px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<defs>
								</defs>
								<g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<g id="Color-" transform="translate(-700.000000, -360.000000)" fill="#67C15E">
										<path d="M723.993033,360 C710.762252,360 700,370.765287 700,383.999801 C700,389.248451 701.692661,394.116025 704.570026,398.066947 L701.579605,406.983798 L710.804449,404.035539 C714.598605,406.546975 719.126434,408 724.006967,408 C737.237748,408 748,397.234315 748,384.000199 C748,370.765685 737.237748,360.000398 724.006967,360.000398 L723.993033,360.000398 L723.993033,360 Z M717.29285,372.190836 C716.827488,371.07628 716.474784,371.034071 715.769774,371.005401 C715.529728,370.991464 715.262214,370.977527 714.96564,370.977527 C714.04845,370.977527 713.089462,371.245514 712.511043,371.838033 C711.806033,372.557577 710.056843,374.23638 710.056843,377.679202 C710.056843,381.122023 712.567571,384.451756 712.905944,384.917648 C713.258648,385.382743 717.800808,392.55031 724.853297,395.471492 C730.368379,397.757149 732.00491,397.545307 733.260074,397.27732 C735.093658,396.882308 737.393002,395.527239 737.971421,393.891043 C738.54984,392.25405 738.54984,390.857171 738.380255,390.560912 C738.211068,390.264652 737.745308,390.095816 737.040298,389.742615 C736.335288,389.389811 732.90737,387.696673 732.25849,387.470894 C731.623543,387.231179 731.017259,387.315995 730.537963,387.99333 C729.860819,388.938653 729.198006,389.89831 728.661785,390.476494 C728.238619,390.928051 727.547144,390.984595 726.969123,390.744481 C726.193254,390.420348 724.021298,389.657798 721.340985,387.273388 C719.267356,385.42535 717.856938,383.125756 717.448104,382.434484 C717.038871,381.729275 717.405907,381.319529 717.729948,380.938852 C718.082653,380.501232 718.421026,380.191036 718.77373,379.781688 C719.126434,379.372738 719.323884,379.160897 719.549599,378.681068 C719.789645,378.215575 719.62006,377.735746 719.450874,377.382942 C719.281687,377.030139 717.871269,373.587317 717.29285,372.190836 Z" id="Whatsapp"></path>
									</g>
								</g>
							</svg>
							: {{ $settings->whatsapp }}
						</li>
						<li>
							<?xml version="1.0" encoding="utf-8"?>
							<svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="style=stroke">
							<g id="email">
							<path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M3.88534 5.2371C3.20538 5.86848 2.75 6.89295 2.75 8.5V15.5C2.75 17.107 3.20538 18.1315 3.88534 18.7629C4.57535 19.4036 5.61497 19.75 7 19.75H17C18.385 19.75 19.4246 19.4036 20.1147 18.7629C20.7946 18.1315 21.25 17.107 21.25 15.5V8.5C21.25 6.89295 20.7946 5.86848 20.1147 5.2371C19.4246 4.59637 18.385 4.25 17 4.25H7C5.61497 4.25 4.57535 4.59637 3.88534 5.2371ZM2.86466 4.1379C3.92465 3.15363 5.38503 2.75 7 2.75H17C18.615 2.75 20.0754 3.15363 21.1353 4.1379C22.2054 5.13152 22.75 6.60705 22.75 8.5V15.5C22.75 17.393 22.2054 18.8685 21.1353 19.8621C20.0754 20.8464 18.615 21.25 17 21.25H7C5.38503 21.25 3.92465 20.8464 2.86466 19.8621C1.79462 18.8685 1.25 17.393 1.25 15.5V8.5C1.25 6.60705 1.79462 5.13152 2.86466 4.1379Z" fill="#000000"/>
							<path id="vector (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M19.3633 7.31026C19.6166 7.63802 19.5562 8.10904 19.2285 8.3623L13.6814 12.6486C12.691 13.4138 11.3089 13.4138 10.3185 12.6486L4.77144 8.3623C4.44367 8.10904 4.38328 7.63802 4.63655 7.31026C4.88982 6.98249 5.36083 6.9221 5.6886 7.17537L11.2356 11.4616C11.6858 11.8095 12.3141 11.8095 12.7642 11.4616L18.3113 7.17537C18.6391 6.9221 19.1101 6.98249 19.3633 7.31026Z" fill="#000000"/>
							</g>
							</g>
						</svg>
						: {{ $settings->email }}
						</li>
						<li>
							<?xml version="1.0" encoding="utf-8"?>
							<svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							: {{ $settings->address }}
						</li>
					</ul>					
				</div>
			</div>
		</div>
	</div>
	<div class="footer-btm">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-12">
					<p>© Copyright 2025 <a href="{{ route('front.home') }}">{{ $settings->name }}</a>. All Rights Reserved</p>
				</div>
				<div class="col-md-3 col-12">
					<ul class="socialAccounts">
						<li>Social accounts: </li>
						<li>
							<a href="{{ $settings->facebook }}" target="_blank" class="icon">
								<?xml version="1.0" encoding="utf-8"?>
								<svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
									viewBox="-143 145 512 512" xml:space="preserve">
								<g>
									<path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
										c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
										c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
										c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
										c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"/>
									<path d="M146.8,313.7c10.3,0,21.3,3.2,21.3,3.2l6.6-39.2c0,0-14-4.8-47.4-4.8c-20.5,0-32.4,7.8-41.1,19.3
										c-8.2,10.9-8.5,28.4-8.5,39.7v25.7H51.2v38.3h26.5v133h49.6v-133h39.3l2.9-38.3h-42.2v-29.9C127.3,317.4,136.5,313.7,146.8,313.7z"
										/>
								</g>
								</svg>
							</a>
						</li>
						<li>
							<a href="{{ $settings->instagram }}" target="_blank" class="icon">
								<?xml version="1.0" encoding="utf-8"?>
								<svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
									viewBox="-143 145 512 512" xml:space="preserve">
								<g>
									<path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
										c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
										c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
										c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
										c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"/>
									<path d="M191.6,273h-157c-27.3,0-49.5,22.2-49.5,49.5v52.3v104.8c0,27.3,22.2,49.5,49.5,49.5h157c27.3,0,49.5-22.2,49.5-49.5V374.7
										v-52.3C241,295.2,218.8,273,191.6,273z M205.8,302.5h5.7v5.6v37.8l-43.3,0.1l-0.1-43.4L205.8,302.5z M76.5,374.7
										c8.2-11.3,21.5-18.8,36.5-18.8s28.3,7.4,36.5,18.8c5.4,7.4,8.5,16.5,8.5,26.3c0,24.8-20.2,45.1-45.1,45.1C88,446.1,68,425.8,68,401
										C68,391.2,71.2,382.1,76.5,374.7z M216.1,479.5c0,13.5-11,24.5-24.5,24.5h-157c-13.5,0-24.5-11-24.5-24.5V374.7h38.2
										c-3.3,8.1-5.2,17-5.2,26.3c0,38.6,31.4,70,70,70c38.6,0,70-31.4,70-70c0-9.3-1.9-18.2-5.2-26.3h38.2V479.5z"/>
								</g>
								</svg>
							</a>
						</li>
						<li>
							<a href="{{ $settings->twitter }}" target="_blank" class="icon">
								<?xml version="1.0" encoding="utf-8"?>
								<svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
									viewBox="-143 145 512 512" xml:space="preserve">
								<g>
									<path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
										c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
										c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
										c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
										c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"/>
									<path d="M234.3,313.1c-10.2,6-21.4,10.4-33.4,12.8c-9.6-10.2-23.3-16.6-38.4-16.6c-29,0-52.6,23.6-52.6,52.6c0,4.1,0.4,8.1,1.4,12
										c-43.7-2.2-82.5-23.1-108.4-55c-4.5,7.8-7.1,16.8-7.1,26.5c0,18.2,9.3,34.3,23.4,43.8c-8.6-0.3-16.7-2.7-23.8-6.6v0.6
										c0,25.5,18.1,46.8,42.2,51.6c-4.4,1.2-9.1,1.9-13.9,1.9c-3.4,0-6.7-0.3-9.9-0.9c6.7,20.9,26.1,36.1,49.1,36.5
										c-18,14.1-40.7,22.5-65.3,22.5c-4.2,0-8.4-0.2-12.6-0.7c23.3,14.9,50.9,23.6,80.6,23.6c96.8,0,149.7-80.2,149.7-149.7
										c0-2.3,0-4.6-0.1-6.8c10.3-7.5,19.2-16.7,26.2-27.3c-9.4,4.2-19.6,7-30.2,8.3C222.1,335.7,230.4,325.4,234.3,313.1z"/>
								</g>
								</svg>
							</a>
						</li>
						<li>
							<a href="{{ $settings->pinterest }}" target="_blank" class="icon">
								<?xml version="1.0" encoding="utf-8"?>
								<svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
									viewBox="-143 145 512 512" xml:space="preserve">
								<g>
									<path d="M113,145c-141.4,0-256,114.6-256,256s114.6,256,256,256s256-114.6,256-256S254.4,145,113,145z M272.8,560.7
										c-20.8,20.8-44.9,37.1-71.8,48.4c-27.8,11.8-57.4,17.7-88,17.7c-30.5,0-60.1-6-88-17.7c-26.9-11.4-51.1-27.7-71.8-48.4
										c-20.8-20.8-37.1-44.9-48.4-71.8C-107,461.1-113,431.5-113,401s6-60.1,17.7-88c11.4-26.9,27.7-51.1,48.4-71.8
										c20.9-20.8,45-37.1,71.9-48.5C52.9,181,82.5,175,113,175s60.1,6,88,17.7c26.9,11.4,51.1,27.7,71.8,48.4
										c20.8,20.8,37.1,44.9,48.4,71.8c11.8,27.8,17.7,57.4,17.7,88c0,30.5-6,60.1-17.7,88C309.8,515.8,293.5,540,272.8,560.7z"/>
									<path d="M113,272.3c-70.7,0-128,57.3-128,128c0,52.4,31.5,97.4,76.6,117.2c-0.4-8.9-0.1-19.7,2.2-29.4
										c2.5-10.4,16.5-69.7,16.5-69.7s-4.1-8.2-4.1-20.2c0-19,11-33.1,24.7-33.1c11.6,0,17.3,8.7,17.3,19.2c0,11.7-7.5,29.2-11.3,45.4
										c-3.2,13.6,6.8,24.6,20.2,24.6c24.3,0,40.6-31.1,40.6-68c0-28-18.9-49-53.3-49c-38.8,0-63,28.9-63,61.3c0,11.2,3.3,19,8.4,25.1
										c2.4,2.8,2.7,3.9,1.8,7.1c-0.6,2.3-2,8-2.6,10.3c-0.9,3.2-3.5,4.4-6.4,3.2c-17.9-7.3-26.2-26.9-26.2-48.9c0-36.4,30.7-80,91.5-80
										c48.9,0,81,35.4,81,73.3c0,50.2-27.9,87.7-69.1,87.7c-13.8,0-26.8-7.5-31.3-15.9c0,0-7.4,29.5-9,35.2c-2.7,9.9-8,19.7-12.9,27.4
										c11.5,3.4,23.7,5.3,36.3,5.3c70.7,0,128-57.3,128-128C241,329.6,183.7,272.3,113,272.3z"/>
								</g>
								</svg>
							</a>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>

	<div class="back-to-top" style="display: block;">
		<?xml version="1.0" encoding="utf-8"?>
		<svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M15 11L12 8M12 8L9 11M12 8V16M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</div>

	<a href="https://wa.me/whatsappphonenumber" target="_blank" class="whatsappBtn">
		<svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2032_888)">
				<path d="M27.36 4.59867C24.32 1.66 20.32 0 16.06 0C3.83333 0 -3.844 13.2467 2.26133 23.784L0 32L8.44667 29.7973C12.1267 31.7853 15.1413 31.6093 16.068 31.7267C30.2453 31.7267 37.3027 14.5747 27.34 4.65067L27.36 4.59867Z" fill="white"></path> <path d="M16.0892 29.0016L16.0812 29.0003H16.0598C11.8172 29.0003 9.10651 26.991 8.83984 26.875L3.83984 28.175L5.17984 23.315L4.86118 22.815C3.54118 20.7136 2.83984 18.2936 2.83984 15.8016C2.83984 4.07762 17.1665 -1.78505 25.4572 6.50162C33.7278 14.7016 27.9212 29.0016 16.0892 29.0016Z" fill="#49C759"></path> <path d="M23.3429 19.0759L23.3309 19.1759C22.9295 18.9759 20.9749 18.0199 20.6109 17.8879C19.7935 17.5852 20.0242 17.8399 18.4549 19.6372C18.2215 19.8972 17.9895 19.9172 17.5935 19.7372C17.1935 19.5372 15.9095 19.1172 14.3895 17.7572C13.2055 16.6972 12.4109 15.3972 12.1762 14.9972C11.7855 14.3226 12.6029 14.2266 13.3469 12.8186C13.4802 12.5386 13.4122 12.3186 13.3135 12.1199C13.2135 11.9199 12.4175 9.9599 12.0842 9.17857C11.7642 8.3999 11.4349 8.49857 11.1882 8.49857C10.4202 8.4319 9.85885 8.44257 9.36418 8.95723C7.21218 11.3226 7.75485 13.7626 9.59618 16.3572C13.2149 21.0932 15.1429 21.9652 18.6682 23.1759C19.6202 23.4786 20.4882 23.4359 21.1749 23.3372C21.9402 23.2159 23.5309 22.3759 23.8629 21.4359C24.2029 20.4959 24.2029 19.7159 24.1029 19.5359C24.0042 19.3559 23.7429 19.2559 23.3429 19.0759V19.0759Z" fill="white">
				</path> 
			</g> 
			<defs> 
				<clipPath id="clip0_2032_888"> 
					<rect width="32" height="32" fill="white">
					</rect>
				</clipPath>
			</defs> 
		</svg> 
	</a>
</footer>

<!-- Wishlist Modal -->
<div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Success</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	function addToCart(id){
		let size = $("select[name='size']").val();
    	let color = $("select[name='color']").val();

        $.ajax({
            url: '{{ route("front.addToCart") }}',
            type: 'post',
            data: {
				_token: '{{ csrf_token() }}', // Include CSRF token
				id: id,
				size: size,
				color: color
			},
            dataType: 'json',
            success: function(response){
                if(response.status == true){
                    window.location.href= "{{ route('front.cart') }}";
                } else {
                    alert(response.message);
                }
            }
        })
    }

    function addToWishlist(id){
        $.ajax({
            url: '{{ route("front.addToWishlist",) }}',
            type: 'post',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(response.status == true){
                    $("#wishlistModal .modal-body").html(response.message);
                    $("#wishlistModal").modal('show');
                } else {
                    window.location.href= "{{ route('account.login') }}";
                    //alert(response.message);
                }
            }
        })
    }
</script>

@yield('customJs')

</body>
</html>