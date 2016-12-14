<?php

namespace App\Http\Controllers;

use App\lengthFoam;
use App\typeFoam;
use App\Block;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Auth;

class typeFoamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function routeAddType()
    {
        $typeFoams = typeFoam::all();
        return view('foam/addType', ['typeFoams' => $typeFoams]);
    }

    public function addType(Request $request)
    {
        $this->validate($request, [
            'foamType_name' => 'required'
        ]);

        $type = new typeFoam();
        $type->foamtype = Input::get('foamType_name');
        $type->save();
        $user = Auth::user();
        $type->addLog( 'Added type', $user->name, $type->foamtype, $type->id);

        return redirect('blocks')->with('success', 'The type is added!');
    }

    public function routeAddLength()
    {
        $blocks = Block::all();
        $typeFoams = typeFoam::all();
        return view('foam/addLength')->with(['blocks' => $blocks, 'typeFoams' => $typeFoams]);
    }

    public function addLength(Request $request)
    {
        $this->validate($request, [
            'foamType_id' => 'required',
            'foamType_length' => 'required',
            'foamType_units' => 'required'
        ]);
        $user = Auth::user();


        $length = new lengthFoam();
        $length->length = Input::get('foamType_length');
        $length->save();
        $length_id = $length->id;
        $length->addLog( 'Added length', $user->name, $length->length, $length->id);


        $block = new Block();
        $block->typefoam_id = Input::get('foamType_id');
        $block->lengthfoam_id = $length_id;
        $block->units = Input::get('foamType_units');

        $block->addLog( 'Added block', $user->name, $block->typefoam->foamtype, $block->id);
        $block->save();

        return redirect('blocks')->with('success', 'The type is added!');
    }

    public function increment()
    {
        $block = \App\Block::findOrFail(Input::get('units_id'));

        if ( $block )
        {
            $block->increment('units');
            $user = Auth::user();
            $block->addLog( 'Incremented blocks', $user->name, $block->units, $block->id);
        }

        return redirect('blocks')->with('success', 'The units are incremented!');
    }

    /*public function decrement()
    {
        $block = \App\Block::findOrFail(Input::get('units_id'));

        if ( $block )
        {
            $block->decrement('units');
            $user = Auth::user();
            $block->addLog( 'Decremented blocks', $user->name, $block->units, $block->id);

        }

        return redirect('blocks')->with('success', 'The units are decremented!');
    }*/

    public function decrement()
    {
        $id = \App\Block::findOrFail(Input::get('units_id'));

        if ( $id )
        {
            $id->decrement('units');
        }

        //return redirect('blocks')->with('success', 'The units are decremented!');
    }

    public function deleteLength()
    {
        $length = \App\Block::findOrFail(Input::get('length_id'));
        $user = Auth::user();
        $length->addLog( 'Deleted length', $user->name, $length->length, $length->id);
        $length->delete();
        return redirect('blocks')->with('success', 'The length is deleted!');
    }

    public function delete()
    {
        $type = \App\typeFoam::findOrFail(Input::get('typeFoam_id'));
        $user = Auth::user();
        $type->addLog( 'Deleted type', $user->name, $type->foamtype, $type->id);
        $type->delete();
        return redirect('blocks')->with('success', 'The type is deleted!');
    }
}