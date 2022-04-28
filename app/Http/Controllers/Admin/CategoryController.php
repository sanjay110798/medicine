<?php



namespace App\Http\Controllers\Admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;

use Auth;

use Session;

use Hash;

use Validator;

use App\Model\Category;

use App\Model\Product;

class CategoryController extends Controller

{
   public function index()
   {
    $category=Category::orderBy('id','desc')->paginate(20);
    $parentCat=Category::where(['parent_id'=>'0'])->orderBy('id','desc')->get();
    return view('admin.category.index',compact('category','parentCat'));
   }
   public function store(Request $request)
   {
        $validator = \Validator::make($request->all(), [
             'category_name' => 'required',

        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }

        if ($request->hasFile('img')) {

        $image = $request->file('img');

        $img = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/upload/category/');

        $image->move($destinationPath, $img);

        }else{

        $img="demo-category.jpg";

        }

        $Store=Category::create([
        'parent_id'=>($request->parent_id!='') ? $request->parent_id : 0,
        'name'=>$request->category_name,
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
             'category_name' => 'required',

        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }
        $Cat=Category::where(['id'=>$id])->first();

        if ($request->hasFile('img')) {

        $image = $request->file('img');

        $img = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/upload/category/');

        $image->move($destinationPath, $img);

        }else{

        $img=$Cat->img;

        }

        $Cat->update([
        'parent_id'=>($request->parent_id!='') ? $request->parent_id : 0,
        'name'=>$request->category_name,
        'img'=>$img,
        'description'=>$request->description,
        'updated_at'=>date('Y-m-d H:i:s'),
 
        ]);
        
          return back()->with('success','Update Successfully');
        
   }

   public function del(Request $request ,$id)
   {
    $Cat=Category::where(['id'=>$id])->first();
    $check=Category::where(['parent_id'=>$id])->get();
    if(count($check)>0)
    { 
         
          return back()->with('error','Sub Category Under This Category');
      
    }else{ 
          $checkCPro=Product::where(['category_id'=>$id])->get();
          if(count($checkCPro)>0)
          { 
          return back()->with('error','Product Under This Category');
          }else{
               $checkSPro=Product::where(['sub_cat_id'=>$id])->get();
               if(count($checkSPro)>0)
               { 
               return back()->with('error','Product Under This Sub Category');
               } 
          }
     }
    $imgPath=public_path('/upload/category/'.$Cat->img);
    unlink($imgPath);
    $Cat->delete();
    return back()->with('success','Store Successfully');

   }
   

}

