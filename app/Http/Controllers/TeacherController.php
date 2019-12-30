<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Teacher;
use App\User;

class TeacherController extends Controller
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
     $teachers=Teacher::all();
     return view('admin_pannel.teacher_info',compact('teachers'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher_pannel.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$teacher=Teacher::create($request->all());
      $teacher=new Teacher();
      $teacher->teacher_name=Input::get('teacher_name');
      $teacher->email=Input::get('email');
      $hash=Input::get('password');
      $teacher->password=bcrypt($hash);
      $teacher->contact=Input::get('contact');

      if(Input::hasFile('image')){
         $file = Input::file('image');
         $file = $file->move(public_path().'/uploads/images/',$file->getClientOriginalName());
         $teacher->image = $file->getFileName();
      }

      $teacher->save();

      User::create([
        'name' => $teacher->teacher_name,
        'email' => $request['email'],
        'userable_type' => 'Teacher',
        'userable_id' => $teacher->id,
        'password' => bcrypt($request['password']),
      ]);



      return redirect('/teacher/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $teacher=Teacher::findOrFail($id);
      return view('teacher.profile',compact('teacher',$teacher));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $teacher=Teacher::findOrFail($id);
      return view('teacher_pannel.edit',compact('teacher'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
    $teacher->teacher_name = Input::get('teacher_name');
    $teacher->email = Input::get('email');
    $teacher->contact=Input::get('contact');
    if(Input::hasFile('image')){
       $file = Input::file('image');
       $file = $file->move(public_path().'/uploads/images/',$file->getClientOriginalName());
       $teacher->image = $file->getFileName();
    }

    if ( ! Input::get('password') == '')
    {
        $teacher->password = bcrypt(Input::get('password'));
    }
    $find_user=$teacher->users;
    $get_user=User::find($find_user);
    foreach ($get_user as $user) {
      $user->name = $teacher->teacher_name;
      $user->email = $teacher->email;
      $user->password = $teacher->password;
      $user->save();
    }

    $teacher->save();

    //Flash::message('Your account has been updated!');
    return redirect()->back();
    }

    //Flash::message('Your account has been updated!');

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
      $teacher->delete();

      return redirect()->back();
    }
}
