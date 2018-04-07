<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('id_fournisseur');
            $table->string('animal');
            $table->string('category');
            $table->string('sku');
            $table->double('prix');
            $table->double('poids');
            $table->double('prix_vente');
            $table->double('cout_livraison');
            $table->string('img_path');
            $table->string('img_height');
            $table->string('img_width');
            $table->boolean('is_featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit');
    }
}
