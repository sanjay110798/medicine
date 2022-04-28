@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Add Seo</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add Seo</li>
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
					<form method="post" action="{{route('admin.sitemap.insert')}}" enctype="multipart/form-data">
						@csrf
					<div class="row">
						<div class="col-md-12">
							
							<div class="form-group">
								<label for="exampleFormControlSelect1">Page Name</label>
								<select class="form-control" id="exampleFormControlSelect1" name="route">
									@foreach($routepage as $val)
									<option value="{{$val->route_name}}">{{$val->name}}</option>
                                    @endforeach
								</select>
							</div>
							<!-- /.form-group -->
						</div>
						<div class="col-md-12">
							
							<div class="form-group">
								<label for="exampleFormControlSelect1">Meta Title</label>
								<input type="text" class="form-control" name="meta_title" placeholder="Meta Title" required>
							</div>
							<!-- /.form-group -->
						</div>
						<div class="col-md-12">
							
							<div class="form-group">
								<label for="exampleFormControlSelect1">Meta Keyword</label>
								<input type="text" class="form-control" name="meta_keyword" placeholder="Meta Keyword" required>
							</div>
							<!-- /.form-group -->
						</div>
							<div class="col-md-12">
							
							<div class="form-group">
								<label for="exampleFormControlSelect1">Meta Description</label>
								<textarea class="form-control" name="description" required></textarea>
								<script>
									CKEDITOR.replace('description');
								</script>
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