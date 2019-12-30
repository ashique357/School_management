@extends('teacher_pannel.teacher_master')
@section('component')

  <div class="row" style="margin-top:50px;">

    <form action="/exam-manages-view/{term_id}/{exam_id}/{level_id}/{subject_id}" method="get" role="form">
    {{ csrf_field() }}

    <div class="col-md-3 mx-auto col-12">
        <div class="b-select-wrap">
          <label for="term_name" class="col-md-6 form-control-label">{{ __('Term Name') }}</label>
          <div class="col-md-8">
            <select class="form-control b-select" name="term_name" id="term_name" required="required">
              <option value="0" disable="true" selected="true">Select Term</option>
              @foreach($exam_types as $type)
                  <option value="{{$type->id}}">{{$type->term_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-3 mx-auto col-12">
        <div class="b-select-wrap">
            <label for="" class="col-md-6 form-control-label">{{ __('Exam Name') }}</label>
            <div class="col-md-8">
              <select class="form-control b-select" name="exam_list" id="exam_list" required="required">
                <option value="0" disable="true" selected="true">Select Exam Name</option>
              </select>
            </div>
        </div>
      </div>
      <div class="col-md-3 mx-auto col-12">
        <div class="b-select-wrap">
          <label for="" class="col-md-6 form-control-label">{{ __('Select Batch') }}</label>
          <div class="col-md-8">
            <select name="level" id="level" class="form-control b-select" required="required">
              <option value="0" disable="true" selected="true">Select Batch</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-3 mx-auto col-12">
        <div class="b-select-wrap">
          <label for="" class="col-md-6 form-control-label">{{ __('Select Subject') }}</label>
          <div class="col-md-8">
            <select name="subject" id="subject" class="form-control b-select" required="required">
              <option value="0" disable="true" selected="true">Select Subject</option>
            </select>
          </div>
        </div>
      </div>

      <br><br>
      <div class="col-md-8 col-md-offset-6">
        <div class="form-group mb-0">
          <button type="submit" name="submit" class="btn btn-primary">
              {{ __('Manage Exam') }}
          </button>
      </div>
      </div>
     <!-- Example single danger button -->

    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $('#term_name').on('change', function(e){
    console.log(e);
    var exam_type_id = e.target.value;
    $.get('/json-exam?exam_type_id=' + exam_type_id,function(data) {
      console.log(data);
      $('#exam_list').empty();
      $('#exam_list').append('<option value="0" disable="true" selected="true">Select Exams</option>');

      $('#level').empty();
      $('#level').append('<option value="0" disable="true" selected="true">Select Batch</option>');

      $('#subject').empty();
      $('#subject').append('<option value="0" disable="true" selected="true">Select Subject</option>');

      $.each(data, function(index, exam_listObj){
        $('#exam_list').append('<option value="'+ exam_listObj.id +'">'+ exam_listObj.exam_name +'</option>');
      })
    });
  });

  $('#exam_list').on('change', function(e){
    console.log(e);
    var level_id = e.target.value;
    $.get('/json-exam-level?level_id=' + level_id,function(data) {
      console.log(data);
      $('#level').empty();
      $('#level').append('<option value="0" disable="true" selected="true">Select Batch</option>');

      $.each(data, function(index, levelObj){
        $('#level').append('<option value="'+ levelObj.id +'">'+ levelObj.name +'</option>');
      })
    });
  });

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
