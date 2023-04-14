<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SendAlert;
use App\Models\Incident;
use Inertia\Inertia;

class IncidentController extends Controller
{
    public function alert()
    {
        $locationDetails = request()->all();

        $alert = array();
        array_push($alert, [
            'locationId' => $locationDetails['locationId'],
            'locationLat' => $locationDetails['locationLat'],
            'locationLng' => $locationDetails['locationLng']
        ]);
        event(new SendAlert($alert));
    }
}
