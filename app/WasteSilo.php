<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WasteSilo extends Model
{
    public $table = "wasteSilo";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }
}
