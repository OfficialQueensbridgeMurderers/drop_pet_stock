<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CartController extends Controller
{
    public function index()
    {
		$cartItems = \App\CartItem::where('id_user', Auth::user()->id)->get();
        return view('cart.index', ['cartItems' => $cartItems]);
    }
	public function ajouterArticle(int $id){
				
		DB::table('cart_item')->insert(
		['id_user' => Auth::user()->id,
		 'id_produit' => $id,
		 'quantity' => 1]
		);
		return redirect()->action('CartController@index');
	}
}
