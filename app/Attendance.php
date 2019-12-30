<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
  protected $fillable=['name','subject_id','student_id','level_id','date','attendance'];

  public function student(){
    return $this->belongsTo(Student::class);
  }

  public function teacher(){
    return $this->belongsTo(Teacher::class);
  }

  public function subject(){
    return $this->belongsTo(Subject::class);
  }
  public function level(){
    return $this->belongsTo(Level::class);
  }

}
