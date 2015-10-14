<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GeneaLabs\Phpgmaps\Phpgmaps as Gmaps;

class MapController extends Controller
{
    public function index()
    {
    	# show map google
    $config = array();
    $config['center'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
    $gmaps = new Gmaps;
    $gmaps->initialize($config);
    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    $marker['position'] = '14.077874, 100.601791';
    $gmaps->add_marker($marker);

    $map = $gmaps->create_map();
    return view('home',compact('map'));
    }
}
