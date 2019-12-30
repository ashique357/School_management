@extends('admin_pannel.admin_master')
@section('component')
<div class="col-md-12">
    <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Teacher Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone No.</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>

    <tbody>
    @foreach ($teachers as $teacher)
        <tr>
            <td>{{ $teacher->id }}</td>
            <td>
              <img class="profile-img" src="/uploads/images/{{$teacher->image}}" alt="User picture">
            </td>
            <td>{{ $teacher->teacher_name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->contact }}</td>
            <td><a href="/teacher/delete/{{ $teacher->id }}"><button type="button" class="btn btn-danger btn-default-profile">Delete</button></a></td>
        </tr>

    @endforeach
    </tbody>
  </table>
</div>
@endsection
