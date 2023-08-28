<?php

use App\Http\Controllers\Api\AthleteController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\MedalController;
use App\Http\Controllers\Api\SportController;
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

Route::controller(CountryController::class)
    ->prefix('countries')->name('api.countries.')->group(function () {
        Route::post('create', 'create')->name('create');
        Route::delete('{countryId}/delete', 'delete')->name('delete');
    });

Route::controller(MedalController::class)
    ->prefix('medals')->name('api.medals.')->group(function () {
        Route::post('create', 'create')->name('create');
        Route::delete('{medalId}/delete', 'delete')->name('delete');
    });

Route::controller(SportController::class)
    ->prefix('sports')->name('api.sports.')->group(function () {
        Route::post('create', 'create')->name('create');
        Route::delete('{sportId}/delete', 'delete')->name('delete');
    });

Route::controller(AthleteController::class)
    ->prefix('athletes')->name('api.athletes.')->group(function () {
        Route::post('create', 'create')->name('create');
        Route::delete('{athleteId}/delete', 'delete')->name('delete');
    });
