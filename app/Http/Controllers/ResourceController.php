<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Resource;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ResourceController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $resources = \App\Resource::All();

        $data['resources'] = $resources;
        return view('detail/Resources', $data);
    }

    public function single($id){
        $resourcedata = DB::table('resources')->where('id', '=', $id)->first();
        return view('resources.edit', ["resourcedata" => $resourcedata]);
    }

    public function edit($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'capacity' => 'required',
        ]);

        $name = ucwords($request->name);
        $capacity = $request->capacity;

        DB::table('resources')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'capacity' => $capacity
            ]);

        return redirect('/resources')->with('success', 'Resource ' . $name . ' is updated. The changes are immediately active.');
    }

}