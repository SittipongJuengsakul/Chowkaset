<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmercommunities;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfficerController extends Controller
{
    //หน้าหลักการจัดการของเจ้าหน้าที่
    public function index()
    {
    	return view('officer.home');
    }
    public function officerPostAddCommunity(Request $request){
        $fmcm = new farmercommunities;
        $fmcm->fmcm_name = $request->input('com_name');
        $fmcm->dpm_id = $request->input('com_dpm');
        $fmcm->address = $request->input('com_address');
        $fmcm->tel = $request->input('phone');
        $fmcm->facebook = $request->input('facebook');
        $fmcm->email = $request->input('email');
        $fmcm->province_id = $request->input('com_province');
        $fmcm->aumphur_id = $request->input('com_aumphur');
        $fmcm->district_id = $request->input('com_district');
        $fmcm->save();
        return Redirect::to('/officer');
     }
}
