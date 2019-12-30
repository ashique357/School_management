<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\Teacher;
use App\Subject;
use App\ExamType;
use App\Exam;
use App\Result;
use App\Level;
use App\User;
use App\Admin;
use App\Attendance;

class AdminPagesController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('Admin');
    }

    public function student_info($id){
      $students=Student::with('level')->where('level_id','=',$id)->get();
      return view('admin_pannel.student_info')->with('students',$students);
    }

    public function teacher_info(){
      $teachers=Teacher::all();
      return view('admin_pannel.teacher_info')->with('teachers',$teachers);
    }

    public function subject_info($id){
      $subjects=Subject::with('level')->where('level_id','=',$id)->get();
      return view('admin_pannel.subject')->with('subjects',$subjects);
    }

    public function profile(){
      return view('admin_pannel.index');
    }

    public function show_student_result($id){
      $students=Student::with('level')->where('level_id','=',$id)->get();
      return view('admin_pannel.student_result_view')->with('students',$students);
    }
    public function show_result($id){
      $results=Result::where('student_id','=',$id)->get();
      return view('admin_pannel.exam_marks')->with('results',$results);
    }

    // public function show_student_attendance($id){
    //   $students=Student::with('level')->where('level_id','=',$id)->get();
    //   $subjects=Subject::where('level_id','=',$id)->get();
    //   return view('admin_pannel.student_attendance_view')->with('students',$students)
    //                                                       ->with('subjects',$subjects);
    // }

    public function attendance_view(){
      $levels=Level::all();
      return view('admin_pannel.manage_attendance')->with('levels',$levels);
    }


    public function show_attendance(Request $request,$level_id,$subject_id,$year,$month){
      $level=$request->level;
      $subject=$request->subject;
      $get_year=$request->year;
      $get_month=$request->month;
      $days=$this->count_days($get_month,$get_year);
      $temp=array_fill(1,$days,0);
      $students=Student::where('level_id','=',$level)->with('attendances')->get();

      $attendances=Attendance::where('level_id','=',$level)->where('subject_id','=',$subject)->get();

      // foreach ($students as $student) {
      //   $attendances=$student->attendances;
      //   $temp=array_fill(1,$days,0);
      //     foreach ($attendances as $attend) {
      //     $remark=$attend->attendance;
      //     $t=$attend['date'];
      //
      //     $year=(int)substr($t,6,10);
      //     $month=(int)substr($t,0,2);
      //     $date=(int)substr($t,3,2);
      //     $att=$attend['attendance'];
      //     $temp[$date]="1";
      //   }
      //
      //   for ($j=1; $j<=30; $j++) {
      //     $value=$temp[$j];
      //     if ($month==$get_month && $year ==$get_year) {
      //       if ($value == 0) {
      //         echo "A";
      //       }
      //       else {
      //         echo "P";
      //       }
      //
      //     }
      //
      //   }
      //
      // }


      return view('admin_pannel.test')->with('subject',$subject)
                                                          ->with('attendances',$attendances)
                                                          ->with('get_month',$get_month)
                                                          ->with('get_year',$get_year)
                                                          ->with('students',$students)
                                                          ->with('days',$days);

    }



    public function getMonthName($month_number){
      $month_name=date("F", mktime(0, 0, 0, $month_number, 1));
    }

    public function count_days($month,$year){
      return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

     public function term_view(){
      return view('admin_pannel.create_exams');
    }

    public function term_store(Request $request){
      $t=$request->all();
      $term=ExamType::create($t);
      return redirect()->back();
    }

    public function subExam_view(){
      $terms=ExamType::all();
      return view('admin_pannel.create_subExams')->with('terms',$terms);
    }
    public function subExam_store(Request $request){
      $temp=$request->all();
      $exams=Exam::create($temp);
      return redirect()->back();
    }

}
