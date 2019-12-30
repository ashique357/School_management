<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Facades\Flash;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Teacher;
use App\Level;
class StudentController extends Controller
{


    public function __construct(){
        $this->middleware('Admin')->except('create','store','edit','update');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
      $students=Student::all();
      return view('admin_pannel.student_info',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $levels=Level::all();
         return view('student_pannel.registration',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$student=Student::create($request->all());
        $student=new Student();
        $student->student_name=Input::get('student_name');
        $student->email=Input::get('email');
        $hash=Input::get('password');
        $student->password=bcrypt($hash);
        $student->reg_no=Input::get('reg_no');

        if(Input::hasFile('image')){
           $file = Input::file('image');
           $file = $file->move(public_path().'/uploads/images/',$file->getClientOriginalName());
           $student->image = $file->getFileName();
        }
        $student->level_id=Input::get('level_id');

        $student->save();

        User::create([
          'name' => $student->student_name,
          'email' => request('email'),
          'userable_type' => 'Student',
          'userable_id' => $student->id,
          'password' => bcrypt($request['password']),

        ]);
        return redirect('/student/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::findOrFail($id);
        return view('student.profile',compact('student',$student));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::findOrFail($id);
        $levels=Level::all();
        return view('student_pannel.edit',compact('student','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
    $student->student_name = Input::get('student_name');
    $student->email = Input::get('email');
    $student->reg_no=Input::get('reg_no');
    $student->level_id=Input::get('level_id');
    if(Input::hasFile('image')){
       $file = Input::file('image');
       $file = $file->move(public_path().'/uploads/images/',$file->getClientOriginalName());
       $student->image = $file->getFileName();
    }

    if ( ! Input::get('password') == '')
    {
        $student->password = bcrypt(Input::get('password'));
    }
    $find_user=$student->users;

    $get_user=User::find($find_user);
    foreach ($get_user as $user) {
      $user->name = $student->student_name;
      $user->email = $student->email;
      $user->password = $student->password;
      $user->save();
    }

    $student->save();

    //Flash::message('Your account has been updated!');
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Student $student)
     {
         $student->delete();

         return redirect()->back();

     }

}
