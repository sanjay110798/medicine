@extends('layouts.admin.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Order List</li>
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
          <a href="{{route('admin.self.order.add')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Order</a>
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
                     <th>Bill Id</th>
                     <th>User</th>
                     <th>Total Price</th>
                     <th>Payment Type</th>
                     <th>Prescription Image</th>
                     <th>Billing Details</th>
                     <th>Product Details</th>
                     <th>Order Status</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  @php
                  $i=1;
                  @endphp
                  @if(count($order) > 0)
                  @foreach($order as $item)
                  
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->bill_id}}</td>
                    <td>
                      <?php
                      $us=App\User::where(['id'=>$item->user_id])->first();
                      if($us)
                      {
                        echo $us->name;
                      }else{
                        echo "NULL";
                      }
                      ?>
                    </td>
                    <td>Rs.{{$item->total_price}}</td>
                    
                    <td>{{$item->payment_type}}</td>
                    <td>
                      <?php 
                      if($item->prescription_image!='')
                      {
                        $img=explode(",", $item->prescription_image);
                        foreach($img as $mg){
                          ?>
                          <img src="{{asset('upload/prescription/'.$mg)}}" width="50" height="50">
                        <?php } } else{
                          echo "NULL";
                        }
                        ?>
                      </td>
                      <td><a href="#" data-toggle="modal" data-target="#billModal{{$item->id}}"><i class="fa fa-home"></i></a> 
                        <!-- //////////// -->
                        <!-- Modal -->
                        <div class="modal fade" id="billModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Billing Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <div class="row">
                                <div class="col-md-12">
                                  <h6>BILLING ADDRESS</h6>
                                  <hr>
                                  <p style="margin: 0 0 0 0;">Name:{{$item->name}}</p>
                                  <p style="margin: 0 0 0 0;">Company Name:{{$item->company_name}}</p>
                                  <p style="margin: 0 0 0 0;">Country:
                                    <?php 
                                    $cnt=App\Model\Country::where(['id'=>$item->country])->first();
                                    if($cnt){
                                      echo $cnt->country_name;
                                    }else{
                                      echo "NULL";
                                    }
                                    ?>
                                  </p>
                                  <p style="margin: 0 0 0 0;">State:<?php 
                                  $stt=App\Model\State::where(['id'=>$item->state])->first();
                                  if($stt){
                                    echo $stt->state_name;
                                  }else{
                                    echo "NULL";
                                  }
                                ?></p>
                                <p style="margin: 0 0 0 0;">City: <?php 
                                $ct=App\Model\City::where(['id'=>$item->city])->first();
                                if($ct){
                                  echo $ct->city_name;
                                }else{
                                  echo "NULL";
                                }
                              ?></p>
                              <p style="margin: 0 0 0 0;">Address:{{$item->address}}</p>
                              <p style="margin: 0 0 0 0;">Pincode:{{$item->pincode}}</p>
                              <p style="margin: 0 0 0 0;">Phone:{{$item->phone}}</p>
                              <p style="margin: 0 0 0 0;">Email:{{$item->email}}</p>

                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </td>
                <td><a href="#" data-toggle="modal" data-target="#productModal{{$item->id}}"><i class="fa fa-truck"></i></a>
                  <!-- Modal -->
                  <div class="modal fade" id="productModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <?php 
                         $items = App\Model\OrderProduct::where(['order_id'=>$item->id])->get();
                         ?>

                         <div class="row">

                           <div class="col-md-12 newdatatable">

                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable ">

                              <thead>

                                <tr>

                                  <th>Product</th>

                                  <th>Image</th>

                                  <th>Quantity</th>

                                  <th>Price</th>

                                </tr>

                              </thead>



                              <tbody>

                                <?php 

                                $i=1;

                                foreach($items as $val){

                                 $pro = App\Model\Product::where('id','=',$val->product_id)->first();
                                 $proImg = App\Model\ProductImage::where('product_id','=',$val->product_id)->get();

                                 ?>

                                 <tr>

                                  <td>{{($pro) ? $pro->product_name : 'Product Not Found'}}</td>

                                  <td>@if(count($proImg)>0)
                                    <img src="{{asset('upload/product/'.$proImg[0]->product_img)}}" style="width: 60px;height: 60px;">
                                    @endif
                                  </td>
                                  <td>{{$val->quantity}}</td>
                                  <td><b>₹{{$val->price}}</b></td>

                                </tr> 

                              <?php } ?>

                            </tbody>

                          </table>  

                        </div>



                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </td>
            <td>
              <select class="form-control order_st" id="{{$item->id}}">
                <option value="0" {{($item->status=='0') ? 'selected' : ''}}>Ordered</option>
                <option value="1" {{($item->status=='1') ? 'selected' : ''}}>Shipped</option>
                <option value="2" {{($item->status=='2') ? 'selected' : ''}}>Out For Delivery</option>
                <option value="3" {{($item->status=='3') ? 'selected' : ''}}>Delivered</option>
              </select>
            </td>
            <td>
             <a href="{{route('admin.order.delete',['id'=>$item->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i></a></td>
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
 {{ $order->links() }}
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

<div class="modal fade" id="orderStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Status Change</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.order.status.change')}}" method="post">
          @csrf
         <div class="row">
          <input type="hidden" name="status" id="OrdSts">
          <input type="hidden" name="bill_id" id="OrdId">
          <div class="col-md-12">
            <label class="form-group">Comment</label>
           <textarea class="form-control" rows="4" name="comment"></textarea>
          </div>
          <div class="col-md-12 mt-2 text-right">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

        </div>
      </form>
    </div>

  </div>
</div>
</div>
@endsection
