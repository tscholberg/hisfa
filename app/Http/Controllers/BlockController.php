<?php

namespace App\Http\Controllers;

use App\typeFoam;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Block;
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
//        $usedTypeFoams = Block::
        return view('blocks.index')->with(['blocks' => $blocks, 'groupedBlocksByTypefoam' => $groupedTypeFoams, 'typeFoams' => $typeFoams]);
    }

    public function routeAdd()
    {
        $blocks = Block::all();
        $typeFoams = typeFoam::all();
        return view('blocks/add')->with(['blocks' => $blocks, 'typeFoams' => $typeFoams]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'block_length' => 'required',
            'block_units' => 'required',
            'block_type' => 'required'
        ]);

        $block = new Block();
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->typefoam_id = Input::get('block_type');
        $block->save();

        $user = Auth::user();
        $block->addLog( 'added block', $user->name, $block->units."x ( ".$block->length." )".$block->typeFoam->name, $block->id);
        return redirect('blocks')->with('success', 'The block is added!');
    }

    public function routeUpdate()
    {
        $block = \App\Block::findOrFail(Input::get('block_id'));
        return view('blocks/update')->with('block', $block);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'block_length' => 'required',
            'block_units' => 'required'
        ]);

        $block = \App\Block::findOrFail(Input::get('block_id'));
        $block->length = Input::get('block_length');
        $block->units = Input::get('block_units');
        $block->save();

        $user = Auth::user();
        $block->addLog( 'updated block', $user->name, $block->id, $block->id);
        return redirect('blocks')->with('success', 'The block is updated!');
    }
}