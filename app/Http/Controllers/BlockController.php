<?php

namespace App\Http\Controllers;

use App\typeFoam;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Block;
use Illuminate\Support\Facades\Input;

class BlockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $blocks = Block::all();
        return view('blocks/index')->with('blocks', $blocks);
    }

    public function addBlock()
    {
        $block = new Block();
        $block->height = Input::get('block_height');
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->typefoam_id = Input::get('block_type');
        $block->save();

        return redirect('blocks');
    }
}