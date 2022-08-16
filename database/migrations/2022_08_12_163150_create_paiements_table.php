<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->double("montantPaye");
            $table->dateTime("datePaiement");
            $table->foreignId("user_id")->constrained();
            $table->foreignId("location_id")->constrained();

        });
        /**
         * Permet d'activer des contraintes sur les clé étrangere
         * Pour que ce constrainte marche on applique la méthode constrained() lorsque qu'on défint la clé etrangere
         */
        Schema::enableForeignkeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiements',function(Blueprint $table){
            $table->dropForeign(["user_id","location_id"]);
    });
        Schema::dropIfExists('paiements');
    }
}
