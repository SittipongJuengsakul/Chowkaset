<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profiles;

class ChangeProfile extends Controller
{

     public function getCreateProfile(){
        $user_id = Auth::user()->id;
        $profile = Profiles::where('user_id','=',$user_id)->first();
        if(!$profile){
            return view('auth.create_profile');
        }else{
            return Redirect::to('/auth/changeprofile');
        }
     }
     public function postCreateProfile(Request $request){
        $newprofile = new Profiles;
        $newprofile->user_id = Auth::user()->id;
        $newprofile->prefix = '1';
        $newprofile->fname = $request->input('fname');
        $newprofile->lname = $request->input('lname');
        $newprofile->card_id = $request->input('card_id');
        $newprofile->birthday = '0000-00-00';
        $newprofile->save();
        return Redirect::to('/home');
     }
    public function getChangeprofile(){
    	try {
    		$IdUser = Auth::user()->id;
    		$profile = User::find($IdUser);
    		return view('auth.profile',compact('profile'));
    	} catch (Exception $e) {
    		return Redirect::to('/home');
    	}
    }
    public function postChangeprofile(Request $request){
    	try {
    		
    	} catch (Exception $e) {
    		
    	}
    }
}
