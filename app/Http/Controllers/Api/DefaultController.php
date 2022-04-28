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

use App\Model\Country;

use App\Model\State;

use App\Model\City;

use App\Model\Pincode;

class DefaultController extends \App\Http\Controllers\Controller

{

	

	public function CountryList(Request $request)
	{
		$hav=Country::get();
		$list=[];
		foreach($hav as $hv)
		{
			$list[]=[
			'id'=>($hv->id) ? $hv->id : '',
			'country_name'=>($hv->country_name) ? $hv->country_name : '',
			
			];
		}

		$this->apiResponse['error'] = false;

		$this->apiResponse['message'] = '';

		$this->apiResponse['data'] = [
        'list'=>$list
		];

		return response()->json($this->apiResponse);
	}

	public function StateList(Request $request)
	{
		$validator = \Validator::make($request->all(), [

			'country_id' => 'required',
		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}
		$state=State::where(['country_id'=>$request->country_id])->get();
  
		$list=[];
		foreach($state as $hv)
		{
			$list[]=[
			'id'=>($hv->id) ? $hv->id : '',
			'state_name'=>($hv->state_name) ? $hv->state_name : '',
			
			];
		}

		$this->apiResponse['error'] = false;

		$this->apiResponse['message'] = '';

		$this->apiResponse['data'] = [
        'list'=>$list
		];

		return response()->json($this->apiResponse);
	}

	public function CityList(Request $request)
	{
		$validator = \Validator::make($request->all(), [

			'state_id' => 'required',
		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}
		$city=City::where(['state_id'=>$request->state_id])->get();
  
		$list=[];
		foreach($city as $hv)
		{
			$list[]=[
			'id'=>($hv->id) ? $hv->id : '',
			'city_name'=>($hv->city_name) ? $hv->city_name : '',
			
			];
		}

		$this->apiResponse['error'] = false;

		$this->apiResponse['message'] = '';

		$this->apiResponse['data'] = [
        'list'=>$list
		];

		return response()->json($this->apiResponse);
	}

	public function PincodeList(Request $request)
	{
		$validator = \Validator::make($request->all(), [

			'city' => 'required',
		]);

		



		if ($validator->fails()){

			$this->apiResponse['message'] = app()->make('Appservice')->getErrors($validator);

			return response()->json($this->apiResponse);

		}
		$pin=Pincode::where(['location'=>$request->city])->get();
  
		$list=[];
		foreach($pin as $hv)
		{
			$list[]=[
			'pincode'=>($hv->pincode) ? $hv->pincode : '',
			
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