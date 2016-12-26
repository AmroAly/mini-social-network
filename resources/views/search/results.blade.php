@extends('templates.default')

@section('content')
    <h3>Your Search Results For "{{ Request::input('query') }}"</h3>

    @if(!$users->count())
    <h4>No results found.</h4>
    @else
        <div class="row">
            <div class="col-md-12">

            @foreach($users as $user)

                @include('user.partials.userblock')

            @endforeach
            
            </div>
        </div>
    @endif
@endsection