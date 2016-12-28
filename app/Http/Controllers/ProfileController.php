<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user) {
            abort(404);
        }
        // get the statuses for the visited user whether he is the current user or another user
        $statuses = $user->statuses()->notReply()->get();

        return view('profile.index')
                ->withUser($user)
                ->withStatuses($statuses)
                ->with('authUserIsFriend', Auth::user()->isFriendWith($user));
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
            'location' => 'max:50'
        ]);

        Auth::user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'location' => $request->location
        ]);

        return redirect()->route('profile.edit')
                    ->with('info', 'profile updated successfully.');    
    }

}
