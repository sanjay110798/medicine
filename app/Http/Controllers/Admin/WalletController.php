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

use App\Model\Wallet;
use App\User;


class WalletController extends Controller

{

	public function __construct()

	{

		$this->middleware('auth');

	}



	public function list()

	{

		$user=User::where('role_id','!=','1')->orderBy('id','desc')->paginate(20);

		return view('admin.wallet.index',compact('user'));

	}
	public function add(Request $request)
	{
		$validator = \Validator::make($request->all(), [
             'amount' => 'required',
             'payment_type' => 'required',


        ]);
        if ($validator->fails()) {

             return back()->withErrors($validator)->withInput()->with('error','Something Went Wrong');
        }

        $wallet=Wallet::create([
        'user_id'=>$request->user_id,
        'amount'=>$request->amount,
        'payment_type'=>$request->payment_type,
        'remarks'=>($request->remarks) ? $request->remarks : '',
        'status'=>'1'
        ]);

        return back()->with('success','Add Money Successfully');
	}
	public function statusChange($id,$status)
	{
		$wallet=Wallet::where(['id'=>$id])->first();
		$wallet->status=$status;
		$wallet->save();

		return back()->with('success','Status Change Successfully');
	}
    
    public function requestList(Request $request)
    {
    	$u=$request->user_id;
    	$wallet=Wallet::when($u, function ($query, $u) {
							return $query->where('user_id',$u);
						})->where(['status'=>'0'])->orderBy('id','desc')->paginate(20);
     $user=User::where('role_id','!=','1')->orderBy('id','desc')->get();
	return view('admin.wallet.list',compact('wallet','user'));
    }
	
	public function historyList(Request $request)
	{
		$u=$request->user_id;
		$wallet=Wallet::when($u, function ($query, $u) {
		return $query->where('user_id',$u);
		})->where('status','!=','0')->orderBy('id','desc')->paginate(20);
		$user=User::where('role_id','!=','1')->orderBy('id','desc')->get();
		return view('admin.wallet.historylist',compact('wallet','user'));
	}

}