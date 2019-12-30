<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table='exam_types';

    protected $fillable=['term_name'];

     public function exam(){
      return $this->hasOne(ExamType::class);
     }
}
