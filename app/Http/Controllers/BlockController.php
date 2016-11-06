<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Block;

class BlockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $blocks = Block::all();
        return view('block-types/block')->with('blocks', $blocks);
    }
}