@extends('templates.default')

@section('content')
    <h2>Sign up</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('auth.signup') }}" role="form" method="post" class="form-vertical">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Your email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="control-label">Choose a username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') }}">
                    @if($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Choose a password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ Request::old('password') }}">
                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Signup</button>
            </form>
        </div>
    </div>
@endsection