@extends('layouts.front.app')
@section('content')

<div class="container">
  <div class="title">
      <h2>Delivery Subscription</h2>
  </div>
<form  id="" action="{{route('set.interval')}}" method="post">
@csrf
<div class="row mb-5">
 <input type="hidden" name="order_id" value="{{$order_id}}">
  <div class="col-md-12">
    
    <div class="row">
         <div class="col-md-12">
          <div class="pp">
            <p class="text-left" style="display: inline-block;">One Time Order</p>
            <p style="display: inline-block;float: right;"><input type="radio" name="order_type" value="0" id="onetime" checked></p>
          </div>
           
         </div> 
         <div class="col-md-12 mt-2">
          <div class="pp">
           <p class="text-left" style="display: inline-block;">Custome Intervel</p>
           <p style="display: inline-block;float: right;"><input type="radio" name="order_type" value="1" id="custom"></p>
           <div class="row">
             <div class="col-md-12">
               <label class="form-group">Repeat Every </label><input type="text" id="cus_input" class="tx" name="duration" placeholder="Enter Days" minimum="15" maximum="99"  maxlength="2" class=""> Days   ..( Interval should be between 15 to 99 Days)
             </div>
           </div>
         </div>
         </div> 
         <div class="col-md-4 text-right">
          <button type="submit" class="bttn"> Continue</button>
         </div> 
    </div>
    
  </div>
 </div>
  </form>
</div>
<!-- ///////// -->


<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

.Yorder{
  flex: 2;
}
.tx{
  border: none;
    border-bottom: 1px solid #ddd;
    margin-left: 9px;
    padding: 5px;
}
.pp{
  padding: 9px;
    background: aliceblue;
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