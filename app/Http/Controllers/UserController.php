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
        return view('user.index', ['users' => $users]);
    }

    public function create(){
        return view('user.create');
    }

    public function detail($id){
        return view('user.detail');
    }

    public function update($id){

    }

    public function delete($id){
        //has users right permissions to delete an user?

        //is the user we want to delete not user with id 1 (username: admin. For self locking protection)
        //does the user we want to delete exist? Yes, then delete this user
        if($id != 1){
            DB::table('users')->where('id', '=', $id)->delete();
        }
        return redirect('/users')->with('success-userdelete', 'The selected user is deleted!');;
    }

}
