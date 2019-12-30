<?php

namespace App\Http\ViewComposer;

use Illuminate\view\view;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use App\Subject;
use App\ExamType;
use App\Exam;
use App\Result;
use App\Level;
use App\User;
use App\Admin;

class StudentProfileComposer{

  public function compose(View $view){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $student=Student::find($find_id);
    $levels=Level::all();

    $view->with('student',$student);
    $view->with('levels',$levels);
    //->with('students',$students)
    //$view->with('teachers',$teachers);
    //->with('subjects',$subjects);
  }

}
