<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //middleware auth zorgt ervoor dat we eerst kunnen valideren of er geldig is ingelogd alvorens naar de app pagina te gaan
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blocks = \App\Block::all();
        $data['blocks'] = $blocks;

        $primesilos = \App\PrimeSilo::all();
        $data['primesilos'] = $primesilos;

        $wastesilos = \App\WasteSilo::all();
        $data['wastesilos'] = $wastesilos;

        $typeFoams = \App\typeFoam::all();
        $data['typeFoams'] = $typeFoams;

        return view('dashboard', $data);
    }
}
