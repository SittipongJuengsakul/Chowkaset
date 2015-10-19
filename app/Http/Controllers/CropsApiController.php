<?php

namespace App\Http\Controllers;

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
    	if($seed_id==null || $seed_id==0 || $seed_id==''){
    		$dataSeeds = DB::table('seeds')->get();
    		return $dataSeeds;
    	}else{
    		$dataSeeds = DB::table('seeds')->get();
    		return $dataSeeds;
    	}
        
	}
	//รายชื่อพันธ์พืช $seed_id
    public function breed_list($seed_id){
		$dataSeeds = DB::table('breeds')->get();
        return $dataSeeds;
	}
}
