@extends('admin_pannel.admin_master')
@section('component')

<div class="col-md-12">
  <a href="{{route('add.subject')}}"><button type="button" class="btn btn-lg btn-info">Add a new subject</button></a>
  <hr><br>
  <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Subject ID</th>
        <th scope="col">Subject Name</th>
        <th scope="col">Subject Code</th>
        <th scope="col">Teacher</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($subjects as $subject)
          <tr>
              <td>{{ $subject->id }}</td>
              <td>{{ $subject->subject_name }}</td>
              <td>{{ $subject->subject_code }}</td>
              <td>{{ $subject->teacher->teacher_name }}</td>
              <td><a href="/admin/subjects/edit/{{$subject->id}}"><button type="button" class="btn btn-priamry">Edit</button></a></td>
              <td><a href="/admin/subjects/delete/{{$subject->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
          </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
