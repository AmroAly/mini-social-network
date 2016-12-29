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
        // Check if there is no user with such username
        if(!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found.');
        }
        // Check if there is pending request between the two users
        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
            return redirect()
                ->route('profile.index', $username)
                ->with('info', 'Friend request already pending');
        }

        if(Auth::user()->id == $user->id) {
            return redirect()->route('home');
        }

        // Check if the two users are already friends
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

    public function getAccept($username)
    {
        $user = User::where('username', $username)->first();
        // Check if there is no user with such username
        if(!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found.');
        }

        if(!Auth::user()->hasFriendRequestReceived($user)) {
            return redirect()
                    ->route('home', $username);
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
                ->route('profile.index', $username)
                ->with('info', "You and $username are now friends.");
    }

    public function postDelete($username)
    {   
        $user = User::where('username', $username)->first();
         if(!Auth::user()->isFriendWith($user)) {
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);

        return redirect()->route('profile.index', $username)
                ->with('info', 'Friend Deleted');
    }
}
