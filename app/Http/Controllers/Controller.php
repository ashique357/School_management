<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // 
    // public function __construct(){
    //   $user_id=Auth::id();
    //   $user=User::find($user_id);
    //   $userable=$user->userable;
    //   view::share('userable','user',$userable,$user);
    // }
}
