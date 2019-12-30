@extends('student_pannel.student_master')

@section('component')

<div class="col-md-12">
  <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Subject Name</th>
        <th scope="col">Subject Code</th>
        <th scope="col">Teacher</th>
        <th scope="col">Term</th>
        <th scope="col">Marks</th>
        <th scope="col">Comment</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($results as $result)
          <tr>
            <td>{{ $result->subject->subject_name }}</td>
            <td>{{ $result->subject->subject_code }}</td>
            <td>{{ $result->subject->teacher->teacher_name }}</td>
            <td>{{ $result->exam->exam_name }}</td>
            <td>{{ $result->score }}</td>
            <td>{{ $result->status }}</td>
          </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
