<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Response;
use App\Http\Controllers\Controller;
use App\Crop_plans;
use Redirect;
use App\Crops;
use App\Crop_plan_processes;
use App\Crop_plan_timegrows;

class PlaceApiController extends Controller
{

//-----------------------  Choose Place -------------------------
    public function aumphur($province){
        $aumphur = DB::table('amphur')->where('PROVINCE_ID','=',$province)->get();
        return $aumphur;
    }
    public function district($aumphur){
        $aumphur = DB::table('district')->where('AMPHUR_ID','=',$aumphur)->get();
        return $aumphur;
    }
    public function farmercomunity(){
        $aumphur = DB::table('farmercommunities')->get();
        return $aumphur;
    }
//-----------------------  Kaset -------------------------
    public function kaset_in_province($province){
        $statusCode = 200;
        $kaset = DB::table('profiles')->join('prefixs','prefixs.prefix_id','=','profiles.prefix')
        ->join('farmercommunities','farmercommunities.fmcm_id','=','profiles.fmcm_id')
        ->where('profiles.user_province_code','=',$province)->get();
        //$email = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$profile[0]->pf_id)->get();
        //$facebook = DB::table('contacts')->where('tyct_type','=','3')->where('pf_id','=',$profile[0]->pf_id)->get();
        $phone = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','1')->where('pf_id','=',$ks->pf_id)->get();
            $phone[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        $email = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$ks->pf_id)->get();
            $email[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        if($kaset){
                $response = [
                  'status'  => '1',
                  'data' => $kaset,
                  'phone'=> $phone,
                  'email'=> $email
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function kaset_in_district($district){
        $statusCode = 200;
        $kaset = DB::table('profiles')->join('prefixs','prefixs.prefix_id','=','profiles.prefix')
        ->join('farmercommunities','farmercommunities.fmcm_id','=','profiles.fmcm_id')
        ->where('profiles.user_district_code','=',$district)->get();
        //$email = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$profile[0]->pf_id)->get();
        //$facebook = DB::table('contacts')->where('tyct_type','=','3')->where('pf_id','=',$profile[0]->pf_id)->get();
        $phone = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','1')->where('pf_id','=',$ks->pf_id)->get();
            $phone[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        $email = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$ks->pf_id)->get();
            $email[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        if($kaset){
                $response = [
                  'status'  => '1',
                  'data' => $kaset,
                  'phone'=> $phone,
                  'email'=> $email
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function kaset_in_aumphur($aumphur){
        $statusCode = 200;
        $kaset = DB::table('profiles')->join('prefixs','prefixs.prefix_id','=','profiles.prefix')
        ->join('farmercommunities','farmercommunities.fmcm_id','=','profiles.fmcm_id')
        ->where('profiles.user_aumphur_code','=',$aumphur)->get();
        //$email = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$profile[0]->pf_id)->get();
        //$facebook = DB::table('contacts')->where('tyct_type','=','3')->where('pf_id','=',$profile[0]->pf_id)->get();
        $phone = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','1')->where('pf_id','=',$ks->pf_id)->get();
            $phone[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        $email = [];
        $i=0;
        foreach ($kaset as $ks) {
            $ph = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$ks->pf_id)->get();
            $email[$i] = $ph[0]->ct_detail; 
            $i++;
        }
        if($kaset){
                $response = [
                  'status'  => '1',
                  'data' => $kaset,
                  'phone'=> $phone,
                  'email'=> $email
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }



//-----------------------  Community -------------------------
    public function com_in_province($province){
        $statusCode = 200;
        $commu = DB::table('farmercommunities')
        ->where('farmercommunities.province_id','=',$province)->get();
        
        if($commu){
                $response = [
                  'status'  => '1',
                  'data' => $commu
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function com_in_district($district){
        $statusCode = 200;
        $commu = DB::table('farmercommunities')
        ->where('farmercommunities.district_id','=',$district)->get();
            if($commu){
                $response = [
                  'status'  => '1',
                  'data' => $commu
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function com_in_aumphur($aumphur){
        $statusCode = 200;
        $commu = DB::table('farmercommunities')
        ->where('farmercommunities.aumphur_id','=',$aumphur)->get();
        if($commu){
                $response = [
                  'status'  => '1',
                  'data' => $commu
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
//-------------------- Plan -------------------------
//เพิ่มข่้อมูล Plan
    public function new_plan_crop(Request $request){
        $crop_plan = new Crop_plans;
        $crop_plan->cp_name = $request->input('plan_name');
        $crop_plan->cp_owner = $request->input('plan_owner');
        $crop_plan->cp_duration = $request->input('plan_duration');
        $crop_plan->cp_seed_id = $request->input('seed');
        $crop_plan->cp_breed_id = $request->input('breed');
        $crop_plan->cp_detail = $request->input('plan_detail');
        $crop_plan->save();

        $ps_num = $request->input('process_num');
        for($i=1;$i<=$ps_num;$i++){
            $type_tb = $request->input('type_plan_'.$i);
            $detail_tb = $request->input('detail_in_plan_'.$i);
            $start_tb = $request->input('start_plan_'.$i);
            $end_tb = $request->input('end_plan_'.$i);
            $notice_tb = $request->input('notice_plan_'.$i);
            if($notice_tb){
                $notice_tb = 1;
            }else{
                $notice_tb = 0;
            }
            $cp_process = new Crop_plan_processes;
            $cp_process->cpc_num = $i;
            $cp_process->cpc_detail = $detail_tb;
            $cp_process->cpc_cp_id = $crop_plan->cp_id;
            $cp_process->cpc_type = $type_tb;
            $cp_process->cpc_start = $start_tb;
            $cp_process->cpc_end = $end_tb;
            $cp_process->cpc_notice = $notice_tb;
            $cp_process->cpc_status = '1';
            $cp_process->cpc_batch = '1';
            $cp_process->save();
        }
        $gw_num = $request->input('grow_num');
        for($j=1;$j<=$gw_num;$j++){
            $detail_tb = $request->input('detail_duration_in_plan_'.$j);
            $duration_tb = $request->input('duration_time_plan_'.$j);
            $cp_timegrow = new Crop_plan_timegrows;
            $cp_timegrow->cpt_num = $j;
            $cp_timegrow->cpt_cp_id = $crop_plan->cp_id;
            $cp_timegrow->cpt_duration = $duration_tb;
            $cp_timegrow->cpt_detail = $detail_tb;
            $cp_timegrow->cpt_status = '1';
            $cp_timegrow->cpt_batch = '1';
            $cp_timegrow->save();
        }
        return Redirect::to('/officer');
    }
    public function plan_in_seed($seed){
        $statusCode = 200;
        $plan = DB::table('crop_plans')
        ->where('crop_plans.cp_seed_id','=',$seed)->get();
        $phone = [];
        $i=0;
        if($plan){
                $response = [
                  'status'  => '1',
                  'data' => $plan
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function plan_in_breed($breed){
        $statusCode = 200;
        $plan = DB::table('crop_plans')
        ->where('crop_plans.cp_breed_id','=',$breed)->get();
        $phone = [];
        $i=0;
        if($plan){
                $response = [
                  'status'  => '1',
                  'data' => $plan
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function get_plan_crop($plan_id){
        $statusCode = 200;
        $plan = DB::table('crop_plans')->join('seeds','seeds.seed_id','=','crop_plans.cp_seed_id')
        ->join('breeds','breeds.breed_id','=','crop_plans.cp_breed_id')
        ->where('crop_plans.cp_id','=',$plan_id)->get();
        $plan_process = DB::table('crop_plan_processes')
        ->join('crop_plan_types','crop_plan_types.cpty_id','=','crop_plan_processes.cpc_type')
        ->where('crop_plan_processes.cpc_cp_id','=',$plan_id)
        ->where('crop_plan_processes.cpc_status','=','1')->get();
        $plan_timegrows = DB::table('crop_plan_timegrows')
        ->where('crop_plan_timegrows.cpt_cp_id','=',$plan_id)
        ->where('crop_plan_timegrows.cpt_status','=','1')->get();
        if($plan){
                $response = [
                  'status'  => '1',
                  'data' => $plan,
                  'plan_process' => $plan_process,
                  'plan_timegrows' => $plan_timegrows,
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }
    public function get_plan_crop_user($crop_id){
        $statusCode = 200;
        $thiscrop = Crops::find($crop_id);
        $plan = DB::table('crop_plan_processes')
        ->join('crop_plan_types','crop_plan_types.cpty_id','=','crop_plan_processes.cpc_type')
        ->where('crop_plan_processes.cpc_cp_id','=',$thiscrop->crop_cp_id)->orderBy('crop_plan_processes.cpc_start', 'asc')->get();
        if($plan){
                $response = [
                  'status'  => '1',
                  'data' => $plan
                ];
            }else{
                $response = [
                  'status'  => '0',
                  'message' => 'No Data!'
                ];
            }
        return Response::json($response, $statusCode);
    }

}
