<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\maps;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GeneaLabs\Phpgmaps\Phpgmaps as Gmaps;

class HomeController extends Controller
{
    public function index()
    {
    
    $map = maps::init_map();
    
    return view('home',compact('map'));
    }
}
