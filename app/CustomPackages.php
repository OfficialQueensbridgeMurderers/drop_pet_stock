<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomPackages extends Model
{
    protected $table = 'custompackages';

    public function items()
    {
        return $this->hasMany('App\CustomPackageItems', 'id_package');
    }
}
