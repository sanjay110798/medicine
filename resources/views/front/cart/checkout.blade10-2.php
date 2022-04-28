@extends('layouts.front.app')
@section('content')

<?php 
  $total=$cart->sum('price');
?>


<div class="container">
  <div class="title">
      <h2>Product Order Form</h2>
  </div>
<form action="{{route('make.order')}}" method="post">
@csrf
<div class="row mb-5">

  <div class="col-md-8">
    <input type="hidden" name="p_img" value="{{implode(',',$p_img)}}">
    <input type="hidden" name="total" value="{{$total}}">
    <div class="row">
      <div class="col-md-12">
        <label class="form-group">
      <span class="fname">Name <span class="required">*</span></span></label>
      <input type="text" name="name" class="form-control" required>
    
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
         <label class="form-group">
      <span>Company Name (Optional)</span></label>
      <input type="text" name="cn" class="form-control">
    
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
       <label class="form-group">
      <span>Country <span class="required">*</span></span></label> 
      <select class="form-control" name="country" id="country" required>
        <option value="">Select</option>
        @foreach($country as $cn)
        <option value="{{$cn->id}}">{{$cn->country_name}}</option>
        @endforeach
      </select>
    
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label class="form-group">
      <span>Street Address <span class="required">*</span></span></label>
      <input type="text" name="houseadd" placeholder="House number and street name" class="form-control" required>
    
      </div>
    </div>

    
    <div class="row">
      <div class="col-md-12">
         <label class="form-group">
      <span>State / County <span class="required">*</span></span></label>
      <select class="form-control" name="state" id="state" required>
        
      </select>
    
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
         <label class="form-group">
      <span>Town / City <span class="required">*</span></span></label>
      <select class="form-control" name="city" id="city" required>
        
      </select>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label class="form-group">
      <span>Postcode / ZIP <span class="required">*</span></span> </label>
      <select class="form-control" name="pincode" required>
        <option value="">Select</option>
        @foreach($pincode as $pin)
        <option value="{{$pin->pincode}}">{{$pin->pincode}}({{$pin->location}})</option>
        @endforeach
      </select> 
   
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <label class="form-group">
      <span>Phone <span class="required">*</span></span></label>
      <input type="tel" name="phone" class="form-control" required> 
    
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
         <label class="form-group">
      <span>Email Address <span class="required">*</span></span></label>
      <input type="email" name="email" class="form-control" required> 
    
      </div>
    </div>
    
  </div>
  <div class="col-md-4">
     <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Your order</th>
      </tr>
      @foreach($cart as $val)
        @php
        $img=App\Model\ProductImage::where(['product_id'=>$val->product_id])->get();
        $product=App\Model\Product::where(['id'=>$val->product_id])->first();
        @endphp
      <tr>
        <td>{{$product->product_name}} x {{$val->quantity}}(Qty)</td>
        <td>₹{{$val->price}}</td>
      </tr>
      @endforeach
      <tr>
        <td>Subtotal</td>
        <td>₹{{$total}}</td>
      </tr>
      <tr>
        <td>Shipping</td>
        <td>Free</td>
      </tr>
    </table><br>
    
    <div>
      <input type="radio" name="dbt" value="cod" checked> Cash on Delivery
    </div>
   
    <button type="submit" class="bttn"> Place Order</button>
  </div><!-- Yorder --> 
  </div>
  

 </div>
  </form>
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
</style>
@endsection