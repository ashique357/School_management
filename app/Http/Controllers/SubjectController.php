<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Student;
use App\Level;
use App\Subject;
use App\Teacher;

class SubjectController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('Admin');
    }


  public function index(){
    $subjects=Subject::all();
    return view('admin_pannel.subject', compact('subjects'));
  }

  public function add(){
    $subjects=Subject::all();
    $teachers=Teacher::all();
    $levels=Level::all();
    return view('admin_pannel.subject_add')->with('subjects',$subjects)
                                            ->with('levels',$levels)
                                            ->with('teachers',$teachers);
  }

  public function store(Request $request){
    $subject_store=Subject::create($request->all());
    return redirect()->back();
  }

  public function edit($id){
    $subject=Subject::findOrFail($id);
    $teachers=Teacher::all();
    $levels=Level::all();
    return view('admin_pannel.subject_edit')->with('teachers',$teachers)
                                            ->with('levels',$levels)
                                            ->with('subject',$subject);
  }

  public function update(Request $request,Subject $subject)
  {
    $subject->subject_name = Input::get('subject_name');
    $subject->subject_code = Input::get('subject_code');
    $subject->teacher_id = Input::get('teacher_id');
    $subject->level_id = Input::get('level_id');
    
    $subject->save();
    //$student->fill($input)->save();

    return redirect()->back();
  }

   public function destroy(Subject $subject)
  {
    $subject->delete();
    return redirect()->back();
  }
}
