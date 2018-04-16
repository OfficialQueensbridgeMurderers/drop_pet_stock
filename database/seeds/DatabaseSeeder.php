<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProduitTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(AvailablePackagesSeeder::class);
        $this->call(PackageItemsSeeder::class);
    }
}
