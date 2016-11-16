<?php

namespace Hisfa\Http\Controllers;

use App;
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

        $blocks = \Hisfa\Block::all();
        $data['blocks'] = $blocks;

        $primesilos = \Hisfa\PrimeSilo::all();
        $data['primesilos'] = $primesilos;

        $wastesilos = \Hisfa\WasteSilo::all();
        $data['wastesilos'] = $wastesilos;

        $typeFoams = \Hisfa\typeFoam::all();
        $data['typeFoams'] = $typeFoams;

        $resources = \Hisfa\Resource::All();
        $data['resources'] = $resources;

        return view('dashboard', $data);
    }
}
