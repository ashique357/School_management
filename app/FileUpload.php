<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    protected $table="file_upload";
    protected $fillable=['file','subject'];

    protected $hidden=['user_id'];

    public function user(){
      return $this->belongsTo(User::class);
    }
}
