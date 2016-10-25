<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrimeSilo;
use App\Http\Requests;

class PrimeSiloController extends Controller
{
    public function index()
    {
//        $primesilos = \App\PrimeSilo::All();
//        $data['primesilos'] = $primesilos;
//        return view('detail/PrimeSilos', $data);
        return view('detail/PrimeSilos');

    }

}
