<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Quotation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
        return view('profile.index', $data);
    }


    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'currentpassword' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);


        $user = Auth::user();

        //check if old password matches db password => change password
        if (Hash::check($request->currentpassword, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('profile')->with('success', 'Your password is changed!');
        } else {
            return redirect('profile')->with('error', 'Your current password is not correct.');
        }

    }


    public function deleteProfilePicture()
    {
        $user = Auth::user();
        $avatar = $user->avatar;
        $default = "default.png";
        $path = "/img/profile-pictures/" . $avatar;
        if ($avatar !== $default) {
            @unlink(public_path($path));
        }
        return true;

    }

    public function updateProfilePicture(Request $request)
    {

        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('avatar')) {
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = $user->id . '.' . $avatar->getClientOriginalExtension();
            if ($this->deleteProfilePicture()) {
                Image::make($avatar)->fit(300, 300)->save(public_path('/img/profile-pictures/' . $filename));
                $user->avatar = $filename;
                $user->save();
                return redirect('profile')->with('success', 'Your profile picture is changed!');
            } else {
                return redirect('profile')->with('error', 'Your profile picture isn\'t changed due to an error.');
            }
        } else {
            return redirect('profile')->with('error', 'You have to choose a profile picture on your device before you can update your avatar.');
        }
    }


    public function updateEmailPreferences(Request $request)
    {
        $this->updateEmailAddress($request);
        $this->updateEmailNotifications($request);

        return redirect('profile')->with('success', 'Your email preferences have been changed!');

    }


    public function updateEmailAddress($request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $emailAddress = $request->input('email');
        $user->email = $emailAddress;
        $user->save();
    }

    public function updateEmailNotifications($request)
    {
        $user = Auth::user();

        //eerst alles op false zetten anders in conflict met if checked => checked attribuut in blade file
        $user->email_prime_silos_full = false;
        $user->email_waste_silos_full = false;


        if (isset($request->checkboxPrimeFull) && $request->checkboxPrimeFull == "on") {
            $user->email_prime_silos_full = true;
        }

        if (isset($request->checkboxWasteFull) && $request->checkboxWasteFull == "on") {
            $user->email_waste_silos_full = true;
        }

        $user->save();

    }
}
