<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Jubilee\Click108\Http\Controllers',
    'prefix'     => 'twelve_constellations',
    'middleware' => ['web']
], function () {
    Route::get('/', 'TwelveConstellationsController@index')->name('twelve_constellations.index');
    Route::get('/info', 'TwelveConstellationsController@info')->name('twelve_constellations.info');
});
