<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  protected $primaryKey = 'id';

  protected $fillable =['exam_name','exam_type_id'];

  public function examType(){
    return $this->belongsTo(ExamType::class);
  }

  public function result(){
    return $this->belongsTo(Result::class);
  }
}
