@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pincode</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pincode</li>
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
          <a href="{{route('admin.pincode.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add </a>
        </div>
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Pincode</th>
                    <th>Location</th>
                    <th>Active/Deactive</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($pincode) > 0)
                  @foreach($pincode as $item)
                 
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->pincode}}</td>
                    <td>{{$item->location}}</td>
                    <td><div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" name="enabled" data-id="{{$item->id}}" class="custom-control-input pincodecheckbox" id="customSwitch1" {{($item->active=='1') ? "checked" : ""}}>
                        <label class="custom-control-label" for="customSwitch1">Toggle this to switch</label>
                      </div>
                    </div>
                    </td>
                    
                    <td><a href="{{route('admin.pincode.edit',['id'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>&nbsp;
                   <a href="{{route('admin.pincode.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
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
         {{ $pincode->links() }}
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