<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $logs = \App\Log::orderBy('created_at', 'DESC')->take(1000)->get();

        $data["user"] = $user;
        $data['logs'] = $logs;

        return view('logs.index', $data);
    }
}
