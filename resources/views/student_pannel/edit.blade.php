@extends('student_pannel.student_master')

@section('component')
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header text-center text-uppercase h4 font-weight-light">{{ __("Student's Information Update") }}</div>

                <div class="card-body py">
                    <form method="post" enctype="multipart/form-data" action="/student/{{$student->id}}">
                        @csrf

                        <div class="form-group">
                            <label for="student_name" class="col-md-6 form-control-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="student_name" type="text" class="form-control{{ $errors->has('student_name') ? ' is-invalid' : '' }}" name="student_name" value="{{ old('student_name',$student->student_name) }}" required autofocus>

                                @if ($errors->has('student_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-6 form-control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$student->email) }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-6 form-control-label">{{ __('Batch') }}</label>
                            <div class="col-md-6">
                              <select name="level_id" id="inputlevel_id" class="form-control" required="required">
                                  @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reg_no" class="col-md-6 form-control-label ">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="reg_no" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no',$student->reg_no) }}" required autofocus>

                                @if ($errors->has('reg_no'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reg_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                          <label for="image" class="col-md-6 form-control-label">{{ __('Image') }}</label>

                          <div class="col-md-6">
                              <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>
                              @if ($errors->has('image'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('image') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-6 form-control-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-6 form-control-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
