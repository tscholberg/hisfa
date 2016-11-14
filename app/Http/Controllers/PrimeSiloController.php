<?php

namespace Hisfa\Http\Controllers;

use Illuminate\Http\Request;
use Hisfa\PrimeSilo;
use Hisfa\Http\Requests;
use Illuminate\Support\Facades\Input;

class PrimeSiloController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $primesilos = \Hisfa\PrimeSilo::All();
        $resources = \Hisfa\Resource::All();

        $data['resources'] = $resources;
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

    public function deletePrimeSilo()
    {
        \Hisfa\PrimeSilo::findOrFail(Input::get('silo_id'))->delete();

        return redirect('primesilos');
    }

    public function updateCapacityPrimeSilo()
    {
        $silo = \Hisfa\PrimeSilo::findOrFail(Input::get('silo_id'));
        $capacity = Input::get('silo_capacity');
        $resource_id = Input::get('resource_id');

        $silo->resource_id = $resource_id;

        $silo->capacity = $capacity / 100;
            if ( $capacity / 100 <= 1 && $capacity / 100 >= 0 ){
                $silo->save();
            }
        return redirect('primesilos');
    }


}
