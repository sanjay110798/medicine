<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medicine | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <<!-- link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('layouts.admin.partial.header')
    @include('layouts.admin.partial.sidebar')

    @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
  <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin/dist/js/demo.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>

  <script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
  <!-- Toastr -->
  <script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>

  <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
</body>
</html>
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
@yield('js-content')
<script>
  $(document).ready(function() {    
    $(".my-activity").click(function(event) {
      var total = 0;

      $("#prodtprice").find("option:selected").each(function(){
        total += parseInt($(this).data("price"));
      });

      if (total == 0) {
        $('#total_price').val(0);
      } else {        
        $('#total_price').val(total);
      }
    });
  }); 
</script>
<script>

  function getRowProduct(){
    var ord=$('#orderID').val();
    $.ajax({
      url:'{{route("get.product.list")}}',
      type:'get',
      data:{ord:ord,_token: '{{csrf_token()}}'},

      success: function(data){
      // alert(data);
      $("#import_2").html(data);
      var sum = 0;
      $(".amount").each(function(){
        sum += +$(this).val();
      });
      $("#tot_sal").val(sum);
    }

  });

    setTimeout(getRowProduct, 2000);
  }

  getRowProduct();
  $(document).ready(function  () {

 ///////////////////////////////
 $("#user_id").on('change' , function(){
  var user = $("#user_id").val(); 
  if(user=='creat_us')
  {
    $('#addUs').modal('show');
  }else{
    $('#address').val('');
    $.ajax({
      url:'{{route("get.user.details")}}',
      type:'get',
      dataType: 'json',
      data:{user:user},

      success: function(data){

       var result = data;
       console.log(data);
       if (result.found==1){
         $('#address').val(result.address);
       }else{
        $('#addAddress').modal({
          backdrop: 'static',
          keyboard: false
        }); 

        $('#s_user_id').val(result.id);
        $('#s_b_name').val(result.name);
        $('#s_b_phone').val(result.phone);
        $('#s_b_email').val(result.email);
      }
    }

  });
  }
});
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
  //////////////////////
  $("#billing_city").on('change', function(){

    var city = $(this).find(':selected').data('name'); 
         // alert(city);
         $.ajax({
          url:'{{route("get.pincode")}}',
          type:'post',
          data:{city:city,_token: '{{csrf_token()}}'},

          success: function(data){
            $('#billing_pincode').html(data);
          }

        });


       });
  $("#billing_country").on('change', function(){
        // alert("hi");
        var cntry = $("#billing_country").val(); 

        $.ajax({
          url:'{{route("get.state")}}',
          type:'post',
          data:{country:cntry,_token: '{{csrf_token()}}'},

          success: function(data){
            $('#billing_state').html(data);
          }

        });
        

      });
  $("#billing_state").on('change', function(){
        // alert("hi");
        var state = $("#billing_state").val(); 

        $.ajax({
          url:'{{route("get.city")}}',
          type:'post',
          data:{state:state,_token: '{{csrf_token()}}'},

          success: function(data){
            $('#billing_city').html(data);
          }

        });
        

      });

});
  $('#barcode').on('keyup',function(){
    var pro=$('#barcode').val();
    var ord=$('#orderID').val();

    if(this.value.length==15 && !event.ctrlKey)
    {
     $.ajax({
      url:'{{route("get.product.details")}}',
      type:'get',
      data:{pro:pro,ord:ord,_token: '{{csrf_token()}}'},

      success: function(data){

        $('#barcode').val('');

      }

    });
   }

 });

