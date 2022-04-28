@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Product</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add Product</li>
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
					<form method="post" action="{{route('admin.product.insert')}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Product Name*</label>
									<input type="text" name="product_name" id="" required="required" class="form-control">                   
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Image*</label>
									<input type="file" name="file[]" class="form-control" multiple>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Brand Name*</label>
									<select class="form-control" name="brand_id">
										<option value="">Select</option>
										@foreach($brand as $val)
										<option value="{{$val->id}}">{{$val->name}}</option>
										@endforeach
									</select>  
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Category Name</label>
									<select class="form-control" name="cat_id" id="cat_id">
										<option value="">Select</option>
										@foreach($category as $cat)
										<option value="{{$cat->id}}">{{$cat->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Sub Category Name</label>
									<select class="form-control" name="sub_cat_id" id="sub_cat_id">
		     	
		                            </select>  
								</div>
							</div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Manufacturer*</label>
									<input type="text" name="com_name" id="" required="required" class="form-control">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Composition*</label>
									<input type="text" name="composition" id="" required="required" class="form-control">                   
								</div>	
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
									<label>Description*</label>
									<textarea class="form-control" rows="4" name="description"></textarea> 
									<script>
										CKEDITOR.replace('description');
									</script>                 
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>MRP*</label>
									<input type="text" name="mrp" id="" required="required" class="form-control">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Discount Type</label>
									<select class="form-control" id="exampleFormControlSelect1" name="discount_type">
									<option value="">Select</option>
									<option value="Fixed">Fixed</option>
									<option value="Percentage">Percentage</option>
									
								</select>                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Discount Value</label>
									<input type="text" name="discount_val" class="form-control">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Prescription Required</label>
									<input type="checkbox" name="p_r" value="Y" >                   
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
@endsection