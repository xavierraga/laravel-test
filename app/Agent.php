<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends \RefineriaWeb\RWRealEstate\Models\Agent
{
    public function property(){
        return $this->hasMany( 'App\Property', 'agent_id', 'id' );
    }
}
