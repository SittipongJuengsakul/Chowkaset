<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GeneaLabs\Phpgmaps\Phpgmaps as Gmaps;
use App\Crops;

class HomeController extends Controller
{
    public function index()
    {
    
        $marker = array();
            # show map google
        $config = array();
        $config['center'] = 'auto';
        $gmaps = new Gmaps;
        $gmaps->initialize($config);
        // set up the marker ready for positioning
        // once we know the users location
        $maps_crops = Crops::all();
        foreach ($maps_crops as $map) {
            // Loop Create Map 
            $marker['map_id'] = $map->crop_id;
            $marker['position'] = $map->crop_latitude.','.$map->crop_longitude;
            $marker['title'] = 'mapid_'.$map->crop_id;
            $marker['icon'] = 'assets/img/crops/rice/rice_running.png'; 
            $gmaps->add_marker($marker);
        }
        $map = $gmaps->create_map();
        return view('home',compact('map'));
    }
}
