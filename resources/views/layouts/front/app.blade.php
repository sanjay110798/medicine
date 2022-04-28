<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1">
<meta name="author" content="" />
<meta name="robots" content="index, follow" >
<meta content="" name="keywords">
<meta name="description" content="">

<title>Medi-Store</title>

<!-- Roboto Font Link -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700" rel="stylesheet"> 





<!-- bootstrap min Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />





<script src="{{asset('assets/js/popper.min.js')}}"></script>




<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>





<!-- Jquery Min Js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>




<!-- Jquery Min Js -->
<script src="{{asset('assets/js/jquery.slim.min.js')}}"></script>





<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



<!-- Style Css -->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />


<!-- Style Css -->
<link href="{{asset('assets/css/slick.css')}}" rel="stylesheet" type="text/css" />



<!-- Jquery Min Js -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>


  <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">

</head>

<body>


@include('layouts.front.partial.header')

@yield('content')

@include('layouts.front.partial.footer')


<div class="modal fade" id="addMoneyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><img src="https://lh3.googleusercontent.com/ohLHGNvMvQjOcmRpL4rjS3YQlcpO0D_80jJpJ-QA7-fQln9p3n7BAnqu3mxQ6kI4Sw" alt="wallet" style="width: 29px;"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="{{route('user.wallet.req.add')}}">
            @csrf
            <div class="modal-body">
              <div class="row">
                <marquee width="100%" direction="left" height="25px">Amount Will Be Add After Admin Approved</marquee>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="col-md-12">
                  <label class="form-group">Remarks</label>
                  <input type="text" name="remarks" class="form-control">
                </div>
                <div class="col-md-12">
                  <label class="form-group">Amount</label>
                  <input type="text" name="amount" class="form-control" required>
                </div>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Request</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script> -->
<!-- Slick Js -->
<script src="{{asset('assets/js/slick.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
@if(Session::has('success'))
<script>
toastr.success("{{Session::get('success')}}")
</script>
@endif
@if(Session::has('error'))
<script>
toastr.error("{{Session::get('error')}}")
</script>
@endif
@if(Session::has('warning'))
<script>
toastr.warning("{{Session::get('warning')}}")
</script>
@endif


