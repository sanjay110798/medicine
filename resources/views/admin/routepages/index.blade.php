@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pages</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pages</li>
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
          <a href="{{route('admin.route.pages.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add </a>
        </div>
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Route Name</th>
                    <th>Page Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($pages) > 0)
                  @foreach($pages as $item)
                  @php
                  $i=1;
                  @endphp
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->route_name}}</td>
                    <td>{!!$item->name!!}</td>
                    
                  <td><a href="{{route('admin.route.pages.edit',['id'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>&nbsp;
                   <a href="{{route('admin.route.pages.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
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
         {{ $pages->links() }}
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