@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Site Setting</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Site Setting</li>
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
					<form method="post" action="{{route('admin.update.settngs')}}" enctype="multipart/form-data">
						@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Logo</label>
								<input type="file" name="img" class="form-control">
							</div>
							@if($site)
							<img src="{{asset('upload/'.$site->site_logo)}}" width="200">
							@endif
							<div class="form-group">
								<label>Google Play Store Url</label>
								<input type="text" name="google_play_url" value="{{($site) ? $site->google_play_url : ''}}" class="form-control" required>
							</div>

							<!-- /.form-group -->
							<div class="form-group">
								<label>App Url</label>
								<input type="text" name="app_url" value="{{($site) ? $site->app_url : ''}}" class="form-control" required>
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