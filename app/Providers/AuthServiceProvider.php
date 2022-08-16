<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //On définit un portail et ce portail n'est accessible que par l'admin
        //les gates sont des portail de sécurité
        Gate::define("admin",function(User $user){
            return $user->hasRole("admin");
        });

        Gate::define("employe",function(User $user){
            return $user->hasRole("employe");
        });

        Gate::define("manager",function(User $user){
            return $user->hasRole("manager");
        });

        Gate::after(function(User $user){
            return $user->hasRole("superadmin");

        });
        //On utilise after pour qu'il vérifie d'abords que l'utilisateur est admin ou employe ou manager


    }
}
