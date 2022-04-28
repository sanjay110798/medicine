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

use App\Model\Product;

use App\Model\ProductImage;

use App\Model\Category;

use App\Model\Brand;

use Illuminate\Support\Str;

class ProductController extends Controller

{

     public function __construct()

     {

          $this->middleware('auth');

     }



     public function list()

     {


          $product=Product::orderBy('id','desc')->paginate(20);

          return view('admin.product.index',compact('product'));

     }

     public function add()

     {
          $category=Category::where(['parent_id'=>'0'])->get();
          $brand=Brand::get();
          return view('admin.product.add',compact('category','brand'));

     }
     public function addCsv(Request $request)
     {

          return view('admin.product.csvadd');
     }
     public function insertCsv(Request $request)
     {


       $upload = $request->file('csvfile');

       $filePath = $upload->getRealPath();

       $file = fopen($filePath,'r');

       while($val = fgetcsv($file)){

            $data[] = array(

               'uni_code'=>$this->generateNum(),

               'product_name' => $val[0],

               'description' => $val[1],

               'composition' => $val[2],

               'manufacturer' => $val[3],

               'prescription' => $val[4],

               'mrp' => $val[5],

               'discount_type' => $val[6],

               'discount_value' => $val[7],

               'created_at'=>date('Y-m-d H:i:s'),
               'updated_at'=>date('Y-m-d H:i:s'),

          );



       }



       fclose($file);

    //print_r($data);exit;     

       Product::insert($data);

       return back()->with('msg','<span style="color:green">Produt has been uploaded successfully.</span>');



  }

  public function getSubCategory(Request $request)
  {
     $Cat=Category::where(['parent_id'=>$request->id])->get();
     $html='<option value="">Select</option>';
     if(count($Cat)>0)
     {
          foreach($Cat as $val)
          {
               $html.='<option value="'.$val->id.'">'.$val->name.'</option>';
          }
     }
     echo $html;
}

public function edit($id)

{

     $product=Product::where(['id'=>$id])->first();
     $category=Category::where(['parent_id'=>'0'])->get();
     $brand=Brand::get();
     return view('admin.product.edit',compact('product','category','brand'));

}



public function insert(Request $request)

{

     $validator = Validator::make($request->all(), [

          'product_name' => 'required',
          'com_name' => 'required',
          'composition' => 'required',
          'description' => 'required',
          'mrp' => 'required',

     ]);





     if ($validator->fails()) {

       return back()->with(['error'=>"Something Went Wrong"])->withInput();

  }

$text=$this->generateNum();
$barcode="<img alt='testing' src='https://talkerscode.com/webtricks/demo/js/barcode/barcode.php?codetype=Code39&size=40&text=".$text."&print=true'/>";

  $product= Product::create([
     'uni_code'=>$text,
     'category_id'=>($request->cat_id!='') ? $request->cat_id : '',
     'brand_id'=>($request->brand_id!='') ? $request->brand_id : '',
     'sub_cat_id'=>($request->sub_cat_id!='') ? $request->sub_cat_id : '',
     'product_name'=>$request->product_name,
     'manufacturer'=>$request->com_name,
     'composition'=>$request->composition,
     'description'=>$request->description,
     'mrp'=>$request->mrp,
     'discount_type'=>($request->discount_type!='') ? $request->discount_type : 'NaN',
     'discount_value'=>($request->discount_val!='') ? $request->discount_val : '0',
     'prescription'=>($request->p_r) ? 'Y' : 'N',
     'active'=>'1',
     'barcode'=>$barcode,
     'created_at'=>date('Y-m-d H:i:s'),
     'updated_at'=>date('Y-m-d H:i:s'),

]); 
  $product->slug = $this->generateSlug($request->product_name,$product->id);
  $product->save();

  if ($request->hasFile('file')) {

     foreach($request->file('file') as $file)

     {


          $img = time().'.'.$file->getClientOriginalExtension();

          $destinationPath = public_path('/upload/product/');

          $file->move($destinationPath, $img); 



          $gallery=ProductImage::create([

               'product_id'=>$product->id,

               'product_img'=>$img,

          ]);

          $gallery->save();

     }



}

return redirect()->back()->with(["success" => "Product Added Successfully!!"]);

}

public function update(Request $request,$id)

{

  $validator = Validator::make($request->all(), [

     'product_name' => 'required',
     'com_name' => 'required',
     'composition' => 'required',
     'description' => 'required',
     'mrp' => 'required',

]);





  if ($validator->fails()) {

       return back()->with(['error'=>"Something Went Wrong"])->withInput();

  }

  $product=Product::where(['id'=>$id])->first();
  
    $text=$this->generateNum();
    $barcode="<img alt='testing' src='https://talkerscode.com/webtricks/demo/js/barcode/barcode.php?codetype=Code39&size=40&text=".$text."&print=true'/>";

  $product->update([
     'uni_code'=>$text,
     'category_id'=>($request->cat_id!='') ? $request->cat_id : '',
     'brand_id'=>($request->brand_id!='') ? $request->brand_id : '',
     'sub_cat_id'=>($request->sub_cat_id!='') ? $request->sub_cat_id : '',
     'product_name'=>$request->product_name,
     'manufacturer'=>$request->com_name,
     'composition'=>$request->composition,
     'description'=>$request->description,
     'mrp'=>$request->mrp,
     'discount_type'=>($request->discount_type!='') ? $request->discount_type : 'NaN',
     'discount_value'=>($request->discount_val!='') ? $request->discount_val : '0',
     'prescription'=>($request->p_r) ? 'Y' : 'N',
     'active'=>'1',
     'barcode'=>$barcode,
     'updated_at'=>date('Y-m-d H:i:s'),

]); 
$product->slug = $this->generateSlug($request->product_name,$product->id);
$product->save();

  if ($request->hasFile('file')) {
    ProductImage::where(['product_id'=>$product->id])->delete();
    foreach($request->file('file') as $file)

    {


         $img = time().'.'.$file->getClientOriginalExtension();

         $destinationPath = public_path('/upload/product/');

         $file->move($destinationPath, $img); 



         $gallery=ProductImage::create([

          'product_id'=>$product->id,

          'product_img'=>$img,

     ]);

         $gallery->save();

    }



}





return redirect()->route('admin.product.list')->with(["success" => "Product Update Successfully!!"]);

}
protected function generateSlug($title,$id)
    {
        $slug=Str::slug($title);
        $checkSlug=Product::where(['slug'=>$slug])->where('id','!=',$id)->first();
        if(!$checkSlug)
        {
            return $slug;
        }else{
            $slugsFound = Product::where(['slug'=>$slug])->count();
            $counter = 0;
            $counter += $slugsFound;
            $slug2=$slug."-".$counter;
            return $slug2;
        }
    }
protected function generateNum()
{
    $a='';
    for ($i = 0; $i<15; $i++) 
    {
    $a .= mt_rand(0,9);
    }

    return $a;
}
public function deleteProduct($id)

{

     $product=Product::where(['id'=>$id])->first();

     $product->delete();


     return redirect()->route('admin.product.list')->with(["warning" => "Product Deleted Successfully!!"]);

}


public function statusChange(Request $request)

{

     $pincode=Product::where(['id'=>$request->id])->first();

     if($pincode->active=='1')

     {

          $pincode->active='2';

          $pincode->save();

     }else{

          $pincode->active='1';

          $pincode->save();

     }

}


}