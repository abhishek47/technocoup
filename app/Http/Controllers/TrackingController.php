<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class TrackingController extends Controller
{
     public function trace(Request $request)
    {
        
        $lastId = Location::create($request->all());  

   
        echo json_encode($request->all());
    }

    
    public function track()
    {

    	$locations = Location::where('phone', '7719088030')->get(); 
        // var_dump(json_encode($data['locations']));
        return view('tracking.index', compact('locations'));
    }
}
