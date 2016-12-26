<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class SearchController extends Controller
{
    public function getResults(Request $request)
    {
        $query = $request->input('query', 'default');
        
        if(!$query) {
            return redirect()->route('home');
        }

        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', "%{$query}%")
        ->orWhere('username', 'like', "%{$query}%")
        ->orWhere('email',  'like', "%{$query}%")
        ->get();

        dd($users);

        return view('search.results')
                ->withUsers($users);
    }
}
