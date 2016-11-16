<?php

namespace App\Http\Controllers;


use App\PrimeSilo;
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
        //$users = \App\User::All();


        //$data['users'] = $users;
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
        \App\PrimeSilo::findOrFail(Input::get('silo_id'))->delete();

        return redirect('primesilos');
    }

    public function updateCapacityPrimeSilo()
    {
        $silo = \App\PrimeSilo::findOrFail(Input::get('silo_id'));
        $capacity = Input::get('silo_capacity');
        $resource_id = Input::get('resource_id');

        $silo->resource_id = $resource_id;

        $silo->capacity = $capacity / 100;
        if ($capacity / 100 <= 1 && $capacity / 100 >= 0)
        {
            $silo->save();
        }

        if ($capacity >= 90)
        {
            //$users = DB::table('users')->where('email_prime_silos_full', '=', true)->get();
            //$users = DB::table('users')->where('email', 'arnodedecker@telenet.be')->value('email');
            $users = Auth::user();
            $users->notify(new PrimeSiloFull($silo));
        }

        return redirect('primesilos');
    }
}
