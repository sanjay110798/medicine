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
					
					
					<div class="tab-pane fade show active" id="list-tab7" role="tabpanel" aria-labelledby="list-tab7-list">
						<div class="tab_content text-center py-5">
							<h4>ISO 22000:2018</h4>
							<div class="certificate_photo ml-auto mr-auto my-4">
								<img src="{{asset('assets/images/certificate_seven.jpg')}}" alt="Certificate One">
							</div>
							<h5 class="price">Rs. 6,000/- within 3 days.</h5>
							<p class="des w-75 m-auto pt-2">The most noticeable change to the standard is its new structure (i.e. 10 Clauses ). ISO 9001:2015 now follows the same overall structure as other ISO management system standards (known as the High-Level Structure) & another major difference is the focus on risk-based thinking.</p>
						</div>
					</div>
			
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection