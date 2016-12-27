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
        $user = User::where('username', $username)->first();
        if(!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found.');
        }

        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
            return redirect()
                ->route('profile.index', $username)
                ->with('info', 'Friend request already pending');
        }

        if(Auth::user()->isFriendWith($user)) {
            return redirect()
                ->route('profile.index', $username)
                ->with('info', 'You and '.$username .' are already friends');
        }

        Auth::user()->addFriend($user);

         return redirect()
                ->route('profile.index', $username)
                ->with('info', 'Friend request sent.');
    }
}