$('#remov').on('click',function(){
  $.ajax({
      url:'{{route("remove.ordertemp")}}',
      type:'get',
      data:{},

      success: function(data){

      }

    });
})

  $('.container').on('keyup','.quantity',function(){

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[1];
    var quantity=this.value;
    var rate=$('#price_'+deleteindex).val();
    $.ajax({
      url:'{{route("get.total")}}',
      type:'get',
      data:{quantity:quantity,rate:rate,id:deleteindex},

      success: function(data){
        if(data)
        {
          var sum = 0;
          $(".amount").each(function(){
            sum += +$(this).val();
          });

          $("#tot_sal").val(sum);

        }
      }

    });


  });

  $('.container').on('click','.remove',function(){

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[1];
             
      $.ajax({
      url:'{{route("remove.temp.order")}}',
      type:'get',
      data:{id:deleteindex},

      success: function(data){
            var sum = 0;
            $(".amount").each(function(){
              sum += +$(this).val();
            });
            
            $("#tot_sal").val(sum);
      }

      });

          }); 
        </script>
        <script>

          $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
          $(document).ready(function  () {
            $(".blockcheckbox").on('click', function(){

              var id = $(this).data("id");  

              $.ajax({
                url:'{{route("admin.user.changestatus")}}',
                type:'post',
                data:{id:id,_token: '{{csrf_token()}}'},
                success: function(data){
                 location.reload();
               }

             });


            });
  /////////////////
  $("#cat_id").on('change',function(){
    var id = $("#cat_id").val();
    $.ajax({
      url:"{{ route('admin.get.sub_category') }}",
      data: { "_token":"{{csrf_token()}}", id:id},
      method: 'POST',
      success:function(data){
        $("#sub_cat_id").html(data);
      }
    });

  });


  ////////////////////
  $(".pincodecheckbox").on('click', function(){

    var id = $(this).data("id");  

    $.ajax({
      url:'{{route("admin.pincode.changestatus")}}',
      type:'post',
      data:{id:id,_token: '{{csrf_token()}}'},
      success: function(data){
       location.reload();
     }
     
   });


  });
  $(".productcheckbox").on('click', function(){

    var id = $(this).data("id");  

    $.ajax({
      url:'{{route("admin.product.changestatus")}}',
      type:'post',
      data:{id:id,_token: '{{csrf_token()}}'},
      success: function(data){
       location.reload();
     }
     
   });


  });

});
</script>
<script>
  $(document).ready(function(){
    $('.order_st').change(function(){

     var id = this.id;

     var status=$(this).val();
     
     $('#OrdSts').val(status);
     $('#OrdId').val(id);

     $('#orderStatus').modal({
      show: true
    }); 
     // alert(id);

     // alert(status);


   });
  });
</script>
<?php
$lst=[];
$sunOrd=$monOrd=$tueOrd=$wedOrd=$thuOrd=$friOrd=$satOrd=[];

$ordd=App\Model\Order::select('total_price','created_at')->whereMonth('created_at', date('m'))
->whereYear('created_at', date('Y'))->get();
foreach($ordd as $od)
{
  $dt1 = strtotime($od->created_at);
  $dt2 = date("l", $dt1);
  $dt3 = strtolower($dt2);

   if($dt3 == "sunday")
  {
    $sunOrd[]=$od;
  }else if($dt3 == "monday")
  {
    $monOrd[]=$od;
  }else if($dt3 == "tuesday")
  {
    $tueOrd[]=$od;
  }else if($dt3 == "wednesday")
  {
    $wedOrd[]=$od;
  }else if($dt3 == "thursday")
  {
    $thuOrd[]=$od;
  }else if($dt3 == "friday")
  {
    $friOrd[]=$od;
  }else if($dt3 == "saturday")
  {
    $satOrd[]=$od;
  }
}

$st=$mt=$tt=$wt=$tht=$ft=$sst=0;
if(count($sunOrd)>0)
{
  foreach($sunOrd as $sn)
  {
  $st+=$sn->total_price;
  }
  $lst[]=$st;
}else{
 $lst[]=0;
}

if(count($monOrd)>0)
{
  foreach($monOrd as $mn)
  {
  $mt+=$mn->total_price;
  }
  $lst[]=$mt;

}else{
 $lst[]=0;
}

