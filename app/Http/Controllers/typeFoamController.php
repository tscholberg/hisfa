<?php

namespace App\Http\Controllers;

use App\typeFoam;
use App\Block;
use Illuminate\Http\Request;
use App\Http\Requests;
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

    public function routeAdd()
    {
        $typeFoams = typeFoam::all();
        return view('foam/add', ['typeFoams' => $typeFoams]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'block_name' => 'required'
        ]);

        $type = new typeFoam();
        $type->foamtype = Input::get('block_name');
        $type->save();

        $user = Auth::user();
        $type->addLog( 'added foam type', $user->name, $type->id, $type->id);
        return redirect('blocks')->with('success', 'The type is added!');
    }

    public function delete()
    {
        if ( \App\Block::findOrFail(Input::get('block_id'))->delete() )
        {
            $user = Auth::user();
            $type = new typeFoam();
            $type->addLog( 'deleted foam type', $user->name, Input::get('block_id'), Input::get('block_id'));
        }

        return redirect('blocks')->with('success', 'The type is deleted!');
    }
}
