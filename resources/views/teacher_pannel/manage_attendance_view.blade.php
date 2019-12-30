@extends('teacher_pannel.teacher_master')
@section('component')
<div class="row">
  <div class="col-md-12">
  <form class="" action="/attendance-manages-view" method="post">
    <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
    <input type="hidden" name="level_id" id="level" value="{{$level_id}}">
    <input type="hidden" name="subject_id" id="subject" value="{{$subject_id}}">
    <input type="hidden" name="date" id="date" value="{{$date}}">
    <hr><br>
        <table class="table table-bordered table-hover" id="attendance">
          <thead class="thead-dark">
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Registration Number</th>
                    <th scope="col">Attendance</th>

                </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
              <input type="hidden" name="student_id[]" id="student" value="{{$student->id}}">
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_name }}</td>
                    <td>{{ $student->reg_no}}</td>
                    <td><div class="form-group" id="button">
                      <input class="rad" type="radio" name="attendance[{{$student->id}}]" value="1"  id="attendance">&nbsp;Present &nbsp;
                      <input class="rad" type="radio" name="attendance[{{$student->id}}]" value="0"  id="attendance">&nbsp;Absent &nbsp;
                    </div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12 offset-md-6">
          <button type="submit" class="btn btn-primary">
              {{ __('Save Changes') }}
          </button>
    </div>
  </form>

  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">


    var level_id=$("#level").val();
    var subject_id=$("#subject").val();
    var subject_id=$("#date").val();

      var get_attendance=[];
      var get_student_id=[];

      $("#attendance tr").each(function(){
        get_attendance=$("input[name=attendance]").val();
        get_student_id=$("input[name=student_id]").val();

      });

      axios({
    method: 'post',
    url: '/marks',
    date:date,
    level:level_id,
    subject:subject_id,
    student_id:get_student_id,
    attendance:get_attendance
})
</script>
@endsection
