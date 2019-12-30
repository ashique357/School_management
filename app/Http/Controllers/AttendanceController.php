<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Student;
use App\Level;
use App\Subject;
use App\Attendance;
use App\User;
use App\Teacher;
use Carbon\Carbon;

class AttendanceController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Teacher')->except('attendance_report','attendance_report_card');
  }

  public function level(){
    $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $teacher=Teacher::find($find_id);
    $levels=Subject::where('teacher_id','=',$teacher->id)->get();
    return view('teacher_pannel.manage_attendance',compact('levels',$levels));
  }

  public function subject(){
     $get_id=Auth::id();
    $user_id=User::where('userable_type','=','Teacher')->where('users.id','=',$get_id)->first();
    $find_id=$user_id->userable_id;
    $teacher=Teacher::find($find_id);
      $subject_id=Input::get('level_id');
      $subjects=Subject::where('level_id','=',$subject_id)->where('teacher_id','=',$teacher->id)->get();
    return response()->json($subjects);
  }

  public function manage_attendance(Request $request,$date,$level_id,$subject_id){
        $this->validate($request, [
          'date'=>'required|date_format:"m/d/Y"',
        ]);
    $date=$request->date;
    $level_id=$request->level;
    $subject_id=$request->subject;
    $students=Student::with('level')->where('level_id','=',$level_id)->get();

    return view('teacher_pannel.manage_attendance_view')->with('level_id',$level_id)
                                                        ->with('subject_id',$subject_id)
                                                        ->with('date',$date)
                                                        ->with('students',$students);
  }

  public function store(Request $request){

     $all_data=$request->toArray();
     $data=$request->student_id;

     $count=count($data);
     for ($i=0; $i <$count+1 ; $i++) {
       $val=array_search($i, array_keys($data));
        if ($val == $i) {

      $push[$i]=array('attendance' =>$all_data['attendance'][$data[$i]],
                'student_id' =>$all_data['student_id'][$i],
                //'date'=>new Carbon($all_data['date']),
                'date'=>$all_data['date'],
                'level_id' =>$all_data['level_id'],
                'subject_id' =>$all_data['subject_id']

        );
    }
  }
  $attendance=Attendance::insert($push);
  return redirect('/attendance')->with('success', 'Change Saved successfully.');
}

public function attendance_report(){
  $get_id=Auth::id();
  $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
  $find_id=$user_id->userable_id;
  $get_level_id=Student::where('students.id','=',$find_id)->first();
  $level=$get_level_id->level_id;
  $subjects=Subject::where('level_id','=',$level)->get();
  return view('student_pannel.manage_attendance')->with('subjects',$subjects);

}

public function attendance_report_card(Request $request){

  $get_month=$request->month;
  $get_year=$request->year;
  $days=$this->count_days($get_month,$get_year);
  $temp=array_fill(1,$days,0);
  $subject=$request->subject_id;
  $get_id=Auth::id();
  $user_id=User::where('userable_type','=','Student')->where('users.id','=',$get_id)->first();
  $find_id=$user_id->userable_id;
  $get_student_id=Student::where('students.id','=',$find_id)->first();

  $attendances=Attendance::where('student_id','=',$get_student_id->id)->where('subject_id','=',$subject)->get();
  return view('student_pannel.manage_attendance_view')->with('subject',$subject)
                                                      ->with('attendances',$attendances)
                                                      ->with('get_month',$get_month)
                                                      ->with('get_year',$get_year)
                                                      ->with('get_student_id',$get_student_id)
                                                      ->with('days',$days);

}

public function count_days($month,$year){
  return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

public function getMonthName($month_number){
  $month_name=date("F", mktime(0, 0, 0, $month_number, 1));
}

}
