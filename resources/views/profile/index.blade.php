@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-5">
            @include('user.partials.userblock')
            <hr>

            @if(!$statuses->count())
                <p>{{ $user->getFirstnameOrUsername() }} hasn't posted anything yet.</p>
            @else
                @foreach($statuses as $status)
                    
                    <div class="media">
                        <a href="{{ route('profile.index', $status->user->username) }}" class="pull-left">
                            <img class="media-object" src="{{ $status->user->getAvatarUrl() }}" alt="{{ $status->user->getNameOrUsername() }}">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="{{ route('profile.index', $status->user->username) }}">{{ $status->user->getNameOrUsername() }}</a>
                            </h4>
                            <p>{{ $status->body }}</p>
                            <ul class="list-inline">
                                <li>{{ $status->created_at->diffForHumans() }}</li>
                                <li><a href="">Like</a></li>
                                <li>10 likes</li>
                            </ul>
                            {{-- get the comments foreach post--}}
                            @foreach($status->replies as $reply)
                            <div class="media">
                                <a href="{{ route('profile.index', $reply->user->username) }}" class="pull-left">
                                    <img src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="{{ route('profile.index', $reply->user->username) }}">{{ $reply->user->getNameOrUsername() }}</a></h5>
                                    <p>{{ $reply->body }}</p>
                                    <ul class="list-inline">
                                        <li>{{ $reply->created_at->diffForHumans() }}</li>
                                        <li><a href="">Like</a></li>
                                        <li>10 likes</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                            {{-- check if the current user is friend with visited user --}}
                            @if ($authUserIsFriend || Auth::user()->id === $user->id)
                                <form role="form" action="{{ route('status.reply', $status->id) }}" method="post">
                                {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error': ''}}">
                                        <textarea name="reply-{{ $status->id }}" id="" rows="1" class="form-control"></textarea>
                                        @if($errors->has("reply-{$status->id}"))
                                            <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                        @endif
                                    </div>
                                    <input type="submit" value="reply" class="btn btn-default btn-sm">
                                </form>
                                @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif

        </div>

        <div class="col-md-4 col-md-offset-2">
            <!--Check if the visited user has friend  request from the current user-->
             @if(Auth::user()->hasFriendRequestPending($user))
                <p>Waiting for {{ $user->getFirstnameOrUsername() }} to accept your request.</p>
            <!--Check if the visited user has sent request to the current user-->
             @elseif(Auth::user()->hasFriendRequestReceived($user))   
                <a href="{{ route('friend.accept', $user->username) }}" class="btn btn-success">accept friend request</a>
             @elseif(Auth::user()->isFriendWith($user))
                <p>You and {{ $user->getFirstnameOrUsername() }} are friends.</p>
             @elseif(Auth::user()->id !== $user->id)
             <!--If there is no relation between the visited user and the current user-->
                <a href="{{ route('friend.add', $user->username) }}" class="btn btn-info">Add as friend</a>      
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