<?php

namespace App\Http\Controllers;

use App\typeFoam;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Block;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Validator;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blocks = Block::all();
        $groupedTypeFoams = Block::all()->groupBy('typefoam_id');
        $typeFoams = typeFoam::all();
        return view('blocks.index')->with(['blocks' => $blocks, 'groupedBlocksByTypefoam' => $groupedTypeFoams, 'typeFoams' => $typeFoams]);
    }
}