@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Product</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Product</li>
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
					<form method="post" action="{{route('admin.product.update',['id'=>$product->id])}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Product Name*</label>
									<input type="text" name="product_name" id="" required="required" class="form-control" value="{{$product->product_name}}">                   
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
										<option value="{{$val->id}}" <?php if($product->brand_id!=''){if($val->id==$product->brand_id){echo "selected";}}?>>{{$val->name}}</option>
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
										<option value="{{$cat->id}}" <?php if($product->category_id!=''){if($cat->id==$product->category_id){echo "selected";}}?>>{{$cat->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
                            <div class="col-sm-6">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Sub Category Name</label>
									<?php 
									$subcat=[];
									if($product->sub_cat_id!=''){
										$subcat=App\Model\Category::where(['parent_id'=>$product->category_id])->get();
									}?>
									<select class="form-control" name="sub_cat_id" id="sub_cat_id">
		     	                    @if(count($subcat)>0)
		     	                    @foreach($subcat as $sb)
                                     <option value="{{$sb->id}}" <?php if($product->sub_cat_id!=''){if($sb->id==$product->sub_cat_id){echo "selected";}}?>>{{$sb->name}}</option>
		     	                    @endforeach
		     	                    @endif
		                            </select>  
								</div>
							</div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Manufacturer*</label>
									<input type="text" name="com_name" id="" required="required" class="form-control" value="{{$product->manufacturer}}">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Composition*</label>
									<input type="text" name="composition" id="" required="required" class="form-control" value="{{$product->composition}}">                   
								</div>	
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group">
									<label>Description*</label>
									<textarea class="form-control" rows="4" name="description">{{$product->description}}</textarea> <script>
										CKEDITOR.replace('description');
									</script>                       
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>MRP*</label>
									<input type="text" name="mrp" id="" required="required" class="form-control" value="{{$product->mrp}}">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Discount Type</label>
									<select class="form-control" id="exampleFormControlSelect1" name="discount_type">
									<option value="">Select</option>
									<option value="Fixed" {{($product->discount_type=='Fixed') ? 'selected' : ''}}>Fixed</option>
									<option value="Percentage" {{($product->discount_type=='Percentage') ? 'selected' : ''}}>Percentage</option>
									
								</select>                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Discount Value</label>
									<input type="text" name="discount_val" class="form-control" value="{{$product->discount_value}}">                   
								</div>	
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
									<label>Prescription Required</label>
									<input type="checkbox" name="p_r" value="Y" {{($product->prescription=='Y') ? 'checked' : ''}}>                   
								</div>	
                            </div>
							<!-- /.form-group -->
						</div>

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