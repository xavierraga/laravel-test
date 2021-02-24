<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home-test-view', function () {
    $properties = \RefineriaWeb\RWRealEstate\Models\Property::inRandomOrder()->limit(10)->get();
    return view('vendor.rw-real-estate.home', [
        'properties' => $properties
    ]);
});

Route::get('/properties-test-view', function () {
    return view('vendor.rw-real-estate.properties');
});
