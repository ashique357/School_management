@extends('admin_pannel.admin_master')
@section('component')

  <div class="col-md-6">
            <form action="" method="POST" role="form">
            {{ csrf_field() }}
              <div class="col-md-8">
                <legend>Edit Subject</legend>
              </div>

              <div class="form-group row">
                  <label for="name" class="col-md-6 form-control-label ">{{ __('Subject Name') }}</label>

                  <div class="col-md-6">
                      <input id="subject_name" type="text" class="form-control{{ $errors->has('subject_name') ? ' is-invalid' : '' }}" name="subject_name" value="{{ old('subject_name',$subject->subject_name) }}"  required autofocus>

                      @if ($errors->has('subject_name'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('subject_name') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row">
                  <label for="subject_code" class="col-md-6 form-control-label">{{ __('Subject Code') }}</label>

                  <div class="col-md-6">
                      <input id="subject_code" type="text" class="form-control{{ $errors->has('subject_code') ? ' is-invalid' : '' }}" name="subject_code" name="subject_code" value="{{ old('subject_code',$subject->subject_code) }}" required autofocus>

                      @if ($errors->has('subject_code'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('subject_code') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
           
    

                  <div class="form-group row">
                            <label for="" class="col-md-6 form-control-label">{{ __('Teacher Name') }}</label>
                            <div class="col-md-6">
                              <select name="teacher_id" id="inputteacher_id" class="form-control" required="required">
                                <option value="">Select Teacher</option>
                                  @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
    
                  <div class="form-group row">
                            <label for="" class="col-md-6 form-control-label">{{ __('Batch') }}</label>
                            <div class="col-md-6">
                              <select name="level_id" id="inputlevel_id" class="form-control" required="required">
                                <option value="">Select Batch</option>
                                  @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                  @endforeach
                              </select>
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
