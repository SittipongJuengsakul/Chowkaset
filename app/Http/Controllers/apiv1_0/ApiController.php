<?php

namespace App\Http\Controllers\apiv1_0;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
     public function refference_one_zero(){
     	return view('apiReference.apiv1_0');
     }
}
