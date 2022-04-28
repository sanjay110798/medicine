@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add POS</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">POS</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- SELECT2 EXAMPLE -->
			<div class="card card-default">
				<div class="card-header">

					<div class="row">
						<div class="col-12 text-right mb-2">
							<!-- <a href="#0" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUs"><i class="fa fa-plus"></i> Add User</a> -->
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade bd-example-modal-lg" id="addUs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="post" action="{{route('admin.add.self.user')}}">
									@csrf
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<h5>User Details</h5>
												<hr>
											</div>
											<div class="col-md-3">
												<label class="form-group">Name</label>
												<input type="text" class="form-control" name="name" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Email</label>
												<input type="text" class="form-control" name="email" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Phone</label>
												<input type="text" class="form-control" name="phone" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Password</label>
												<input type="text" class="form-control" name="password" required>
											</div>
											<div class="col-md-12 mt-2">
												<h5>Shipping Details</h5>
												<hr>
											</div>
											<div class="col-md-3">
												<label class="form-group">Name</label>
												<input type="text" class="form-control" name="billing_name" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Company Name</label>
												<input type="text" class="form-control" name="billing_cm_name" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Country</label>
												<select class="form-control" name="country" id="country" required>
													<option value="">Select</option>
													@foreach($country as $cn)
													<option value="{{$cn->id}}">{{$cn->country_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-3">
												<label class="form-group">State</label>
												<select class="form-control" name="state" id="state" required>

												</select>
											</div>
											<div class="col-md-3">
												<label class="form-group">City</label>
												<select class="form-control" name="city" id="city" required>

												</select>
											</div>
											<div class="col-md-3">
												<label class="form-group">Pincode</label>
												<select class="form-control" id="pincode" name="pincode" required>
													<option value="">Select</option>
												</select> 
											</div>
											<div class="col-md-6">
												<label class="form-group">Address</label>
												<input type="text" class="form-control" name="billing_address" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Phone</label>
												<input type="text" class="form-control" name="billing_phone" required>
											</div>
											<div class="col-md-3">
												<label class="form-group">Email</label>
												<input type="email" class="form-control" name="billing_email" required>
											</div>

										</div>
									</div>
									<div class="modal-footer">

										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form method="post" action="{{route('admin.self.order.insert')}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Bill Id*</label>
									<input type="text" name="bill_id" id="orderID" value="ORD{{rand(0000,9999)}}" required="required" readonly class="form-control">                   
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>User*</label>
									<select class="form-control" name="user_id" required id="user_id">
										<option value="">Select User</option>
										<option value="creat_us">Create New User</option>
										@php
										$use=App\User::where(['role_id'=>'4'])->get();
										@endphp
										@foreach($use as $us)
										<option value="{{$us->id}}">{{$us->name}}</option>
										@endforeach
									</select>              
								</div>
							</div>


							<div class="col-sm-12 d-none">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Address*</label>
									<input type="text" name="address" id="address"  class="form-control"> 
								</div>
							</div>							
							<div class="col-sm-12">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Add By Barcode</label>
									<input type="text" class="form-control" id="barcode">
								</div>
							</div>
							<div class="col-sm-12">
								
								<div class="row">
									<div class="col-md-12 mb-2 text-right">
										<a href="#0" id="remov" class="btn btn-sm btn-primary text-right">Clear</a>
									</div>
									<div class="col-md-12">
										<div class="form-group row mx-0 pb-3" style="border: 1px solid #0000001f;">
											<label class="col-sm-12 col-form-label"></label>
											<div class="col-sm-12 container" style="max-height: 610px;overflow-x: hidden;overflow-y: scroll;">
												
												<div class="row element" id="div_1">

													<div class="col-md-6">
														<label class="col-sm-12 col-form-label">Product Name</label>
													</div>
													<div class="col-md-2" >
														<label class="col-sm-12 col-form-label" style="width: 61%;">Price</label>
														
													</div>
													<div class="col-md-1">
														<label class="col-sm-12 col-form-label">Qty</label>
														
													</div>
													<div class="col-md-2">
														<label class="col-sm-12 col-form-label" style="width: 65%;">Total Price</label>
														
													</div>
													<div class="col-md-1">

													</div>
												</div>
												<div id="import_2" class="container">

												</div>
												
											</div>
										</div>
									</div>
								</div>

								<div class="row justify-content-end">
									<div class="col-md-8">
										<div class="form-group row mx-0 pb-3" style="border: 1px solid #0000001f;">
											<label class="col-sm-12 col-form-label"></label>
											<div class="col-sm-12">

												<div class="row">
													<div class="col-md-5">
														<label>Grand Total</label>
													</div>
													<div class="col-md-7" id="tot_sal1">
														<input type="text" name="tot_sal" id="tot_sal" class="form-control" placeholder="0.00" value="0" readonly>
													</div>
												</div>

											</div>
										</div>

									</div>
								</div>
							</div>
							
							
							<!-- /.form-group -->
						</div>

						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</div>
				</form>
			</div>
			<!-- /.card-body -->

		</div>
		<!-- /.card -->




		<!-- /.row -->


		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<div class="modal fade bd-example-modal-lg" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">No Shipping Address Found!!</h5>
				
			</div>
			<form method="post" action="{{route('admin.add.self.address')}}">
				@csrf
				<div class="modal-body">
					<div class="row">
						
						<div class="col-md-12 mt-2">
							<h5>Add Shipping Details</h5>
							<hr>
						</div>
						<input type="hidden" class="form-control" name="user_id" id="s_user_id" required>
						<div class="col-md-3">
							<label class="form-group">Name</label>
							<input type="text" class="form-control" name="billing_name" id="s_b_name" required>
						</div>
						<div class="col-md-3">
							<label class="form-group">Company Name</label>
							<input type="text" class="form-control" name="billing_cm_name" required>
						</div>
						<div class="col-md-3">
							<label class="form-group">Country</label>
							<select class="form-control" name="country" id="billing_country" required>
								<option value="">Select</option>
								@foreach($country as $cn)
								<option value="{{$cn->id}}">{{$cn->country_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-3">
							<label class="form-group">State</label>
							<select class="form-control" name="state" id="billing_state" required>

							</select>
						</div>
						<div class="col-md-3">
							<label class="form-group">City</label>
							<select class="form-control" name="city" id="billing_city" required>

							</select>
						</div>
						<div class="col-md-3">
							<label class="form-group">Pincode</label>
							<select class="form-control " name="pincode" id="billing_pincode" required>

							</select>
						</div>
						<div class="col-md-6">
							<label class="form-group">Address</label>
							<input type="text" class="form-control" name="billing_address" required>
						</div>
						<div class="col-md-3">
							<label class="form-group">Phone</label>
							<input type="text" class="form-control" name="billing_phone" id="s_b_phone" required>
						</div>
						<div class="col-md-3">
							<label class="form-group">Email</label>
							<input type="email" class="form-control" name="billing_email" id="s_b_email" required>
						</div>

					</div>
				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style type="text/css">
	.select2-selection.select2-selection--single
	{
		height: 37px;
	}
</style>
@endsection