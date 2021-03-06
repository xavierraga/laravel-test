<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends \RefineriaWeb\RWRealEstate\Models\Location
{
    public function property(){
        return $this->hasMany( 'App\Property', 'location_id', 'id' );
    }
}
