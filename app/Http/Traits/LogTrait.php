<?php

namespace App\Http\Traits;

use App\Log;
use Illuminate\Http\Request;

trait LogTrait
{
    public function addLog($function, $user, $id = NULL, $foreign_id = NULL, $quantity = NULL, $percentage = NULL){
        $log = new Log;
        $log->function = $function;
        $log->user = $user;
        $log->object_id = $id;
        $log->foreign_id = $foreign_id;
        $log->quantity = $quantity;
        $log->percentage = $percentage;
        $log->save();
    }
}
