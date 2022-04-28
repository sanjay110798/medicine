@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Wallet</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Wallet</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       
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
                    <th>Amount</th>
                    <th>Add Money</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($user) > 0)
                  @foreach($user as $item)
                  @php
                  $getCreditBalance=App\Model\Wallet::where(['user_id'=>$item->id,'payment_type'=>'credit','status'=>'1'])->get();
                  $getDebitBalance=App\Model\Wallet::where(['user_id'=>$item->id,'payment_type'=>'debit','status'=>'1'])->get();

                  $cr=$getCreditBalance->sum('amount');
                  $dr=$getDebitBalance->sum('amount');
                  @endphp
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{number_format($cr - $dr,2)}}</td>
                    <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addMoneyModal{{$item->id}}">Add Money</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addMoneyModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Money</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form method="post" action="{{(route('admin.wallet.add'))}}">
                            @csrf
                          <div class="modal-body">
                           <div class="row">
                            <input type="hidden" name="user_id" value="{{$item->id}}">
                             <div class="col-md-12">
                              <label class="form-group">Remarks</label>
                               <input type="text" name="remarks" class="form-control">
                             </div>
                             <div class="col-md-12">
                              <label class="form-group">Amount</label>
                               <input type="text" name="amount" class="form-control" required>
                             </div>
                             <div class="col-md-12">
                              <label class="form-group">Payment Type</label>
                               <select class="form-control" name="payment_type">
                                 <option value="credit">Credit</option>
                                 <option value="debit">Debit</option>
                               </select>
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
                    </td>
                    <td><a href="{{route('admin.wallet.history.list',['user_id'=>$item->id])}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>&nbsp;
                   </td>
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
         {{ $user->links() }}
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