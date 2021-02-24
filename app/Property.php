<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends \RefineriaWeb\RWRealEstate\Models\Property
{
    public function agent(){
        return $this->hasOne( 'App\Agent', 'id', 'agent_id' );
    }

    public function location(){
        return $this->hasOne( 'App\Location', 'id', 'location_id' );
    }

    public function property_feature(){
        return $this->hasOne( 'App\PropertyFeature', 'property_id', 'id' );
    }

    public function property_type(){
        return $this->hasOne( 'App\PropertyType', 'id', 'properties_type_id' );
    }
}
