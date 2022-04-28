@extends('layouts.front.app')
@section('content')

<?php 
$total=$cart->sum('price');
?>
<main id="cart" style="max-width:960px">

  <h1 style="font-size: 1.5rem;color: #3cd9ee;">Your Saved Prescription</h1>
  <hr>
  <div class="container-fluid" style="margin-top: 2.5rem!important;">
    <div class="row align-items-start">
     <div class="col-12 col-sm-8 items text-right mb-4">
      <a href="#0" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadPre">Upload Prescription</a>

      <div class="modal fade" id="uploadPre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Upload Prescription</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{route('upload.pre.image')}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
             <div class="row">
               <div class="col-12 text-left">
                <label class="form-group">Prescription*</label>
                <input type="file" name="prescription_img" class="form-control" multiple required>    
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

    </div>

    <div class="col-12 col-sm-8 items">
     <form action="{{route('submit.pre.form')}}" method="post" id="submitFrm">
      @csrf
      @if(count($pre)>0)
      @foreach($pre as $val)

      <div class="cartItem row align-items-start">
        <div class="col-3 mb-2">
          <img class="" src="{{asset('upload/prescription/'.$val->image)}}" alt="art image" style="width: 57%;height: 100px;">
        </div>
        <div class="col-8 mb-2">
         <input type="checkbox" name="preimg[]" value="{{$val->image}}">
       </div>
       <div class="col-1">
        <a href="{{route('preimg.delete',['id'=>$val->id])}}"><i class="fa fa-times" style="color:red;"></i></a>
      </div>

    </div>
    <hr>
    @endforeach
    @else
    <p>No Image Found Please Upload First!!</p>
    @endif
  </form>
  </div>
  <div class="col-12 col-sm-4 p-3 proceed form">
    <div class="row m-0">
      <div class="col-sm-8 p-0">
        <h6>Subtotal</h6>
      </div>
      <div class="col-sm-4 p-0">
        <p id="subtotal">₹{{$total}}</p>
      </div>
    </div>

    <hr>
    <div class="row mx-0 mb-5">
      <div class="col-sm-8 p-0 d-inline">
        <h5>Total</h5>
      </div>
      <div class="col-sm-4 p-0">
        <p id="total">₹{{$total}}</p>
      </div>
    </div>
    <div class="row mx-0 justify-content-center">

     @if($total!=0)
     @php
     $p='N';
     @endphp
     
     <button type="button" id="cbb" class="shopnow"><span>Continue</span></button>

     @endif
   </div>
 </div>
</div>
</div>
</div>
</main>
<style type="text/css">
	#cart {
    max-width: 1440px;
    padding-top: 60px;
    margin: auto;
  }
  .form div {
    margin-bottom: 0.4em;
  }
  .cartItem {
    --bs-gutter-x: 1.5rem;
  }
  .cartItemQuantity,
  .proceed {
    background: #f4f4f4;
  }
  .items {
    padding-right: 30px;
  }
  #btn-checkout {
    width: 100%;
    text-align: center;
  }

/* stasysiia.com */
@import url("https://fonts.googleapis.com/css2?family=Exo&display=swap");

a {
  color: #0e1111;
  text-decoration: none;
}
.btn-check:focus + .btn-primary,
.btn-primary:focus {
  color: #fff;
  background-color: #111;
  border-color: transparent;
  box-shadow: 0 0 0 0.25rem rgb(49 132 253 / 50%);
}
button:hover,
.btn:hover {
  box-shadow: 5px 5px 7px #c8c8c8, -5px -5px 7px white;
}
button:active {
  box-shadow: 2px 2px 2px #c8c8c8, -2px -2px 2px white;
}

/*PREVENT BROWSER SELECTION*/
a:focus,
button:focus,
input:focus,
textarea:focus {
  outline: none;
}
/*main*/

/*h1 {
  font-size: 2.4em;
  font-weight: 600;
  letter-spacing: 0.15rem;
  text-align: center;
  margin: 30px 6px;
}
h2 {
  color: rgb(37, 44, 54);
  font-weight: 700;
  font-size: 2.5em;
}
h3 {
  border-bottom: solid 2px #000;
}
h5 {
  padding: 0;
  font-weight: bold;
  color: #92afcc;
}
p {
  color: #333;
  font-family: "Roboto", sans-serif;
  margin: 0.6em 0;
}
h1,
h2,
h4 {
  text-align: center;
  padding-top: 16px;
}*/
/* yukito bloody */
.back {
  position: relative;
  top: -30px;
  font-size: 16px;
  margin: 10px 10px 3px 15px;
}
.inline {
  display: inline-block;
}

.shopnow,
.contact2 {
  background-color: #3cd9ee;
  padding: 5px 13px;
  font-size: 20px;
  color: white;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.5s;
  cursor: pointer;
  /* margin: 4px auto; */
  border: 1px solid #fff;
}

/* for button animation*/
.shopnow span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: all 0.5s;
}

.shopnow:hover span {
  padding-right: 25px;
}
.shopnow:hover span:after {
  opacity: 1;
  top: 2px;
  right: -6px;
}
.ma {
  margin: auto;
}
.price {
  color: slategrey;
  font-size: 2em;
}
#mycart {
  min-width: 90px;
}
#cartItems {
  font-size: 17px;
}
#product .container .row .pr4 {
  padding-right: 15px;
}
#product .container .row .pl4 {
  padding-left: 15px;
}
</style>


<style type="text/css">

	.cart_section .cart_section_right .cart_procees {

		width: 100%;

		background-color: #80b82d;

		padding: 18px 17px;

		font-size: 22px;

		color: #fff;

		font-weight: 700;

		text-align: left;

		border-radius: 3px;

		border-radius: 0 0 3px 3px;

		display: block;

		box-sizing: border-box;

		border-color: cornsilk;

	</style>

<style type="text/css">
  
</style>

	@endsection	

	@section('js-content')


	@endsection