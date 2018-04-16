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

	public function supprimerArticle(int $id){
		\App\CartItem::destroy($id);
		return redirect()->action('CartController@index');
	}
	public function modifier(int $id){
		if ( ! empty($_GET['nombre'])){
        $qty = $_GET['nombre'];
		$cartItem = \App\CartItem::find($id);
		$cartItem->quantity = $qty;
		$cartItem->save();
      }
		return redirect()->action('CartController@index');
	}

  public function checkout(){
        $cartItems = \App\CartItem::where('id_user', Auth::user()->id)->get();
        return view('cart.checkout', ['cartItems' => $cartItems]);
	}
}
