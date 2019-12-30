<?php

namespace App\Http\Controllers;

use App\Http\Middleware\StudentMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Student;
use App\Level;
use App\Subject;
use App\Result;
use App\User;
use App\FileUpload;
use App\Assignment;
use App\StudentAssignment;


class StudentPageController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Student');
  }

  public function teacher_info(){
    $teachers=Teacher::all();
    return view('student_pannel.teacher_info')->with('teachers',$teachers);
  }

  public function subject_info(){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $get_level_id=Student::where('students.id','=',$find_id)->first();
    //dd($get_level_id);
    $level_id=$get_level_id->level_id;
    $subjects=Subject::where('level_id','=',$level_id)->get();
    return view('student_pannel.subject')->with('subjects',$subjects);
  }

  public function exam_marks(){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $get_student_id=Student::find($find_id);
    $results=Result::where('student_id','=',$get_student_id->id)->get();
    return view('student_pannel.exam_marks')->with('results',$results);
  }
  public function profile(){
    return view('student_pannel.index');
  }
  public function show_uploaded_file(){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $student=Student::find($find_id);
    $level_id=$student->level_id;
    $files=Assignment::where('level_id','=',$level_id)->get();
    return view('student_pannel.assignment_view')->with('files',$files);

  }

  public function show_notice(){
    $files=FileUpload::all();
    return view('student_pannel.uploaded_file')->with('files',$files);
  }

  public function assignment_upload_view($assignment_id,$subject_id){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $student=Student::find($find_id);
    $level_id=$student->level_id;
    $files=Assignment::where('level_id','=',$level_id)->where('subject_id','=',$subject_id)->where('assignment.id','=',$assignment_id)->first();
    return view('student_pannel.upload_assignment')->with('files',$files)
                                                  ->with('student',$student);
  }


  public function post_assignment_upload(Request $request)
  {   $student_assignment=new StudentAssignment();
      $student_assignment->title=Input::get('title');
      $student_assignment->subject_id=Input::get('subject_id');
      $student_assignment->student_id=$request->student_id;
      $student_assignment->assignment_id=$request->assignment_id;
      $student_assignment->level_id=$request->level_id;
      if(Input::hasFile('file')){
      $file = Input::file('file');
      $file = $file->move(public_path().'/student/assignment/',$file->getClientOriginalName());
      $student_assignment->file = $file->getFileName();
      }
      $student_assignment->save();

      return redirect()->back()->with('success', 'File uploaded successfully.');
  }
}
