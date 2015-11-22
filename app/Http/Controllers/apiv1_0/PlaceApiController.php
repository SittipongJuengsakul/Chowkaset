<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Response;
use App\Http\Controllers\Controller;

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
}
