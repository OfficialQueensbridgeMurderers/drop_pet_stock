<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('review')->insert([
          'id_user' => 1,
          'id_produit' => 1,
          'text' => "pretty great",
          'stars' => 5
      ]);
    }
}
