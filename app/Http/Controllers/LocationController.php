<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Events\SendLocation;
use App\Models\Location;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function index()
    {
        return Inertia::render('Location/Index', [
            'locations' => Location::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Location/Create');
    }

    public function store(Request $request)
    {
        $locations = array();
        foreach ($request->locations as $location) {
            // Location::create([
            //     'address' => $location['location_address'],
            //     'latitude' => $location['location_latitude'],
            //     'longitude' => $location['location_longitude']
            // ]);

            array_push($locations, [
                'address' => $location['location_address'],
                'latitude' => $location['location_latitude'],
                'longitude' => $location['location_longitude']
            ]);
        }

        // dd($locations);

        event(new SendLocation($locations));

        return redirect()->route('location.create')
            ->with('message', 'Location created successfully');
    }
}
