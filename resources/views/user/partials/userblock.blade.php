

<div class="media">
    <a href="{{ route('profile.index', $user->username) }}" class="pull-left">
        <img src="{{ $user->getAvatarUrl() }}" alt="{{ $user->getNameOrUsername() }}" class="media-object">
    </a>
    <a href="{{ route('profile.index', $user->username) }}" class="pull-lef">
       <h4 class="media-heading"><a href="{{ route('profile.index', $user->username) }}">{{ $user->getNameOrUsername() }}</a></h4>
       @if($user->location)
        <p>{{ $user->location }}</p>
       @endif
    </a>
</div>