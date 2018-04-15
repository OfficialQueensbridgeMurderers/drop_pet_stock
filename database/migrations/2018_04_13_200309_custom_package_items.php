<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomPackageItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('custom_package_items', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('id_package');
           $table->integer('id_produit');
           $table->integer('quantity');
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
         Schema::dropIfExists('custom_package_items');
     }
}
