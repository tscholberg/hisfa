<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WasteSilo extends Model
{
    public $table = "waste_silos";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }
}
