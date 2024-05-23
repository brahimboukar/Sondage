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
        Schema::create('etude_fonction_detailes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('etude_id');
            $table->unsignedBigInteger('fonction_detaile_id');
            $table->foreign('etude_id')->references('id')->on('etudes')->onDelete('cascade')->onUpdate('CASCADE');
            $table->foreign('fonction_detaile_id')->references('id')->on('fonction_detailes')->onDelete('cascade')->onUpdate('CASCADE');
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
        Schema::dropIfExists('etude_fonction_detailes');
    }
};
