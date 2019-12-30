<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
  'Student'=>'App\Student',
  'Teacher'=>'App\Teacher',
]);

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'userable_type', 'userable_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userable(){
      return $this->morphTo();
    }

    public function hasRole($userable_type=null){
      if ($userable_type) {
        return $this->userable_type=$userable_type;
      }
      return $this->userable_type;
    }

    public function messages()
  {
    return $this->hasMany(Message::class);
  }
    public function fileUpload()
  {
    return $this->hasMany(FileUpload::class);
  }

}
