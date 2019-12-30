<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table="assignment";
    protected $fillable=['file','title'];

    protected $hidden=['teacher_id','subject_id','level_id'];

    public function teacher(){
      return $this->belongsTo(Teacher::class);
    }

    public function student(){
      return $this->belongsTo(Student::class);
    }

    public function StudentAssignment(){
      return $this->belongsTo(StudentAssignment::class);
    }
    public function subjects(){
      return $this->hasMany(Subject::class);
    }
}
