@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <video width="320" height="240" controls>
  <source src="{{asset('storage/app/'.$video->location);}}" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
