<?php

namespace App\Http\Controllers;

use App\Notifications\WasteSiloFull;
use App\WasteSilo;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Traits\LogTrait;


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

        $user = Auth::user();
        $silo->addLog( 'added waste silo', $user->name, $silo->id, $silo->id);

        return redirect('wastesilos');
    }

    public function deleteWasteSilo(){
        if ( \App\WasteSilo::findOrFail(Input::get('silo_id'))->delete() ){
            $user = Auth::user();
            $silo = new WasteSilo();
            $silo->addLog( 'deleted waste silo', $user->name, Input::get('silo_id'), Input::get('silo_id'));
        }
        return redirect('wastesilos');
    }

    public function updateCapacityWasteSilo()
    {
        $silo = \App\WasteSilo::findOrFail(Input::get('silo_id'));
        $capacity = Input::get('silo_capacity');

        $silo->capacity = $capacity / 100;
        if ( $capacity / 100 <= 1 && $capacity / 100 >= 0 ){
            $silo->save();
            $user = Auth::user();
            $silo->addLog( 'updated waste silo', $user->name, $silo->capacity ,$silo->id);

            if ($capacity >= 90)
            {
                //$users = DB::table('users')->where('email_prime_silos_full', 1)->get();
                $users = Auth::user();
                $users->notify(new WasteSiloFull($silo));
            }
        }

        return redirect('wastesilos');
    }
}
