<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Admin;
use App\User;

class AdminsController extends Controller
{
  public function __construct(){
     // $this->middleware('Admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_pannel.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       //$admin=Admin::create($request->all());
        $admin=new Admin();
        $admin->name=Input::get('name');
        $admin->email=Input::get('email');
        $hash=Input::get('password');
        $admin->password=bcrypt($hash);

       // if(Input::hasFile('image')){
       //    $file = Input::file('image');
       //    $file = $file->move(public_path().'/uploads/images/',$file->getClientOriginalName());
       //    $admin->image = $file->getFileName();
       // }
       //
        $admin->save();
       User::create([
         'name' => $admin->name,
         'email' => $request['email'],
         'userable_type' => 'Admin',
         'userable_id' => $admin->id,
         'password' => bcrypt($request['password']),
       ]);

       return redirect('/admin/dashboard');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
