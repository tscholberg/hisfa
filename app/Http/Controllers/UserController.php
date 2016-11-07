<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = DB::table('users')->get();
        return view('user/index', ['users' => $users]);
    }

    public function create(){
        return view('user/create');
    }

    public function detail($id){
        return view('user/detail');
    }

    public function update($id){

    }

    public function delete($id){

    }

}
