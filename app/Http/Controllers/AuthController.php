<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|alpha_dash|max:255',
            'password' => 'required|min:6'
        ]);

        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('home')->with('info', 'Your account has been created and you can now sign in');       
    }

    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password],
            $request->has('remember'))) {
                return redirect()->back()->with('info', 'We couldn\'t sign you in with those credentials.');
        }

        return redirect()->route('home')->with('info', 'You are now signed in');
    }
}