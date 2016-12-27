<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();

        $requests = Auth::user()->getRequests();

        return view('friends.index')
                ->withFriends($friends)
                    ->withRequests($requests);
    }

    public function getAdd($username)
    {
        dd($username);
    }
}
