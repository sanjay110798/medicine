<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Model\Site;
use App\Model\Cart;

class Appservice

{

	 public function __construct() 

    {

        

    }

   
 public function getErrors($validator){
    $errors = [];
    foreach($validator->errors()->getMessages() as $key => $msg){
        $errors[$key] = $msg[0];
    }
    return $errors;
}
   public function getSiteDetails()
   {
      $sep=Site::where(['id'=>'1'])->first();
      if($sep)
      {
        return $sep;
      }else{
        $v=[];
        return $v;
      }
   }
   public function totalcart()

    {

        if(Auth::user()=='')

        {

           $cart=Cart::select()->where(['user_id'=>session()->get('session_id')])->get();

        }

        else

        {

            $cart=Cart::select()->where(['user_id'=>Auth::user()->id])->get();

        }

        return count($cart);

    }

}

?>