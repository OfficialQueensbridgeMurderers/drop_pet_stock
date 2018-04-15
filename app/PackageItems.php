<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageItems extends Model
{
    protected $table = 'package_items';

    public function produit()
    {
        return $this->hasOne('App\Produit', 'id', 'id_produit');
    }

    public function package()
    {
        return $this->belongsTo('App\AvailablePackages', 'id_package');
    }
}
