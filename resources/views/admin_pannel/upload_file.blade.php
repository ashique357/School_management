@extends('admin_pannel.admin_master')
@section('component')
<div class="notice-upload">
  <form class="" action="/admin/file-upload/post" enctype="multipart/form-data"  method="post">
    @csrf
    <div class="form-group">
         <label for="file" class="control-label col-md-3">Add Title</label>
         <div class="col-md-8">
              <input class="form-control" type="text" name="subject" id="subject">
         </div>
         <label for="file" class="control-label col-md-3">Upload File</label>
         <div class="col-md-8">
              <input class="form-control" type="file" name="file" id="upload_file">
         </div>

         <div class="col-md-6">
               <button type="submit" class="btn btn-primary">
                   {{ __('Save') }}
               </button>
         </div>
    </div>

  </form>
</div>
@endsection
