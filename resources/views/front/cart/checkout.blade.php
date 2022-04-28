@extends('layouts.front.app')
@section('content')

<?php 
  $total=$cart->sum('price');
?>
@php
$hav=App\Model\ShippingAddress::where(['user_id'=>Auth::id(),'default'=>'1'])->first();
@endphp

<div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
  <div class="row mb-2 mt-2">
    <div class="col-md-12 text-right">
      <a href="#0" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addBillingAddress"><i class="fa fa-plus"></i> Add New Address</a>
    </div>    
  </div>
<form  id="checkoutform" action="{{route('make.order')}}" method="post">
@csrf
<div class="row mb-5">
 <input type="hidden" name="p_img" value="{{$p_img}}">
 <input type="hidden" name="total" value="{{$total}}">
  <div class="col-md-8">
    
    
    <div class="row">

        @if(count($getAdd)>0)
                  <div class="col-md-12"><h6>Shipping Address</h6><hr></div>

                  @foreach($getAdd as $add)
                  <div class="col-md-6 mb-2 mt-2">
                    <div class="shp">
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <input type="radio" name="delivery_add" value="{{$add->id}}" {{($add->default=='1') ? 'checked' : ''}}>
                        </div>
                        <!-- //////////////// -->

                        <!-- ////////////////////// -->
                        <div class="col-md-12">
                          <label class="form-group">Name : {{$add->billing_name}}</label>
                        </div>

                        <div class="col-md-12">
                          <label class="form-group">Address : {{$add->billing_address}}</label>
                        </div>
                        <div class="col-md-12">
                          <label class="form-group">Pincode : {{$add->billing_pincode}}</label>
                        </div>
                        <div class="col-md-12">
                          <label class="form-group">Phone : {{$add->billing_phone}}</label>
                        </div>
                        <div class="col-md-12">
                          <label class="form-group">Email : {{$add->billing_email}}</label>
                        </div>

                      </div>
                     
                    </div>
                  </div>

                  @endforeach
                  @else
                  <div class="col-md-12"><h6>No Address Found</h6></div>
                  @endif
    
    </div>
    
  </div>
  <div class="col-md-4">
     <div class="Yorder">
    <table>
      <tr>
        <th colspan="3">Your order</th>
      </tr>
      @foreach($cart as $val)
        @php
        $img=App\Model\ProductImage::where(['product_id'=>$val->product_id])->get();
        $product=App\Model\Product::where(['id'=>$val->product_id])->first();
        @endphp
      <tr>
        <td> <img class="" src="{{asset('upload/product/'.$img[0]->product_img)}}" alt="art image" style="    width: 25px;
    height: 57px;"></td>
        <td>{{$product->product_name}} x {{$val->quantity}}(Qty)</td>
        <td>₹{{$val->price}}</td>
      </tr>
      @endforeach
      <tr colspan="3">
        <td colspan="2">Subtotal</td>
        <td>₹{{$total}}</td>
      </tr>
      <tr colspan="3">
        <td colspan="2">Shipping</td>
        <td>Free</td>
      </tr>
    </table><br>
    
    <div>
      <input type="radio" name="dbt" value="cod" checked> Cash on Delivery
    </div>
   
    <button type="button" class="bttn" id="makeOrd"> Place Order</button>
  </div><!-- Yorder --> 
  </div>
  

 </div>
  </form>
