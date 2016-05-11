@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/video') }}">
                      {!! csrf_field() !!}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Video</label>

                          <div class="col-md-6">
                              <input  type="file" name="video" accept="video/*" capture required="true">

                              @if ($errors->has('video'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('video') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                          <label class="col-md-4 control-label">Recipient Phone Number</label>

                          <div class="col-md-6">
                              <input type="tel" class="form-control" name="number" value="{{ old('number') }}" required="true">

                              @if ($errors->has('number'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('number') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-btn fa-video"></i>Send Video
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
