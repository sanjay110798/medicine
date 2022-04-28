<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Model\Otp;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Benefit;
use App\Model\Slider;
use App\Model\Product;
use App\Model\Cart;
use Mail;

class ProductController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {



    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

        $category=Category::orderBy('id','desc')->get();
        $brand=Brand::orderBy('id','desc')->get();
        $slider=Slider::where(['slider_position'=>'home'])->orderBy('id','desc')->get();
        $benefit=Benefit::orderBy('id','desc')->get();
        $product=Product::orderBy('id','desc')->get();
        return view('front.product.index',compact('category','brand','slider','benefit','product'));

    }
    public function productDetails($slug)
    {
        $product=Product::where(['slug'=>$slug])->first();
        return view('front.product.details',compact('product'));
    }
    public function search(Request $request){
        $search = $request->dep;
        if($search == ''){
            echo '';
        }else{
            $products = Product::where('product_name','like',$search.'%')->where('active','1')->get();
            if(sizeof($products)>0){
                $output = '';

                foreach($products as $product){
                    $output .= '
                    <li><span style="float:left"><a href="'.route('product.details',$product->slug).'">'.$product->product_name.'</a>&nbsp;</span>

                    </li>';
                }
                echo $output;
            }else{
                echo '<li><a>No Product Found </a></li>';
            }
        }

    }

    public function addToCart($p_id)
    {

        $var=Product::select()->where(['id'=>$p_id])->firstOrFail();

        if($var->discount_type=='' || $var->discount_type=='NaN')

        {
            $pr=$var->mrp;
        }

        else
        {
           if($var->discount_type=='Fixed')
           {
            $pr=$var->discount_value;
        }else {
            $pr=($var->mrp * $var->discount_value)/100;
        }
        

    }


    $id=request()->ip();

    if(session()->get('session_id')=='')

    {

        session()->put('session_id',$id);

    }

    $session_id=session()->get('session_id');

    if(Auth::user()=='')

    {

        $qnt=Cart::select()->where(['user_id'=>$session_id,'product_id'=>$p_id]);  

        $user_id=$session_id; 

    }

    if(Auth::user()!='')

    {

        $qnt=Cart::select()->where(['user_id'=>Auth::user()->id,'product_id'=>$p_id]);

        $user_id=Auth::user()->id;

    }

    if($qnt->count()!=0){

        $updt=$qnt->firstOrFail();

        $quantity=$updt->quantity+1;

        $price=$quantity*$pr;

        $updt->update([

            'quantity'=>$quantity,

            'price'=>$price,

        ]);

    }

    if($qnt->count()==0)

    {

        $quantity=1;

        $price=$quantity*$pr;

        $cart = Cart::create([


            'user_id'=>$user_id,

            'product_id'=>$p_id,

            'quantity'=>$quantity,

            'price'=>$price,

        ]);

        $cart->save();    

    }
    return redirect()->back()->with('success','Product Added Into Cart!');
}
}




