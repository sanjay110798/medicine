@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Vender</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Vender</li>
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

					
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form method="post" action="{{route('admin.vender.update',['id'=>$user->id])}}">
						@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" value="{{$user->name}}" class="form-control" required>
							</div>
							<!-- /.form-group -->
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" value="{{$user->email}}" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Date Of Birth</label>
								<input type="date" name="dob" value="{{$user->dob}}" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Blood Group</label>
								
								<select class="form-control" id="exampleFormControlSelect1" name="blood_group">
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									<option value="Others">Others</option>
								</select>
							</div>
							<div class="form-group">
								<label>Height in Inch</label>
								
								<select class="form-control" id="exampleFormControlSelect1" name="height_inc">
									<option value="1">1"</option>
									<option value="2">2"</option>
									<option value="3" >3"</option>
									<option value="4" >4"</option>
									<option value="5" >5"</option>
									<option value="6" >6'</option>
									<option value="7">7"</option>
									<option value="8">8"</option>
									<option value="9">9"</option>
									<option value="10">10"</option>
									<option value="11">11"</option>
									<option value="12">12"</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect1">Marital Status</label>
								<select class="form-control" id="exampleFormControlSelect1" name="marital_status">
									<option value="Single">Single</option>
									<option value="Married" >Married</option>
									<option value="Divorced" >Divorced</option>
									<option value="Widow">Widow/Widower</option>
								</select>
							</div>
							<!-- /.form-group -->
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Mobile</label>
								<input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Password(Optional)</label>
								<input type="password" name="password" class="form-control">
							</div>
							<!-- /.form-group -->
							<div class="form-group">
								<label>Gender</label>
								<select class="form-control" id="exampleFormControlSelect1" name="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select>
							</div>
							<div class="form-group">
								<label>Height in Ft.</label>
								
								<select class="form-control" id="exampleFormControlSelect1" name="height_ft">
									<option value="1">1'</option>
									<option value="2">2'</option>
									<option value="3" >3'</option>
									<option value="4" >4'</option>
									<option value="5" >5'</option>
									<option value="6" >6'</option>
									<option value="7">7'</option>
									<option value="8">8'</option>
									<option value="9">9'</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputWeight">Weight(Kg)</label>
								<input type="number" name="weight" class="form-control" id="exampleInputWeight" aria-describedby="Weight" value="{{$user->weight}}">
							</div>
							<div class="form-group">
								<label for="exampleInputWeight">Emergency Contact</label>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 xol-sm-12 pl-0">
										<input type="number" class="form-control" name="e_number" id="exampleInputNumber" aria-describedby="Number" value="{{$user->e_number}}">
									</div>

								</div>
							</div>
							<!-- /.form-group -->
						</div>
						<!-- /.col -->
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Update</button>
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
@endsection