<?php

namespace App\Http\Traits;

use App\Log;
use Illuminate\Http\Request;

trait LogTrait
{
    public function addLog( $function, $user, $description , $id = NULL, $foreign_id = NULL ){
        $log = new Log;
        $log->function = $function;
        $log->user = $user;
        $log->object_id = $id;
        $log->foreign_id = $foreign_id;
        $log->description = $description;
        $log->save();
    }
}
