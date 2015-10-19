<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use Response;
use Hash;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccountApiController extends Controller
{
    public function getAccountData($crops_id)
    {
    	$dataAccount = DB::table('crop_accounts')->where('acc_crop_id','=',$crops_id)->get();
        return $dataAccount;
    }
}
