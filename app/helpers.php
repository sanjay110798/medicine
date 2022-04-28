<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Model\Country;
use App\Model\State;
use App\Model\City;

if(!function_exists('generateTokens')) {
    function generateTokens($length_of_string) 
    { 

        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 

        // of specified length 
        return substr(str_shuffle($str_result),  
        0, $length_of_string); 
    } 
}
if(!function_exists('getCountryName')) {
    function getCountryName($id){
    	$getCountry = Country::find($id);
		return ($getCountry) ? $getCountry->name : '';
    }
}
if(!function_exists('getStateName')) {
	function getStateName($id){
		$getstate = State::find($id);
		return ($getstate) ? $getstate->name : '';
	}
}
if(!function_exists('getDistrictName')) {
	function getDistrictName($id){
		$getdistrict = City::find($id);
		return ($getdistrict) ? $getdistrict->city : '';
	}
}

function getErrors($validator){
	$errors = [];
	foreach($validator->errors()->getMessages() as $key => $msg){
		$errors[$key] = $msg[0];
	}
	return $errors;
}

if(!function_exists('checkWithWalletBalance')) {
    function checkWithWalletBalance($user,$amount){ 

		$remain_wallet_balance = $user->balance - $amount;
		if($user->min_balance!='' && $user->min_balance != NULL && $user->min_balance < $remain_wallet_balance && $user->balance > $amount){
			return true;
		}else{
			return false;
		}
	} 
}

?>