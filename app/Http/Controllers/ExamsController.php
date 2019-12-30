<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\ExamType;
use App\Exam;
use App\Level;
use App\Subject;
use App\Student;
use App\Result;
use App\User;
use App\Teacher;

class ExamsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
      public function exam_type(){
      $exam_types=ExamType::all();
      return view('teacher_pannel.marks_management',compact('exam_types',$exam_types));
  }

    public function exam(){
      $exam_id=Input::get('exam_type_id');
      $sub_exams=Exam::where('exam_type_id','=',$exam_id)->get();
      return response()->json($sub_exams);
    }

    public function level(){
      $level_id=Level::with('subjects')->get();
      return response()->json($level_id);
    }

    public function subject(){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $teacher=Teacher::find($find_id);
      $subject_id=Input::get('level_id');
      $subject=Subject::where('level_id','=',$subject_id)->where('teacher_id','=',$teacher->id)->get();
      return response()->json($subject);
    }

    public function manage_marks(Request $request,$term_id,$exam_id,$level_id,$subject_id){
      $term_id=$request->term_name;
      $exam_id=$request->exam_list;
      $level_id=$request->level;
      $subject_id=$request->subject;
      $students=Student::with('level')->where('level_id','=',$level_id)->get();
      $count=count($students);

      return view('teacher_pannel.marks_management_view')->with('term_id',$term_id)
                                    ->with('exam_id',$exam_id)
                                    ->with('level_id',$level_id)
                                    ->with('subject_id',$subject_id)
                                    ->with('students',$students);

    }

    public function store(Request $request){

       $all_data=$request->toArray();
       $data=$request->student_id;

       $count=count($data);
       for ($i=0; $i <$count+1 ; $i++) {
         $val=array_search($i, array_keys($data));
          if ($val == $i) {

        $push[$i]=array('score' =>$all_data['score'][$i],
                  'status' =>$all_data['status'][$i],
                  'student_id' =>$all_data['student_id'][$i],
                  'exam_id' =>$all_data['exam_id'],
                  'level_id' =>$all_data['level_id'],
                  'subject_id' =>$all_data['subject_id']
          );
      }
    }
    $marks=Result::insert($push);
    return redirect()->route('exam.dashboard');
  }

}
