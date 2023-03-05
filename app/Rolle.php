<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolle extends Model
{
    public function type(){
      return $this->belongsTo('App\UserType', 'user_type_id', 'id');
    }
}
