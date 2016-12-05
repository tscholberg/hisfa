<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Resource;
use App\Http\Requests;
use Validator;
use Image;
use Auth;

class ResourceController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $resources = \App\Resource::orderBy('name', 'ASC')->get();
        $user = Auth::user();
        $data['resources'] = $resources;
        $data['user'] = $user;
        return view('resources.index', $data);
    }

    public function detail($id){
        $resourcedata = DB::table('resources')->where('id', '=', $id)->first();
        return view('resources.edit', ["resourcedata" => $resourcedata]);
    }

    public function add(){
        return view('resources.add');
    }

    public function createResource(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'capacity' => 'required'
        ]);

        $resource = new Resource();
        $resource->name = Input::get('name');
        $resource->capacity = Input::get('capacity');
        $resource->save();

        $user = Auth::user();
        $resource->addLog( 'added new resource', $user->name, $resource->name, $resource->id);

        return view('resources.add')->with('success', 'Resouce was added succesfull!');
    }

    public function edit($id, Request $request){
        $this->validate($request, [
            'name' => 'required',
            'capacity' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        $name = $request->name;
        $capacity = $request->capacity;
        $update = ['name' => $name,'capacity' => $capacity];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d-H-i-s')."." . $image->getClientOriginalExtension();
            Image::make($image)->fit(330, 250)->save(public_path('img/resources/' . $filename));
            $image = $filename;
            $update = ['name' => $name,'capacity' => $capacity,'image' => $image];
        }

        DB::table('resources')
            ->where('id', $id)
            ->update($update);

        return redirect('/resources')->with('success', 'Resource ' . $name . ' is updated. The changes are immediately active.');
    }

    public function removeImage($id, Request $request){
        $update = ['image' => 'default.png'];

        DB::table('resources')
            ->where('id', $id)
            ->update($update);

        return redirect('/resources')->with('success', 'Resource ' . $request->name . 'is updated.');
    }

}