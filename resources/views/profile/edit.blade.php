@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-md-6">
    <h3>Update your profile</h3>
            <form action="{{ route('profile.edit') }}" class="form-vertical" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('first_name') ? ' has-error': '' }}"><label for="first_name" class="control-label">First name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
                        @if($errors->has('first_name'))
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error': '' }}"><label for="last_name" class="control-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
                        @if($errors->has('last_name'))
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('location') ? ' has-error': '' }}"><label for="location" class="control-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{ Request::old('location') ?:  Auth::user()->location }}">
                        @if($errors->has('location'))
                            <span class="help-block">{{ $errors->first('location') }}</span>
                        @endif
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection