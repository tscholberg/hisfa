<?php

namespace Hisfa\Http\Controllers;

use Hisfa\typeFoam;
use Illuminate\Http\Request;
use Hisfa\Http\Requests;
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
        $typeFoams = \Hisfa\typeFoam::all();
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
        \Hisfa\Block::findOrFail(Input::get('block_id'))->delete();

        return redirect('blocks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create(){
        $typeFoam = \Hisfa\typeFoam::All();
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
        \Hisfa\typeFoam::create($request->all());

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
        $typeFoam = \Hisfa\typeFoam::findOrFail($id);
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
        $typeFoam = \Hisfa\typeFoam::findOrFail($id);
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
        $typeFoam = \Hisfa\typeFoam::findOrFail($id);
        $typeFoam->delete();*/

        /* try{
            $typeFoam->delete();
        }catch(Exception $e){
            dd($e);
        } */

        /*return redirect()->back();
    }*/
}
