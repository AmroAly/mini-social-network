@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-5">
            @include('user.partials.userblock')
            <hr>
        </div>

        <div class="col-md-4 col-md-offset-2">
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