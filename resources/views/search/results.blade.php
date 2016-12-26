@extends('templates.default')

@section('content')
    <h3>Your Search Results For "{{ Request::input('query') }}"</h3>

    <div class="row">
        <div class="col-md-12">
            @include('user.partials.userblock')
        </div>
    </div>
@endsection