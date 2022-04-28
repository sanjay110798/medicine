@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Country</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Country</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-right mb-2">
          <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add </a>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('admin.country.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="form-group">Country Name <sup>*</sup></label>
                      <input type="text" class="form-control" name="country_name" required>
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
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Country Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($country) > 0)
                  @foreach($country as $item)
                 
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->country_name}}</td>
                    
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fa fa-pencil"></i></button>&nbsp;
                      <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('admin.country.edit',['id'=>$item->id])}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="form-group">Country Name <sup>*</sup></label>
                                    <input type="text" class="form-control" name="country_name" value="{{$item->country_name}}" required>
                                  </div>
                                 
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                   <a href="{{route('admin.country.del',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                  <td colspan="6" class="text-center">No Record Found Yet!</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>

          <!-- /.card-body -->
        </div>
        <div class="card-footer clearfix">
         {{ $country->links() }}
       </div>
       <!-- /.card -->


       <!-- /.card -->
     </div>
     <!-- /.col -->
   </div>
   <!-- /.row -->
 </div>
 <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection