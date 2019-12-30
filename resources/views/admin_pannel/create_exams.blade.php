@extends('admin_pannel.admin_master')
@section('component')

  <form action="/admin/term/create" method="post" role="form">
  {{ csrf_field() }}

  <div class="form-group row">
    <label for="term_name" class="col-md-2 form-control-label">{{ __('Term Name') }}</label>

    <div class="col-md-4">
        <input id="term_name" type="text" class="form-control{{ $errors->has('term_name') ? ' is-invalid' : '' }}" name="term_name" required>

        @if ($errors->has('term_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('term_name') }}</strong>
            </span>
        @endif
    </div>
  </div>

  <div class="col-md-6 col-md-offset-2">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>

  </div>
   <!-- Example single danger button -->

  </form>

@endsection
