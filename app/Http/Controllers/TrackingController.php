<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Location;

use Kreait\Firebase;

class TrackingController extends Controller
{
     public function trace(Request $request)
    { 
       
        $firebase = (new Firebase\Factory())
            ->withCredentials('/firebase/firebase.json')
            ->withDatabaseUri('https://technocoup-165903.firebaseio.com/')
            ->create();
        
        $database = $firebase->getDatabase();

        $path = '/users/' . $request->get('phone') . '/locations';
        
        $data = $request->all();

        return $database->getReference($path)
                   ->push($data);



   
    }

    
    public function track()
    {

    	$locations = Location::where('phone', '7719088030')->get(); 
        // var_dump(json_encode($data['locations']));
        return view('tracking.index', compact('locations'));
    }
}
