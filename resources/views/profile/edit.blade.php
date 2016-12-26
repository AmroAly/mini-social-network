@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-md-6">
    <h3>Update your profile</h3>
            <form action="{{ route('profile.edit') }}" class="form-vertical" method="post">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="first_name" class="control-label">First name</label>
                        <input type="text" name="first_name" class="form-control" id ="first_name" value="{{ Auth::user()->first_name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="last_name" class="control-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><label for="location" class="control-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{ Auth::user()->location }}">
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection