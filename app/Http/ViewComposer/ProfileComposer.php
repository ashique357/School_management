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

class ProfileComposer{

  public function compose(View $view){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Admin')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $admin=Admin::find($find_id);
    $levels=Level::all();
    //$students=Student::with('level')->where('level_id','=',$id)->get();
    $teachers=Teacher::all();
    //$subjects=Subject::with('level')->where('level_id','=',$id)->get();

    $view->with('admin',$admin);
    $view->with('levels',$levels);
    //->with('students',$students)
    $view->with('teachers',$teachers);
    //->with('subjects',$subjects);
  }

}
