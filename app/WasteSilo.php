<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WasteSilo extends Model
{
    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }
}
