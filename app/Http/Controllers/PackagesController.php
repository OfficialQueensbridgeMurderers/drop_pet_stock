<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
  public function index()
  {
      return view('packages.index');
  }

  public function available()
  {
      $packages = \App\AvailablePackages::all();
      return view('packages.available.index', ['packages' => $packages]);
  }
}
