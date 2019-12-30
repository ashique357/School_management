@extends('admin_pannel.admin_master')
@section('component')

<div class="col-md-8">
  <a href=""><button type="button" class="btn btn-lg btn-info">Add Batch</button></a>
  <hr><br>
  <table class="table">
      <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Batch Name</th>
        <th scope="col">Semester Name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($levels as $level)
          <tr>
              <td>{{ $level->id }}</td>
              <td>{{ $level->name }}</td>
              <td>{{ $level->semester_name }}</td>
              <td><a href="/levels/edit/{{$level->id}}"><button type="button" class="btn btn-priamry">Edit</button></a></td>
              <td><a href="/levels/delete/{{$level->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
          </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
