<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Location;

use \Firebase\FirebaseLib;

class TrackingController extends Controller
{
     public function trace(Request $request)
    { 
        $DEFAULT_URL = 'https://technocoup-165903.firebaseio.com/';
        $DEFAULT_TOKEN = 'AIzaSyAolQeHX7UuLRE1_psv6Zet2mI7vs4vFWs';
     

        $firebase = new FirebaseLib($DEFAULT_URL, $DEFAULT_TOKEN);


        $path = '/users/' . $request->get('phone') . '/locations';
        
        $data = $request->all();

        // Returns: (Array) Firebase response
        return $firebase->push($path, $data);


   
    }

    
    public function track()
    {

    	$locations = Location::where('phone', '7719088030')->get(); 
        // var_dump(json_encode($data['locations']));
        return view('tracking.index', compact('locations'));
    }
}
