<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {
    Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('country-list', 'DefaultController@CountryList');
Route::get('state-list', 'DefaultController@StateList');
Route::get('city-list', 'DefaultController@CityList');
Route::get('pincode-list', 'DefaultController@PincodeList');

Route::group(['prefix' => 'auth'], function () {
    Route::post('registration', 'AuthController@register');
    Route::post('check-registration-otp', 'AuthController@checkRegistrationOtp');
    Route::post('send-otp', 'AuthController@sendOtp');
    Route::post('login', 'AuthController@login');
    Route::post('forgot-password', 'AuthController@forgotPassword');
    Route::post('validate-forgot-otp', 'AuthController@checkOtp');
    Route::post('change-forgot-password', 'AuthController@ChangePassword');
    //////////////////////////////////
  
});

Route::group(['middleware' => 'auth:api'], function(){
Route::post('reset-password', 'AuthController@resetPassword');
Route::post('profile-update', 'ProfileController@updateProfile');
Route::post('add-shipping-address', 'ProfileController@addShippingAddress');
Route::get('shipping-list', 'ProfileController@ShippingList');

});
});