<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Client;
class ClientFactory extends Factory
{
     /**
     * The name of the factory's corresponding model
     * @var string
     */

    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        $ville= $this->faker->city;
        $pays=$this->faker->country;



        return [
            "nomClient" => $this->faker->lastName,
            "prenom"=>$this->faker->lastName,
            "sexe"=>array_rand(["M","F"],1),
            "dateNaissance"=>$this->faker->dateTimeBetween("1980-01-01","2001-12-30"),
            "lieuNaissance"=> "$pays, $ville",
            "nationalite"=>$this->faker->country,
            "pays"=>$pays,
            "ville"=>$ville,
            "adresse"=>$this->faker->address,
            "telephone1"=>$this->faker->phoneNumber,
            "telephone2"=>$this->faker->phoneNumber,
            "pieceIdentite"=>array_rand(["CNI","PASSPORT","PERMIS DE CONDUIRE"],1),
            "noPieceIdentite"=>$this->faker->creditCardNumber,
        ];
    }
}
