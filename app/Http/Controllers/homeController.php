<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\PrimeSilo;
use App\WasteSilo;
use App\typeFoam;

class homeController extends Controller{
	public function index(){
		$primesilos = \App\PrimeSilo::All();
		$wastesilos = \App\WasteSilo::All();
		$typeFoams = \App\typeFoam::all();

		$data['primesilos'] = $primesilos;
		$data['wastesilos'] = $wastesilos;
		$data['typeFoams'] = $typeFoams;
		
		return view('welcome', $data);
	}
}
