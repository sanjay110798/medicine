@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Wallet List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Wallet List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       <div class="col-md-12 mb-2">
         <form method="get" action="{{route('admin.wallet.request.list')}}">
           <!-- @csrf -->
           <div class="row">
             <div class="col-md-3">
               <select class="form-control select2" name="user_id">
                <option value="">Select</option>
                 @foreach($user as $val)
                 <option value="{{$val->id}}">{{$val->name}}({{$val->email}})</option>
                 @endforeach
               </select>
             </div>
             <div class="col-md-3">
              <button type="submit" class="btn btn-primary">Search</button>
             </div>
           </div>
         </form>
       </div>
        <div class="col-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                  	<th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Payment Type</th>
                    <th>Amount</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($wallet) > 0)
                  @foreach($wallet as $item)
                  @php
                  $us=App\User::where(['id'=>$item->user_id])->first();
                  @endphp
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{($us) ? $us->name : ''}}</td>
                    <td>{{($us) ? $us->email : ''}}</td>
                    <td>{{$item->payment_type}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{date('F j,Y',strtotime($item->created_at))}}</td>
                    <td>@if($item->status=='0')<a href="{{route('admin.wallet.status.change',['id'=>$item->id,'status'=>'1'])}}" class="btn btn-primary">Approved</a>&nbsp;<a href="{{route('admin.wallet.status.change',['id'=>$item->id,'status'=>'2'])}}" class="btn btn-danger">Reject</a>@elseif($item->status=='1')<span style="color: green;">Approved</span>@else<span style="color: red;">Reject</span>@endif</td>
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
         {{ $wallet->links() }}
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