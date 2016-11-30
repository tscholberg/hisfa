<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\LogTrait;

class lengthFoam extends Model
{
    use LogTrait;

    public $table = 'lengtes';
    protected $fillable = ['name', '', ''];

    public function blocks(){
        return $this->hasMany('App\Block');
    }
}
