<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Student;
use App\Level;
use App\Subject;
use App\User;
use App\FileUpload;

class TeacherPageController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Teacher');
  }
    // public function profile(){
    //   $get_id=Auth::id();
    //   $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
    //   $find_id=$user_id->userable_id;
    //   $teacher=Teacher::find($find_id);
    //   $levels=Level::all();
    //   //$students=Student::with('level')->where('level_id','=',$id)->get();
    //   return view('teacher_pannel.sidebar')->with('teacher',$teacher)
    //                                       ->with('levels',$levels);
    // }

    public function student_info($id){
      $students=Student::with('level')->where('level_id','=',$id)->get();
      return view('teacher_pannel.student_info')->with('students',$students);
    }

    public function teacher_info(){
      $teachers=Teacher::all();
      return view('teacher_pannel.teacher_info')->with('teachers',$teachers);
    }

    public function subject_info($id){
      $subjects=Subject::with('level')->where('level_id','=',$id)->get();
      return view('teacher_pannel.subject')->with('subjects',$subjects);
    }

    public function profile(){
      return view('teacher_pannel.index');
    }

    public function show_uploaded_file(){
      $files=FileUpload::all();
      return view('teacher_pannel.uploaded_file')->with('files',$files);
    }
}
