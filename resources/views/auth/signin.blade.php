@extends('templates.default')


@section('content')
<h2>Sign in</h2>
<div class="row">

    <div class="col-md-6">
        <form action="" method="post" class="form-vertical">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Your email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Choose a password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ Request::old('password') }}">
                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Signin</button>
        </form>
    </div>
</div>
@endsection