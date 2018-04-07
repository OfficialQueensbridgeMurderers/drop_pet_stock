<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {

  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $featuredItems = DB::table('produit')->where('is_featured', true)->get();
      $items = DB::table('produit')->get();
      $categories = array();
      foreach ($items as $item) {
        if (!in_array($item->category, $categories)){
          array_push($categories, $item->category);
        }
      }
      return view('shop.index', ['categories' => $categories, 'featuredItems' => $featuredItems]);
  }

  public function item(int $id)
  {
      $item = DB::table('produit')->where('id', $id)->first();
      return view('shop.item', ['item' => $item]);
  }

  public function category(string $category)
  {
      if ($category == "all_items"){
        $items = DB::table('produit')->get();
        $category = "All items";
      }
      else {
        $items = DB::table('produit')->where('category', $category)->get();
      }
      return view('shop.category', ['items' => $items, 'category' => $category]);
  }
}
