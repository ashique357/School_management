@extends('teacher_pannel.teacher_master')
@section('component')

<div class="row" style="margin-top:50px;">
  <form action="/attendance-manages/{date}/{level_id}/{subject_id}" method="post" role="form">
  {{ csrf_field() }}
  <div class="col-md-4 mx-auto col-12">
    <div class="form-group">
        <label for="" class="col-md-8 form-control-label">{{ __('Select Date') }}</label>
        <div class="col-md-8">
          <input id="mydate" type="text" name="date">
        </div>
    </div>
  </div>

<div class="col-md-4 mx-auto col-12">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Batch') }}</label>
      <div class="col-md-8">
        <select name="level" id="level" class="form-control input-lg" required="required">
          <option value="0" disable="true" selected="true">Select Batch</option>
          @foreach($levels as $level)
            <option value="{{$level->level->id}}" disable="true" selected="true">{{$level->level->name}}</option>
          @endforeach
        </select>
      </div>
  </div>
</div>
<div class="col-md-4 mx-auto col-12">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Subject') }}</label>
      <div class="col-md-8">
        <select name="subject" id="subject" class="form-control input-lg" required="required">
          <option value="0" disable="true" selected="true">Select Subject</option>
        </select>
      </div>
  </div>
</div>
<div class="col-md-6 col-md-offset-4" style="margin-top:50px;">
   <div class="form-group mb-0">
     <button type="submit" name="submit" class="btn btn-primary">
         {{ __('Manage Attendance') }}
     </button>
 </div>
 </div>
 </form
</div>

<link href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>



<script type="text/javascript">


  $("#mydate").datepicker().datepicker("setDate", "today");


  $('#level').on('change', function(e){
    console.log(e);
    var level_id = e.target.value;
    $.get('/json-attendance?level_id=' + level_id,function(data) {
      console.log(data);
      $('#subject').empty();
      $('#subject').append('<option value="0" disable="true" selected="true">Select Subjects</option>');

      $.each(data, function(index, subjectObj){
        $('#subject').append('<option value="'+ subjectObj.id +'">'+ subjectObj.subject_name +'</option>');
      })
    });
  });
</script>
@endsection
