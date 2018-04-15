<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_item';
	
	public function produit()
    {
        return $this->hasOne('App\Produit', 'id', 'id_produit');
    }
}
