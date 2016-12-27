<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    }
}
