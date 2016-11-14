<?php

namespace Hisfa;

use Illuminate\Database\Eloquent\Model;

class typeFoam extends Model
{
    public $table = 'typefoams';
    protected $fillable = ['name', '', ''];

    public function blocks(){
        return $this->hasMany('Hisfa\Block');
    }
}
