@extends('admin_pannel.admin_master')
@section('component')

<div class="row">
  <div class="col-md-12">
  <form class="" action="/marks" method="post">
    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
    <input type="hidden" name="term_id" id="term" value="{{$term_id}}">
    <input type="hidden" name="exam_id" id="exam" value="{{$exam_id}}">
    <input type="hidden" name="level_id" id="level" value="{{$level_id}}">
    <input type="hidden" name="subject_id" id="subject" value="{{$subject_id}}">
    <hr><br>
        <table class="table table-bordered table-hover" id="result">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Batch</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">Score</th>
                    <th scope="col">Comment</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
              <input type="hidden" name="student_id[]" id="student" value="{{$student->id}}">
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->level->name}}</td>
                    <td>{{ $student->reg_no}}</td>
                    <td><div class="form-group">
                      <input type="text" name="score[]" value="" class="form-control" id="score">
                    </div></td>
                    <td><input type="text" name="status[]" class="form-control" id="status"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12 offset-md-6">
          <button type="submit" class="btn btn-primary">
              {{ __('Save Marks') }}
          </button>
    </div>
  </form>

  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">

    var term_id=$("#term").val();
    var exam_id=$("#exam").val();
    var level_id=$("#level").val();
    var subject_id=$("#subject").val();


      var get_marks=[];
      var get_status=[];
      var get_student_id=[];

      $("#result tr").each(function(){
        get_marks=$("input[name=score").val();
        get_status=$("input[name=status]").val();
        get_student_id=$("input[name=student]").val();

      });

      axios({
    method: 'post',
    url: '/marks',
    term:term_id,
    exam:exam_id,
    level:level_id,
    subject:subject_id,
    student_id:get_student_id,
    score:get_marks,
    status:get_status
})
</script>
@endsection
