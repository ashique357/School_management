@extends('teacher_pannel.teacher_master')
@section('component')

<div class="col-md-12">
  <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Subject ID</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Subject Code</th>
        <th scope="col">Teacher</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($subjects as $subject)
          <tr>
              <td>{{ $subject->id }}</td>
              <td>{{ $subject->subject_name }}</td>
              <td>{{ $subject->subject_code }}</td>
              <td>{{ $subject->teacher->teacher_name }}</td>
          </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
