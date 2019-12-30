@extends('student_pannel.student_master')
@section('component')

<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">File</th>
      <th scope="col">Download</th>
      <th scope="col">Submit</th>

    </tr>
  </thead>
  <tbody>
      @foreach($files as $file)
      <tr>
          <td>{{$file->title}}</td>
          <td><a href="/files/{{$file->file}}">{{$file->file}}</a></td>
          <td><a href="/file-view/download/{{$file->file}}"><button type="button" class="btn btn-priamry btn-default-profile">Download</button></a></td>
          <td><a href="/student/assignment/upload/{{$file->id}}/{{$file->subject_id}}"><button type="button" class="btn btn-priamry btn-default-profile">Submit</button></a></td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection
