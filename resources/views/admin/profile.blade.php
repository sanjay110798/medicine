@extends('layouts.admin.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                 @if(Auth::user()->image=='')
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('admin/dist/img/user4-128x128.jpg')}}"
                       alt="User profile picture">
                 @else
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('upload/admin/'.Auth::user()->image)}}"
                       alt="User profile picture">
                 @endif
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
        
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              
              <div class="card-body">
                <div class="tab-content">
                  
                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                    	@csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name<sup>*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="inputName" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email<sup>*</sup></label>
                        <div class="col-sm-10">
                          <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="inputEmail" placeholder="Email" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Mobile<sup>*</sup></label>
                        <div class="col-sm-10">
                          <input type="text" name="mobile" value="{{Auth::user()->mobile}}" class="form-control" id="inputName2" placeholder="Mobile" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                          <input type="file" name="img" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputSkills" placeholder="Password">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection