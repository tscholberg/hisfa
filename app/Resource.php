<?php

namespace Hisfa;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model{
    public function typefoam(){
        return $this->belongsTo('App\Resource');
    }
}
