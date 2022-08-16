<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Seeder nous permet d'insérer des données dans la base de donné sans insérer d'une mécanisme automatique
         */
        DB::table("type_articles")->insert(
            ["nom"=>"voiture"],
            ["nom"=>"Immobilier"],
            ["nom"=>"Appareils Electronique"],
            ["nom"=>"Salle"]
        );
    }
}
