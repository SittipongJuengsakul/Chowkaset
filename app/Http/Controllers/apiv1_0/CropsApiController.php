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
use App\GroupCropUser;
use App\User;
use App\Crops;
use App\Topics;
class CropsApiController extends Controller
{
    //แสดงข่้อมูบ map ตามที่คลิกจาก marker บน map
    //Function Code 100201
     public function map_detail($map_id){
        $map_detail = DB::table('crops')
        ->join('group_crop_users', 'group_crop_users.crop_id', '=', 'crops.crop_id')
        ->join('users','group_crop_users.user_id','=','users.id')
        ->join('breeds', 'breeds.breed_id', '=', 'crops.crop_breed_id')
        ->join('seeds', 'seeds.seed_id', '=', 'breeds.seed_id')
        ->where('crops.crop_id', '=', $map_id)->get();
        return $map_detail;
    }
    //เพิ่มข่้อมูล  marker บน map
    //Function Code 100202
    public function new_crop(Request $request){
        $Crops = new Crops;
        $Crops->crop_name = $request->input('namerai');
        $Crops->crop_latitude = $request->input('latitude');
        $Crops->crop_longitude = $request->input('longtitude');
        $Crops->crop_product = $request->input('product');
        $Crops->crop_rai = $request->input('rai');
        $Crops->crop_ngarn = $request->input('ngarn');
        $Crops->crop_wah = $request->input('wah');
        $Crops->crop_breed_id = '1';
        $Crops->crop_start_date = 'CURRENT_DATE';
        $Crops->crop_begin_date = '0000-00-00';
        $Crops->crop_crop_date = '0000-00-00';
        $Crops->crop_end_date = '0000-00-00';
        $Crops->crop_status = '0';
        $Crops->save();

        $user_id_group = new GroupCropUser;
        $user_id_group->user_id = Auth::user()->id;
        $user_id_group->crop_id = $Crops->id;
        $user_id_group->save();
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
        $dataCrops = DB::table('group_crop_users')->join('crops', 'group_crop_users.crop_id', '=', 'crops.crop_id')
        ->where('user_id','=',$user_id)->get();
        //$dataCrops = GroupCropUser::find('user_id','=',$user_id)->CropsList->get();
         try{
            $statusCode = 200;
            if($dataCrops){
                $response = [
                  'status'  => '1',
                  'data' => $dataCrops
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
        $dataCrops = DB::table('group_crop_users')->join('crops', 'group_crop_users.crop_id', '=', 'crops.crop_id')
        ->leftjoin('breeds','breeds.breed_id','=','crops.crop_breed_id')->join('seeds','seeds.seed_id','=','breeds.breed_id')
        ->leftjoin('crop_accounts','crop_accounts.acc_crop_id','=','crops.crop_id')
        ->join('users', 'group_crop_users.user_id', '=', 'users.id')
        ->select('crops.crop_id','users.name as user_name','breeds.breed_name','seeds.seed_name','crops.crop_rai','crops.crop_ngarn','crops.crop_wah')
        ->where('user_id','=',$user_id)->groupBy('group_crop_users.crop_id')->get();
        $i=0;
        $sumacc = [];
        $sumpbm = [];
        foreach ($dataCrops as $dc) {
            $acc = DB::table('crop_accounts')->join('crops','crops.crop_id','=','crop_accounts.acc_crop_id')
            ->where('crop_accounts.acc_crop_id','=',$dc->crop_id)
            ->sum('crop_accounts.acc_price');
            $sumacc[$i] = $acc; 
            $i++;
        }
        $i=0;
        foreach ($dataCrops as $dc) {
            $pbm = DB::table('topics')
            ->where('topics.tp_crop_id','=',$dc->crop_id)
            ->count('topics.tp_id');
            $sumpbm[$i] = $pbm; 
            $i++;
        }
        try{
            $statusCode = 200;
            if($dataCrops){
                $response = [
                  'status'  => '1',
                  'data' => $dataCrops,
                  'sum_acc' => $sumacc,
                  'sum_pbm' => $sumpbm,
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
        if($request->input('acc_cost_type')=='1'){
            $newprice='';
        }else{
            $newprice='-';
        }
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
        $dataAccount = DB::table('topics')->where('tp_crop_id','=',$crops_id)->where('tp_topics_type_id','=','2')->orderBy('created_at', 'asc')->get();
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
        $dataProblem = new Topics;
        $dataProblem->tp_title = $request->input('pbm_detail');
        $dataProblem->tp_status = '0';
        $dataProblem->tp_countviews = '0';
        $dataProblem->tp_countcomments = '0';
        $dataProblem->tp_countvotes = '0';
        $dataProblem->tp_topics_type_id = '2';
        $dataProblem->tp_user_id = Auth::user()->id;
        $dataProblem->tp_crop_id = $request->input('pbm_crop_id');
        $dataProblem = $dataProblem->save();
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
