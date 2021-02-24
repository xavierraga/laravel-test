<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends \RefineriaWeb\RWRealEstate\Models\PropertyFeature
{
    public function property(){
        return $this->hasMany( 'App\Property', 'id', 'property_id' );
    }
}
