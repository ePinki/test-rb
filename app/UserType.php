<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
  public function role(){
    return $this->hasMany('App\Rolle');
  }
}
