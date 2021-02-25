<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Property;
use App\PropertyFeature;

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
    public function index(Request $request)
    {
        $properties = Property::select('properties.*')
            ->join('properties_features', 'properties_features.property_id', '=', 'properties.id')
            ->orderBy('properties_features.price');

        if (request()->ajax()) {
            if ($request->has('price_from') && trim($request->input('price_from')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('price', '>=', trim($request->input('price_from')));
                });
            }

            if ($request->has('price_to') && trim($request->input('price_to')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('price', '<=', trim($request->input('price_to')));
                });
            }

            if ($request->has('rooms') && trim($request->input('rooms')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('bedrooms', '=', trim($request->input('rooms')));
                });
            }

            if ($request->has('bathrooms') && trim($request->input('bathrooms')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('bathrooms', '=', trim($request->input('bathrooms')));
                });
            }

            if ($request->has('property_type') && trim($request->input('property_type')) != '') {
                $properties = $properties->where('properties_type_id', '=', trim($request->input('property_type')));
            }

            if ($request->has('location') && trim($request->input('location')) != '') {
                $properties = $properties->where('location_id', '=', trim($request->input('location')));
            }

            if ($request->has('garaje') && trim($request->input('garaje')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('garaje', '=', $request->input('garaje') == 'true' ? 1 : 0);
                });
            }

            if ($request->has('garden') && trim($request->input('garden')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('garden', '=', $request->input('garden') == 'true' ? 1 : 0);
                });
            }

            if ($request->has('private_pool') && trim($request->input('private_pool')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('private_pool', '=', $request->input('private_pool') == 'true' ? 1 : 0);
                });
            }

            if ($request->has('community_pool') && trim($request->input('community_pool')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('community_pool', '=', $request->input('community_pool') == 'true' ? 1 : 0);
                });
            }

            if ($request->has('reference') && trim($request->input('reference')) != '') {
                $properties = $properties->whereHas('property_feature', function ($q) use ($request) {
                    return $q->where('reference', '=', trim($request->input('reference')));
                });
            }

            $properties = $properties->limit(20)->get();

            $response = [];
            foreach ($properties as $property)
            {
                $property = [
                    'id' => $property->id,
                    'name' => $property->name,
                    'description' => $property->description,
                    'price' => $property->property_feature->price,
                    'location' => $property->location->name,
                    'rooms' => $property->property_feature->bedrooms,
                    'bathrooms'=> $property->property_feature->bathrooms,
                    'built_area' => $property->property_feature->built_area
                ];

                $response[] = $property;
            }

            return $response;
        }

        $properties = $properties->limit(20)->get();
        $locations = Location::orderBy('name')->get();

        return view('vendor.rw-real-estate.properties', [
            'properties' => $properties,
            'locations' => $locations
        ]);
    }

    public function show($id)
    {
        //
    }

}
