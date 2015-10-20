<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use Response;
use Hash;
use DB;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CropsApiController extends Controller
{
	//การเพาะปลูกของ user
    public function crops_list($user_id){
		$dataCrops = DB::table('crops')->where('crop_user_id','=',$user_id)->get();
        return $dataCrops;
	}
	//รายชื่อ ชนิดพืช
    public function seeds_list($seed_id){
    	$dataSeeds = DB::table('seeds')->get();
    	return $dataSeeds;
	}

    public function seeds_all_list(){
        $dataSeeds = DB::table('seeds')->get();
        return $dataSeeds;
    }
	//รายชื่อพันธ์พืช $seed_id
    public function breed_list($seed_id){
		$dataSeeds = DB::table('breeds')->get();
        return $dataSeeds;
	}

    //บัญชี
    public function getAccountData($crops_id)
    {
        $dataAccount = DB::table('crop_accounts')->where('acc_crop_id','=',$crops_id)->get();
        return $dataAccount;
    }
}
