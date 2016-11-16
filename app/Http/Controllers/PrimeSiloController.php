<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrimeSilo;
use App\Http\Traits\LogTrait;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class PrimeSiloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $primesilos = \App\PrimeSilo::All();
        $resources = \App\Resource::All();

        $data['resources'] = $resources;
        $data['primesilos'] = $primesilos;
        return view('detail/PrimeSilos', $data);

    }

    public function addPrimeSilo()
    {
        $user = Auth::user();

        $silo = new PrimeSilo;
        $silo->capacity = '0';
        $silo->resource_id = '1';
        $silo->name = Input::get('silo_name');
        $silo->save();

        $silo->addLog( 'addPrimeSilo', $user->name, $silo->id);

        return redirect('primesilos');
    }

    public function deletePrimeSilo()
    {
        if ( \App\PrimeSilo::findOrFail(Input::get('silo_id'))->delete() )
        {
            $user = Auth::user();

            $silo = new PrimeSilo();
            $silo->addLog( 'deletePrimeSilo', $user->user, 1);
        }

        return redirect('primesilos');
    }

    public function updateCapacityPrimeSilo()
    {
        $silo = \App\PrimeSilo::findOrFail(Input::get('silo_id'));
        $capacity = Input::get('silo_capacity');
        $resource_id = Input::get('resource_id');

        $silo->resource_id = $resource_id;

        $silo->capacity = $capacity / 100;
            if ( $capacity / 100 <= 1 && $capacity / 100 >= 0 ){
                $user = Auth::user();
                $silo->save();
                $silo->addLog( 'UpdateCapacityPrimeSilo', $user->name, $silo->id, $silo->resource_id, NULL, $silo->capacity);
            }

        return redirect('primesilos');
    }


}
