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

use App\Model\PagesContent;

use App\Model\RoutePage;

class RoutePagesController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$pages=RoutePage::orderBy('id','desc')->paginate(20);
        
		return view('admin.routepages.index',compact('pages'));

	}

	public function add()

	{
       
		return view('admin.routepages.add');

	}



	public function edit($id)

	{

		$pages=RoutePage::where(['id'=>$id])->first();
		return view('admin.routepages.edit',compact('pages'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'route_name' => 'required',

			'name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

		RoutePage::create([

			'route_name'=>$request->route_name,

			'name'=>$request->name,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Route Page Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'route_name' => 'required',

			'name' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }
        
        $pages=RoutePage::where(['id'=>$id])->first();


		$pages->update([

			'route_name'=>$request->route_name,

			'name'=>$request->name,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pages->save();


		return redirect()->route('admin.route.pages')->with(["success" => "Pages Update Successfully!!"]);

	}

	public function deletePages($id)

	{

		$slider=RoutePage::where(['id'=>$id])->first();
		
		$slider->delete();
        
        
		return redirect()->back()->with(["warning" => "Route Pages Deleted Successfully!!"]);

	}





}