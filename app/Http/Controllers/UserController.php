<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Auth\User;
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

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|Min:2',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Alle items are validated
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if(!empty($request->avatar)){
            $user->avatar = $request->avatar;
            $avatar = $request->file('avatar');
            //id opnieuw ophalen
            $filename = $user->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($request->avatar)->fit(300, 300)->save(public_path('/img/profile-pictures/' . $filename ) );
            $request->avatar->move(public_path('/img/profile-pictures'), $filename);
        }


        $user->save();
        return redirect('/users')->with('success', 'The new user is created!');

    }

    public function update($id){
        $profiledata = DB::table('users')->where('id', '=', $id)->first();
        return view('user.edit', ["profiledata" => $profiledata]);
    }

    public function delete($id){
        //has users right permissions to delete an user?

        //is the user we want to delete not user with id 1 (username: admin. For self locking protection)
        //does the user we want to delete exist? Yes, then delete this user
        if($id != 1){
            DB::table('users')->where('id', '=', $id)->delete();
        }
        return redirect('/users')->with('success', 'The selected user is deleted!');;
    }

}
