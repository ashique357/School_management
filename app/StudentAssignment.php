<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAssignment extends Model
{
  protected $table="student_assignment";
  protected $fillable=['file','title'];

  protected $hidden=['assignment_id','student_id','subject_id','level_id'];

  public function teacher(){
    return $this->belongsTo(Teacher::class);
  }

  public function student(){
    return $this->belongsTo(Student::class);
  }
  public function subjects(){
    return $this->hasMany(Subject::class);
  }
  public function assignments(){
    return $this->hasMany(Assignment::class);
  }

}
