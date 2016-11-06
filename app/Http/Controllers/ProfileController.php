<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Validator;
use Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();
        $data = ["user" => $user];
        return view('profile/index', $data);
    }



    public function updatePassword()
    {

        if ($_POST['new-password1'] === $_POST['new-password2']) {
            $user = Auth::user();

            $oldPasswordInput = $_POST['current-password'];
            echo $oldPasswordInput;

            //check if old password matches db password => change password
            if (Hash::check($oldPasswordInput, $user->password)) {
                $user->password = bcrypt($_POST['new-password1']);
                $user->save();
                return redirect('profile')->with('success-password', 'Your password is changed!');
            } else {
                return redirect('profile')->with('error-password', 'Password is not changed. Your current password is not correct.');
            }

        } else {
            return redirect('profile')->with('error-password', 'Password is not changed. Your new password does not match.');
        }
    }


    public function deleteProfilePicture()
    {
        $user = Auth::user();
        $avatar = $user->avatar;
        $default = "default.png";
        $path = "/img/profile-pictures/" . $avatar;
        if($avatar !== $default){
            @unlink(public_path($path));
        }
        return true;

    }

    public function updateProfilePicture(Request $request){

        if($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = $user->id . '.' . $avatar->getClientOriginalExtension();
            if($this->deleteProfilePicture()){
                Image::make($avatar)->fit(300, 300)->save(public_path('/img/profile-pictures/' . $filename ) );
                $user->avatar = $filename;
                $user->save();
                return redirect('profile')->with('success-avatar', 'Your profile picture is changed!');
            }else{
                return redirect('profile')->with('error-avatar', 'Your profile picture isn\'t changed due to an error.');
            }
        }else{
            return redirect('profile')->with('error-avatar', 'Your profile picture isn\'t changed.');
        }
    }


}
