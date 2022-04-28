@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Benefit</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Benefit</li>
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
					<form method="post" action="{{route('admin.benefit.update',['id'=>$benefit->id])}}" enctype="multipart/form-data">
						@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Title</label>
								<input type="text" name="title" value="{{$benefit->title}}" class="form-control" required>
							</div>

							<!-- /.form-group -->
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="img" class="form-control">
							</div>
							
							<div class="form-group">
								<label for="exampleFormControlSelect1">Description</label>
								<textarea class="form-control" rows="4" name="description">{{$benefit->description}}</textarea>
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