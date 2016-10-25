<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimeSilo extends Model
{
    public $table = "primeSilo";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }
}
