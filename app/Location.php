<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends \RefineriaWeb\RWRealEstate\Models\Location
{
    public function property(){
        return $this->hasOne( 'App\Property', 'location_id', 'id' );
    }
}
