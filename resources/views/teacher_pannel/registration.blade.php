@extends('layouts.home_extend')
@section('component')
<main class="my-form">
  <div class="row justify-content-center">
      <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center h4 font-weight-light">{{ __('Teacher Registration') }}</div>
                  <div class="card-body">
                    <form  name="my-form" enctype="multipart/form-data" method="POST" action="{{ route('register.teacher') }}">
                        @csrf
                          <div class="form-group row">
                            <label for="teacher_name" class="col-md-6 form-control-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="teacher_name" type="text" class="form-control{{ $errors->has('teacher_name') ? ' is-invalid' : '' }}" name="teacher_name" value="{{ old('teacher_name') }}" required autofocus>

                                @if ($errors->has('teacher_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('teacher_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="email" class="col-md-6 form-control-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row">
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
                          <div class="form-group row">
                            <label for="contact" class="col-md-6 form-control-label">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" value="{{ old('contact') }}" required autofocus>

                                @if ($errors->has('contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row">
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

                          <div class="form-group row">
                            <label for="password-confirm" class="col-md-6 form-control-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                          </div>

                              <div class="col-md-6 offset-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>

                          </div>

                      </form>
                  </div>
              </div>
      </div>
  </div>
