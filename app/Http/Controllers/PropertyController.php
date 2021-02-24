<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    // View home-test-view
    public function home()
    {
        $properties = Property::inRandomOrder()->limit(10)->get();
        return view('vendor.rw-real-estate.home', [
            'properties' => $properties
        ]);
    }

    // View properties-test-view
    public function properties()
    {
        $properties = Property::with(['property_feature' => function ($q){
            $q->orderBy('price', 'DESC');
        }])->limit(20)->get();
        return view('vendor.rw-real-estate.properties', [
            'properties' => $properties
        ]);
    }

    public function index()
    {
        //
    }

    public function show($id)
    {
        //
    }

}
