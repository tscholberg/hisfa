<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;


class Resource extends Model{
    use LogTrait;

    public function typefoam(){
        return $this->belongsTo('App\Resource');
    }
}
