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

use App\Model\Slider;



class SliderController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$slider=Slider::orderBy('id','desc')->paginate(20);

		return view('admin.slider.index',compact('slider'));

	}

	public function add()

	{

		return view('admin.slider.add');

	}



	public function edit($id)

	{

		$slider=Slider::where(['id'=>$id])->first();

		return view('admin.slider.edit',compact('slider'));

	}

	

	public function insert(Request $request)

	{

		$validator = Validator::make($request->all(), [

			'title' => 'required',

			'img' => 'required',

			'position' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }

        if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/slider/');

			$image->move($destinationPath, $img);

			}

		Slider::create([

			'title'=>$request->title,

			'image'=>$img,

			'slider_position'=>$request->position,

			'created_at'=>date('Y-m-d H:i:s'),

			'updated_at'=>date('Y-m-d H:i:s'),

		]); 

		

		return redirect()->back()->with(["success" => "Slider Added Successfully!!"]);

	}

	public function update(Request $request,$id)

	{

		$validator = Validator::make($request->all(), [

			'title' => 'required',

			'position' => 'required',

        ]);

		

		

        if ($validator->fails()) {

            return back()->with(['error'=>"Something Went Wrong"])->withInput();

        }
        
        $slider=Slider::where(['id'=>$id])->first();

        if ($request->hasFile('img')) {

			$image = $request->file('img');

			$img = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/upload/slider/');

			$image->move($destinationPath, $img);

			}else{
             $img= $slider->image;
			}

        

		$slider->update([

			'title'=>$request->title,

			'image'=>$img,

			'slider_position'=>$request->position,

			'updated_at'=>date('Y-m-d H:i:s'),
		]); 

		$slider->save();


		return redirect()->route('admin.slider')->with(["success" => "Slider Update Successfully!!"]);

	}

	public function deleteSlider($id)

	{

		$slider=Slider::where(['id'=>$id])->first();
		$imgpath=public_path('/upload/slider/').$slider->image;
		unlink($imgpath);
		$slider->delete();
        
        
		return redirect()->route('admin.slider')->with(["warning" => "Slider Deleted Successfully!!"]);

	}





}