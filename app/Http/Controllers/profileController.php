<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class profileController extends Controller
{
    public function index(){
    	if(Auth::user()){
    		$user_id = Auth::user()->id;
	    	$profile = DB::table('users')
	    	->where('id', '=', $user_id)->get();
	    	return view('auth/profile',compact('profile'));
    	}else{
    		return Redirect::to('/');
    	}
    	
    }
    public function profilechange(Request $request){
    		$user_id = Auth::user()->id;
    		DB::table('users')
            ->where('id',$user_id)
            ->update(['fname' => $request->input('fname'),'lname' => $request->input('lname'),
            	'email' => $request->input('email'), 'card_id' => $request->input('card_id'),
            	'address' => $request->input('address'),'facebook' => $request->input('facebook'),
            	'tel'=>$request->input('tel')
            ]);
    	return Redirect::to('/');
    }
}
