<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable=[
    'name',
    'semester_name'
  ];

  public function students(){
    return $this->hasMany(Student::class);
  }
  public function subjects(){
    return $this->hasMany(Subject::class);
  }
  public function results(){
    return $this->hasMany(Result::class);
  }
  public function attendances(){
    return $this->hasMany(Attendance::class);
  }
}
