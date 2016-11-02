<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimeSilo extends Model
{
    public $table = "prime_silos";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }
}
