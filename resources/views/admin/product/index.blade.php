@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
          <a href="{{route('admin.product.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add </a>
        </div>
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>Barcode</th>
                    <th>Name</th>
                    <th>MRP</th>
                    <th>Description</th>
                    <th>Composition</th>
                    <th>Company Name</th>
                    <th>Discount Type</th>
                    <th>Discount Value</th>
                    <th>Active/Deactive</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($product) > 0)
                  @foreach($product as $item)
                  
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{!!$item->barcode!!}</td>
                    <td>{{$item->product_name}}</td>
                    <td>Rs.{{$item->mrp}}</td>
                    <td>{!!substr($item->description,0,100)!!}</td>
                    <td>{{substr($item->composition,0,40)}}</td>
                    <td>{{$item->manufacturer}}</td>
                    <td>{{$item->discount_type}}</td>
                    <td>{{$item->discount_value}}</td>
                    <td><div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" name="enabled" data-id="{{$item->id}}" class="custom-control-input productcheckbox" id="customSwitch1" {{($item->active=='1') ? "checked" : ""}}>
                        <label class="custom-control-label" for="customSwitch1">Toggle this to switch</label>
                      </div>
                    </div>
                    </td>
                  <td><a href="{{route('admin.product.edit',['id'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>&nbsp;
                   <a href="{{route('admin.product.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
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
          </div>

          <!-- /.card-body -->
        </div>
        <div class="card-footer clearfix">
         {{ $product->links() }}
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