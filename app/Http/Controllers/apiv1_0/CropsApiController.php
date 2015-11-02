<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use Response;
use Hash;
use DB;
use Carbon\Carbon;
use Redirect;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CropsApiController extends Controller
{
    //แสดงข่้อมูบ map ตามที่คลิกจาก marker บน map
    //Function Code 100201
     public function map_detail($map_id){
        $map_detail = DB::table('maps')->join('crops', 'maps.map_crop_id', '=', 'crops.crop_id')
        ->join('group_crop_user', 'group_crop_user.crop_id', '=', 'crops.crop_id')
        ->join('users','group_crop_user.user_id','=','users.id')
        ->join('breeds', 'breeds.breed_id', '=', 'crops.breed_id')
        ->join('seeds', 'seeds.seed_id', '=', 'breeds.seed_id')
        ->where('map_id', '=', $map_id)->get();
        return $map_detail;
    }
    //เพิ่มข่้อมูล  marker บน map
    //Function Code 100202
    public function new_crop(Request $request){
        $user_id = Auth::user()->id;
        $crops_id = DB::table('crops')->insertGetId(
            ['product'=> $request->input('product'),'rai'=> $request->input('rai'),
            'ngarn'=> $request->input('ngarn'),'wah'=> $request->input('wah'),
            'seed_id' => $request->input('seeds'),'crop_name' => $request->input('namerai'),'crops_zipcode_address'=>$request->input('crops_zipcode'),
            'crops_address'=>$request->input('crops_address')]
        );
        $user_owner = DB::table('group_crop_user')->insertGetId(
            ['user_id'=>$user_id,'crop_id'=>$crops_id]
        );
        $maps_id = DB::table('maps')->insertGetId(
            ['latitude'=> $request->input('latitude'),'longitude'=>$request->input('longtitude'),'map_crop_id' => $crops_id,
            'created_at' => 'CURRENT_TIMESTAMP','updated_at' => 'CURRENT_TIMESTAMP']
        );

        return Redirect::to('/');
    }

    public function test(Request $request){
        $acc_date = $request->input('acc_date');
        $acc_detail = $request->input('acc_detail');
        $acc_cost_type = $request->input('acc_cost_type');
        $acc_price = $request->input('acc_price');
        $acc_crop_id = $request->input('acc_crop_id');

        return $acc_detail;
    }
	//การเพาะปลูกของ user
    public function crops_list($user_id){
		$dataCrops = DB::table('group_crop_user')->join('crops', 'group_crop_user.crop_id', '=', 'crops.crop_id')
        ->where('user_id','=',$user_id)->groupBy('group_crop_user.crop_id')->get();
        try{
            $statusCode = 200;
            if($dataCrops){
                $response = [
                  'status'  => '1',
                  'data' => $dataCrops,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
	}
    //ข้อมูลการเพาะปลูก
    public function crops_detail_list($user_id){
        $dataCrops = DB::table('group_crop_user')->join('crops', 'group_crop_user.crop_id', '=', 'crops.crop_id')
        ->leftjoin('breeds','breeds.breed_id','=','crops.breed_id')->join('seeds','seeds.seed_id','=','breeds.breed_id')
        ->leftjoin('crop_accounts','crop_accounts.acc_crop_id','=','crops.crop_id')
        ->select('breeds.breed_name','seeds.seed_name','crops.rai','crops.ngarn','crops.wah')
        ->where('user_id','=',$user_id)->groupBy('group_crop_user.crop_id')->get();
        $sumacc = DB::table('crop_accounts')->join('crops','crops.crop_id','=','crop_accounts.acc_crop_id')
        ->sum('crop_accounts.acc_price');
        try{
            $statusCode = 200;
            if($dataCrops){
                $response = [
                  'status'  => '1',
                  'data' => $dataCrops,
                  'sum_acc' => $sumacc,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
	//รายชื่อ ชนิดพืช
    public function seeds_list($seed_id){
    	$dataSeeds = DB::table('seeds')->where('seed_id','=',$seed_id)->get();
    	try{
            $statusCode = 200;
            if($dataSeeds){
                $response = [
                  'status'  => '1',
                  'data' => $dataSeeds,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
	}

    public function seeds_all_list(){
        $dataSeeds = DB::table('seeds')->get();
        try{
            $statusCode = 200;
            if($dataSeeds){
                $response = [
                  'status'  => '1',
                  'data' => $dataSeeds,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
	//รายชื่อพันธ์พืช $seed_id
    public function breed_list($seed_id){
		$dataSeeds = DB::table('breeds')->where('seed_id','=',$seed_id)->get();
        try{
            $statusCode = 200;
            if($dataSeeds){
                $response = [
                  'status'  => '1',
                  'data' => $dataSeeds,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
	}
    //บัญชี
    //ข้อมูลบัญชีของแปลง
    public function getAccountData($crops_id)
    {
        $dataAccount = DB::table('crop_accounts')->where('acc_crop_id','=',$crops_id)->orderBy('acc_date', 'asc')->get();
        try{
            $statusCode = 200;
            if($dataAccount){
                $response = [
                  'status'  => '1',
                  'data' => $dataAccount,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
    //เพิ่มบัญชีรายรับ รายจ่าย
    public function AddAccountData(Request $request)
    {
        $pricea = $request->input('acc_price');
        $priceb = explode(',', $pricea);
        $i=0;
        $newprice='';
        foreach ($priceb as $pb) {
            $newprice = $newprice.$priceb[$i];
            $i++;
        }
        $date = $request->input('acc_date');
        $dateformat = explode('-', $date);
        $date_acc = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
            $dataAccount = DB::table('crop_accounts')->insertGetId(
            ['acc_detail'=> $request->input('acc_detail'),'acc_date'=> $date_acc,'acc_price'=> $newprice,'acc_cost_type'=> $request->input('acc_cost_type'),'acc_crop_id'=> $request->input('acc_crop_id')]
        );
        return $date_acc;
    }
    //เพิ่มบัญชีรายรับ รายจ่าย
    public function EditAccountData(Request $request)
    {
        $pricea = $request->input('edt_acc_price');
        $priceb = explode(',', $pricea);
        $i=0;
        $newprice='';
        foreach ($priceb as $pb) {
            $newprice = $newprice.$priceb[$i];
            $i++;
        }
        $statusCode = 200;
        $date = $request->input('edt_acc_date');
        $dateformat = explode('-', $date);
        $date_acc = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
            $dataAccount = DB::table('crop_accounts')->where('acc_id', $request->input('edt_acc_id'))
            ->update(['acc_detail'=> $request->input('edt_acc_detail'),'acc_date'=> $date_acc,'acc_price'=> $newprice,'acc_cost_type'=> $request->input('edt_acc_cost_type'),'acc_crop_id'=> $request->input('edt_acc_crop_id')]
            );
        if($dataAccount){
            $response = [
                  'status'  => '1','massage' =>'Edit Complete!'
                  ];
        }else{
            $response = [
                  'status'  => '0','massage' =>'Edit Not Complete!'
                  ];
        }
        return Response::json($response, $statusCode);
    }
    //เพิ่มบัญชีรายรับ รายจ่าย
    public function DeleteAccountData(Request $request)
    {
        $statusCode = 200;
        $dlt_acc_id = $request->input('dlt_acc_id');
        $dataAccount = DB::table('crop_accounts')->where('acc_id', '=', $dlt_acc_id)->delete();
        if($dataAccount){
            $response = [
                  'status'  => '1','massage' =>'Delete Complete!'
                  ];
        }else{
            $response = [
                  'status'  => '0','massage' =>'Delete Not Complete!'
                  ];
        }
        return Response::json($response, $statusCode);
    }
    //ปัญหา
    //ข้อมูลปัญหาของแปลง
    public function getProblemData($crops_id)
    {
        $dataAccount = DB::table('topics')->where('tp_crop_id','=',$crops_id)->where('tp_topics_type_id','=','2')->orderBy('tp_createdate', 'asc')->get();
        try{
            $statusCode = 200;
            if($dataAccount){
                $response = [
                  'status'  => '1',
                  'data' => $dataAccount,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
    //เพิ่มปัญหาการเพาะปลูก
    public function AddProblemData(Request $request)
    {
        $dataProblem = DB::table('crop_problems')->insertGetId(
            ['pbm_detail'=> $request->input('pbm_detail'),'pbm_crop_id'=> $request->input('pbm_crop_id'),]
        );
        try{
            $statusCode = 200;
            if($dataProblem){
                $response = [
                  'status'  => '1',
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }
    }
    //แก้ใขปัญหาการเพาะปลูก
    public function EditProblemData(Request $request)
    {    
        $statusCode = 200;
            $dataAccount = DB::table('crop_problems')->where('pbm_id', $request->input('edt_pbm_id'))
            ->update(['pbm_detail'=> $request->input('edt_pbm_detail'),'pbm_status'=>'0']
            );
        if($dataAccount){
            $response = [
                  'status'  => '1','massage' =>'Edit Complete!'
                  ];
        }else{
            $response = [
                  'status'  => '0','massage' =>'Edit Not Complete!'
                  ];
        }
        return Response::json($response, $statusCode);
    }
    //ลบปัญหาการเพาะปลูก
    public function DeleteProblemData(Request $request)
    {
        $statusCode = 200;
        $dlt_pbm_id = $request->input('dlt_pbm_id');
        $dataAccount = DB::table('crop_problems')->where('pbm_id', '=', $dlt_pbm_id)->delete();
        if($dataAccount){
            $response = [
                  'status'  => '1','massage' =>'Delete Complete!'
                  ];
        }else{
            $response = [
                  'status'  => '0','massage' =>'Delete Not Complete!'
                  ];
        }
        return Response::json($response, $statusCode);
    }
}
