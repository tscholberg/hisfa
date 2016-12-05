<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;

class lengthFoam extends Model
{
    use LogTrait;

    public $table = 'lengtes';

    public function blocks(){
        return $this->hasMany('App\Block');
    }
}
