<?php

namespace App\Http\Controllers;

use App\typeFoam;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Block;
use Illuminate\Support\Facades\Input;
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
        $typeFoams = typeFoam::all();
        return view('blocks/index')->with(['blocks' => $blocks, 'typeFoams' => $typeFoams]);
    }

    public function addBlock()
    {
        $block = new Block();
        $block->height = Input::get('block_height');
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->typefoam_id = Input::get('block_type');
        $block->save();

        return redirect('blocks')->with('success', 'The block is added!');
    }

    public function updateBlock()
    {
        $block = \App\Block::findOrFail(Input::get('block_id'));

        return view('blocks/update')->with('block', $block);
    }

    public function update()
    {
        $block = \App\Block::findOrFail(Input::get('block_id'));
        $block->height = Input::get('block_height');
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->save();

        return redirect('blocks')->with('success', 'The block is updated!');
    }
}