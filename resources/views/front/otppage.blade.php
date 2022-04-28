@extends('layouts.front.app')
@section('content')
<div class="container">
<div class="row justify-content-center" style="border-top: 1px solid #3cd9ee;">
	<div class="col-md-12">
		<div class="login_modal" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header top_sec">
						<h5 class="text-center login_title">Login Otp</h5>
						
					  </div>
					  
					  <div class="modal-body">
							<p class="login-des text-center">Login or Signup to access your orders, special offers and many more ! </p>
							<form class="form-inline my-2 my-lg-0 mobile_number">
							  <input class="form-control" type="hidden" id="mobileval" value="{{$email}}">
							  <input class="form-control" type="text" id="otp" placeholder="Enter Otp" aria-label="Search">
							  
							  <button class="btn btn-success search_button my-2 my-sm-0" type="button" id="checkotp">Continue</button>
							</form>
					  </div>
						
					</div>
				  </div>
				</div>
	</div>
</div>
</div>

@endsection