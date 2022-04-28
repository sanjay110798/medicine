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

use App\Model\ProductImage;

use App\Model\Category;

use App\Model\Country;

use App\Model\Pincode;

use App\Model\Brand;

use Illuminate\Support\Str;

use App\User;

use App\Model\Order;

use App\Model\OrderProduct;

use App\Model\ShippingAddress;

use App\Model\OrderTemp;

class SelfOrderController extends Controller

{

 public function __construct()

 {

  $this->middleware('auth');

}




public function add()
{
 $country=Country::get();
 $pincode=Pincode::get();
 $product=Product::get();
 return view('admin.selforder.add',compact('product','pincode','country'));
}
public function getUser(Request $request)
{
    $det=[];
    $user=User::where(['id'=>$request->user])->first();
    // echo json_encode($user);
    // exit;
    if($user)
    {
     $ship=ShippingAddress::where(['user_id'=>$user->id,'default'=>'1'])->first();
     if($ship)
     {
        $det=[
            'found'=>1,
            'address'=>$ship->billing_address,
        ];
    }else{
        $det=[
            'found'=>0,
            'id'=>$user->id,
            'name'=>$user->name,
            'phone'=>$user->mobile,
            'email'=>$user->email,

        ];
    }
   }

echo json_encode($det);
}
public function storeTempProduct(Request $request)
{
    $product=Product::where(['uni_code'=>$request->pro])->first();
    if($product->discount_type=='' || $product->discount_type=='NaN')

    {
        $pr=$product->mrp;
    }

    else
    {
        if($product->discount_type=='Fixed')
        {
            $pr=$product->discount_value;
        }else {
            $pr=($product->mrp * $product->discount_value)/100;
        }


    }

    $checkOrder=OrderTemp::where(['product_id'=>$product->id])->first();
    if(!$checkOrder)
    {
        OrderTemp::create([
         'order_id'=>$request->ord,
         'product_id'=>$product->id,
         'price'=>$pr,
         'qty'=>'1',
         'total_price'=>$pr,
         'created_at'=>date('Y-m-d H:i:s'),
         'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }else{
        $qt=$checkOrder->qty+1;
        $tp=$checkOrder->total_price+$pr;
        
        $checkOrder->qty=$qt;
        $checkOrder->total_price=$tp;
        $checkOrder->save();

    }
}
public function getProduct(Request $request)
{
    $checkOrder=OrderTemp::get();
    $html='';
    foreach($checkOrder as $ch)
    {
             $product=Product::where(['id'=>$ch->product_id])->first();
             if($product->discount_type=='' || $product->discount_type=='NaN')

             {
                $pr=$product->mrp;
            }

            else
            {
                if($product->discount_type=='Fixed')
                {
                    $pr=$product->discount_value;
                }else {
                    $pr=($product->mrp * $product->discount_value)/100;
                }


            }
           
            $html.='<div class="row element" id="div_'.$ch->id.'">
            <div class="col-md-6 pt-2">
            <input type="text" class="form-control" list="unit" name="product[]" placeholder="Product Name" value="'.$product->product_name.'" readonly>
            <input type="hidden" name="product_id[]" value="'.$product->id.'">
            </div>
            <div class="col-md-2 pt-2">
            <input type="text" class="form-control" list="unit" placeholder="Price" name="price[]" id="price_'.$ch->id.'" value="'.$pr.'" readonly>
            </div>
            <div class="col-md-1 pt-2">
            <input type="number" class="form-control quantity" name="qty[]" value="'.$ch->qty.'" id="qyt_'.$ch->id.'" placeholder="Qty">
            </div>
            <div class="col-md-2 pt-2">
            <input type="text" class="form-control amount" id="amount_'.$ch->id.'"  placeholder="0.00" value="'.$ch->total_price.'" name="total_price[]" readonly>
            </div>
            <div class="col-md-1 pt-2">
            <i class="fa fa-trash-o remove" id="remove_'.$ch->id.'" style="color:red;cursor:pointer"></i>
            </div>

            </div>';
    }
    
    echo $html;
}
public function getTotal(Request $request)
{
 $checkOrder=OrderTemp::where(['id'=>$request->id])->first();
 $qty=$request->quantity;
 $rate=$request->rate;
 $tot=$qty * $rate;
$checkOrder->qty=$qty;
$checkOrder->total_price=$tot;
$checkOrder->save();
 // echo $tot; 

}
public function insertUser(Request $request)
{
    $validator = Validator::make($request->all(), [

        'name' => 'required',

        'email' => 'required|unique:users,email',


    ]);





    if ($validator->fails()) {

        return back()->with(['error'=>"Something Went Wrong"])->withInput();

    }
    $user=User::create([
        'name'=>$request->name,

        'email'=>$request->email,

        'role_id'=>'4',

        'password'=>Hash::make($request->password),

        'mobile'=>$request->phone,

        'created_at'=>date('Y-m-d H:i:s'),

        'updated_at'=>date('Y-m-d H:i:s'),
    ]);

    $save=ShippingAddress::create([
        'user_id'=>$user->id, 
        'billing_name'=>($request->billing_name) ? $request->billing_name : '',
        'billing_company_name'=>($request->billing_cm_name) ? $request->billing_cm_name : '',
        'billing_country'=>($request->country) ? $request->country : '0',
        'billing_state'=>($request->state) ? $request->state : '0',
        'billing_city'=>($request->city) ? $request->city : '0',
        'billing_address'=>($request->billing_address) ? $request->billing_address : '',
        'billing_pincode'=>($request->pincode) ? $request->pincode : '',
        'billing_phone'=>($request->billing_phone) ? $request->billing_phone : '',
        'billing_email'=>($request->billing_email) ? $request->billing_email : '',
        'default'=>'1',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
    ]);

    return redirect()->back()->with('success','User Details Store Successfully!!');
}

public function insertUserAddress(Request $request)
{
    $save=ShippingAddress::create([
        'user_id'=>$request->user_id, 
        'billing_name'=>($request->billing_name) ? $request->billing_name : '',
        'billing_company_name'=>($request->billing_cm_name) ? $request->billing_cm_name : '',
        'billing_country'=>($request->country) ? $request->country : '0',
        'billing_state'=>($request->state) ? $request->state : '0',
        'billing_city'=>($request->city) ? $request->city : '0',
        'billing_address'=>($request->billing_address) ? $request->billing_address : '',
        'billing_pincode'=>($request->pincode) ? $request->pincode : '',
        'billing_phone'=>($request->billing_phone) ? $request->billing_phone : '',
        'billing_email'=>($request->billing_email) ? $request->billing_email : '',
        'default'=>'1',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
    ]);

    return redirect()->back()->with('success','User Address Store Successfully!!');
}
public function insert(Request $request)
{
  $validator = Validator::make($request->all(), [

    'bill_id' => 'required',
    'tot_sal' => 'required',
    
]);

  if ($validator->fails()) {

    return back()->with(['error'=>"Please Fill All The Details"]);

}

$checkuser=User::where(['id'=>$request->user_id])->first();
$ship=ShippingAddress::where(['user_id'=>$checkuser->id,'default'=>'1'])->first();


$order=Order::create([
  'bill_id'=>$request->bill_id,
  'user_id'=>$request->user_id,
  'total_price'=>$request->tot_sal,
  'prescription_image'=>($request->p_img) ? $request->p_img : '',
  'name'=>$ship->billing_name,
  'company_name'=>$ship->billing_company_name,
  'country'=>$ship->billing_country,
  'state'=>$ship->billing_state,
  'city'=>$ship->billing_city,
  'address'=>$ship->billing_address,
  'pincode'=>$ship->billing_pincode,
  'phone'=>$ship->billing_phone,
  'email'=>$ship->billing_email,
  'payment_type'=>'cod',
  'created_at'=>date('Y-m-d H:i:s'),
  'updated_at'=>date('Y-m-d H:i:s'),

]);

$product = $request->product;
$product_id = $request->product_id;
$quantity = $request->qty;
$price = $request->total_price;

for ($i=0, $n=count($product); $i < $n; $i++)
{

    if($product[$i] != '')
    {

        $productList=Product::where(['id'=>$product_id[$i]])->first();
        OrderProduct::create([
            'order_id'=>$order->id,
            'product_id'=>$product_id[$i],
            'quantity'=>$quantity[$i],
            'price'=>$price[$i],
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}

OrderTemp::truncate();

return redirect()->back()->with(["success" => "Order Placed Successfully!!"]);
}
public function removeOrder(Request $request)
{
    OrderTemp::where(['id'=>$request->id])->delete();
}
public function removeOrderTemp(Request $request)
{
    OrderTemp::truncate();
}




}