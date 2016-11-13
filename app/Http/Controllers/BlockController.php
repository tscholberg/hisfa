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

    public function addBlock(Request $request)
    {
        $block = new Block();
        $block->heigth = $request->block_height;
        $block->length = $request->block_length;
        $block->units = $request->block_units;
        $block->typefoam_id = $request->typeFoam_id;
        $block->save();

        return redirect('blocks');
    }
}