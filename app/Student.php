<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

  protected $fillable =[
      'student_name','email','password','reg_no','image','level_id'
  ];


  public static $validationRule=array(
    'student_name'=>'required|string',
    'email'=>'required',
    'reg_no'=>'required',
    'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  );

  protected $hidden = [
      'password', 'remember_token',
  ];

  public function users()
  {
      return $this->morphMany(User::class, 'userable');
  }

  public function level(){
    return $this->belongsTo(Level::class);
  }

  public function subject(){
    return $this->hasMany(Subject::class);
  }

  public function results(){
    return $this->hasMany(Result::class);
  }

public function attendances(){
  return $this->hasMany(Attendance::class);
}
public function StudentAssignment(){
  return $this->belongsTo(StudentAssignment::class);
}

}
