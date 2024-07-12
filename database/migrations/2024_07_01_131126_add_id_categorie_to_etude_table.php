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
        Schema::table('etudes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_categorie')->nullable()->after('img');
            $table->foreign('id_categorie')->references('id')->on('categorie__etudes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudes', function (Blueprint $table) {
            $table->dropForeign(['id_categorie']);
            $table->dropColumn('id_categorie');
        });
    }
};
