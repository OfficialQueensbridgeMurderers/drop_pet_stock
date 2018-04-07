<?php

use Illuminate\Database\Seeder;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('produit')->insert([
          'nom' => "Cat toy",
          'id_fournisseur' => 1,
          'animal' => "Cat",
          'category' => "Toys",
          'sku' => "h82jga7gad7hgf",
          'prix' => 8.5,
          'poids' => 4.3,
          'prix_vente' => 15.5,
          'cout_livraison' => 2.2,
          'img_path' => "http://127.0.0.1/dps/drop_pet_stock/public/storage/cat_toy.jpg",
          'img_height' => '200',
          'img_width' => '200',
          'is_featured' => true,
      ]);

      DB::table('produit')->insert([
          'nom' => "Cat food",
          'id_fournisseur' => 1,
          'animal' => "Cat",
          'category' => "Food",
          'sku' => "hnijiu245d7hgf",
          'prix' => 6.5,
          'poids' => 9.8,
          'prix_vente' => 13.3,
          'cout_livraison' => 5.4,
          'img_path' => "http://127.0.0.1/dps/drop_pet_stock/public/storage/cat_food.jpg",
          'img_height' => '250',
          'img_width' => '200',
          'is_featured' => false,
      ]);

      DB::table('produit')->insert([
          'nom' => "Dog toy",
          'id_fournisseur' => 2,
          'animal' => "Dog",
          'category' => "Toys",
          'sku' => "hvvvvv2jgdadjiaf",
          'prix' => 5.7,
          'poids' => 6.9,
          'prix_vente' => 18.1,
          'cout_livraison' => 6.2,
          'img_path' => "http://127.0.0.1/dps/drop_pet_stock/public/storage/dog_toy.jpg",
          'img_height' => '200',
          'img_width' => '200',
          'is_featured' => true,
      ]);

      DB::table('produit')->insert([
          'nom' => "Dog food",
          'id_fournisseur' => 2,
          'animal' => "Dog",
          'category' => "Food",
          'sku' => "hnijiu2ljiyif",
          'prix' => 9.5,
          'poids' => 12.8,
          'prix_vente' => 18.3,
          'cout_livraison' => 5.4,
          'img_path' => "http://127.0.0.1/dps/drop_pet_stock/public/storage/dog_food.jpg",
          'img_height' => '220',
          'img_width' => '200',
          'is_featured' => false,
      ]);
    }
}
