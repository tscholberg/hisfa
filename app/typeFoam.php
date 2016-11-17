<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;


class typeFoam extends Model
{
    use LogTrait;

    public $table = 'typefoams';
    protected $fillable = ['name', '', ''];

    public function blocks(){
        return $this->hasMany('App\Block');
    }
}
