<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfficerController extends Controller
{
    //หน้าหลักการจัดการของเจ้าหน้าที่
    public function index()
    {
    	return view('officer.home');
    }
}
