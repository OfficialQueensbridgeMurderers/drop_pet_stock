<?php

use Illuminate\Database\Seeder;

class PackageItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('package_items')->insert([
          'id_package' => 1,
          'is_custom' => false,
          'id_produit' => 1,
          'quantity' => 1
      ]);

      DB::table('package_items')->insert([
          'id_package' => 1,
          'is_custom' => false,
          'id_produit' => 2,
          'quantity' => 2
      ]);
    }
}
