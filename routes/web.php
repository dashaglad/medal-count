<?php

use App\Http\Controllers\Web\AthleteController;
use App\Http\Controllers\Web\CountryController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MedalController;
use App\Http\Controllers\Web\SportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(CountryController::class)
    ->prefix('countries')->name('countries.')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::controller(MedalController::class)
            ->prefix('{countryId}/medals')->name('medals')->group(function (){
                Route::get('{medalType}', 'countryMedals')
                    ->whereIn('medalType', ['gold', 'silver', 'bronze']);
                Route::get('all', 'allCountryMedals')->name('.all');
            });
    });

Route::controller(MedalController::class)
    ->prefix('medals')->name('medals.')->group(function () {
        Route::get('create', 'create')->name('create');
    });

Route::controller(SportController::class)
    ->prefix('sports')->name('sports.')->group(function () {
        Route::get('create', 'create')->name('create');
    });

Route::controller(AthleteController::class)
    ->prefix('athletes')->name('athletes.')->group(function () {
        Route::get('create', 'create')->name('create');
    });
