@php
$getSite=$Appservice->getSiteDetails();
@endphp
<div class="header_sec">
	<div class="top_header text-center">
		<div class="container d-flex justify-content-between align-items-center py-3">
		
			<div class="phone_no">
				<span>Phone:</span> <a href="tel:(+91)1234-5678">(+91)8918043592</a> 
			</div>
			<ul class="social social mb-0">
				<li class="list-inline-item">
					<a href="https://www.facebook.com/EcoderTechnology"><i class="fab fa-facebook-f"></i></a>
				</li>
				<li class="list-inline-item">
					<a href="https://twitter.com/EcoderTechnolo1"><i class="fab fa-twitter"></i></a>
				</li>
				<li class="list-inline-item">
					<a href="#"><i class="fab fa-instagram"></i></a>
				</li>
				<li class="list-inline-item">
					<a href="https://www.linkedin.com/company/ecoder-technologys"><i class="fab fa-linkedin"></i></a>
				</li>
				
			</ul>
		
		</div>
	</div>
	<!-- Search Header -->
	<div class="search_header py-2">

		<div class="container d-flex justify-content-start align-items-center">
			<a class="navbar-brand logo float-left mt-0 p-0" href="{{url('/')}}">
				<img src="{{asset('upload/'.$getSite->site_logo)}}" alt="Logo" height="61">
			</a>
			
			<div class="delivery_location">
				<button class="navbar-toggler btn dropdown-toggle location_toggle mr-5" type="button"data-toggle="modal" data-target="#checkPincode" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				<div class="dropdown pr-3">
					@php
					$getPincode=App\Model\PincodeStore::where(['ip_add'=>request()->ip()])->first();
					@endphp
					<img src="{{asset('assets/images/pin_icon.svg')}}" alt="Pin Icon"> <p>@if($getPincode)
						Delivery<span>To</span> {{$getPincode->pincode}}
					@else
					Set Delivery<span>Location</span>
					@endif
				    </p>
				</div>
				</button>
				
				<div class="modal fade login_modal bd-example-modal-sm" id="checkPincode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header top_sec">
						<h5 class="text-center login_title">Check Pincode</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  
					  <div class="modal-body">
							
							<form class="form-inline my-2 my-lg-0 mobile_number">
							  <input class="form-control" type="text" id="pincode_1" placeholder="Enter Pincode" aria-label="Search">
							  <span id="msg_1"></span>
							  <button class="btn btn-success search_button my-2 my-sm-0 checkpincode" type="button" data-id="1" style="padding: 3px;width: 37%;">Check</button>
							</form>
					  </div>
						
					</div>
				  </div>
				</div>

			</div>
			<form method="get" action="" class="form-inline my-2 my-lg-0 search_box position-relative">
				  <input class="form-control src" type="search" placeholder="Search" aria-label="Search" id="search">
				  <i class="far fa-search"></i>
				  <!-- <button class="btn btn-success search_button my-2 my-sm-0" type="submit">Go</button> -->
				  <ul id="myUL"></ul>
			</form>

			<div class="right_sec d-flex ml-5">
				@guest
				<a class="user" href="#" data-toggle="modal" data-target="#exampleModal">
					<img src="{{asset('assets/images/user_icon.png')}}" alt="Pin Icon"> 
					<p>Login</p>
				
				</a>
				@else
                <a class="user" href="{{route('user.profile')}}">
					<img src="{{asset('assets/images/user_icon.png')}}" alt="Pin Icon"> 
					<p> {{ Auth::user()->name }}</p>
				
				</a>
				@endguest
				<!-- Button trigger modal -->
				
				<!-- Modal -->
				<div class="modal fade login_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header top_sec">
						<h5 class="text-center login_title">Login / Signup</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  
					  <div class="modal-body">
							<p class="login-des text-center">Login or Signup to access your orders, special offers and many more ! </p>
							<form class="form-inline my-2 my-lg-0 mobile_number">
							  <input class="form-control" type="email" id="mobile" placeholder="Email Address" aria-label="Search">
								
							  <button class="btn btn-success search_button my-2 my-sm-0" type="button" id="sendotp">Continue</button>
							</form>
					  </div>
						<p class="login-teet text-center">By clicking continue, you agree to our <a href="http://medistore.ecodertechnology.com/terms"><u>Terms &amp; Conditions</u></a> and <a href="http://medistore.ecodertechnology.com/privacy"><u>Privacy Policy</u></a></p>
					</div>
				  </div>
				</div>

				<!--  -->
				
				<a class="discount ml-4" href="#" data-toggle="modal" data-target="#">
					<img src="{{asset('assets/images/special_offer.png')}}" alt="Pin Icon"> 
				</a>
				<div class="modal fade login_modal" id="specialOffer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header top_sec">
						<h5 class="text-center login_title">Special Offer</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  
					  <div class="modal-body">
							<p class="login-des text-center">Login or Signup to access your orders, special offers and many more ! </p>
							<form class="form-inline my-2 my-lg-0 mobile_number">
							  <input class="form-control" type="text" placeholder="Mobile Number" aria-label="Search">

							  <button class="btn btn-success search_button my-2 my-sm-0" type="button">Continue</button>
							</form>
					  </div>
						<p class="login-teet text-center">By clicking continue, you agree to our <a href="http://medistore.ecodertechnology.com/terms"><u>Terms &amp; Conditions</u></a> and <a href="http://medistore.ecodertechnology.com/privacy"><u>Privacy Policy</u></a></p>
					</div>
				  </div>
				</div>
				<a class="shopping_cart ml-4" href="{{route('cart')}}">
					<i class="fas fa-shopping-bag"></i>
					<?php if($Appservice->totalcart()!=0){?>
					<span class="count">{{$Appservice->totalcart()}}</span>
					<?php } ?>
				</a>
				
			</div>
		
		</div>
	</div>
	<!-- Search Header -->
	
	
</div>