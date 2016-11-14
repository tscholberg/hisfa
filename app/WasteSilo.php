<?php

namespace Hisfa;

use Illuminate\Database\Eloquent\Model;

class WasteSilo extends Model
{
    public $table = "waste_silos";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }

    public function resource()
    {
        return $this->belongsTo('Hisfa\Resource');
    }
}
