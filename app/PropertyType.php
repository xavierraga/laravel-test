<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends \RefineriaWeb\RWRealEstate\Models\PropertyType
{
    public function property(){
        return $this->hasMany( 'App\Property', 'properties_type_id', 'id' );
    }
}
