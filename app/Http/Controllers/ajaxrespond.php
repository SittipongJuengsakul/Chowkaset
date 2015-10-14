<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Auth;
use Redirect;
use App\Http\Controllers\Controller;

class ajaxrespond extends Controller
{
    public function map_detail($map_id){
    	$map_detail = DB::table('maps')->join('crops', 'maps.map_crop_id', '=', 'crops.crop_id')
    	->join('users', 'users.id', '=', 'crops.crop_user_id')
    	->join('seeds', 'seeds.seed_id', '=', 'crops.seed_id')
    	->where('map_id', '=', $map_id)->get();
    	return $map_detail;
    }
    public function new_crop(Request $request){
        $user_id = Auth::user()->id;
        $crops_id = DB::table('crops')->insertGetId(
            ['product'=> $request->input('product'),'rai'=> $request->input('rai'),
            'ngarn'=> $request->input('ngarn'),'wah'=> $request->input('wah'),'crop_user_id'=> $user_id,
            'seed_id' => $request->input('seeds'),'crop_name' => $request->input('namerai')]
        );
        $maps_id = DB::table('maps')->insertGetId(
            ['latitude'=> $request->input('latitude'),'longitude'=>$request->input('longtitude'),'map_crop_id' => $crops_id,
            'created_at' => 'CURRENT_TIMESTAMP','updated_at' => 'CURRENT_TIMESTAMP']
        );

    	return Redirect::to('/');;
    }
}
