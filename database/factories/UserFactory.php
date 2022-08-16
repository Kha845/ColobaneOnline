<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            $nom=$this->faker->firstName;
            $prenom=$this->faker->lastName;
    return [
        'name' => "$prenom ,$nom",
        "sexe"=>array_rand(["M","F"],1),
        'email' => $this->faker->unique()->safeEmail,
        "telephone1"=>$this->faker->phoneNumber,
        "telephone2"=>$this->faker->phoneNumber,
        "pieceIdentite"=>array_rand(["CNI","PASSPORT","PERMIS DE CONDUIRE"],1),
        "numeroPieceIdentite"=>$this->faker->creditCardNumber,
        'photo'=>$this->faker->imageUrl(),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
    }
}
