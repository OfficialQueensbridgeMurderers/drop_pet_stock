<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('suppliers')->insert([
          'nom' => "Cat Supplies Inc.",
          'adresse' => "1333 Rue de L'orme",
          'email' => "business@whiskas.com",
      ]);

      DB::table('suppliers')->insert([
          'nom' => "Dog Supplies Inc.",
          'adresse' => "789 Avenue Durham",
          'email' => "business@pedigree.com",
      ]);
    }
}
