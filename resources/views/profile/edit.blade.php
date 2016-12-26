@extends('templates.default')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="" class="form-vertical" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="first_name" class="control-label">First name</label>
                        <input type="text" name="first_name" class="form-control" id ="first_name" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="last_name" class="control-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="">
                        </div>
                    </div>
                        <div class="form-group"><label for="location" class="control-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location" value="">
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection