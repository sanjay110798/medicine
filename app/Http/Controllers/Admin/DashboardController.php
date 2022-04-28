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

use Illuminate\Support\Facades\File;


class DashboardController extends Controller

{

    public function __construct()

    {

          $this->middleware('auth');

    }



	public function index()
	{

		return view('admin.dashboard');

	}
	public function profile()
	{

		return view('admin.profile');

	}
  
  public function profileUpdate(Request $request)
  {
     $user=Auth::user();

			if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/admin/');

			$image->move($destinationPath, $img);

			}else{

			$img=$user->image;

			}

			$user->name=$request->name;
			$user->email=$request->email;
			$user->mobile=$request->mobile;
			$user->image=$img;
			if($request->password!='')
			{
				$user->password=Hash::make($request->password);
			}
			$user->save();

      return redirect()->back()->with(["success" => "Profile Update Successfully!!"]);
  }
	
}