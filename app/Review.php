<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
