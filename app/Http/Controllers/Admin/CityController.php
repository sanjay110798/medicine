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

use App\Model\City;

class CityController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function index()

	{

		$city=City::orderBy('id','desc')->paginate(20);
		$state=State::orderBy('id','desc')->get();

		return view('admin.city.index',compact('city','state'));

	}


	public function store(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'state_id' => 'required',
			'city_name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }


		City::create([

			'state_id'=>$request->state_id,

			'city_name'=>$request->city_name,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "City Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'state_id' => 'required',
			'city_name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $pincode=City::where(['id'=>$id])->first();
        

		$pincode->update([

			'state_id'=>$request->state_id,

			'city_name'=>$request->city_name,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pincode->save();


		return redirect()->route('admin.city')->with(["success" => "City Update Successfully!!"]);

	}

	public function del($id)

	{

		$pincode=City::where(['id'=>$id])->first();
		
		$pincode->delete();
        
        
		return redirect()->back()->with(["warning" => "City Deleted Successfully!!"]);

	}




}