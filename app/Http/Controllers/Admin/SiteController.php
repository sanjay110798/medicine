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

use App\Model\Site;



class SiteController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function index()

	{

		$site=Site::where(['id'=>'1'])->first();

		return view('admin.site.index',compact('site'));

	}


	public function update(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'google_play_url' => 'required',

			'app_url' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }
        $site=Site::where(['id'=>'1'])->first();

        if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/');

			$image->move($destinationPath, $img);

			}else{
				$img=($site) ? $site->site_logo : '';
			}
       if($site)
       {
         
		$site->update([

			'google_play_url'=>$request->google_play_url,

			'site_logo'=>$img,

			'app_url'=>$request->app_url,

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 
       }else{

		Site::create([

			'google_play_url'=>$request->google_play_url,

			'site_logo'=>$img,

			'app_url'=>$request->app_url,

            'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 
       }

		

		return redirect()->back()->with(["success" => "Updated Successfully!!"]);

	}

	




}