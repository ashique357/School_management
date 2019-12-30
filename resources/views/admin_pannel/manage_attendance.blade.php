@extends('admin_pannel.admin_master')
@section('component')


<div class="row" style="margin-top:50px;">
  <form action="/admin/attendance-report/{level_id}/{subject_id}/{year}/{month}" method="post" role="form">
  {{ csrf_field() }}

<div class="form-group row">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Batch') }}</label>
      <div class="col-md-8">
        <select name="level" id="level" class="form-control input-lg" required="required">
          <option value="0" disable="true" selected="true">Select Batch</option>
          @foreach($levels as $level)
          <option value="{{$level->id}}" disable="true" selected="true">{{$level->name}}</option>
          @endforeach
        </select>
      </div>
  </div>
</div>
<div class="form-group row">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Subject') }}</label>
      <div class="col-md-8">
        <select name="subject" id="subject" class="form-control input-lg" required="required">
          <option value="0" disable="true" selected="true">Select Subject</option>
        </select>

      </div>
  </div>
</div>

<div class="form-group row">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Month') }}</label>
      <div class="col-md-8">
        <select name="month" id="month" class="form-control input-lg" required="required">
          <option value="" disable="true" selected="true">Month</option>
            <option value="1" disable="true" selected="true">January</option>
            <option value="2" disable="true" selected="true">February</option>
            <option value="3" disable="true" selected="true">March</option>
            <option value="4" disable="true" selected="true">April</option>
            <option value="5" disable="true" selected="true">May</option>
            <option value="6" disable="true" selected="true">June</option>
            <option value="7" disable="true" selected="true">July</option>
            <option value="8" disable="true" selected="true">August</option>
            <option value="9" disable="true" selected="true">September</option>
            <option value="10" disable="true" selected="true">October</option>
            <option value="11" disable="true" selected="true">November</option>
            <option value="12" disable="true" selected="true">December</option>
        </select>
      </div>
  </div>
</div>
<div class="form-group row">
  <div class="form-group">
      <label for="" class="col-md-8 form-control-label">{{ __('Select Year') }}</label>
      <div class="col-md-8">
        <select name="year" id="year" class="form-control input-lg" required="required">
          <option value="2016" disable="true" selected="true">2016</option>
            <option value="2017" disable="true" selected="true">2017</option>
            <option value="2018" disable="true" selected="true">2018</option>
        </select>
      </div>
  </div>
</div>
<div class="col-md-8 col-md-offset-4">
   <div class="form-group mb-0">
     <button type="submit" name="submit" class="btn btn-primary">
         {{ __('Show Report') }}
     </button>
 </div>
 </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">

  $('#level').on('change', function(e){
    console.log(e);
    var level_id = e.target.value;
    $.get('/json-exam-subject?level_id=' + level_id,function(data) {
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
