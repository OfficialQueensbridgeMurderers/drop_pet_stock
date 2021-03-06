<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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
    $userId = Auth::id();
    $create = 0;
    if ( ! empty($_GET['show'])){
      $create = 1;
    }
    if ( ! empty($_GET['text'])){
      DB::table('review')->insert([
          'id_user' => $userId,
          'id_produit' => $id,
          'text' => $_GET['text'],
          'stars' => intval($_GET['rating'])
      ]);
      return redirect()->action('ShopController@item', ['id' => $id]);
    }

    $customPackages = \App\CustomPackages::where('id_user', $userId)->get();

    $item = DB::table('produit')->where('id', $id)->first();
    $reviews = DB::table('review')->where('id_produit', $id)->get();
    $reviews = \App\Review::where('id_produit', $id)->get();

    return view('shop.item', ['item' => $item, 'reviews' => $reviews, 'create' => $create, 'customPackages' => $customPackages]);
  }

  public function category(string $category)
  {
      if ( ! empty($_GET['animals'])){
        $animal = $_GET['animals'];
      }
      else{
        $animal = "_all_";
      }

      if ( ! empty($_GET['search'])){
        $search = $_GET['search'];
      }
      else{
        $search = "_none_";
      }

      if ($category == "all_items"){
        $conditions = array();
        if ($animal != "_all_"){
          $conditions += array('animal' => $animal);
        }
        if ($search != "_none_"){
          $conditions += array('nom' => $search);
        }
        if (count($conditions) != 0){
          $items = DB::table('produit')->where($conditions)->get();
        }
        else {
          $items = DB::table('produit')->get();
        }
      }
      else {
        $conditions = array('category' => $category);
        if ($animal != "_all_"){
          $conditions += array('animal' => $animal);
        }
        if ($search != "_none_"){
          $conditions += array('nom' => $search);
        }
        $items = DB::table('produit')->where($conditions)->get();
      }

      $animals = array();
      $allitems = DB::table('produit')->get();
      foreach ($allitems as $item) {
        if (!in_array($item->animal, $animals)){
          array_push($animals, $item->animal);
        }
      }

      return view('shop.category', ['items' => $items, 'category' => $category, 'animals' => $animals, 'selectedAnimal' => $animal, 'search' => $search]);
  }
}
