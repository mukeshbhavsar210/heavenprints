<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

@php
    $settings = \App\Models\Setting::first();
@endphp

<title>{{ $settings->business_line }}</title>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
<meta content="" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content="{{ csrf_token() }}">	

</head>
    <body data-sidebar-size="collapsed">

		<div class="container-xxl">
			<div class="row vh-100 d-flex justify-content-center">
				<div class="col-12 align-self-center">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4 mx-auto">
								<div class="card">
									<div class="card-body p-0 bg-black auth-header-box rounded-top">
										<div class="text-center p-3">
											<a href="index.html" class="logo logo-admin">
												<img src="{{ asset('admin-assets/img/Heaven_Prints.jpg') }}" height="50" alt="logo" class="auth-logo">
											</a>
											<p class="text-muted fw-medium mb-0 mt-2">Sign in to continue to Admin.</p>  
										</div>
									</div>
									<div class="card-body pt-0"> 
										@include('admin.message')

										<form class="mt-3"  action="{{ route('admin.authenticate') }}" method="post">
											@csrf
												<div class="form-group mb-2">
													<label class="form-label" for="username">Username</label>
													<input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
													@error('email')
														<p class="invalid-feedback">{{ $message }}</p>
													@enderror
											  	</div>

												<div class="form-group mb-2">
												<label class="form-label" for="userpassword">Password</label>
												<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
												@error('password')
													<p  class="invalid-feedback">{{ $message }}</p>
												@enderror
											  </div>

											  <div class="form-group row mt-3">
												<div class="col-sm-6">
													<div class="form-check form-switch form-switch-success">
														<input class="form-check-input" type="checkbox" id="customSwitchSuccess">
														<label class="form-check-label" for="customSwitchSuccess">Remember me</label>
													</div>
												</div><!--end col--> 
												<div class="col-sm-6 text-end">
													<a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
												</div><!--end col--> 
											</div><!--end form-group--> 

											<div class="form-group row">
												<div class="col-12">
													<div class="d-grid mt-3">
														<button type="submit" class="btn btn-primary btn-block">Login</button>
													</div>
												</div>
											</div>
										</form>
									</div><!--end card-body-->
								</div><!--end card-->
							</div><!--end col-->
						</div><!--end row-->
					</div><!--end card-body-->
				</div><!--end col-->
			</div><!--end row-->                                        
		</div>
		
		<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
		<script src="{{ asset('admin-assets/js/demo.js') }}"></script>
	</body>
</html>
