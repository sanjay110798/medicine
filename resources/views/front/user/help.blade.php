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
					
					
					<div class="tab-pane fade show active" id="list-tab8" role="tabpanel" aria-labelledby="list-tab8-list">
						<div class="tab_content py-2">
							<h3 class="management_title mb-0">Help</h3>
							<div class="bg-white">
								<div class="accordion" id="accordionExample">
									<div class="card">
										<div class="card-header" id="headingOne">
											<button class="accordion_btn btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											  Offers
											</button>
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body">
												<h4 class="question font-weight-bold">How do I apply a coupon code on my order?</h4>
												<p>You can apply the relevant code when you are at the cart or order summary section by clicking on " Apply Coupon" option.</p>
												<h4 class="question font-weight-bold">How do I check the ongoing offers &amp; discount?</h4>
												<p>The discount is always mentioned in the product pricing details. The offers can be viewed at the home screen by clicking on the "Offers" button.</p>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTwo">
											<button class="accordion_btn btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											  Wallet
											</button>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
										  <div class="card-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
										  </div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
										  <h2 class="mb-0">
											<button class="accordion_btn btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											  Collapsible Group Item #3
											</button>
										  </h2>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
										  <div class="card-body">
											Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
										  </div>
										</div>
									</div>
								</div>
								
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