<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use Illuminate\Support\Facades\Input;
class LevelsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('Admin');
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index()
  {
    $levels=Level::all();
    return view('admin_pannel.level_index',compact('levels'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin_pannel.level');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $levels=Level::create($request->all());
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $levels=Level::findOrFail($id);
    return view('admin_pannel.level_edit',compact('levels',$levels));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $levels=Level::findOrFail($id);
    return view('admin_pannel.level_edit',compact('levels',$levels));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request,Level $level)
  {
    $level->name = Input::get('name');
    $level->semester_name = Input::get('semester_name');
    $level->save();
    //$student->fill($input)->save();

    return redirect()->back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Level $level)
  {
    $level->delete();
    return redirect()->back();
  }
}
