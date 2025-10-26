<?php

namespace App\Providers;


use App\Models\Utilisateur;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate pour vérifier un rôle
        Gate::define('role', function (Utilisateur $user, string $roleLibelle) {
            return $user->hasRole($roleLibelle);
        });
       
       
    }
}
