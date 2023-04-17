<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendAlert;
use App\Models\Location;
use App\Models\Incident;
use Inertia\Inertia;

class IncidentController extends Controller
{
    public function alert()
    {
        $locationDetails = request()->all();
        $location = Location::where('id', 'LIKE', '%' . $locationDetails['locationId'] . '%')->get();

        Incident::create([
            'location_id' => $location[0]['id'],
            // 'description' => 'need help',
        ]);

        $alert = array();
        array_push($alert, [
            'locationId' => $location[0]['id'],
            'locationLat' => $location[0]['latitude'],
            'locationLng' => $location[0]['longitude']
        ]);
        event(new SendAlert($alert));
    }
}
