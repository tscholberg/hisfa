<?php

namespace App\Http\Controllers;
use App\PermissionUser;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Hash;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $currentUser = Auth::user();
        $users = DB::table('users')->get();
        return view('user.index', ['users' => $users, 'currentUser' => $currentUser]);
    }

    public function create(){
        return view('user.create');
    }


    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|Min:2',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        // Alle items are validated
        $user = new User;
        $user->name = ucwords($request->name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        // add avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = date('Y-m-d-H-i-s')."." . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300, 300)->save(public_path('img/profile-pictures/' . $filename));
            $user->avatar = $filename;
        }


        //permissions
        if(isset($request->checkboxViewStock) && $request->checkboxViewStock == "on"){
            $user->view_stock = true;
        }

        if(isset($request->checkboxViewDashboard) && $request->checkboxViewDashboard == "on"){
            $user->view_dashboard = true;
        }

        if(isset($request->checkboxViewWasteSilos) && $request->checkboxViewWasteSilos == "on"){
            $user->view_waste_silos = true;
        }

        if(isset($request->checkboxViewMaterialSilos) && $request->checkboxViewMaterialSilos == "on"){
            $user->view_prime_silos = true;
        }

        if(isset($request->checkboxModifyStock) && $request->checkboxModifyStock == "on"){
            $user->manage_stock = true;
        }

        if(isset($request->checkboxModifyWasteSilos) && $request->checkboxModifyWasteSilos == "on"){
            $user->manage_waste_silos = true;
        }

        if(isset($request->checkboxModifyMaterialSilos) && $request->checkboxModifyMaterialSilos == "on"){
            $user->manage_prime_silos = true;
        }

        if(isset($request->checkboxModifyUsers) && $request->checkboxModifyUsers == "on"){
            $user->manage_users = true;
        }

        if(isset($request->checkboxAdmin) && $request->checkboxAdmin == "on"){
            $user->admin = true;
            $user->view_dashboard = true;
            $user->view_stock = true;
            $user->view_waste_silos = true;
            $user->view_prime_silos = true;
            $user->manage_stock = true;
            $user->manage_waste_silos = true;
            $user->manage_prime_silos = true;
            $user->manage_users = true;
        }

        $name = $user->name;
        $user->save();
        return redirect('/users')->with('success', 'User ' . $name . ' is created and can now access the Hisfa platform!');

    }


    public function detail($id){
        $profiledata = DB::table('users')->where('id', '=', $id)->first();
        return view('user.edit', ["profiledata" => $profiledata]);
    }


    public function edit($id, Request $request){
        $this->validate($request, [
            'name' => 'required|Min:2',
            'email' => 'required|email',
            'password' => 'confirmed|min:6',
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        // Alle items are validated
        $name = ucwords($request->name);
        $email = $request->email;
        $password = bcrypt($request->password);


        // add avatar
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = date('Y-m-d-H-i-s')."." . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300, 300)->save(public_path('img/profile-pictures/' . $filename));
            $avatar = $filename;
        }else{
            $avatar = "default.png";
        }


        //permissions
        if(isset($request->checkboxViewStock) && $request->checkboxViewStock == "on"){
            $view_stock = true;
        }else{
            $view_stock = false;
        }

        if(isset($request->checkboxViewDashboard) && $request->checkboxViewDashboard == "on"){
            $view_dashboard = true;
        }else{
            $view_dashboard = false;
        }

        if(isset($request->checkboxViewWasteSilos) && $request->checkboxViewWasteSilos == "on"){
            $view_waste_silos = true;
        }else{
            $view_waste_silos = false;
        }

        if(isset($request->checkboxViewMaterialSilos) && $request->checkboxViewMaterialSilos == "on"){
            $view_prime_silos = true;
        }else{
            $view_prime_silos = false;
        }

        if(isset($request->checkboxModifyStock) && $request->checkboxModifyStock == "on"){
            $manage_stock = true;
        }else{
            $manage_stock = false;
        }

        if(isset($request->checkboxModifyWasteSilos) && $request->checkboxModifyWasteSilos == "on"){
            $manage_waste_silos = true;
        }else{
            $manage_waste_silos = false;
        }

        if(isset($request->checkboxModifyMaterialSilos) && $request->checkboxModifyMaterialSilos == "on"){
            $manage_prime_silos = true;
        }else{
            $manage_prime_silos = false;
        }

        if(isset($request->checkboxModifyUsers) && $request->checkboxModifyUsers == "on"){
            $manage_users = true;
        }else{
            $manage_users = false;
        }

        if(isset($request->checkboxAdmin) && $request->checkboxAdmin == "on"){
            $admin = true;
            $view_dashboard = true;
            $view_stock = true;
            $view_waste_silos = true;
            $view_prime_silos = true;
            $manage_stock = true;
            $manage_waste_silos = true;
            $manage_prime_silos = true;
            $manage_users = true;
        }else{
            $admin = false;
        }


        DB::table('users')
            ->where('id', $id)
            ->update([
               'name' => $name,
               'email' => $email,
               'password' => $password,
               'avatar' => $avatar,
               'admin' => $admin,
                'view_stock' => $view_stock,
                'view_dashboard' => $view_dashboard,
                'view_waste_silos' => $view_waste_silos,
                'view_prime_silos' => $view_prime_silos,
                'manage_stock' =>  $manage_stock,
                'manage_waste_silos' => $manage_waste_silos,
                'manage_prime_silos' => $manage_prime_silos,
                'manage_users' => $manage_users,
            ]);

        return redirect('/users')->with('success', 'User ' . $name . ' is updated. The changes are immediately active.');
    }


    public function delete($id){
        //has users right permissions to delete an user?

        //is the user we want to delete not user with id 1 (username: admin. For self locking protection)
        //does the user we want to delete exist? Yes, then delete this user
        if($id != 1){
            DB::table('users')->where('id', '=', $id)->delete();
        }
        return redirect('/users')->with('success', 'The user has been deleted!');
    }


    public function denied(){
        return view('errors.noaccess');
    }


}
