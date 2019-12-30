@extends('teacher_pannel.teacher_master')
@section('component')
  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header text-center  h4 font-weight-light">{{ __("Teacher's Information Update") }}</div>

                <div class="card-body py">
                    <form method="post" enctype="multipart/form-data" action="/teacher/edit/{{ $teacher->id }}">
                        @csrf

                        <div class="form-group">
                            <label for="teacher_name" class="col-md-6 form-control-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="teacher_name" type="text" class="form-control{{ $errors->has('teacher_name') ? ' is-invalid' : '' }}" name="teacher_name" value="{{ old('teacher_name',$teacher->teacher_name) }}" required autofocus>

                                @if ($errors->has('teacher_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('teacher_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-6 form-control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$teacher->email) }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <label for="contact" class="col-md-6 form-control-label">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact',$teacher->contact) }}" required autofocus>

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('contact') }}</strong>
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
                                    {{ __('Save Changes') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
