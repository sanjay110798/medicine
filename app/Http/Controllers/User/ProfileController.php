<?php

namespace App\Http\Controllers\User;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

use date;

use App\Model\Wallet;
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

class ProfileController extends Controller

{

    public function __construct()

    {

          $this->middleware('auth');

    }



	public function index()

	{

		return view('front.user.profile');

	}

	public function order()

	{
   $order=Order::where(['user_id'=>Auth::id()])->orderBy('id','desc')->paginate(5);
		return view('front.user.order',compact('order'));

	}

	public function subscription()

	{

		return view('front.user.subscription');

	}

	public function address()

	{

    $getAdd=ShippingAddress::where(['user_id'=>Auth::id()])->orderBy('id','desc')->get();
    $country=Country::get();
    $pincode=Pincode::get();
		return view('front.user.address',compact('getAdd','country'));

	}
	public function saveAddress(Request $request)
	{
	 $hav=ShippingAddress::where(['user_id'=>Auth::id()])->get();
   $save=ShippingAddress::create([
    'user_id'=>Auth::id(), 
    'billing_name'=>($request->name) ? $request->name : '',
    'billing_company_name'=>($request->company_name) ? $request->company_name : '',
    'billing_country'=>($request->country) ? $request->country : '0',
    'billing_state'=>($request->state) ? $request->state : '0',
    'billing_city'=>($request->city) ? $request->city : '0',
    'billing_address'=>($request->address) ? $request->address : '',
    'billing_pincode'=>($request->pincode) ? $request->pincode : '',
    'billing_phone'=>($request->phone) ? $request->phone : '',
    'billing_email'=>($request->email) ? $request->email : '',
    'created_at'=>date('Y-m-d H:i:s'),
    'updated_at'=>date('Y-m-d H:i:s'),
   ]);
   if(count($hav)>0){
    if($request->billing_address)
    {
      ShippingAddress::where(['user_id'=>Auth::id()])->update(['default'=>'0']);
      $save->default='1';
      $save->save();
    }
   }else{
    $save->default='1';
    $save->save();
   }

   return redirect()->back()->with('success','Your Address Store Successfully!!');
	}
	public function editAddress(Request $request,$id)
	{
		$hav=ShippingAddress::where(['id'=>$id])->first();
    $hav->user_id=Auth::id(); 
    $hav->billing_name=($request->name) ? $request->name : '';
    $hav->billing_company_name=($request->company_name) ? $request->company_name : '';
    $hav->billing_country=($request->country) ? $request->country : '0';
    $hav->billing_state=($request->state) ? $request->state : '0';
    $hav->billing_city=($request->city) ? $request->city : '0';
    $hav->billing_address=($request->address) ? $request->address : '';
    $hav->billing_pincode=($request->pincode) ? $request->pincode : '';
    $hav->billing_phone=($request->phone) ? $request->phone : '';
    $hav->billing_email=($request->email) ? $request->email : '';
    $hav->updated_at=date('Y-m-d H:i:s');
    $hav->save();
    
    // echo $request->billing_address;
    // exit;
    if($request->billing_address!='')
    {
      ShippingAddress::where(['user_id'=>Auth::id()])->update(['default'=>'0']);
      $hav->default='1';
      $hav->save();
    }

    return redirect()->back()->with('success','Your Address Update Successfully!!');

	}
	public function deleteAddress($id)
	{
		$save=ShippingAddress::where(['id'=>$id])->delete();
		return redirect()->back()->with('warning','Your Address deleted Successfully!!');
	}
	public function prescription()

	{

		return view('front.user.prescription');

	}

	public function wallet()
	{
    
    $wallet=Wallet::where(['user_id'=>Auth::id(),'status'=>'1'])->orderBy('id','desc')->take(3)->get();;
       
		return view('front.user.wallet',compact('wallet'));

	}
	public function walletReqAdd(Request $request)
	{
		$validator = \Validator::make($request->all(), [
             'amount' => 'required',
             
        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }
        $wallet=Wallet::create([
        'user_id'=>Auth::id(),
        'amount'=>$request->amount,
        'payment_type'=>'credit',
        'remarks'=>($request->remarks) ? $request->remarks : '',
        'status'=>'0'
        ]);

        return back()->with('success','Add Money Request Submitted Successfully');
	}

	public function jaayuwallet()

	{

		return view('front.user.jaayuwallet');

	}

	public function help()

	{

		return view('front.user.help');

	}

	public function legal()

	{

		return view('front.user.legal');

	}

	

	

  public function updateProfile(Request $request)

  {

    $user=Auth::user();

    $user->update([

    'name'=>$request->name,

    'email'=>$request->email,

    'mobile'=>$request->mobile,

    'dob'=>$request->dob,

    'gender'=>$request->gender,

    'blood_group'=>$request->blood_group,

    'height_ft'=>$request->height_ft,

    'height_inc'=>$request->height_inc,

    'weight'=>$request->weight,

    'marital_status'=>$request->marital_status,

    'e_number'=>$request->e_number,

   

    ]); 

    $user->save();

  	return redirect()->back()->with(["success" => "Profile Update Successfully!!"]);

  }

	



}