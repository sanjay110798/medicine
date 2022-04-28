@extends('layouts.front.app')
@section('content')
<div class="container">
<div class="row justify-content-center" style="border-top: 1px solid #3cd9ee;">
	<div class="col-md-12">
		<div class="login_modal" id="otpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header top_sec">
						<h5 class="text-center login_title">Register</h5>
					  </div>
					  
					  <div class="modal-body">
							<p class="login-des text-center">Signup to access your orders, special offers and many more ! </p>
							<form class="form-inline my-2 my-lg-0 mobile_number" method="post" action="{{route('user.insert')}}">
								@csrf
							  <input class="form-control" type="text"  placeholder="Enter Name" name="name" required>
							  <input class="form-control" type="email" value="{{$email}}" placeholder="Enter Email" name="email" required>
							  <input class="form-control" type="text"  placeholder="Enter Mobile" name="mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
							 
							  <button class="btn btn-success search_button my-2 my-sm-0" type="submit">Sign up</button>
							</form>
					  </div>
						
					</div>
				  </div>
				</div>
	</div>
</div>
</div>

@endsection