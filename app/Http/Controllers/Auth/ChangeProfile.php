<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangeProfile extends Controller
{
    public function getChangeprofile(){
    	try {
    		$IdUser = Auth::user()->id;
    		$ProfileData = User::find($IdUser);
    		return $ProfileData;
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
