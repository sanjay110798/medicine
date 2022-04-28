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

use App\User;



class VenderController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$user=User::where(['role_id'=>'3'])->orderBy('id','desc')->paginate(20);

		return view('admin.vender.index',compact('user'));

	}

	public function add()

	{

		return view('admin.vender.add');

	}



	public function edit($id)

	{

		$user=User::where(['id'=>$id])->first();

		return view('admin.vender.edit',compact('user'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'name' => 'required',

			'email' => 'required|unique:users,email',

			'mobile' => 'required|unique:users,mobile',

			'dob' => 'required',

			'gender' => 'required',

			'blood_group' => 'required',

			'height_ft' => 'required',

            'height_inc' => 'required',

			'weight' => 'required',

            'marital_status' => 'required',

            'e_number' => 'required',

            'password' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

		User::create([

			'name'=>$request->name,

			'role_id'=>'3',

			'email'=>$request->email,

			'password'=>Hash::make($request->password),

			'mobile'=>$request->mobile,

			'dob'=>$request->dob,

			'gender'=>$request->gender,

			'blood_group'=>$request->blood_group,

			'height_ft'=>$request->height_ft,

			'height_inc'=>$request->height_inc,

			'weight'=>$request->weight,

			'marital_status'=>$request->marital_status,

			'e_number'=>$request->e_number,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Vender Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'name' => 'required',

			'email' => 'required',

			'mobile' => 'required',

			'dob' => 'required',

			'gender' => 'required',

			'blood_group' => 'required',

			'height_ft' => 'required',

            'height_inc' => 'required',

			'weight' => 'required',

            'marital_status' => 'required',

            'e_number' => 'required',

   

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $user=User::where(['id'=>$id])->first();

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

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		$user->save();

		if($request->password!='')

		{

			$user->password=Hash::make($request->password);

			$user->save();

		}

		return redirect()->route('admin.vender.list')->with(["success" => "Vender Update Successfully!!"]);

	}

	public function deleteUser($id)

	{

		$user=User::where(['id'=>$id])->first();

		$user->delete();



		return redirect()->route('admin.vender.list')->with(["warning" => "Vender Deleted Successfully!!"]);

	}

	


}