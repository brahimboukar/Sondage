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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_sexe');
            $table->unsignedBigInteger('id_region');
            $table->unsignedBigInteger('id_fonction');
            $table->unsignedBigInteger('id_fonction_details');
            $table->foreign('id_sexe')->references('id')->on('sexes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_region')->references('id')->on('regions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_fonction')->references('id')->on('fonctions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_fonction_details')->references('id')->on('fonction_detailes')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('telephone');
            $table->string('password');
            $table->rememberToken();
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
