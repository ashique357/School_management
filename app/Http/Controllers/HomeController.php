<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
  {
        $this->middleware('guest');
  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function register_option(){
      return view('register_option');
    }

    public function feature(){
      return view('feature');
    }

    public function about(){
      return view('about');
    }

    public function team(){
      return view('team');
    }
    public function contact(){
      return view('footer');
    }



}
