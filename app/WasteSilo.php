<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;


class WasteSilo extends Model
{
    use LogTrait;

    public $table = "waste_silos";

    public function getCapacityPercentAttribute() {
        return $this->capacity * 100;
    }

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }
}
