<?php

namespace Database\Factories;

use App\TypeArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeArticleFactory extends Factory
{

   /**
    * @var string
    */


    protected $model = TypeArticle::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * factorie nous permet  d'insérer des donnée dans la base de donné en utilisant une mécanisme dynamique
         */
        return [
            "nom"=>array_rand(
                ["Immobilier","Appareils Electronique","Television","Salle","voiture"],1)
        ];
    }
}
