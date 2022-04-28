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

use App\Model\ShippingAddress;

use DB;



class ProfileController extends \App\Http\Controllers\Controller

{

	

	public function updateProfile(Request $request)
	{

		$validator = \Validator::make($request->all(), [

			'name' => 'required',
			'mobile' => 'required',
			'gender' => 'required',
			'dob' => 'required',
			'blood_group' => 'required',
			'height_ft' => 'required',
			'height_inc' => 'required',
			'weight' => 'required',
			'marital_status' => 'required',
			'e_number' => 'required',

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
			
			$user->update([

				'name'=>$request->name,

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

			$this->apiResponse['error'] = false;

			$this->apiResponse['message'] = 'Profile Update Successfully!!';

			return response()->json($this->apiResponse);

			

		}

	}

	public function addShippingAddress(Request $request)
	{
		$validator = \Validator::make($request->all(), [

			'billing_name' => 'required',
			'billing_company_name' => 'required',
			'billing_country' => 'required',
			'billing_state' => 'required',
			'billing_city' => 'required',
			'billing_address' => 'required',
			'billing_pincode' => 'required',
			'billing_phone' => 'required',
			'billing_email' => 'required',
			
		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}

		$hav=ShippingAddress::where(['user_id'=>Auth::id()])->get();
		$save=ShippingAddress::create([
		'user_id'=>Auth::id(), 
		'billing_name'=>($request->billing_name) ? $request->billing_name : '',
		'billing_company_name'=>($request->billing_company_name) ? $request->billing_company_name : '',
		'billing_country'=>($request->billing_country) ? $request->billing_country : '0',
		'billing_state'=>($request->billing_state) ? $request->billing_state : '0',
		'billing_city'=>($request->billing_city) ? $request->billing_city : '0',
		'billing_address'=>($request->billing_address) ? $request->billing_address : '',
		'billing_pincode'=>($request->billing_pincode) ? $request->billing_pincode : '',
		'billing_phone'=>($request->billing_phone) ? $request->billing_phone : '',
		'billing_email'=>($request->billing_email) ? $request->billing_email : '',
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

		$this->apiResponse['error'] = false;

		$this->apiResponse['message'] = 'Shipping Address Stored Successfully!!';

		return response()->json($this->apiResponse);
	}


	public function ShippingList(Request $request)
	{
		$hav=ShippingAddress::where(['user_id'=>Auth::id()])->get();
		$list=[];
		foreach($hav as $hv)
		{
			$list[]=[
			'billing_name'=>($hv->billing_name) ? $hv->billing_name : '',
			'billing_company_name'=>($hv->billing_company_name) ? $hv->billing_company_name : '',
			'billing_country'=>($hv->billing_country) ? $hv->billing_country : '0',
			'billing_state'=>($hv->billing_state) ? $hv->billing_state : '0',
			'billing_city'=>($hv->billing_city) ? $hv->billing_city : '0',
			'billing_address'=>($hv->billing_address) ? $hv->billing_address : '',
			'billing_pincode'=>($hv->billing_pincode) ? $hv->billing_pincode : '',
			'billing_phone'=>($hv->billing_phone) ? $hv->billing_phone : '',
			'billing_email'=>($hv->billing_email) ? $hv->billing_email : '',
            'default'=>($hv->default=='1') ? 'Yes' : 'No',
			];
		}

		$this->apiResponse['error'] = false;

		$this->apiResponse['message'] = '';

		$this->apiResponse['data'] = [
        'list'=>$list
		];

		return response()->json($this->apiResponse);
	}

	

}