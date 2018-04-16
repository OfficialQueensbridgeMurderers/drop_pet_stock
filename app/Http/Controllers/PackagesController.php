<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PackagesController extends Controller
{

  public function index()
  {
      return view('packages.index');
  }

  public function available()
  {
      if ( ! empty($_GET['addPackage'])){
        $id = $_GET['addPackage'];
        $userId = Auth::id();
        DB::table('user_package')->insert([
            'id_user' => $userId,
            'id_package' => intval($id),
        ]);
        return redirect()->back();
      }

      $packages = \App\AvailablePackages::all();
      return view('packages.available.index', ['packages' => $packages]);
  }

  public function custom()
  {
      $userId = Auth::id();
      $customPackages = \App\CustomPackages::where('id_user', $userId)->get();
      return view('packages.custom.index', ['customPackages' => $customPackages]);
  }

  public function toggle(int $id)
  {
      $result = \App\CustomPackages::where('id', $id)->first();
      $result->is_activated = !($result->is_activated);
      $result->save();
      return redirect()->back();
  }

  public function create()
  {
      if ( ! empty($_GET['name'])){
        $name = $_GET['name'];
        $userId = Auth::id();
        DB::table('custompackages')->insert([
          'id_user' => $userId,
          'name' => $name,
          'is_activated' => false,
        ]);
        return redirect()->action('PackagesController@custom');
      }
      return view('packages.custom.create');
  }

  public function add(int $idPackage, int $idProduit)
  {
      $result = \App\CustomPackageItems::where(['id_package' => $idPackage, 'id_produit' => $idProduit])->first();
      if (is_null($result)){
        $item = new \App\CustomPackageItems;
        $item->id_package = $idPackage;
        $item->id_produit = $idProduit;
        $item->quantity = 1;
        $item->save();
      }
      else{
        $result->quantity++;
        $result->save();
      }

      return redirect()->back();
  }

  public function update(int $id){
    if ( ! empty($_GET['quantity'])){
        $result = \App\CustomPackageItems::where('id', $id)->first();
        $result->quantity = intval($_GET['quantity']);
        $result->save();
    }
    return redirect()->action('PackagesController@custom');
  }

  public function remove(int $id){
    if ( ! empty($_GET['custom'])){
      \App\CustomPackageItems::destroy($id);
    }
    if ( ! empty($_GET['premade'])){
      \App\UserPackage::destroy($id);
    }
    return redirect()->back();
  }

  public function delete(int $id)
  {
      \App\CustomPackageItems::where('id_package', $id)->delete();
      \App\CustomPackages::destroy($id);

      return redirect()->action('PackagesController@custom');
  }

  public function deliveryBox()
  {
      $userId = Auth::id();
      $userPackages = \App\UserPackage::where('id_user', $userId)->get();
      $customPackages = \App\CustomPackages::where('id_user', $userId)->get();
      $customCounter = \App\CustomPackages::where(['id_user'=> $userId, 'is_activated' => true])->get();
      $nbCustom = 0;
      foreach ($customCounter as $custom) {
        if (count($custom->items) != 0) {
          $nbCustom++;
        }
      }
      return view('packages.delivery_box.index', ['userPackages' => $userPackages, 'customPackages' => $customPackages, 'nbCustom' => $nbCustom]);
  }

  public function checkout()
  {
      $total = 0;
      $livraison = 0;
      $produits = 0;
      $userId = Auth::id();
      $userPackages = \App\UserPackage::where('id_user', $userId)->get();
      $customPackages = \App\CustomPackages::where('id_user', $userId)->get();
      foreach($userPackages as $package){
        foreach ($package->package->items as $item) {
          $produits += $item->produit->prix_vente;
          $livraison += $item->produit->cout_livraison;
          $total = $livraison + $produits;
        }
      }
      foreach($customPackages as $package){
        foreach ($package->items as $item) {
          $produits += $item->produit->prix_vente;
          $livraison += $item->produit->cout_livraison;
          $total = $livraison + $produits;
        }
      }
      return view('packages.checkout', ['userPackages' => $userPackages, 'customPackages' => $customPackages, 'produits' => $produits, 'livraison' => $livraison, 'total' => $total]);
  }
}
