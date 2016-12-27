@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-5">
            @include('user.partials.userblock')
            <hr>
        </div>

        <div class="col-md-4 col-md-offset-2">
            <!--Check if the visited user has friend  request from the current user-->
             @if(Auth::user()->hasFriendRequestPending($user))
                <p>Waiting for {{ $user->getFirstnameOrUsername() }} to accept your request.</p>
            <!--Check if the visited user has sent request to the current user-->
             @elseif(Auth::user()->hasFriendRequestReceived($user))   
                <a href="" class="btn btn-success">accept friend request</a>
             @elseif(Auth::user()->isFriendWith($user))
                <p>You and {{ $user->getFirstnameOrUsername() }} are friends.</p>
             @else
             <!--If there is no relation between the visited user and the current user-->
                <a href="" class="btn btn-info">Add as friend</a>      
             @endif

            <h3>{{ $user->getFirstnameOrUsername() }}'s friends</h3>

            @if(!$user->friends()->count())
                <p>{{ $user->getFirstnameOrUsername() }} has no friends yet.</p>
            @else
                @foreach($user->friends() as $user)
                     @include('user.partials.userblock')
                @endforeach
            @endif
        </div>
        
    </div>
@endsection