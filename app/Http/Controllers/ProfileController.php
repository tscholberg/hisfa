<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile/index');
    }



    public function updateProfilePicture(){
        if($_POST['filePicture']){
            $user = Auth::user();
            $extension = Input::file('filePicture')->getClientOriginalExtension();
            $fileName = $user->id . '.' . $extension;
            $imagePath = '/img/profile-pictures/' . $fileName;
            $user->avatar = $imagePath;
            $user->save();
            return redirect('profile')->with('success-avatar', 'You profile picture is changed!');
        }else{
            return redirect('profile')->with('error-avatar', 'Profile picture is not changed.');
        }
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


}
