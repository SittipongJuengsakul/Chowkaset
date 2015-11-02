<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GeneaLabs\Phpgmaps\Phpgmaps as Gmaps;

class HomeController extends Controller
{
    public function index()
    {
    
    $marker = array();
            # show map google
        $config = array();
        $config['center'] = 'auto';
        /*$config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';*/
        $gmaps = new Gmaps;
        $gmaps->initialize($config);
        // set up the marker ready for positioning
        // once we know the users location
        $maps_crops = DB::table('maps')->select('map_id','latitude','longitude')->get();
        foreach ($maps_crops as $map) {
            // Loop Create Map 
            $marker['map_id'] = $map->map_id;
            $marker['position'] = $map->latitude.','.$map->longitude;
            $marker['title'] = 'mapid_'.$map->map_id;
            $marker['icon'] = 'assets/img/crops/rice/rice_running.png'; 
            $gmaps->add_marker($marker);
        }
        $map = $gmaps->create_map();
    return view('home',compact('map'));
    }
}
