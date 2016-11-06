<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrimeSilo;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PrimeSiloController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $primesilos = \App\PrimeSilo::All();
        $data['primesilos'] = $primesilos;
        return view('detail/PrimeSilos', $data);

    }

    public function addPrimeSilo()
    {

        $silo = new PrimeSilo;
        $silo->capacity = '0';
        $silo->resource_id = '1';
        $silo->name = Input::get('silo_name');
        $silo->save();

        return redirect('primesilos');
    }

    public function deletePrimeSilo(){
        \App\PrimeSilo::findOrFail(Input::get('silo_id'))->delete();

        return redirect('primesilos');
    }
}
