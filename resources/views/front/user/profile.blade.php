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
					<div class="tab-pane fade show active" id="list-tab1" role="tabpanel" aria-labelledby="list-tab1-list">
						<div class="tab_content py-2">
							<h3 class="management_title mb-0">Profile</h3>
							
							<form class="bg-white pb-4" method="post" action="{{route('user.update.profile')}}">
								@csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleInputName">Name</label>
											<input type="Name" name="name" class="form-control" id="exampleInputName" value="{{Auth::user()->name}}" aria-describedby="NameHelp">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Mobile Number</label>
											<input type="number" name="mobile" class="form-control" value="{{Auth::user()->mobile}}" id="exampleInputNumber" aria-describedby="numberHelp">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email"  name="email" class="form-control" value="{{Auth::user()->email}}" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleInputEmail1">Date of Birth</label>
											<input type="date" name="dob" class="form-control" id="exampleInputEmail1" value="{{Auth::user()->dob}}" aria-describedby="emailHelp">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Gender</label>
											<select class="form-control" id="exampleFormControlSelect1" name="gender">
											  <option value="Male" <?php if(Auth::user()->gender=='Male'){echo "selected";}?>>Male</option>
											  <option value="Female" <?php if(Auth::user()->gender=='Female'){echo "selected";}?>>Female</option>
											  <option value="Others" <?php if(Auth::user()->gender=='Others'){echo "selected";}?>>Others</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Blood Group</label>
											<select class="form-control" id="exampleFormControlSelect1" name="blood_group">
											  <option value="A+" <?php if(Auth::user()->blood_group=='A+'){echo "selected";}?>>A+</option>
											  <option value="A-" <?php if(Auth::user()->blood_group=='A-'){echo "selected";}?>>A-</option>
											   <option value="B+" <?php if(Auth::user()->blood_group=='B+'){echo "selected";}?>>B+</option>
											  <option value="B-" <?php if(Auth::user()->blood_group=='B-'){echo "selected";}?>>B-</option>
											  <option value="AB+" <?php if(Auth::user()->blood_group=='AB+'){echo "selected";}?>>AB+</option>
											  <option value="AB-" <?php if(Auth::user()->blood_group=='AB-'){echo "selected";}?>>AB-</option>
											  <option value="O+" <?php if(Auth::user()->blood_group=='O+'){echo "selected";}?>>O+</option>
											  <option value="O-" <?php if(Auth::user()->blood_group=='O-'){echo "selected";}?>>O-</option>
											  <option value="Others" <?php if(Auth::user()->blood_group=='Others'){echo "selected";}?>>Others</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12 pl-0">
												<div class="form-group">
													<label for="exampleFormControlSelect1">Height in Ft.</label>
													<select class="form-control" id="exampleFormControlSelect1" name="height_ft">
													  <option value="1" <?php if(Auth::user()->height_ft=='1'){echo "selected";}?>>1'</option>
													  <option value="2" <?php if(Auth::user()->height_ft=='2'){echo "selected";}?>>2'</option>
													  <option value="3" <?php if(Auth::user()->height_ft=='3'){echo "selected";}?>>3'</option>
													  <option value="4" <?php if(Auth::user()->height_ft=='4'){echo "selected";}?>>4'</option>
													  <option value="5" <?php if(Auth::user()->height_ft=='5'){echo "selected";}?>>5'</option>
													  <option value="6" <?php if(Auth::user()->height_ft=='6'){echo "selected";}?>>6'</option>
													  <option value="7" <?php if(Auth::user()->height_ft=='7'){echo "selected";}?>>7'</option>
													  <option value="8" <?php if(Auth::user()->height_ft=='8'){echo "selected";}?>>8'</option>
													  <option value="9" <?php if(Auth::user()->height_ft=='9'){echo "selected";}?>>9'</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12 pr-0">
												<div class="form-group">
													<label for="exampleFormControlSelect1">Height in Inch</label>
													<select class="form-control" id="exampleFormControlSelect1" name="height_inc">
													  <option value="1" <?php if(Auth::user()->height_inc=='1'){echo "selected";}?>>1"</option>
													  <option value="2" <?php if(Auth::user()->height_inc=='2'){echo "selected";}?>>2"</option>
													  <option value="3" <?php if(Auth::user()->height_inc=='3'){echo "selected";}?>>3"</option>
													  <option value="4" <?php if(Auth::user()->height_inc=='4'){echo "selected";}?>>4"</option>
													  <option value="5" <?php if(Auth::user()->height_inc=='5'){echo "selected";}?>>5"</option>
													  <option value="6" <?php if(Auth::user()->height_inc=='6'){echo "selected";}?>>6"</option>
													  <option value="7" <?php if(Auth::user()->height_inc=='7'){echo "selected";}?>>7"</option>
													  <option value="8" <?php if(Auth::user()->height_inc=='8'){echo "selected";}?>>8"</option>
													  <option value="9" <?php if(Auth::user()->height_inc=='9'){echo "selected";}?>>9"</option>
													  <option value="10" <?php if(Auth::user()->height_inc=='10'){echo "selected";}?>>10"</option>
													  <option value="11" <?php if(Auth::user()->height_inc=='11'){echo "selected";}?>>11"</option>
													  <option value="12" <?php if(Auth::user()->height_inc=='12'){echo "selected";}?>>12"</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleInputWeight">Weight(Kg)</label>
											<input type="number" name="weight" class="form-control" value="{{Auth::user()->weight}}" id="exampleInputWeight" aria-describedby="Weight">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Marital Status</label>
											<select class="form-control" id="exampleFormControlSelect1" name="marital_status">
												<option value="Single" <?php if(Auth::user()->merital_status=='Single'){echo "selected";}?>>Single</option>
												<option value="Married" <?php if(Auth::user()->merital_status=='Married'){echo "selected";}?>>Married</option>
												<option value="Divorced" <?php if(Auth::user()->merital_status=='Divorced'){echo "selected";}?>>Divorced</option>
												<option value="Widow" <?php if(Auth::user()->merital_status=='Widow'){echo "selected";}?>>Widow/Widower</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-12 xol-sm-12">
										<div class="row">
											
											<div class="form-group">
												<label for="exampleInputWeight">Emergency Contact</label>
												<div class="row">
													<div class="col-lg-12 col-md-12 col-xs-12 xol-sm-12 pl-0">
														<input type="number" class="form-control" name="e_number" id="exampleInputNumber" value="{{Auth::user()->e_number}}" aria-describedby="Number">
													</div>
													
												</div>
											</div>
										</div>
									</div>
								
								</div>
								 
								  <button type="update information" class="btn btn-primary update_btn" type="submit">Update Information</button>
							</form>
								
								
						</div>
					</div>
		
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
@endsection