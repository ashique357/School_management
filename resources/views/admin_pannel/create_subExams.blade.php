@extends('admin_pannel.admin_master')
@section('component')

  <form action="/admin/exam/create" method="post" role="form">
  {{ csrf_field() }}

  <div class="form-group row">
    <label for="exam_type_id" class="col-md-2 form-control-label">{{ __('Term Name') }}</label>

    <div class="col-md-4">
      <select id="exam_type_id" type="text" class="form-control" name="exam_type_id" required="required">
        <option value="#">Select Term</option>
          @foreach ($terms as $term)
            <option value="{{ $term->id }}">{{ $term->term_name }}</option>
          @endforeach
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="exam_name" class="col-md-2 form-control-label">{{ __('Exam Name') }}</label>

    <div class="col-md-4">
        <input id="exam_name" type="text" class="form-control{{ $errors->has('exam_name') ? ' is-invalid' : '' }}" name="exam_name" required>

        @if ($errors->has('exam_name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('exam_name') }}</strong>
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
