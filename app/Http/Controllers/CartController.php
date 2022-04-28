<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Model\Otp;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Benefit;
use App\Model\Slider;
use App\Model\Product;
use App\Model\Cart;
use App\Model\PrescriptionImage;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Pincode;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\ShippingAddress;
use App\Model\Del_interval;
use Mail;
use Illuminate\Support\Facades\File;
class CartController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {



    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {
    session()->forget('img');

     if(Auth::user()=='')

     {

         $cart=Cart::select()->where(['user_id'=>session()->get('session_id')])->orderBy('id','desc')->get();

     }

     else

     {

        $cart=Cart::select()->where(['user_id'=>Auth::user()->id])->orderBy('id','desc')->get();

    }
    $slider=Slider::where(['slider_position'=>'home'])->orderBy('id','desc')->get();
    return view('front.cart.index',compact('cart','slider'));

}
public function deleteCart($id)
{
 Cart::where(['id'=>$id])->delete();
 return redirect()->back()->with('warning','Cart Item Deleted Successfully');
}
public function buyProduct($p_id)
{
  $var=Product::select()->where(['id'=>$p_id])->firstOrFail();

  if($var->discount_type=='' || $var->discount_type=='NaN')

  {
    $pr=$var->mrp;
}

else
{
 if($var->discount_type=='Fixed')
 {
    $pr=$var->discount_value;
}else {
    $pr=($var->mrp * $var->discount_value)/100;
}


}



$qnt=Cart::select()->where(['user_id'=>Auth::user()->id,'product_id'=>$p_id]);

$user_id=Auth::user()->id;



if($qnt->count()!=0){

    $updt=$qnt->firstOrFail();

    $quantity=$updt->quantity+1;

    $price=$quantity*$pr;

    $updt->update([

        'quantity'=>$quantity,

        'price'=>$price,

    ]);

}

if($qnt->count()==0)

{

    $quantity=1;

    $price=$quantity*$pr;

    $cart = Cart::create([


        'user_id'=>$user_id,

        'product_id'=>$p_id,

        'quantity'=>$quantity,

        'price'=>$price,

    ]);

    $cart->save();    

}
return redirect()->route('cart');
}
public function prescriptionChoose(Request $request)
{
     if(Auth::user()=='')

     {

         $cart=Cart::select()->where(['user_id'=>session()->get('session_id')])->orderBy('id','desc')->get();

     }

     else

     {

        $cart=Cart::select()->where(['user_id'=>Auth::user()->id])->orderBy('id','desc')->get();

    }
    $pre=PrescriptionImage::where(['user_id'=>Auth::id()])->orderBy('id','desc')->get();
    return view('front.cart.prescription',compact('pre','cart'));
}
public function preImgDel($id)
{
    
    $pre=PrescriptionImage::where(['id'=>$id])->first();
    unlink("upload/prescription/".$pre->image);
    $pre->delete();

    return redirect()->back()->with('warning','Image Deleted!!');
}
public function PreImage(Request $request)
{
        if ($request->hasFile('prescription_img')) {

        $image = $request->file('prescription_img');

        $img = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/upload/prescription/');

        $image->move($destinationPath, $img);

        }else{

        $img='';

        }


      $pre=PrescriptionImage::create([

        'user_id'=>Auth::id(),

        'image'=>$img,

     ]);

    $pre->save();

    return redirect()->back()->with('success','Image Uploaded Successfully!!');
}
public function submitPre(Request $request)
{
    $img=implode(',',$request->preimg);
    session()->put('img',$img);
    return redirect()->route('checkout');
}
public function checkoutProduct(Request $request)
{
    $p_img='';
    if(session()->get('img')!='')
    {
        $p_img=session()->get('img');
    }
    if(Auth::user()=='')

    {

     $cart=Cart::select()->where(['user_id'=>session()->get('session_id')])->orderBy('id','desc')->get();

    }

    else

    {

    $cart=Cart::select()->where(['user_id'=>Auth::user()->id])->orderBy('id','desc')->get();

    }
    $getAdd=ShippingAddress::where(['user_id'=>Auth::id()])->orderBy('id','desc')->get();
    $country=Country::get();
    $pincode=Pincode::get();
    return view('front.cart.checkout',compact('getAdd','p_img','cart','country','pincode'));
}


public function getState(Request $request)
{
    $html='';
    $html.='<option value="">Select</option>';
    $state=State::where(['country_id'=>$request->country])->get();
    foreach($state as $st)
    {
        $html.='<option value="'.$st->id.'">'.$st->state_name.'</option>';
    }
    echo $html;
}
public function getCity(Request $request)
{
    $html='';
    $html.='<option value="">Select</option>';
    $state=City::where(['state_id'=>$request->state])->get();
    foreach($state as $st)
    {
        $html.='<option value="'.$st->id.'" data-name="'.$st->city_name.'">'.$st->city_name.'</option>';
    }
    echo $html;
}
public function getPincode(Request $request)
{
    $html='';
    $html.='<option value="">Select</option>';
    $state=Pincode::where(['location'=>$request->city])->get();
    foreach($state as $st)
    {
        $html.='<option value="'.$st->pincode.'">'.$st->pincode.'</option>';
    }
    echo $html;
}
public function makeOrder(Request $request)
{
    // print_r($request->all());
    // exit;
    // $validator = Validator::make($request->all(), [

    //     'dbt' => 'required',
    //     'total' => 'required',
    //     'name' => 'required',
    //     // 'cn' => 'required',
    //     'country' => 'required',
    //     'houseadd' => 'required',
    //     'state' => 'required',
    //     'city' => 'required',
    //     'pincode' => 'required',
    //     'phone' => 'required',
    //     'email' => 'required',


    // ]);
    
    // if ($validator->fails()) {

    //     return redirect()->back()->with(['error'=>"Please Fill All The Details"]);

    // }
    $user=Auth::user();
    $ship=ShippingAddress::where(['id'=>$request->delivery_add])->first();
    $order=Order::create([
      'bill_id'=>'ORD'.rand(0000,99999),
      'user_id'=>Auth::id(),
      'total_price'=>$request->total,
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
      'payment_type'=>$request->dbt,
      'created_at'=>date('Y-m-d H:i:s'),
      'updated_at'=>date('Y-m-d H:i:s'),

    ]);
   

    $cart=Cart::select()->where(['user_id'=>Auth::user()->id])->get();
    
    foreach($cart as $ct)
    {
        OrderProduct::create([
         'order_id'=>$order->id,
         'product_id'=>$ct->product_id,
         'quantity'=>$ct->quantity,
         'price'=>$ct->price,
         'created_at'=>date('Y-m-d H:i:s'),
         'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
    Cart::select()->where(['user_id'=>Auth::user()->id])->delete();

 return redirect()->route('order.interval',['orderid'=>$order->id]);
}
public function orderInterval(Request $request,$id)
{
    $order_id=$id;
    return view('front.cart.orderinterval',compact('order_id'));
}
public function setInterval(Request $request)
{
    if($request->order_type=='1')
    {

        Del_interval::create([
        'order_id'=>$request->order_id,
        'user_id'=>Auth::id(),
        'days'=>$request->duration,
        'start_date'=>date('Y-m-d'),
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
    return redirect()->route('thankyou');
}
public function thankyou()
{
    return view('front.cart.thankyou');
}
}




