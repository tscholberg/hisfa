<?php

namespace App\Http\Controllers;

use App\typeFoam;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class typeFoamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $typeFoams = \App\typeFoam::all();
        $data['typeFoams'] = $typeFoams;
        return view('blocks.index', $data);
    }

    public function addType()
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(){
        $typeFoam = \App\typeFoam::All();
        $data['typeFoam'] = $typeFoam;
        return view('foam.create', $data);
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        \App\typeFoam::create($request->all());

        return redirect()->action('typeFoamController@index');
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $typeFoam = \App\typeFoam::findOrFail($id);
        return view('foam.edit', compact('typeFoam'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $typeFoam = \App\typeFoam::findOrFail($id);
        $typeFoam->name = $request->input('name');
        $typeFoam->save();

        return redirect()->action('typeFoamController@index');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $typeFoam = \App\typeFoam::findOrFail($id);
        $typeFoam->delete();*/

        /* try{
            $typeFoam->delete();
        }catch(Exception $e){
            dd($e);
        } */

        /*return redirect()->back();
    }*/
}
