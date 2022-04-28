@extends('layouts.front.app')
@section('content')
<main class="main-section">

	<section class="login-main-wrapper">
      <div class="main-container">
          <div class="login-process">
              <div class="login-main-container">
                  <div class="thankyou-wrapper">
                      <h1><img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" alt="thanks" /></h1>
                        <p>Your Order Placed Successfully</p>
                        <a href="{{route('product.page')}}">Continue Shopping</a>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>
</main>
<style>
.thankyou-wrapper{
  width:100%;
  height:auto;
  margin:auto;
  background:#ffffff; 
  padding:10px 0px 50px;
}
.thankyou-wrapper img{
  width:50%;
  
}
.thankyou-wrapper h1{
  font:100px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:0px 10px 10px;
}
.thankyou-wrapper p{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:5px 10px 10px;
}
.thankyou-wrapper a{
  font: 26px Arial, Helvetica, sans-serif;
    text-align: center;
    color: #ffffff;
    display: block;
    text-decoration: none;
    width: 252px;
    background: #42dbef;
    margin: 10px auto 0px;
    padding: 9px 4px 7px;
    border-bottom: 5px solid #F96700;
}
.thankyou-wrapper a:hover{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width: 252px;
  background:#F96700;
  margin:10px auto 0px;
  padding: 9px 4px 7px;
  border-bottom:5px solid #42dbef;
}
</style>

@endsection