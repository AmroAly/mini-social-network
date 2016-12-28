<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Status;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:500'
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->status,
        ]);

        return redirect()->route('home')
                ->with('info', 'Status posted.');
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:500'
        ], [
            'required' => 'The reply body is required'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('home');
        }

        // Check if not the current user is friend with the user has posted the main status And that he does not reply to his own status
        if (!Auth::user()->isFriendWith($status->user) && Auth::user()->id !== $status->user->id) {
            return redirect()->route('home');
        }

        $reply = $status->create([
            'body' => $request->input("reply-$statusId"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        // Check if the status exists
        if (!$status) {
            return redirect()->route('home');
        }

        // Check if the current user is friend with the user has posted the status
        if (!Auth::user()->isFriendWith($status->user)) {
            return redirect()->route('home');
        }

        // Check if the user has already liked the session_status
        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->route('home');
        } 
        // Create like
        $like = $status->likes()->create([]);
        Auth::user()->likes()->save($like);
        
        return redirect()->back();
    }
}
