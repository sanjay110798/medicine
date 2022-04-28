@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>City</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">City</li>
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
                <h5 class="modal-title" id="exampleModalLabel">Add City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{route('admin.city.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <label class="form-group">State Name <sup>*</sup></label>
                      <select class="form-control" name="state_id" required>
                        @foreach($state as $val)
                        <option value="{{$val->id}}">{{$val->state_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-12">
                      <label class="form-group">City Name <sup>*</sup></label>
                      <input type="text" class="form-control" name="city_name" required>
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
                    <th>City Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($city) > 0)
                  @foreach($city as $item)

                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->city_name}}</td>
                    
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$item->id}}"><i class="fa fa-pencil"></i></button>&nbsp;
                      <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('admin.city.edit',['id'=>$item->id])}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="form-group">State Name <sup>*</sup></label>
                                    <select class="form-control" name="state_id" required>
                                      @foreach($state as $val)
                                      <option value="{{$val->id}}">{{$val->state_name}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-md-12">
                                    <label class="form-group">City Name <sup>*</sup></label>
                                    <input type="text" class="form-control" name="city_name" value="{{$item->city_name}}" required>
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

                      <a href="{{route('admin.city.del',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
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
             {{ $city->links() }}
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