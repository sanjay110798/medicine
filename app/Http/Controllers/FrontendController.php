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
use App\Model\Cart;
use App\Model\Pincode;
use App\Model\PincodeStore;
use Mail;

class FrontendController extends Controller

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

        $category=Category::orderBy('id','desc')->get();
        $brand=Brand::orderBy('id','desc')->get();
        $slider=Slider::where(['slider_position'=>'home'])->orderBy('id','desc')->get();
        $benefit=Benefit::orderBy('id','desc')->get();
        return view('front.home',compact('category','brand','slider','benefit'));

    }

    public function sendotp(Request $request)

    {

        $email=$request->email;

        $user=User::where(['email'=>$email])->first();

        if($user && $user->enabled == 1)

        {
          $otp=rand(00000,99999);
          $checkOtp=Otp::where(['mobile'=>$email])->first();

          if($checkOtp)

          {

             $checkOtp->update([

                'otp'=>$otp,

                'updated_at'=>date('Y-m-d H:i:s'),

            ]);

             $checkOtp->save();


         }else{

            Otp::create([

                'mobile'=>$email,

                'otp'=>$otp,

                'created_at'=>date('Y-m-d H:i:s'),

                'updated_at'=>date('Y-m-d H:i:s'),

            ]);

        }

        $data['email'] =$user->email;
        $data['otp'] = $otp;
        $data['name'] = $user->name;

        Mail::send('otpmail', $data, function ($message)use($data) {
            $message->to($data['email'])
            ->subject('Login Otp');

        });

        echo "1";

    }else{

        echo "0";

    }

}

public function checkpin(Request $request)
{

 $pincode=$request->pincode;
 $check=Pincode::where(['pincode'=>$pincode])->first();
 if($check){
    $ip=request()->ip();
    $checkExit=PincodeStore::where(['ip_add'=>$ip])->first();
    if($checkExit)
    {
        $checkExit->pincode=$pincode;
        $checkExit->save();
    }else{
        PincodeStore::create([
        'ip_add'=>$ip,
        'pincode'=>$pincode,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
    Cookie::queue('pincode', $pincode, 20);
    echo "1";
 }else{
    echo "0";
 }
}

public function checkotp(Request $request)

{

    $email=$request->email;

    $otp=$request->otp;



    $checkOtp=Otp::where(['mobile'=>$email,'otp'=>$otp])->first();

    if(!$checkOtp)

    {

        echo "0";

    }else{

        $user=User::where(['email'=>$email])->first();



        $login_try = Auth::loginUsingId($user->id);

        if ($login_try) {

            $checkses=Cart::where(['user_id'=>session()->get('session_id')]);

            if($checkses->count()!=0)

            {

                $upuser=$checkses->get();

                foreach($upuser as $val)

                {

                    $checkexit=Cart::select()->where(['user_id'=>$user->id,'product_id'=>$val->product_id]);

                    if($checkexit->count()!=0)

                    {

                        $usercart=$checkexit->firstOrFail();

                        $qn=$usercart->quantity + $val->quantity;

                        $am=$usercart->price + $val->price;

                        $usercart->update([

                            'quantity'=>$qn,

                            'price'=>$am,

                        ]);

                    }

                    if($checkexit->count()==0)

                    {

                        $cart = Cart::create([

                            'user_id'=>$user->id,

                            'product_id'=>$val->product_id,

                            'quantity'=>$val->quantity,

                            'price'=>$val->price,

                        ]);

                        $cart->save(); 

                    }



                }



            }
            Cart::where(['user_id' =>session()->get('session_id')])->delete();

            echo "1";  

        }else{

            echo "0";

        }

    }

}
public function otpPage(Request $request)
{
    $email=$request->email;
    return view('front.otppage',compact('email'));
}
public function registration(Request $request)
{
    $email=$request->email;
    return view('front.register',compact('email'));
}
public function insertUser(Request $request)
{
    $validator = Validator::make($request->all(), [

        'name' => 'required',

        'email' => 'required|unique:users,email',

        'mobile' => 'required|unique:users,mobile',


    ]);





    if ($validator->fails()) {

        return back()->with(['error'=>"Something Went Wrong"])->withInput();

    }

    $user=User::create([

        'name'=>$request->name,

        'email'=>$request->email,

        'role_id'=>'4',

        'password'=>Hash::make($request->mobile),

        'mobile'=>$request->mobile,

        'created_at'=>date('Y-m-d H:i:s'),

        'updated_at'=>date('Y-m-d H:i:s'),

    ]); 

    if($user)
    {
        $otp=rand(00000,99999);
        $checkOtp=Otp::where(['mobile'=>$user->email])->first();

        if($checkOtp)

        {

         $checkOtp->update([

            'otp'=>$otp,

            'updated_at'=>date('Y-m-d H:i:s'),

        ]);

         $checkOtp->save();

     }else{

        Otp::create([

            'mobile'=>$user->email,

            'otp'=>$otp,

            'created_at'=>date('Y-m-d H:i:s'),

            'updated_at'=>date('Y-m-d H:i:s'),

        ]);

    }

    $data['email'] =$user->email;
    $data['otp'] = $otp;
    $data['name'] = $user->name;

    Mail::send('otpmail', $data, function ($message)use($data) {
        $message->to($data['email'])
        ->subject('Registration Otp');

    });
}

return redirect()->route("otp.page",["email"=>$user->email]);
}

}

