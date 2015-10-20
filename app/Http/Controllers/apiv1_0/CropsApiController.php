<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use Response;
use Hash;
use DB;
use Carbon\Carbon;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CropsApiController extends Controller
{
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
        ->where('user_id','=',$user_id)->get();
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
        $date = $request->input('acc_date');
        $dateformat = explode('-', $date);
        $date_acc = $dateformat[2].'-'.$dateformat[1].'-'.$dateformat[0];
            $dataAccount = DB::table('crop_accounts')->insertGetId(
            ['acc_detail'=> $request->input('acc_detail'),'acc_date'=> $date_acc,'acc_price'=> $request->input('acc_price'),'acc_cost_type'=> $request->input('acc_cost_type'),'acc_crop_id'=> $request->input('acc_crop_id')]
        );
        return $date_acc;
    }
}
