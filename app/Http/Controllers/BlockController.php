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

    /*public function addType()
    {
        $type = new typeFoam();
        $type->foamtype = Input::get('block_name');
        $type->save();

        return redirect('blocks');
    }

    public function deleteType()
    {
        \App\Block::findOrFail(Input::get('block_id'))->delete();

        return redirect('blocks');
    }*/

    public function addBlock()
    {
        $block = new Block();
        $block->heigth = Input::get('block_height');
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        \App\Block::findOrFail(Input::get('block_id'))->save();

        return redirect('blocks');
    }
}