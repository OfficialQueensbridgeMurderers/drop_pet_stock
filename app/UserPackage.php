<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{

  protected $table = 'user_package';

  public function package()
  {
      return $this->hasOne('App\AvailablePackages', 'id', 'id_package');
  }

  public function user()
  {
      return $this->hasOne('App\User', 'id', 'id_user');
  }
}
