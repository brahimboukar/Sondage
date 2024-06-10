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
        Schema::create('demande_recomponses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recomponse_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('etat')->default(0);
            $table->foreign('recomponse_id')->references('id')->on('recomponses')->onDelete('cascade')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('CASCADE');
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
        Schema::dropIfExists('demande_recomponses');
    }
};
