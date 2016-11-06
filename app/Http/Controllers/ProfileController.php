<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use Hash;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile/index');
    }



    public function changePassword()
    {

        if ($_POST['new-password1'] === $_POST['new-password2']) {
            $user = Auth::user();

            $oldPasswordInput = $_POST['current-password'];
            echo $oldPasswordInput;

            //check if old password is correct => change password
            if (Hash::check($oldPasswordInput, $user->password)) {
                $user->password = bcrypt($_POST['new-password1']);
                $user->save();
                return redirect('profile')->with('success', 'Your password is changed!');
            } else {
                return redirect('profile')->with('error', 'Password is not changed. Your current password is not correct.');
            }

        } else {
            return redirect('profile')->with('error', 'Password is not changed. Your new password does not match.');
        }
    }


}
