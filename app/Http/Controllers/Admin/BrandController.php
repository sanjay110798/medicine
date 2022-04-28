<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use Auth;

use Session;

use Hash;

use Validator;

use App\Model\Brand;

use App\Model\Product;

class BrandController extends Controller

{
   public function index()
   {
    $brand=Brand::orderBy('id','desc')->paginate(20);
    return view('admin.brand.index',compact('brand'));
   }
   public function store(Request $request)
   {
        $validator = \Validator::make($request->all(), [
             'name' => 'required',

        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }

        if ($request->hasFile('img')) {

        $image = $request->file('img');

        $img = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/upload/brand/');

        $image->move($destinationPath, $img);

        }else{

        $img="demo-category.jpg";

        }

        $Store=Brand::create([
        'name'=>$request->name,
        'img'=>$img,
        'description'=>$request->description,
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'),
 
        ]);
        if($Store)
        {
          return back()->with('success','Store Successfully');
        }
   }

   public function update(Request $request,$id)
   {
        $validator = \Validator::make($request->all(), [
             'name' => 'required',

        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }
        $Cat=Brand::where(['id'=>$id])->first();

        if ($request->hasFile('img')) {

        $image = $request->file('img');

        $img = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/upload/brand/');

        $image->move($destinationPath, $img);

        }else{

        $img=$Cat->img;

        }

        $Cat->update([
        'name'=>$request->name,
        'img'=>$img,
        'description'=>$request->description,
        'updated_at'=>date('Y-m-d H:i:s'),
 
        ]);
        
          return back()->with('success','Update Successfully');
        
   }

   public function del(Request $request ,$id)
   {
    $Cat=Brand::where(['id'=>$id])->first();
    $checkPro=Product::where(['brand_id'=>$id])->get();
    if(count($checkPro)>0)
    { 
     
      return back()->with('error','Product Under This Brand');
    }
    $imgPath=public_path('/upload/brand/'.$Cat->img);
    unlink($imgPath);
    $Cat->delete();
    return back()->with('success','Store Successfully');

   }
   

}

