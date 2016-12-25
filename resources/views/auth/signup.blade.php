@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('auth.signup') }}" role="form" method="post" class="form-vertical">
            {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Your email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="">
                </div>
                <div class="form-group">
                    <label for="username">Choose a username</label>
                    <input type="text" name="username" class="form-control" id="username" value="">
                </div>
                <div class="form-group">
                    <label for="password">Choose a password</label>
                    <input type="password" name="password" class="form-control" id="password" value="">
                </div>
                <button type="submit" class="btn btn-default">Signup</button>
            </form>
        </div>
    </div>
@endsection