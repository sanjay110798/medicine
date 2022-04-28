@extends('layouts.front.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="min_content ">

	<div class="container">
		
		<div class="tab_contenmt" data-aos="fade-left">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 p-0">
					@include('layouts.front.user.sidebar')
				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 tab_wrapper">
					<div class="tab-content" id="nav-tabContent">


						<div class="tab-pane fade show active" id="list-tab4" role="tabpanel" aria-labelledby="list-tab4-list">
							<div class="tab_content text-left py-5">
								<div class="row">
									<div class="col-md-12 text-right"><button class="btn" style="background-image: linear-gradient( to right, rgb(9 201 226) 0%, rgb(148 242 255) 100%);color: #fff;" data-toggle="modal" data-target="#addAddress">Add Address</button></div>
									@if(count($getAdd)>0)
									<div class="col-md-12"><h6>Shipping Address</h6><hr></div>

									@foreach($getAdd as $add)
									<div class="col-md-6">
										<div class="shp">
											<div class="row">
												<div class="col-md-12 text-right">
													<a href="#0" data-toggle="modal" data-target="#editAddress{{$add->id}}"><i class="fa fa-pencil" style="color: red" ></i></a>
													&nbsp;
													<a href="{{route('delete.shipping.address',['id'=>$add->id])}}" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-trash-o" style="color: red" ></i></a>
												</div>
												<!-- //////////////// -->

												<!-- ////////////////////// -->
												<div class="col-md-12">
													<label class="form-group">Name : {{$add->billing_name}}</label>
												</div>

												<div class="col-md-12">
													<label class="form-group">Address : {{$add->billing_address}}</label>
												</div>
												<div class="col-md-12">
													<label class="form-group">Pincode : {{$add->billing_pincode}}</label>
												</div>
												<div class="col-md-12">
													<label class="form-group">Phone : {{$add->billing_phone}}</label>
												</div>
												<div class="col-md-12">
													<label class="form-group">Email : {{$add->billing_email}}</label>
												</div>

											</div>
											<div class="col-md-12">
												<label class="form-group">Billing Address : {{($add->default=='0') ? 'NO' : 'YES'}}</label>
											</div>

										</div>
									</div>

									@endforeach
									@else
									<div class="col-md-12"><h6>No Address Found</h6></div>
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

<div class="modal fade login_modal" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header top_sec">
				<h5 class="text-center login_title">Add Shipping Address</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">

				<form class="form-inline2 my-2 my-lg-0 mobile_number" method="post" action="{{route('save.address')}}">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="container">
								<h5 style="    font-size: 15px;
								font-weight: 700;
								color: #080808;">Shipping</h5>
								<p>Please enter your shipping details.</p>
								<hr />
								<div class="form text-left">

									<label class="field">
										<span class="field__label" for="firstname">Name</span>
										<input class="field__input" type="text" id="firstname" name="name" required />
									</label>
									<label class="field">
										<span class="field__label" for="lastname">Company Name (Optional)</span>
										<input class="field__input" type="text" id="lastname" name="company_name" />
									</label>

									<label class="field">
										<span class="field__label" for="address">Street Address (optional)</span>
										<input class="field__input" type="text" name="address" id="address" />
									</label>
									<label class="field">
										<span class="field__label" for="country">Country</span>
										<select class="form-control" name="country" id="country" required>
											<option value="">Select</option>
											@foreach($country as $cn)
											<option value="{{$cn->id}}">{{$cn->country_name}}</option>
											@endforeach
										</select>
									</label>

									<label class="field">
										<span class="field__label" for="country">State</span>
										<select class="form-control" name="state" id="state" required>

										</select>
									</label>
									<label class="field">
										<span class="field__label" for="country">City</span>
										<select class="form-control" name="city" id="city" required>

										</select>
									</label>

									<div class="fields fields--3">
										<label class="field">
											<span class="field__label" for="zipcode">Zip code</span>
											<select class="form-control" id="pincode" name="pincode" required>
												<option value="">Select</option>
											</select> 
										</label>
										<label class="field">
											<span class="field__label" for="city">Phone</span>
											<input type="tel" name="phone" class="form-control" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required> 
										</label>
										<label class="field">
											<span class="field__label" for="state">Email</span>
											<input type="email" name="email" class="form-control" required> 
										</label>
									</div>
									<label class="field">
										<input type="checkbox" class="form-control" name="billing_address" value="1" style="    width: auto;
										display: inline-block;
										margin: 0px 0 0 0;
										padding: 0 0 0 0;"> <span>Billing Address<span>
										</label>
									</div>

								</div>
							</div>	

						</div>

						<button class="btn btn-success search_button my-2 my-sm-0" type="submit">Save</button>
					</form>
				</div>

			</div>
		</div>
	</div>

	@foreach($getAdd as $ad)
	<div class="modal fade login_modal" id="editAddress{{$ad->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header top_sec">
					<h5 class="text-center login_title">Edit Shipping Address</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<form class="form-inline2 my-2 my-lg-0 mobile_number" method="post" action="{{route('edit.address',['id'=>$ad->id])}}">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="container">
									<h5 style="    font-size: 15px;
									font-weight: 700;
									color: #080808;">Shipping</h5>
									<p>Please enter your shipping details.</p>
									<hr />
									<div class="form text-left">

										<label class="field">
											<span class="field__label" for="firstname">Name</span>
											<input class="field__input" type="text" id="firstname" value="{{$ad->billing_name}}" name="name" required />
										</label>
										<label class="field">
											<span class="field__label" for="lastname">Company Name (Optional)</span>
											<input class="field__input" type="text" id="lastname" value="{{$ad->billing_company_name}}" name="company_name" />
										</label>

										<label class="field">
											<span class="field__label" for="address">Street Address (optional)</span>
											<input class="field__input" type="text" value="{{$ad->billing_address}}" name="address" id="address" />
										</label>
										<label class="field">
											<span class="field__label" for="country">Country</span>
											<select class="form-control country" name="country" id="country{{$ad->id}}" data-id="{{$ad->id}}"  required>
												<option value="">Select</option>
												@foreach($country as $cn)
												<option value="{{$cn->id}}" <?php if($ad->billing_country==$cn->id){echo"selected";}?>>{{$cn->country_name}}</option>
												@endforeach
											</select>
										</label>

										<label class="field">
											<span class="field__label" for="country">State</span>
											<select class="form-control state" name="state" id="state{{$ad->id}}" data-id="{{$ad->id}}" required>
											<?php 
											$state=App\Model\State::where(['country_id'=>$ad->billing_country])->get();
											foreach($state as $s){?>
											<option value="{{$s->id}}" {{($ad->billing_state==$s->id)?'selected' : ''}}>{{$s->state_name}}</option>
											<?php } ?>
											</select>
										</label>
										<label class="field">
											<span class="field__label" for="country">City</span>
											<select class="form-control city" name="city" id="city{{$ad->id}}" data-id="{{$ad->id}}" required>
											<?php
											$city=App\Model\City::where(['state_id'=>$ad->billing_state])->get();
											foreach($city as $c){?>
											<option value="{{$c->id}}" {{($ad->billing_city==$c->id)?'selected' : ''}}>{{$c->city_name}}</option>
											<?php }  ?>
											</select>
										</label>

										<div class="fields fields--3">
											<label class="field">
												<span class="field__label" for="zipcode">Zip code</span>
												<select class="form-control" id="pincode{{$ad->id}}" name="pincode" required>
													<option value="">Select</option>
													<?php 
													$ct=App\Model\City::where(['id'=>$ad->billing_city])->first();
													$pincode=[];
													if($ct){
													$pincode=App\Model\Pincode::where(['location'=>$ct->city_name])->get();
													}
													foreach($pincode as $p){?>
													<option value="{{$p->pincode}}" {{($ad->billing_pincode==$p->pincode)?'selected' : ''}}>{{$p->pincode}}</option>
													<?php } ?>
												</select> 
											</label>
											<label class="field">
												<span class="field__label" for="city">Phone</span>
												<input type="tel" name="phone" class="form-control" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{$ad->billing_phone}}" required> 
											</label>
											<label class="field">
												<span class="field__label" for="state">Email</span>
												<input type="email" name="email" value="{{$ad->billing_email}}" class="form-control" required> 
											</label>
										</div>
										<label class="field">
											<input type="checkbox" class="form-control" name="billing_address" value="1" style="width: auto;
											display: inline-block;
											margin: 0px 0 0 0;
											padding: 0 0 0 0;" {{($ad->default=='1') ? 'checked' : ''}}> <span>Billing Address<span>
											</label>
										</div>

									</div>
								</div>	

							</div>

							<button class="btn btn-success search_button my-2 my-sm-0" type="submit">Update</button>
						</form>
					</div>

				</div>
			</div>
		</div>
		@endforeach
		@endsection
		<style type="text/css">
			.shp{
				border: 1px solid #63e3f4;
				padding: 10px 0 0 0;
				box-shadow: 3px 5px 16px 0 #a7a4a4;
			}
			.login_modal form.mobile_number select {
				width: 100%;
				padding: 15px;
				height: 48px;
				margin-bottom: 15px;
				border-top: none;
				border-right: none;
				border-left: none;
				border-radius: 0;
				border-bottom: 1px solid #8beffd;
				background: #fafeff;
			}
			.form {
				display: grid;
				grid-gap: 1rem;
			}

			.field {
				width: 100%;
				display: flex;
				flex-direction: column;
				border: 1px solid var(--color-lighter-gray);
				padding: .5rem;
				border-radius: .25rem;
				text-align: left;
			}
			.form-inline label{
				align-items: flex-start!important;
			}
			.field__label {
				color: var(--color-gray);
				font-size: 0.6rem;
				font-weight: 300;
				text-transform: uppercase;
				margin-bottom: 0.25rem
			}

			.field__input {
				padding: 0;
				margin: 0;
				border: 0;
				outline: 0;
				font-weight: bold;
				font-size: 1rem;
				width: 100%;
				-webkit-appearance: none;
				appearance: none;
				background-color: transparent;
			}
			.field:focus-within {
				border-color: #000;
			}

			.fields {
				display: grid;
				grid-gap: 1rem;
			}
			.fields--2 {
				grid-template-columns: 1fr 1fr;
			}
			.fields--3 {
				grid-template-columns: 1fr 1fr 1fr;
			}


		</style>