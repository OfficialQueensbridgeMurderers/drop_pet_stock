<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomPackageItems extends Model
{
  public function produit()
  {
      return $this->hasOne('App\Produit', 'id', 'id_produit');
  }

  public function package()
  {
      return $this->belongsTo('App\CustomPackages', 'id_package');
  }
}
