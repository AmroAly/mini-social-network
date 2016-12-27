@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <textarea placeholder="What's up name?" id="status" name="status" class="form-control" row="2"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Add post</button>
            </form>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
        
        </div>
    </div>
@endsection