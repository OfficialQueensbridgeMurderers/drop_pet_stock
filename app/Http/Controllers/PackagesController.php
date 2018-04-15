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

  public function create()
  {
      if ( ! empty($_GET['name'])){
        $name = $_GET['name'];
        $userId = Auth::id();
        DB::table('custompackages')->insert([
          'id_user' => $userId,
          'name' => $name,
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
    \App\CustomPackageItems::destroy($id);
    return redirect()->action('PackagesController@custom');
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
      return view('packages.delivery_box.index', ['userPackages' => $userPackages]);
  }
}
