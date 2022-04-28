@extends('layouts.front.app')
@section('content')
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
	<div class="online_service py-3 my-5" style="background: #fcfdfd;">
		<div class="row">
			@foreach($product as $pro)
			@php
			$img=App\Model\ProductImage::where(['product_id'=>$pro->id])->get();
			@endphp
			<div class="col-xl-3 col-lg-3 col-md-3 col-xs-6 col-sm-3">
				
				<div class="service_content text-center mb-4" style="height: 100%;width: 100%;padding: 12px 15px 12px 15px;">
					<a href="{{route('product.details',['slug'=>$pro->slug])}}">
					<img src="{{asset('upload/product/'.$img[0]->product_img)}}" style="    width: 57%;height: 70%;">
					<div class="price text-center mb-2 mt-2" style="color: #817a7a;">
						<b>₹{{$pro->mrp}}</b>
					</div>
					</a>
					<div class="product-button">
						<a href="{{route('add.to.cart',['product_id'=>$pro->id])}}" class="btn btn-sm btn-primary">Add To Cart</a>
						@if(Auth::user())
						<a href="{{route('buy.product',['product_id'=>$pro->id])}}" class="btn btn-sm btn-warning">Buy</a>
						@endif
					</div>
				</div>
			    
			</div>
			@endforeach
		</div>
		
	</div>
</div>
@endsection