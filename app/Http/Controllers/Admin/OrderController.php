<?php

namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

use date;

use App\Model\Product;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\ProductImage;

use App\Model\Category;

use App\Model\Brand;

use Illuminate\Support\Str;

class OrderController extends Controller

{

     public function __construct()

     {

          $this->middleware('auth');

     }



     public function index()

     {

          $order=Order::orderBy('id','desc')->paginate(20);

          return view('admin.order.index',compact('order'));

     }



public function deleteOrder($id)

{

     $ord=Order::where(['id'=>$id])->delete();
     OrderProduct::where(['order_id'=>$id])->delete();
     


     return redirect()->back()->with(["warning" => "Order Deleted Successfully!!"]);

}


public function statusChange(Request $request)
{

     $ord=Order::where(['id'=>$request->bill_id])->first();

     if($request->status=='0')
     {

          $ord->status='0';
          $ord->first_comment=($request->comment) ? $request->comment : '';
          $ord->save();

     }elseif($request->status=='1'){

          $ord->status='1';
          $ord->second_comment=($request->comment) ? $request->comment : '';
          $ord->save();

     }elseif($request->status=='2'){

         $ord->status='2';
         $ord->third_comment=($request->comment) ? $request->comment : '';
         $ord->save();

     }else{

          $ord->status='3';
          $ord->four_comment=($request->comment) ? $request->comment : '';
          $ord->save();

     }
     return redirect()->back()->with(["success" => "Order Status Changed Successfully!!"]);

}


}