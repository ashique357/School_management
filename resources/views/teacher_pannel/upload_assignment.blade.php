@extends('teacher_pannel.teacher_master')
@section('component')
<div class="assignment">
  <form class="" action="/teacher/assignment-upload" enctype="multipart/form-data"  method="post">
    @csrf
    <div class="form-group">
        <input type="hidden" name="teacher_id" id="term" value="{{$teacher->id}}">
        @foreach ($subjects as $subject)
          <input type="hidden" name="level_id" id="term" value="{{$subject->level->id}}">
        @endforeach

       <div class="form-group row">
         <label for="title" class="col-md-2 form-control-label">{{ __('Add Title') }}</label>
         <div class="col-md-6">
             <input class="form-control" type="text" name="title" id="title">
         </div>
       </div>

       <div class="form-group row">
         <label for="subject_id" class="col-md-2 form-control-label">{{ __('Select Batch') }}</label>
         <div class="col-md-6">
           <select name="level_id" id="inputlevel_id" class="form-control" required="required">
             <option value="">Select Batch</option>
              @foreach($subjects as $subject)
                <option value="{{$subject->level->id}}">{{$subject->level->name}}</option>
              @endforeach
           </select>
         </div>
       </div>
       <div class="form-group row">
         <label for="subject_id" class="col-md-2 form-control-label">{{ __('Select Subject') }}</label>
         <div class="col-md-6">
           <select name="subject_id" id="inputsubject_id" class="form-control" required="required">
             <option value="">Select Subject</option>
              @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
              @endforeach
           </select>
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
