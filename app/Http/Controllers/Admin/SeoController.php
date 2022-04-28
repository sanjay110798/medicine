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

use App\Model\Seo;

use App\Model\RoutePage;

class SeoController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$seo=Seo::orderBy('id','desc')->paginate(20);

		return view('admin.seo.index',compact('seo'));

	}

	public function add()

	{
        $routepage=RoutePage::get();
		return view('admin.seo.add',compact('routepage'));

	}



	public function edit($id)

	{

		$seo=Seo::where(['id'=>$id])->first();
        $routepage=RoutePage::get();
		return view('admin.seo.edit',compact('seo','routepage'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'route' => 'required',

			'meta_title' => 'required',

			'meta_keyword' => 'required',

			'description' => 'required',


        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

		Seo::create([

			'route'=>$request->route,

			'meta_title'=>$request->meta_title,

			'meta_keyword'=>$request->meta_keyword,

			'meta_description'=>$request->description,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->route('admin.sitemap.setting')->with(["success" => "Sitemap Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'route' => 'required',

			'meta_title' => 'required',

			'meta_keyword' => 'required',

			'description' => 'required',

   

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        $seo=Seo::where(['id'=>$id])->first();

		$seo->update([

			'route'=>$request->route,

			'meta_title'=>$request->meta_title,

			'meta_keyword'=>$request->meta_keyword,

			'meta_description'=>$request->description,

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		$seo->save();


		return redirect()->route('admin.sitemap.setting')->with(["success" => "Sitemap Update Successfully!!"]);

	}

	public function deleteSitemap($id)

	{

		$user=Seo::where(['id'=>$id])->first();

		$user->delete();



		return redirect()->route('admin.sitemap.setting')->with(["warning" => "Sitemap Deleted Successfully!!"]);

	}





}