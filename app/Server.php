<?php

namespace App;
use App\User;
use App\Rolle;
use App\User_Role;
use DB;
class Server {

    public function create($new) {
      //return $new;
      $user_id = User::create($new);
      $user_id = $user_id->id;
      $role = $new['role'];
      $roles = array();

      foreach ($role as $key => $value) {
        $roles[] = ['user_id' => $user_id, 'rolle_id' => $key];
      }
       User_Role::insert($roles);
    }

    public function update($old){

      $user_id = $old['id'];

      $role = $old['role'];
      $repository = ['name' => $old['name'], 'company' => $old['company'], 'birthdate' => $old['birthdate'], 'user_type_id' => $old['UserType']];
      //return $repository;
      User::where('id', $user_id)->update($repository);
      User_Role::where('user_id', $user_id)->delete();

      foreach ($role as $key => $value) {
        $roles[] = ['user_id' => $user_id, 'rolle_id' => $key];
      }
       User_Role::insert($roles);
    }


}
