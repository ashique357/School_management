@extends('layouts.home_extend')
@section('component')

  <div class="col-md-6 col-md-offset-3" style="margin-top:200px;">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Register As</h1>
      </div>
  <div class="panel-body">
        <div class="col-md-3">
          <a class="btn btn-link" href="{{route('admin.register.form')}}">
            <button type="submit" class="btn btn-primary">
                {{ __('Admin') }}
            </button>
          </a>
        </div>
    <div class="col-md-3">
      <a class="btn btn-link" href="{{route('register.form')}}">
        <button type="submit" class="btn btn-primary">
            {{ __('Student') }}
        </button>
      </a>
    </div>
    <div class="col-md-3">
      <a class="btn btn-link" href="{{route('register.teacher.form')}}">
        <button type="submit" class="btn btn-primary">
            {{ __('Teacher') }}
        </button>
      </a>
    </div>
</div>
</div>
</div>
<!--login end-->
