<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->integer('id_forfait');
            $table->integer('id_produit');
            $table->integer('qte');
            $table->double('total');
            $table->string('adresse_livraison');
            $table->string('statut');
            $table->string('nom_cie_livraison');
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
        Schema::dropIfExists('command');
    }
}
