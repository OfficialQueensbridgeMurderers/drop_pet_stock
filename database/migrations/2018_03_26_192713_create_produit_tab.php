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
            $table->integer('id_animal');
            $table->string('sku');
            $table->double('prix');
            $table->double('poids');
            $table->integer('prix_vente');
            $table->integer('cout_livraison');
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
