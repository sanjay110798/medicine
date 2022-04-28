<?php



namespace App\Http\Controllers\Api;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

use App\User;

use App\Model\Otp;

use DB;



class AuthController extends \App\Http\Controllers\Controller

{

	

	/**

     * Login

     *

     * @param  [string][required] code

     * @param  [string][required] password

     */

	public function sendOtp(Request $request){

		$validator = \Validator::make($request->only('email'), [

			'email' => 'required',

		]);

		

		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}

		

		$user = User::where(['email'=>$request->email])->first();

		if(!$user){

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Invalid credentials!!';

			return response()->json($this->apiResponse);

		}
		
		if(!$user && $user->enabled != 1)

		{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Wait For Admin Approval!!';

			return response()->json($this->apiResponse);

		}

        $email=$request->email;
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
		


		$this->apiResponse['error'] = false;
        $this->apiResponse['message'] = 'Otp Send Successfully!!';
		$this->apiResponse['data'] = [

			'email' => $user->email,

		];

		

		return response()->json($this->apiResponse);

	}
	public function login(Request $request)
	{
		$validator = \Validator::make($request->all(), [

			'email' => 'required',
			'otp' => 'required',

		]);

		

		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}

		

		$email=$request->email;

		$otp=$request->otp;

        $userDet=[];

		$checkOtp=Otp::where(['mobile'=>$email,'otp'=>$otp])->first();
       
		if(!$checkOtp)

		{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Invalid credentials';

			return response()->json($this->apiResponse);

		}else{

			$user=User::where(['email'=>$email])->first();



			$login_try = Auth::loginUsingId($user->id);

			if ($login_try) {

			$user = Auth::user();

			$token = $this->generateLoginToken($user);

			$user->api_token = $token;

			$user->save();

			$userDet=[
			'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'mobile'=>$user->mobile,
            
			];

			$this->apiResponse['error'] = false;

			$this->apiResponse['data'] = [
            'token'=>$token,
			'user_details' => $userDet,

			];

			return response()->json($this->apiResponse);

			}else{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Invalid credentials';

			return response()->json($this->apiResponse);

			}

		}

	}

	public function forgotPassword(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required',
		]);


		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);
			return response()->json($this->apiResponse);
		}
		$user=User::where(['email'=>$request->email])->first();
		if(!$user)
		{
			$this->apiResponse['message'] = 'User Not Found!!';
			return response()->json($this->apiResponse);
		}else{
			$otp=mt_rand(111111,999999);
			$data['email']=$user->email;
			$data['otp']=$otp;
			$chcekem=Otp::where(['mobile'=>$user->email])->first();
			if($chcekem)
			{
				$chcekem->otp=$otp;
				$chcekem->save();
			}else{
				Otp::create([
					'mobile'=>$user->email,
					'otp'=>$otp,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
				]);
			}
			Mail::send([], $data, function ($message)use($data) {
				$message->to($data['email'])
				->subject('Forgot Password')
			// here comes what you want
			->setBody($data['otp'].' is Your OTP!'); // assuming text/plain
		});
			$this->apiResponse['error'] = false;
			$this->apiResponse['message'] = 'OTP Send Successfully!!';
			$this->apiResponse['data'] =[
				'email'=>$user->email,
			];
			return response()->json($this->apiResponse);
		}
	}

	public function checkOtp(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'otp' => 'required',
			'email'=>'required',
		]);


		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);
			return response()->json($this->apiResponse);
		}
		$chcekem=Otp::where(['mobile'=>$request->email,'otp'=>$request->otp])->first();
		if($chcekem)
		{
			$this->apiResponse['error'] = false;
			$this->apiResponse['message'] = 'OTP Matched Successfully!!';
			$this->apiResponse['data'] =[
				'email'=>$request->email,
				'match'=>'1'
			];
		}else
		{
			$this->apiResponse['error'] = true;
			$this->apiResponse['message'] = 'OTP Did Not Matched!!';
			$this->apiResponse['data'] =[
				'email'=>$request->email,
				'match'=>'0'
			];
		}
		return response()->json($this->apiResponse);
	}

	public function ChangePassword(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => ['required', 'string', 'min:6', 'confirmed'],
			'password_confirmation' => 'required'
		]);


		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);
			return response()->json($this->apiResponse);
		}

		$user=User::where(['email'=>$request->email])->first();
		if($user)
		{
			$user->password=Hash::make($request->password);
			$user->save();

			$this->apiResponse['error'] = false;
			$this->apiResponse['message'] = 'Password Changed Successfully!!';
		}else{

			$this->apiResponse['error'] = true;
			$this->apiResponse['message'] = 'User Not Found!!';
		}
		
		return response()->json($this->apiResponse);
	}

	public function register(Request $request)

	{

		$validator = \Validator::make($request->all(), [

			'first_name' => 'required',
			'last_name' => 'required',
			'mobile'=>'required',
			'email'=>'required',
			'password'=>['required', 'string', 'confirmed'],
			'password_confirmation'=>'required',

		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}



		
		$checkemail=User::where(['email'=>$request->email])->first();
		if($checkemail)

		{   

			$this->apiResponse['error'] = true;

			$this->apiResponse['data'] = [];

			$this->apiResponse['message'] = "User Already Exsist!!";

			return response()->json($this->apiResponse);

		}


		DB::beginTransaction();
		try{
			
			$user=User::create([
				'role_id'=>'4',
				'name'=>$request->first_name.' '.$request->last_name,
				'mobile' => $request->mobile,
				'email' => $request->email,
				'password'=>Hash::make($request->password),
				'enabled' => '0',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s')

			]);

			$otp=mt_rand(111111,999999);
			$data['email']=$user->email;
			$data['otp']=$otp;
			$chcekem=Otp::where(['mobile'=>$user->email])->first();
			if($chcekem)
			{
				$chcekem->otp=$otp;
				$chcekem->save();
			}else{
				Otp::create([
					'mobile'=>$user->email,
					'otp'=>$otp,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
				]);
			}
			Mail::send([], $data, function ($message)use($data) {
				$message->to($data['email'])
				->subject('Registration OTP')
			// here comes what you want
			->setBody($data['otp'].' is Your OTP!'); // assuming text/plain
		});

			DB::commit();
            $this->apiResponse['error'] = false;
			$this->apiResponse['message'] = "User Created Successfully and Otp Send Successfully!!";
            $this->apiResponse['data'] = [
            'email'=>$user->email
            ];
			return response()->json($this->apiResponse);
		}catch(\Exception $e){
			DB::rollback();

			$this->apiResponse['message'] = $e->getMessage();

			$this->apiResponse['error'] = true;

			return response()->json($this->apiResponse);       
		}

	}
	public function checkRegistrationOtp(Request $request)
	{
       $validator = \Validator::make($request->all(), [

			'email' => 'required',
			'otp' => 'required',

		]);

		

		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}

		

		$email=$request->email;

		$otp=$request->otp;

        $userDet=[];

		$checkOtp=Otp::where(['mobile'=>$email,'otp'=>$otp])->first();
       
		if(!$checkOtp)

		{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Invalid credentials';

			return response()->json($this->apiResponse);

		}else{

			$user=User::where(['email'=>$email])->first();



			$login_try = Auth::loginUsingId($user->id);

			if ($login_try) {

			$user = Auth::user();

			$token = $this->generateLoginToken($user);

			$user->api_token = $token;
            $user->enabled='1';
			$user->save();

			$userDet=[
			'id'=>$user->id,
            'name'=>$user->name,
            'email'=>$user->email,
            'mobile'=>$user->mobile,
            
			];

			$this->apiResponse['error'] = false;
			$this->apiResponse['data'] = [
            'token'=>$token,
			'user_details' => $userDet,
			];

			return response()->json($this->apiResponse);

			}else{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = 'Invalid credentials';

			return response()->json($this->apiResponse);

			}

		}
	}

	public function resetPassword(Request $request)

	{

		$validator = \Validator::make($request->all(), [


			'password' => ['required', 'string', 'min:6', 'confirmed'],

			'password_confirmation' => 'required'

			

		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}



		$user=Auth::user();

		if(!$user)

		{

			$this->apiResponse['error'] = true;

			$this->apiResponse['message'] = "User Not Found!!";

			return response()->json($this->apiResponse);

		}else{
			
			

				$user->password=Hash::make($request->password);

				$user->save();

				$this->apiResponse['error'] = false;

				$this->apiResponse['message'] = 'Password is Changed Successfully!!';

				return response()->json($this->apiResponse);

			

		}

	}

	protected function generateLoginToken($user){

		return $user->createToken('MyApp')->accessToken;

	}

}