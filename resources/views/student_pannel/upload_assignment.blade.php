@extends('student_pannel.student_master')
@section('component')
<div class="assignment">
  <form class="" action="/student/assignment/upload" enctype="multipart/form-data"  method="post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="assignment_id" id="term" value="{{$files->id}}">
          <input type="hidden" name="level_id" id="term" value="{{$files->level_id}}">
          <input type="hidden" name="subject_id" id="term" value="{{$files->subject_id}}">
          <input type="hidden" name="student_id" id="term" value="{{$student->id}}">


       <div class="form-group row">
         <label for="title" class="col-md-2 form-control-label">{{ __('Add Title') }}</label>
         <div class="col-md-6">
             <input class="form-control" type="text" name="title" id="title">
         </div>
       </div>

       <div class="form-group row">
         <label for="file" class="col-md-2 form-control-label">{{ __('Upload File') }}</label>
         <div class="col-md-6">
           <input class="form-control" type="file" name="file" id="upload_file">
         </div>
       </div>

       <div class="col-md-6 col-md-offset-2">
             <button type="submit" class="btn btn-primary">
                 {{ __('Save') }}
             </button>
       </div>
    </div>
  </form>
</div>
@endsection
