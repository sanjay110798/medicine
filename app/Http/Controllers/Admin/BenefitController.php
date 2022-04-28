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

use App\Model\Benefit;



class BenefitController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$benefit=Benefit::orderBy('id','desc')->paginate(20);

		return view('admin.benefit.index',compact('benefit'));

	}

	public function add()

	{

		return view('admin.benefit.add');

	}



	public function edit($id)

	{

		$benefit=Benefit::where(['id'=>$id])->first();

		return view('admin.benefit.edit',compact('benefit'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'title' => 'required',

			'img' => 'required',

			'description' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/benefit/');

			$image->move($destinationPath, $img);

			}

		Benefit::create([

			'title'=>$request->title,

			'image'=>$img,

			'description'=>$request->description,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Benefit Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'title' => 'required',

			'description' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }
        
        $benefit=Benefit::where(['id'=>$id])->first();

        if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/benefit/');

			$image->move($destinationPath, $img);

			}else{
             $img= $benefit->image;
			}

        

		$benefit->update([

			'title'=>$request->title,

			'image'=>$img,

			'description'=>$request->description,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$benefit->save();


		return redirect()->route('admin.benefit')->with(["success" => "Benefit Update Successfully!!"]);

	}

	public function deleteBenefit($id)

	{

		$benefit=Benefit::where(['id'=>$id])->first();
		$imgpath=public_path('/upload/benefit/').$benefit->image;
		unlink($imgpath);
		$benefit->delete();
        
        
		return redirect()->route('admin.benefit')->with(["warning" => "Benefit Deleted Successfully!!"]);

	}





}