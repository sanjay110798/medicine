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

						<div class="tab-pane fade show active" id="list-tab2" role="tabpanel" aria-labelledby="list-tab2-list">
							<div class="tab_content py-5">
								<h6>Order List</h6>
								<hr>
								@if(count($order)>0)
								@foreach($order as $ord)
								@php
								$items = App\Model\OrderProduct::where(['order_id'=>$ord->id])->get();
								@endphp
								<div class="row mb-3" style="border-bottom: 1px solid #747070;">
									<div class="col-md-12 mb-3">
										<p style="font-size: 14px;line-height: 5px;">#{{$ord->bill_id}}</p>
										<p style="font-size: 14px;line-height: 5px;">Rs.{{$ord->total_price}}</p>
									</div>
									<div class="col-md-12 hh-grayBox pt45 pb20">
										
							            <div class="row justify-content-between">

										<div class="order-tracking <?php if($ord->status=='0' || $ord->status=='1' || $ord->status=='2' || $ord->status=='3'){echo'completed';}?>">
											<span class="is-complete"></span>
											<p>Ordered<br><span>{{$ord->first_comment}}</span></p>
										</div>
										<div class="order-tracking <?php if($ord->status=='1' || $ord->status=='2' || $ord->status=='3'){echo'completed';}?>">
											<span class="is-complete"></span>
											<p>Shipped<br><span>{{$ord->second_comment}}</span></p>
										</div>
										<div class="order-tracking <?php if($ord->status=='2' || $ord->status=='3'){echo'completed';}?>">
											<span class="is-complete"></span>
											<p>Out For Delivered<br><span>{{$ord->third_comment}}</span></p>
										</div>
										<div class="order-tracking <?php if($ord->status=='3'){echo'completed';}?>">
											<span class="is-complete"></span>
											<p>Delivered<br><span>{{$ord->four_comment}}</span></p>
										</div>
										</div>	
									</div>
								</div>
								@endforeach
								@else
								<div class="not-found text-center" style="text-align: center;" >No Order Found!!</div>
								@endif
							</div>
							<div class="card-footer clearfix">
							{{ $order->links() }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.hh-grayBox {
	
	    margin-bottom: 20px;
    padding: 5px;
    margin-top: -8px;
}
.pt45{padding-top:8px;}
	.order-tracking{
	text-align: center;
	width: 24.33%;
	position: relative;
	display: block;
}
.order-tracking .is-complete{
	display: block;
	position: relative;
	border-radius: 50%;
	height: 30px;
	width: 30px;
	border: 0px solid #AFAFAF;
	background-color: #f7be16;
	margin: 0 auto;
	transition: background 0.25s linear;
	-webkit-transition: background 0.25s linear;
	z-index: 2;
}
.order-tracking .is-complete:after {
	display: block;
	position: absolute;
	content: '';
	height: 14px;
	width: 7px;
	top: -2px;
	bottom: 0;
	left: 5px;
	margin: auto 0;
	border: 0px solid #AFAFAF;
	border-width: 0px 2px 2px 0;
	transform: rotate(45deg);
	opacity: 0;
}
.order-tracking.completed .is-complete{
	border-color: #27aa80;
	border-width: 0px;
	background-color: #27aa80;
}
.order-tracking.completed .is-complete:after {
	border-color: #fff;
	border-width: 0px 3px 3px 0;
	width: 7px;
	left: 11px;
	opacity: 1;
}
.order-tracking p {
	color: #A4A4A4;
	font-size: 16px;
	margin-top: 8px;
	margin-bottom: 0;
	line-height: 20px;
}
.order-tracking p span{font-size: 14px;}
.order-tracking.completed p{color: #000;}
.order-tracking::before {
	content: '';
	display: block;
	height: 3px;
	width: calc(100% - 40px);
	background-color: #f7be16;
	top: 13px;
	position: absolute;
	left: calc(-50% + 20px);
	z-index: 0;
}
.order-tracking:first-child:before{display: none;}
.order-tracking.completed:before{background-color: #27aa80;}
</style>
@endsection