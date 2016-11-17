<?php

namespace App\Http\Controllers;

use App\Notifications\PrimeSiloFull;
use App\User;
use Illuminate\Http\Request;
use App\PrimeSilo;
use App\Http\Traits\LogTrait;
use App\Http\Requests;


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
        $silo = new PrimeSilo;
        $silo->capacity = '0';
        $silo->resource_id = '1';
        $silo->name = Input::get('silo_name');
        $silo->save();

        $user = Auth::user();
        $silo->addLog( 'added prime silo', $user->name, $silo->id, $silo->id);

        return redirect('primesilos');
    }

    public function deletePrimeSilo()
    {
        if ( \App\PrimeSilo::findOrFail(Input::get('silo_id'))->delete() )
        {
            $user = Auth::user();

            $silo = new PrimeSilo();
            $silo->addLog( 'deleted prime silo', $user->name, Input::get('silo_id'), Input::get('silo_id'));
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
            $silo->addLog( 'updated prime silo', $user->name, $silo->id, $silo->id, $silo->resource_id);
        }

        if ($capacity >= 90)
        {
            $users = \App\User::where('email_prime_silos_full', '=', 1)->get();

            foreach ($users as $user)
            {
                $user->notify(new PrimeSiloFull($silo));
            }
        }

        return redirect('primesilos');
    }
}
