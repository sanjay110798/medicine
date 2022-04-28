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
use Illuminate\Support\Str;
class PagesController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$pages=PagesContent::orderBy('id','desc')->paginate(20);
        
		return view('admin.pages.index',compact('pages'));

	}

	public function add()

	{
        // $routepage=RoutePage::get();
		return view('admin.pages.add');

	}



	public function edit($id)

	{

		$pages=PagesContent::where(['id'=>$id])->first();
        // $routepage=RoutePage::get();
		return view('admin.pages.edit',compact('pages'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'page_name' => 'required',

			'description' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

		$contnt=PagesContent::create([

			'page_name'=>$request->page_name,

			'description'=>$request->description,

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		
         $contnt->slug = $this->generateSlug($request->page_name,$contnt->id);
         $contnt->save();
		return redirect()->back()->with(["success" => "Content Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'page_name' => 'required',

			'description' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }
        
        $pages=PagesContent::where(['id'=>$id])->first();


		$pages->update([

			'page_name'=>$request->page_name,

			'description'=>$request->description,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$pages->save();
        $pages->slug = $this->generateSlug($request->page_name,$pages->id);
        $pages->save();

		return redirect()->route('admin.pages')->with(["success" => "Content Update Successfully!!"]);

	}
    protected function generateSlug($title,$id)
    {
        $slug=Str::slug($title);
        $checkSlug=PagesContent::where(['slug'=>$slug])->where('id','!=',$id)->first();
        if(!$checkSlug)
        {
            return $slug;
        }else{
            $slugsFound = PagesContent::where(['slug'=>$slug])->count();
            $counter = 0;
            $counter += $slugsFound;
            $slug2=$slug."-".$counter;
            return $slug2;
        }
    }
	public function deletePages($id)

	{

		$slider=PagesContent::where(['id'=>$id])->first();
		
		$slider->delete();
        
        
		return redirect()->route('admin.pages')->with(["warning" => "Content Deleted Successfully!!"]);

	}





}