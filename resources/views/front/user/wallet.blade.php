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


<div class="tab-pane fade show active" id="list-tab6" role="tabpanel" aria-labelledby="list-tab6-list">
<div class="tab_content text-center py-5" style="position: relative;">
<div class="wallet-container text-center">
	<p class="page-title"><i class="fa fa-align-left"></i>My E-wallet<i class="fa fa-user"></i></p>
	@php
	$getCreditBalance=App\Model\Wallet::where(['user_id'=>Auth::id(),'payment_type'=>'credit','status'=>'1'])->get();
	$getDebitBalance=App\Model\Wallet::where(['user_id'=>Auth::id(),'payment_type'=>'debit','status'=>'1'])->get();

	$cr=$getCreditBalance->sum('amount');
	$dr=$getDebitBalance->sum('amount');
	@endphp
	<div class="amount-box text-center">
		<img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet">
		<p>Total Balance</p>
		<p class="amount">₹{{number_format($cr - $dr,2)}}</p>
	</div>

	<div class="btn-group text-center">
		<button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#addMoneyModal">Add Money</button>
		<button type="button" class="btn btn-outline-light">Widthdraw</button>

	</div>

	<div class="txn-history">
		<p class="h"><b>History</b></p>
		@if(count($wallet) > 0)
		@foreach($wallet as $item)
		<p class="txn-list"><?php if($item->payment_type=='debit'){?>Amount Debited<span class="debit-amount">- ₹{{$item->amount}}</span><?php }else{ ?>Amount Credited<span class="credit-amount">+ ₹{{$item->amount}}</span><?php } ?></p>
		@endforeach
		@else
		<p class="txn-list">No Payment History Found!</p>
		@endif

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
<style type="text/css">
.wallet-container {
background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjOvSperRYjHH9-EHlKZJBfwvXy4rJpyerzHQsnp8DuuycYU5_);
width: 100%;
color: #fff;
font-size: 15px;
padding: 20px 20px 0;
top: 230%;
left: 50%;
transform: translate(-50%,-50%);
position: absolute;


}

.page-title {
text-align: left;
color: #fff;
}

.fa-user {
float: right;
}

.fa-align-left {
margin-right: 15px;
}

.amount-box img {
width: 50px;
}

.amount {
font-size: 35px;
}

.amount-box p {
margin-top: 15px;
margin-bottom: -10px;
color: #fff;
}

.btn-group {
margin: 20px 0;
}

.btn-group .btn {
margin: 8px;
border-radius: 20px !important;
font-size: 12px;
}

.txn-history {
text-align: left;

}
.h{

color: #fff;
}
.txn-list {
background-color: #fff;
padding: 12px 10px; 
color: #777;
font-size: 14px;
margin: 7px 0;
}

.debit-amount {
color: red;
float: right;
}

.credit-amount {
color: green;
float: right;

}

@media screen and (max-width: 800px){
.wallet-container {
height: 115%;
bottom: 20px;
margin-top: 100px;
}

}
</style>
@endsection