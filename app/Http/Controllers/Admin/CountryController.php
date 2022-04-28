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



class CountryController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function index()

	{

		$country=Country::orderBy('id','desc')->paginate(20);

		return view('admin.country.index',compact('country'));

	}


	public function store(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'country_name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }


		Country::create([

			'country_name'=>$request->country_name,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Country Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'country_name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $pincode=Country::where(['id'=>$id])->first();
        

		$pincode->update([

			'country_name'=>$request->country_name,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pincode->save();


		return redirect()->route('admin.country')->with(["success" => "Country Update Successfully!!"]);

	}

	public function del($id)

	{

		$pincode=Country::where(['id'=>$id])->first();
		
		$pincode->delete();
        
        
		return redirect()->back()->with(["warning" => "Country Deleted Successfully!!"]);

	}




}