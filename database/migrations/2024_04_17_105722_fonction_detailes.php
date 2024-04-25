<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonction_detailes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fonction_id');
            $table->foreign('fonction_id')->references('id')->on('fonctions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('libelle');
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
        //
    }
};
