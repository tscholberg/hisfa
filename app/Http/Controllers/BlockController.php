<?php

namespace App\Http\Controllers;

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

    public function add()
    {
        $block = new Block;
        $block->id = Input::get('block_id');
        $block->typefoam->foamtype = Input::get('block_name');
        $block->height = Input::get('block_height');
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->save();

        return redirect('blocks');
    }

    public function delete()
    {
        \App\Block::findOrFail(Input::get('block_id'))->delete();

        return redirect('blocks');
    }
}