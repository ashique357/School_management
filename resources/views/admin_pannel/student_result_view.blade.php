@extends('admin_pannel.admin_master')
@section('component')

<div class="col-md-12">
  <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Registration No.</th>
        <th scope="col">Email</th>
        <th scope="col">Result</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>
              <img class="profile-img" src="/uploads/images/{{$student->image}}" alt="User picture">
            </td>
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->reg_no }}</td>
            <td>{{ $student->email }}</td>
            <td><a href="/admin/student/result/{{ $student->id }}"><button type="button" class="btn btn-priamry btn-default-profile">View</button></a></td>

        </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection
