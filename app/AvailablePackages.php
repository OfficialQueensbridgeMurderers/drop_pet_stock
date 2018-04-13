<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailablePackages extends Model
{
    protected $table = 'availablepackages';

    public function items()
    {
        return $this->hasMany('App\PackageItems', 'id_package');
    }
}
