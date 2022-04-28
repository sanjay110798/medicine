@extends('layouts.front.app')
@section('content')
<div class="min_content ">

	<div class="container">
		
		<div class="tab_contenmt" data-aos="fade-left">
			<div class="row">
			  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
				@include('layouts.front.user.sidebar')
			  </div>
			  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 tab_wrapper">
				<div class="tab-content" id="nav-tabContent">
					
					
					<div class="tab-pane fade show active" id="list-tab3" role="tabpanel" aria-labelledby="list-tab3-list">
						<div class="tab_content py-2">
							<h3 class="management_title mb-0">Benefits Of Subscription</h3>
							<div class="bg-white pb-4">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="subscription_content d-flex align-items-center my-3">
											<div class="icon p-3">
												<img src="{{asset('assets/images/shopping_cart.png')}}" alt="Shopping Cart">
											</div>
											<div class="text_content float-left p-2">
												<h5>Auto Order</h5>
												<p>We create order medicine for you before your gets over.</p>
											   
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="subscription_content d-flex align-items-center my-3">
											<div class="icon p-3">
												<img src="{{asset('assets/images/shopping_cart.png')}}" alt="Shopping Cart">
											</div>
											<div class="text_content float-left p-2">
												<h5>Auto Order</h5>
												<p>We create order medicine for you before your gets over.</p>
											   
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="subscription_content d-flex align-items-center my-3">
											<div class="icon p-3">
												<img src="{{asset('assets/images/shopping_cart.png')}}" alt="Shopping Cart">
											</div>
											<div class="text_content float-left p-2">
												<h5>Auto Order</h5>
												<p>We create order medicine for you before your gets over.</p>
											   
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="subscription_content d-flex align-items-center my-3">
											<div class="icon p-3">
												<img src="{{asset('assets/images/shopping_cart.png')}}" alt="Shopping Cart">
											</div>
											<div class="text_content float-left p-2">
												<h5>Auto Order</h5>
												<p>We create order medicine for you before your gets over.</p>
											   
											</div>
										</div>
									</div>
								</div>
								<button type="update information" class="btn btn-primary update_btn">Subscription</button>
							</div>
						</div>
					</div>
			
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection