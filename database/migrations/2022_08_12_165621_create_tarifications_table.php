<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifications', function (Blueprint $table) {
            $table->id();
            $table->double("prix");
            $table->foreignId("duree_location_id")->constrained();
            $table->foreignId("article_id")->constrained();
            $table->timestamps();
        });
        Schema::enableForeignkeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Avant de supprimer la table de tarification nous allons d'abord supprimer les relations que nous avons définie
         */
        Schema::table('tarifications',function(Blueprint $table){
            $table->dropForeign(["duree_location_id","article_id"]);
    });
        Schema::dropIfExists('tarifications');
    }
}
