<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelemarketingTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telemarketing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('email');
            $table->integer('id_animal');
            $table->integer('id_forfait');
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
       Schema::dropIfExists('telemarketing');
    }
}
