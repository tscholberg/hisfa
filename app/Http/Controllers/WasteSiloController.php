<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WasteSilo;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


class WasteSiloController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wastesilos = \App\WasteSilo::All();
        $data['wastesilos'] = $wastesilos;
        return view('detail/WasteSilos', $data);

    }

    public function addWasteSilo()
    {

        $silo = new WasteSilo;
        $silo->capacity = '0';
        $silo->resource_id = '1';
        $silo->name = Input::get('silo_name');
        $silo->save();

        return redirect('wastesilos');
    }

    public function deleteWasteSilo(){
        \App\WasteSilo::findOrFail(Input::get('silo_id'))->delete();

        return redirect('wastesilos');
    }

    public function updateCapacityWasteSilo()
    {
        $silo = \App\WasteSilo::findOrFail(Input::get('silo_id'));
        $capacity = Input::get('silo_capacity');

        $silo->capacity = $capacity / 100;
        if ( $capacity / 100 <= 1 && $capacity / 100 >= 0 ){
            $silo->save();
        }
        return redirect('wastesilos');
    }
}
