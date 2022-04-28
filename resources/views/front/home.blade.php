@extends('layouts.front.app')
@section('content')
@php
$getSite=$Appservice->getSiteDetails();
@endphp
<!-- Banner -->
<div class="banner">
	
	<div class="banner_slider">
		@foreach($slider as $val)
		<div>
			<div class="banner_sec banner_one" style="background: url('{{asset("upload/slider/".$val->image)}}')">
				<div class="container">
					<div class="text_content">
						<h3 class="banner_title">{!!$val->title!!}</h3>
						<h5 class="contact">Please contact us</h5>
						<a class="call_now" href="#"> 
							<div class="call_icon">
								<img src="{{asset('assets/images/banner_phone_icon.png')}}" alt="Banner Phone Icon">
							</div>
							Call Now
						</a>
					</div>
				</div>
			</div> 
		</div> 
		@endforeach
	
	
	</div>
</div>
<!-- Banner -->


<div class="container">
	<div class="online_service py-3 my-5">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 col-sm-4">
				<div class="service_content text-center">
					<h5 class="text-white mb-2">Order Now</h5>
					<a href="javascript:void(0);" class="btn btn-primary service_btn">Order Medicines</a>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 col-sm-4">
				<div class="service_content text-center">
					<h5 class="text-white mb-2">Quick Prescription</h5>
					<a href="javascript:void(0);" class="btn btn-primary service_btn">Upload Prescription</a>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-xs-12 col-sm-4">
				<div class="service_content text-center">
					<h5 class="text-white mb-2">Regular Basis</h5>
					<a href="javascript:void(0);" class="btn btn-primary service_btn">Subscriptions</a>
				</div>
			</div>
		</div>
		
	</div>
</div>




<div class="benefits_service">
	<div class="container">
		<div class="row">
			@foreach($benefit as $bene)
			<div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 col-sm-12">
				<div class="benefits_service_content text-center">
					<div class="icon">
						<img src="{{asset('upload/benefit/'.$bene->image)}}">
					</div>
					<div class="service_text_content">
						<a href="#">{{$bene->title}}</a>
						<p>{{$bene->description}}</p>
					</div>
				</div>
			</div>
			@endforeach
		
		</div>
		
	</div>
</div>

<!-- Category Product -->
<div class="app_download">
		<img src="{{asset('assets/images/triangle2.png')}}" alt="" class="triangle_shape1">
		<img src="{{asset('assets/images/triangle1.png')}}" alt="" class="triangle_shape2">
		<img src="{{asset('assets/images/triangle7.png')}}" alt="" class="triangle_shape3">
	<div class="wave_animation">
		<span class="d_block wave wave1"></span>
		<span class="d_block wave wave2"></span>
		<span class="d_block wave wave3"></span>
	</div>
	<div class="container d-flex">
		<div class="app_content d-flex flex-column">
			<h5 class="download text-white">Download our app</h5>
			<h3 class="app_title text-white w-75">Download the app from Google Play store & itunes</h2>
		
		
			<ul class="btn_group d-flex align-items-center">
				<li class="google mr-4">
					<a class="download_btn btn btn-secondary d-flex align-items-center bg-white border-0" href="{{$getSite->google_play_url}}">
						 <i class="fab fa-android"></i>
						 <div class="text text-left"> 
							Google Play <span class="d-block">Now Available on</span>
						</div>
					</a>
				</li>
				<li class="apple">
					<a class="download_btn btn btn-secondary d-flex align-items-center border-0" href="{{$getSite->app_url}}" >
						 <i class="fab fa-apple"></i>
						 <div class="text text-left"> 
							App Store <span class="d-block">Now Available on</span>
						</div>
					</a>
				</li>
			</ul>
		</div>
		
		<div class="mobile_area">
			<img src="{{asset('assets/images/mobile.png')}}" alt="mobile img" class="img-fluid">
		</div>
			
			
		
	</div>
</div>
<!-- Offer Sec -->





<div class="areas_serve">
	<div class="container">
		<h3 class="areas_serve_title text-center font-weight-bold">Areas We Serve</h3>
			<div class="col-lg-12 col-md-12 m-auto">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-3">
						<div class="circle-container">
							<div class="text_content">
								<h3 class="count text-white">29</h3>
								<p class="mt-1 mb-0 text-white">States</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-3">
						<div class="circle-container">
							<div class="text_content">
								<h3 class="count text-white">7</h3>
								<p class="mt-1 mb-0 text-white">Union Territories</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-3">
						<div class="circle-container">
							<div class="text_content">
								<h3 class="count text-white">4000+</h3>
								<p class="mt-1 mb-0 text-white">Cities</p>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12 mb-3">
						<div class="circle-container">
							<div class="text_content">
								<h3 class="count text-white">25000+</h3>
								<p class="mt-1 mb-0 text-white">Pincodes</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="your_location d-flex align-items-center text-center bg-white w-50 m-auto p-3">
				<div class="position-relative d-flex flex-column flex-grow-1">
					<h4 class="location_title">
						Check if we serve in your location
					</h4>
					<form class="form-inline">
					  <div class="form-group">
						<input class="form-control-plaintext " type="text" placeholder="Enter Pincode" name="pincode" id="pincode_2" maxlength="6" minlength="6" value="">
						
					  </div>
					 
						<button type="button" data-id="2" class="check_btn checkpincode">CHECK NOW</button>
						
					</form>
					<span id="msg_2"></span>
					
				</div>
			</div>
		</div>
	</div>
</div>




@endsection