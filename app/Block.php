<?php

namespace Hisfa;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function typefoam()
    {
        return $this->belongsTo('Hisfa\typeFoam');
    }
}
