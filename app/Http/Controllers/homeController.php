<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //view home.blade.php returnen bij succesvolle login
        return view('home');
    }
}
