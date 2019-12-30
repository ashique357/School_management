@extends('admin_pannel.admin_master')

@section('component')

<div class="col-md-8">
    <form action="{{route('store.subject')}}" method="post" role="form">
    {{ csrf_field() }}
    	<div class="form-group-row">
        <legend>Create a new subject</legend>
      </div>

    	<div class="form-group row">
          <label for="subject_name" class="col-md-6 form-control-label">{{ __('Subject Name') }}</label>
    		  <div class="col-md-6">
            <input name="subject_name" type="text" class="form-control" id="" placeholder="Enter subject name">
          </div>
    	</div>

    	<div class="form-group row">
          <label for="subject_code" class="col-md-6 form-control-label">{{ __('Subject Code') }}</label>
    		  <div class="col-md-6">
            <input name="subject_code" type="number" class="form-control" id="" placeholder="Enter subject code">
          </div>
    	</div>

      <div class="form-group row">
      <label for="level_id" class="col-md-6 form-control-label">{{ __('Select Batch') }}</label>
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
      <label for="teacher_name" class="col-md-6 form-control-label">{{ __('Teacher Name') }}</label>
      <div class="col-md-6">
        <select name="teacher_id" id="inputteacher_id" class="form-control" required="required">
          <option value="">Select Teacher</option>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
        @endforeach
        </select>
      </div>
      </div>
      <div class="col-md-6 offset-md-6">
        <button type="submit" class="btn btn-primary">
            {{ __('Save Subject') }}
        </button>
      </div>

    </form>
</div>
@endsection
