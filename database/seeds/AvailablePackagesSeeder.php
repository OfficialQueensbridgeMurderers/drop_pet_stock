<?php

use Illuminate\Database\Seeder;

class AvailablePackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('availablepackages')->insert([
          'prix' => 30,
          'name' => "Cat package",
      ]);

      DB::table('availablepackages')->insert([
          'prix' => 20,
          'name' => "Dog package",
      ]);
    }
}
