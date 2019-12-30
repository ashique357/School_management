<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\FileUpload;
use App\User;

class FileUploadController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Admin')->except('show_uploaded_file','download');
  }
    public function file_upload_view(){
      return view('admin_pannel.upload_file');
    }
    public function upload(Request $request)
    {   $upload_file=new FileUpload();
        $upload_file->subject=Input::get('subject');
        $upload_file->users_id='1';
        if(Input::hasFile('file')){

        $file = Input::file('file');
        $file = $file->move(public_path().'/files/',$file->getClientOriginalName());
        $upload_file->file = $file->getFileName();
        }
        $upload_file->save();
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function show_uploaded_file(){
      $files=FileUpload::all();
      return view('admin_pannel.uploaded_file')->with('files',$files);
    }

    public function download($file_name) {
    $file_path = public_path('/files/'.$file_name);
    return response()->download($file_path);
  }

  public function file_delete(FileUpload $file_name){
    $file_name->delete();
    return redirect()->back();
  }

}
