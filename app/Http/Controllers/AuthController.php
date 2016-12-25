<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        
    }
}