<script>
$(document).ready(function(){
  $("#checkoutform").validate();
      $(".src").keyup(function(){
       //var dep = [];
       var dep = $("#search").val();
       $.ajax({
        url:"{{ route('home.search') }}",
            data: { "_token":"{{csrf_token()}}", dep:dep},
            method: 'POST',
       success:function(data){
          $("#myUL").html(data);   
       }
     });
     return false;
     
    
   });
});  
 $(document).ready(function  () {
  $("#sendotp").on('click', function(){
        // alert("hi");
        var email = $("#mobile").val();  
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(email=='')
        {
         toastr.error("Enter Email Address");
        }else if(!regex.test(email)){
         toastr.error("Email Address Not Valid!!");
        }else{
            $.ajax({
            url:'{{route("sendotp")}}',
            type:'post',
            data:{email:email,_token: '{{csrf_token()}}'},
            success: function(data){
            if(data==0)
            {
            	toastr.error("User Not Found!!");
              var url = '{{ route("signup",["email"=>":mobile"])}}';
              url = url.replace('%3Amobile', email);
              window.location.href = url;
            }else{
              toastr.success("Otp Send Successfully!!");
              var url = '{{ route("otp.page",["email"=>":mobile"]) }}';
              url = url.replace('%3Amobile', email);
            	window.location.href = url;
            }
            }
     
          });
        }

    });
  $("#checkotp").on('click', function(){
        // alert("hi");
        var email = $("#mobileval").val(); 
        var otp = $('#otp').val(); 
        if(otp=='')
        {
        toastr.error("Enter Otp!!");
        }else{

            $.ajax({
            url:'{{route("checkotp")}}',
            type:'post',
            data:{email:email,otp:otp,_token: '{{csrf_token()}}'},
            
            success: function(data){

            if(data==0)
            {
            	toastr.error("Otp Not Match!!");
            }else{
            	window.location.href = "{{ route('user.profile')}}";
            }
            }
     
          });
        }

    });
  ///////////////////////////////
  $("#country").on('change', function(){
        // alert("hi");
        var cntry = $("#country").val(); 

            $.ajax({
            url:'{{route("get.state")}}',
            type:'post',
            data:{country:cntry,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#state').html(data);
            }
     
          });
        

    });
  ///////////////////////
   $(".country").on('change', function(){
        // alert("hi");
        var cntry = $(this).val(); 
        var id = $(this).data('id'); 
            $.ajax({
            url:'{{route("get.state")}}',
            type:'post',
            data:{country:cntry,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#state'+id).html(data);
            }
     
          });
        

    });
   ////////////////
  $("#state").on('change', function(){
        // alert("hi");
        var state = $("#state").val(); 

            $.ajax({
            url:'{{route("get.city")}}',
            type:'post',
            data:{state:state,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#city').html(data);
            }
     
          });
        

    });
  ///////////////////
  $(".state").on('change', function(){
        // alert("hi");
        var state = $(this).val();
        var id = $(this).data('id'); 
            $.ajax({
            url:'{{route("get.city")}}',
            type:'post',
            data:{state:state,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#city'+id).html(data);
            }
     
          });
        

    });
  /////////
   $("#city").on('change', function(){
        
        var city = $(this).find(':selected').data('name'); 
         // alert(city);
            $.ajax({
            url:'{{route("get.pincode")}}',
            type:'post',
            data:{city:city,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#pincode').html(data);
            }
     
          });
        

    });
   //////////////
    $(".city").on('change', function(){
        
        var city = $(this).find(':selected').data('name'); 
        var id = $(this).data('id'); 
            $.ajax({
            url:'{{route("get.pincode")}}',
            type:'post',
            data:{city:city,_token: '{{csrf_token()}}'},
            
            success: function(data){
              $('#pincode'+id).html(data);
            }
     
          });
        

    });
  /////////////////////////////////
  $(".checkpincode").on('click', function(){
        var id=$(this).data('id');
        var pincode = $("#pincode_"+id).val();  
        // alert(pincode);
            $.ajax({
            url:'{{route("checkpincode")}}',
            type:'get',
            data:{pincode:pincode},
            success: function(data){
            if(data==0)
            {
           
              $('#msg_'+id).text("Delivery Not Possible This Pincode!!").removeClass("succ").addClass("err");
              
            }else{
          
              $('#msg_'+id).text("Delivery Possible This Pincode!!").removeClass("err").addClass("succ");
              window.location.reload();
            }
            }
     
          });
        

    });
});
</script>
  <script>
    $(document).ready(function(){
      $('#cbb').click(function(){
       if($('[name="preimg[]"]:checked').length > 0)
       {
        $('#submitFrm').submit();
       }else{
        toastr.error("Please Choose Image")
       }
      });
      //////////////
      $('#makeOrd').click(function(){
       if($('[name="delivery_add"]:checked').length > 0)
       {
        $('#checkoutform').submit();
       }else{
        toastr.error("Please Choose Shipping Address or Add");
       }
      });
      //////////////
      $('#custom').click(function(){
      $("#cus_input").attr("required", true);
      });
      $('#onetime').click(function(){
      $("#cus_input").attr("required", false);
      });
    })
  </script>

<style type="text/css">
  .err{
    color: red;
    padding: 0px 0px 6px 0;
    /*text-shadow: 1px -1px 0px #3cd9ee;*/
    text-align: left;
}

  .succ{
    color: green;
    padding: 0px 0px 6px 0;
    /*text-shadow: 1px -1px 0px #3cd9ee;*/
    text-align: left;
}

  #myUL
  {
    list-style-type: none;
    padding: 0;
    margin: 0;
    position: absolute;
    top: 47px;
    left: 0;
    height: auto;
    overflow-x: hidden;
    overflow-y: auto;
    z-index: 1;
    width: 100%;
  }
  #myUL li
  {
    background-color: #4adcf0;
    padding: 10px;
    text-decoration: none;
    font-size: 13px;
    color: black;
    width: 366px;
    height: 34px;
    position: relative;
    top: 0px;
    left: 13px;
    border-bottom: 1px solid #d4cece;
    width: 100%;
  }
  #myUL li span a{
    color: #fff;
  }
</style>
</body>
</html>