</div>
<!-- ///////// -->
<div class="modal fade login_modal" id="addBillingAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header top_sec">
        <h5 class="text-center login_title">Add Shipping Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form class="form-inline2 my-2 my-lg-0 mobile_number" method="post" action="{{route('save.address')}}">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="container">
                <h5 style="    font-size: 15px;
                font-weight: 700;
                color: #080808;">Shipping</h5>
                <p>Please enter your shipping details.</p>
                <hr />
                <div class="form text-left">

                  <label class="field">
                    <span class="field__label" for="firstname">Name</span>
                    <input class="field__input" type="text" id="firstname" name="name" required />
                  </label>
                  <label class="field">
                    <span class="field__label" for="lastname">Company Name (Optional)</span>
                    <input class="field__input" type="text" id="lastname" name="company_name" />
                  </label>

                  <label class="field">
                    <span class="field__label" for="address">Street Address (optional)</span>
                    <input class="field__input" type="text" name="address" id="address" />
                  </label>
                  <label class="field">
                    <span class="field__label" for="country">Country</span>
                    <select class="form-control" name="country" id="country" required>
                      <option value="">Select</option>
                      @foreach($country as $cn)
                      <option value="{{$cn->id}}">{{$cn->country_name}}</option>
                      @endforeach
                    </select>
                  </label>

                  <label class="field">
                    <span class="field__label" for="country">State</span>
                    <select class="form-control" name="state" id="state" required>

                    </select>
                  </label>
                  <label class="field">
                    <span class="field__label" for="country">City</span>
                    <select class="form-control" name="city" id="city" required>

                    </select>
                  </label>

                  <div class="fields fields--3">
                    <label class="field">
                      <span class="field__label" for="zipcode">Zip code</span>
                      <select class="form-control" id="pincode" name="pincode" required>
                        <option value="">Select</option>
                      </select> 
                    </label>
                    <label class="field">
                      <span class="field__label" for="city">Phone</span>
                      <input type="tel" name="phone" class="form-control" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required> 
                    </label>
                    <label class="field">
                      <span class="field__label" for="state">Email</span>
                      <input type="email" name="email" class="form-control" required> 
                    </label>
                  </div>
                  <label class="field">
                    <input type="checkbox" class="form-control" name="billing_address" value="1" style="    width: auto;
                    display: inline-block;
                    margin: 0px 0 0 0;
                    padding: 0 0 0 0;"> <span>Billing Address<span>
                    </label>
                  </div>

                </div>
              </div>  

            </div>

            <button class="btn btn-success search_button my-2 my-sm-0" type="submit">Save</button>
          </form>
        </div>

      </div>
    </div>
  </div>

<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

.Yorder{
  flex: 2;
}
.title{
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));
  background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);
  border-radius:5px 5px 0 0 ;
  padding: 20px;
  color: #f6f6f6;
}
h2{
  margin: 0;
  padding-left: 15px; 
}
.required{
  color: red;
}
 table{
  display: block;
  margin: 15px;
}


.Yorder{
  margin-top: 15px;
  height: auto;
  padding: 20px;
  border: 1px solid #dadada;
}
table{
  margin: 0;
  padding: 0;
}
th{
  border-bottom: 1px solid #dadada;
  padding: 10px 0;
}
tr>td:nth-child(1){
  text-align: left;
  color: #2d2d2a;
}
tr>td:nth-child(2){
  text-align: right;
  color: #52ad9c;
}
td{
  border-bottom: 1px solid #dadada;
  padding: 25px 25px 25px 0;
}


.Yorder>div{
  padding: 15px 0; 
}

.bttn{
  width: 100%;
  margin-top: 10px;
  padding: 10px;
  border: none;
  border-radius: 30px;
  background: #52ad9c;
  color: #fff;
  font-size: 15px;
  font-weight: bold;
}
.bttn:hover{
  cursor: pointer;
  background: #428a7d;
}
label.error {
    color: red;
    font-size: 1rem;
    display: block;
    margin-top: 5px;
}

input.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}
select.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}
</style>
<style type="text/css">
      .shp{
        border: 1px solid #63e3f4;
        padding: 10px 10px 10px 10px;
        box-shadow: 3px 5px 16px 0 #a7a4a4;
      }
      .login_modal form.mobile_number select {
        width: 100%;
        padding: 15px;
        height: 48px;
        margin-bottom: 15px;
        border-top: none;
        border-right: none;
        border-left: none;
        border-radius: 0;
        border-bottom: 1px solid #8beffd;
        background: #fafeff;
      }
      .form {
        display: grid;
        grid-gap: 1rem;
      }

      .field {
        width: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid var(--color-lighter-gray);
        padding: .5rem;
        border-radius: .25rem;
        text-align: left;
      }
      .form-inline label{
        align-items: flex-start!important;
      }
      .field__label {
        color: var(--color-gray);
        font-size: 0.6rem;
        font-weight: 300;
        text-transform: uppercase;
        margin-bottom: 0.25rem
      }

      .field__input {
        padding: 0;
        margin: 0;
        border: 0;
        outline: 0;
        font-weight: bold;
        font-size: 1rem;
        width: 100%;
        -webkit-appearance: none;
        appearance: none;
        background-color: transparent;
      }
      .field:focus-within {
        border-color: #000;
      }

      .fields {
        display: grid;
        grid-gap: 1rem;
      }
      .fields--2 {
        grid-template-columns: 1fr 1fr;
      }
      .fields--3 {
        grid-template-columns: 1fr 1fr 1fr;
      }


    </style>
@endsection