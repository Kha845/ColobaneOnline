<?php

namespace Database\Seeders;
use App\User;
use App\Client;
use App\Article;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\TypeArticleTableSeeder;
use Database\Seeders\DureeLocationTableSeeder;
use Database\Seeders\StatutLocationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call(TypeArticleTableSeeder::class);
            Article::factory(10)->create();
            Client::factory(10)->create();
            User::factory(10)->create();
            $this->call(RoleTableSeeder::class);
            $this->call(StatutLocationTableSeeder::class);
            $this->call(PermissionTableSeeder::class);
            $this->call(DureeLocationTableSeeder::class);
            //récupére moi l'utilisateur qui a comme id 1 et donne lui le role qui a comme id 1
            User::find(1)->roles()->attach(1);
            User::find(2)->roles()->attach(2);
            User::find(3)->roles()->attach(3);
            User::find(4)->roles()->attach(4);

    }
}
