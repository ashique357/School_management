@extends('layouts.home_extend')
@section('component')
<main class="my-form">
  <div class="row justify-content-center">
      <div class="col-md-8">
              <div class="card">
                  <div class="card-header text-center h4 font-weight-light">{{ __('Student Registration') }}</div>
                  <div class="card-body">
                    <form name="my-form" enctype="multipart/form-data" method="POST" action="{{route('register.form')}}">
                        @csrf
                          <div class="form-group row">
                            <label for="student_name" class="col-md-6 form-control-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="student_name" type="text" class="form-control{{ $errors->has('student_name') ? ' is-invalid' : '' }}" name="student_name" value="{{ old('student_name') }}" required autofocus>

                                @if ($errors->has('student_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('student_name') }}</strong>
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

                          <div class="form-group row">
                            <label for="reg_no" class="col-md-6 form-control-label ">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="reg_no" type="text" class="form-control{{ $errors->has('reg_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" required autofocus>

                                @if ($errors->has('reg_no'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('reg_no') }}</strong>
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
