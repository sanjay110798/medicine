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

use App\Model\Country;

use App\Model\State;

class StateController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function index()

	{

		$state=State::orderBy('id','desc')->paginate(20);
		$country=Country::orderBy('id','desc')->get();

		return view('admin.state.index',compact('country','state'));

	}


	public function store(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'state_name' => 'required',
			'country_id' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }


		State::create([

			'country_id'=>$request->country_id,

			'state_name'=>$request->state_name,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "State Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'state_name' => 'required',
			'country_id' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $pincode=State::where(['id'=>$id])->first();
        

		$pincode->update([

			'country_id'=>$request->country_id,

			'state_name'=>$request->state_name,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pincode->save();


		return redirect()->route('admin.state')->with(["success" => "State Update Successfully!!"]);

	}

	public function del($id)

	{

		$pincode=State::where(['id'=>$id])->first();
		
		$pincode->delete();
        
        
		return redirect()->back()->with(["warning" => "State Deleted Successfully!!"]);

	}




}