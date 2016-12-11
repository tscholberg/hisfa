<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;

class Block extends Model
{
    use LogTrait;

    public function getTotalLength()
    {

    }

    public function typefoam()
    {
        return $this->belongsTo('App\typeFoam');
    }
    public function lengthfoam()
    {
        return $this->belongsTo('App\lengthFoam');
    }
}
