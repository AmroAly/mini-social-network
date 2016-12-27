@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('status.post') }}" method="post">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('status') ? ' has-error':'' }}">
                    <textarea placeholder="What's up {{ Auth::user()->getFirstnameOrUsername() }}?" id="status" name="status" class="form-control" row="2"></textarea>
                
                    @if($errors->has('status'))
                        <span class="help-block">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-default">Add post</button>
            </form>
            <hr>
        </div>
    </div>

<!--get the statuses for the current user and his friends -->
    <div class="row">
        <div class="col-md-5">
            @if(!$statuses->count())
                <p>There is nothing in your timeline, yet.</p>
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
                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="form-group">
                            <textarea name="" id="" rows="1" class="form-control"></textarea>
                        </div>
                        <input type="submit" value="reply" class="btn btn-default btn-sm">
                    </form>

                @endforeach
                {{ $statuses->links() }}
            @endif
        </div>
    </div>
@endsection