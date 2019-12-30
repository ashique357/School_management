<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Assignment;
use App\User;
use App\Teacher;
use App\Level;
use App\Subject;
use App\Student;
use App\StudentAssignment;

class AssignmentController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Teacher');
  }
    public function assignment_upload_view(){
      $get_id=Auth::id();
      $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
      $find_id=$user_id->userable_id;
      $teacher=Teacher::find($find_id);
      $teacher_id=$teacher->id;
      $subjects=Subject::where('teacher_id','=',$teacher_id)->get();
      foreach ($subjects as $subject) {
        $level=$subject->level;
      }

      return view('teacher_pannel.upload_assignment')->with('subjects',$subjects)
                                                      ->with('teacher',$teacher)
                                                      ->with('$level',$level);
    }
    public function upload(Request $request)
    {   $assignment=new Assignment();
        $assignment->title=Input::get('title');
        $assignment->subject_id=Input::get('subject_id');
        $assignment->teacher_id=$request->teacher_id;
        $assignment->level_id=$request->level_id;
        if(Input::hasFile('file')){
        $file = Input::file('file');
        $file = $file->move(public_path().'/assignment/',$file->getClientOriginalName());
        $assignment->file = $file->getFileName();
        }
        $assignment->save();
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }

    public function show_files(){
      $files=Assignment::all();
      return view('teacher_pannel.assignment_view')->with('files',$files);

    }

    public function student_assignment_show(){
      $get_id=Auth::id();
      $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
      $find_id=$user_id->userable_id;
      $teacher=Teacher::find($find_id);
      $teacher_id=$teacher->id;
      $assignments=Assignment::where('teacher_id','=',$teacher_id)->get();
      foreach ($assignments as $assignment) {
        $student_assignments=StudentAssignment::where('assignment_id','=',$assignment->id)->get();
      }

      return view('teacher_pannel.student_assignment_view')->with('student_assignments',$student_assignments);
    }

    public function download($file_name) {
    $file_path = public_path('/files/'.$file_name);
    return response()->download($file_path);
  }
    public function assignment_download($file_name) {
    $file_path = public_path('/assignment/'.$file_name);
    return response()->download($file_path);
  }
    public function student_assignment_download($file_name) {
    $file_path = public_path('/student/assignment/'.$file_name);
    return response()->download($file_path);
  }

  public function file_delete(FileUpload $file_name){
    $file_name->delete();
    return redirect()->back();
  }
  public function student_assignment_delete(StudentAssignment $file_name){
    $file_name->delete();
    return redirect()->back();
  }
  public function assignment_delete(Assignment $file_name){
    $file_name->delete();
    return redirect()->back();
  }



}