if(count($tueOrd)>0)
{
  foreach($tueOrd as $tu)
  {
  $tt+=$tu->total_price;
  }
  $lst[]=$tt;
 
}else{
 $lst[]=0;
}

if(count($wedOrd)>0)
{
  foreach($wedOrd as $we)
  {
  $wt+=$we->total_price;
  }
 $lst[]=$wt;
}else{
 $lst[]=0;
}

if(count($thuOrd)>0)
{
  foreach($thuOrd as $th)
  {
  $tht+=$th->total_price;
  }
 $lst[]=$tht;
}else{
 $lst[]=0;
}

if(count($friOrd)>0)
{
  foreach($friOrd as $fr)
  {
  $ft+=$fr->total_price;
  }
 $lst[]=$ft;
}else{
 $lst[]=0;
}

if(count($satOrd)>0)
{
  foreach($satOrd as $ss)
  {
  $sst+=$ss->total_price;
  }
 $lst[]=$sst;
}else{
 $lst[]=0;
}
$l=implode(",",$lst);
?>
<script>
  $(document).ready(function(){
    // Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels: ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
    datasets: [
      {
        label: 'Digital Goods',
        fill: false,
        borderWidth: 2,
        lineTension: 0,
        spanGaps: true,
        borderColor: '#efefef',
        pointRadius: 3,
        pointHoverRadius: 7,
        pointColor: '#efefef',
        pointBackgroundColor: '#efefef',
        data: [{{$l}}]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: '#efefef'
        },
        gridLines: {
          display: false,
          color: '#efefef',
          drawBorder: false
        }
      }],
      yAxes: [{
        ticks: {
          stepSize: 5000,
          fontColor: '#efefef'
        },
        gridLines: {
          display: true,
          color: '#efefef',
          drawBorder: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesGraphChartData,
    options: salesGraphChartOptions
  })
});
</script>
@php
$lstt=[];
$janOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '01')
->whereYear('created_at', date('Y'))->get();
$febOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '02')
->whereYear('created_at', date('Y'))->get();
$mrcOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '03')
->whereYear('created_at', date('Y'))->get();
$aplOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '04')
->whereYear('created_at', date('Y'))->get();
$mayOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '05')
->whereYear('created_at', date('Y'))->get();
$junOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '06')
->whereYear('created_at', date('Y'))->get();
$jlyOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '07')
->whereYear('created_at', date('Y'))->get();

$augOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '08')
->whereYear('created_at', date('Y'))->get();
$sepOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '09')
->whereYear('created_at', date('Y'))->get();
$octOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '10')
->whereYear('created_at', date('Y'))->get();
$novOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '11')
->whereYear('created_at', date('Y'))->get();
$decOrd=App\Model\Order::select('total_price')->whereMonth('created_at', '12')
->whereYear('created_at', date('Y'))->get();


$lstt[]=$janOrd->sum('total_price');
$lstt[]=$febOrd->sum('total_price');
$lstt[]=$mrcOrd->sum('total_price');
$lstt[]=$aplOrd->sum('total_price');
$lstt[]=$mayOrd->sum('total_price');
$lstt[]=$junOrd->sum('total_price');
$lstt[]=$jlyOrd->sum('total_price');
$lstt[]=$augOrd->sum('total_price');
$lstt[]=$sepOrd->sum('total_price');
$lstt[]=$octOrd->sum('total_price');
$lstt[]=$novOrd->sum('total_price');
$lstt[]=$decOrd->sum('total_price');

$ll=implode(",",$lstt);
@endphp
<script>
  $(document).ready(function(){
  var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Aug','Sept','Oct','Nov','Dec'],
    datasets: [
      {
        label: 'Electronics',
        backgroundColor: 'rgba(210, 214, 222, 1)',
        borderColor: 'rgba(210, 214, 222, 1)',
        pointRadius: false,
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [{{$ll}}]
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })
});
</script>