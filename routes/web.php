<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/location', [LocationController::class, 'index'])->name('location.index');
Route::get('/location/create', [LocationController::class, 'create'])->name('location.create');
Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
// Route::resource('/location', LocationController::class);

Route::post('/incident/alert', [IncidentController::class, 'alert'])->name('incident.alert');
