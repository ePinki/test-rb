<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function catalog(){
      return $this->belongsToMany('App\Catalog', 'books__catalogs');
    }
}
