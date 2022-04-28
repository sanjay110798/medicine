@extends('layouts.front.app')
@section('content')


<div class="container">
	<div class="online_service py-3 my-5" style="background: #fcfdfd;">
		<div class="row">
			
			@php
			$img=App\Model\ProductImage::where(['product_id'=>$product->id])->get();
			@endphp
			<div class="col-md-4">
				
				<div class="service_content text-center mb-4" style="width: 100%;padding: 12px 15px 12px 15px;">
					<a href="{{route('product.details',['slug'=>$product->slug])}}">
					<img src="{{asset('upload/product/'.$img[0]->product_img)}}" style="    width: 100%;height: 400px;">
					
					</a>
						<div class="row mt-2">
					<div class="col-md-12">
             		<div class="price text-center mb-2 mt-2" style="color: #817a7a;">
						<b>₹{{$product->mrp}}</b>
					</div>
             	</div>
             	<div class="col-md-12">
             		<div class="product-button">
						
						<a href="{{route('add.to.cart',['product_id'=>$product->id])}}" class="btn btn-sm btn-primary">Add To Cart</a>
						@if(Auth::user())
						<a href="{{route('buy.product',['product_id'=>$product->id])}}" class="btn btn-sm btn-warning">Buy</a>
						@endif
						
					</div>
             	</div>
				</div>
				</div>
			
			    
			</div>
			<div class="col-md-8">
             <div class="row">
             	<div class="col-md-12">
             		<h6 class="">{{$product->product_name}}</h6><br>
             		<p class="pl-1 mb-0">Manufacturer : {{$product->manufacturer}}</p>
             		<p class="pl-1 mb-0">{!!$product->description!!}</p>
             	</div>
             	
             </div>
			</div>
			
		</div>
		
	</div>
</div>
@endsection