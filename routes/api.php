<?php

use App\Events\SendLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('/location/add', function (Request $request) {
//   $lat = $request->input('lat');
//   $lng = $request->input('lng');
//   $location = ["lat" => $lat, "lng" => $lng];

//   event(new SendLocation($location));

//   return response()->json(['status' => 'success', 'data' => $location]);
// });
