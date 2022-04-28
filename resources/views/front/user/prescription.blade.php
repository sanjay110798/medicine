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
					
					
					<div class="tab-pane fade show active" id="list-tab5" role="tabpanel" aria-labelledby="list-tab5-list">
						<div class="tab_content text-center py-5">
							<h4>ISO 45001:2018</h4>
							<div class="certificate_photo ml-auto mr-auto my-4">
								<img src="{{asset('assets/images/certificate_five.jpg')}}" alt="Certificate One">
							</div>
							<h5 class="price">Rs. 4,000/- within 3 days.</h5>
							<p class="des w-75 m-auto pt-2">ISO 45001:2018 standard for the occupational health and safety management system series which is applicable to companies of all sizes and type. This standard is comprised of two parts including 18001 and 18002.</p>
						</div>
					</div>
			
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection