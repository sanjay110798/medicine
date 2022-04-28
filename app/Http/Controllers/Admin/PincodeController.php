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

use App\Model\Pincode;



class PincodeController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$pincode=Pincode::orderBy('id','desc')->paginate(20);

		return view('admin.pincode.index',compact('pincode'));

	}

	public function add()

	{

		return view('admin.pincode.add');

	}



	public function edit($id)

	{

		$pincode=Pincode::where(['id'=>$id])->first();

		return view('admin.pincode.edit',compact('pincode'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'pincode' => 'required',

			'location' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }


		Pincode::create([

			'pincode'=>$request->pincode,

			'active'=>'1',

			'location'=>$request->location,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Pincode Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'pincode' => 'required',

			'location' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $pincode=Pincode::where(['id'=>$id])->first();
        

		$pincode->update([

			'pincode'=>$request->pincode,

			'active'=>'1',

			'location'=>$request->location,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pincode->save();


		return redirect()->route('admin.pincode.list')->with(["success" => "Pincode Update Successfully!!"]);

	}

	public function deletePincode($id)

	{

		$pincode=Pincode::where(['id'=>$id])->first();
		
		$pincode->delete();
        
        
		return redirect()->route('admin.pincode.list')->with(["warning" => "Pincode Deleted Successfully!!"]);

	}


public function statusChange(Request $request)

	{

		$pincode=Pincode::where(['id'=>$request->id])->first();

		if($pincode->active=='1')

		{

			$pincode->active='2';

			$pincode->save();

		}else{

			$pincode->active='1';

			$pincode->save();

		}

	}


}