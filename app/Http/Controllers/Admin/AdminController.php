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

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

	public function login()
	{
		return view('admin.auth.login');
	}
	public function authenticate(Request $request)
	{
       $messages = [
            'email.required' => 'The Username/Email is required.',
            'email.exists' => 'The Username is not registered in our system.',
            'password.required' => 'The Password is required.',
            'password.exists' => 'The Password is wrong.',
        ];
		$validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ],$messages);
		
		
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $login_try = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($login_try) {
		  return redirect()->route('admin.dashboard');	
		}else{
			return back()->with(["error" => "Invalid credentials"]);
		}
	}

	

}