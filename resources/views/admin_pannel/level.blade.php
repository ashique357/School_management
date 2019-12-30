@extends('admin_pannel.admin_master')
@section('component')

  <div class="col-md-6">
            <form action="{{route('store.levels')}}" method="POST" role="form">
            {{ csrf_field() }}
            	<div class="col-md-8">
                <legend>Create a new level</legend>
              </div>

              <div class="form-group row">
                  <label for="name" class="col-md-6 form-control-label ">{{ __('Batch') }}</label>

                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                      @if ($errors->has('name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="semester_name" class="col-md-6 form-control-label">{{ __('Semester') }}</label>

                  <div class="col-md-6">
                      <input id="semester_name" type="text" class="form-control{{ $errors->has('semester_name') ? ' is-invalid' : '' }}" name="semester_name" value="{{ old('semester_name') }}" required autofocus>

                      @if ($errors->has('semester_name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('semester_name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
              <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
              </div>
            </form>
        </div>

@endsection
