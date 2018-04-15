<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Produit::class, function (Faker $faker) {
    return [
        'nom' => $faker->name,
        'id_fournisseur' => $faker->numberBetween(3000,10000),
        'id_animal' => $faker->numberBetween(100,1000),
        'sku'=> $faker->numberBetween(100,1000),
        'prix'=> $faker->numberBetween(100,1000),
        'poids'=> $faker->numberBetween(100,1000),
        'prix_vente' => $faker->numberBetween(100,1000),
        'cout_livraison' => $faker->numberBetween(100,1000),
        'remember_token' => str_random(10),
    ];
});
