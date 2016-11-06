<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Validator;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile/overview');
    }


    public function changePassword()
    {
        if ($_POST['new-password1'] === $_POST['new-password2']) {
            $user = Auth::user();
            $user->password = bcrypt($_POST['new-password1']);
            $user->save();
            return redirect('profile');
        } else {
            return redirect('profile');
        }
    }


}
