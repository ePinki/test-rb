<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birthdate', 'company', 'user_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_type(){
      return $this->hasOne('App\UserType', 'id', 'user_type_id')->with('role');
    }

    public function role(){
      return $this->belongsToMany('App\Rolle', 'user__roles')->with('type');
    }

    static function created_at($date){
      $datemonth = ['01' => 'января', '02' => 'февраля', '03' => 'марта',
      '04' => 'апреля', '05' => 'мая', '06' => 'июня', '07' => 'июля', '08' => 'августа',
      '09' => 'сентября', '10' => 'октября', '11' => 'ноября', '12' => 'декабря'];
      $month = date("m", strtotime($date));
      $day = date("d", strtotime($date));
      $year = date("Y", strtotime($date));
      $hour = date("H", strtotime($date));
      $min = date("i", strtotime($date));
      return $day.' '.$datemonth[$month].' '.$year.' '. $hour.':'.$min;
    }

}
