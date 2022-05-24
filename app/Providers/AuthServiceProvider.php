<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        /*Definisco i gate da richiamare per controllare quale utente ha effettuto l'accesso e che ruolo ha.*/
        $this->registerPolicies();
        
        Gate::define('isAdmin', function ($user) {
            return $user->hasRole('admin');
        });
        
        Gate::define('isStudent', function ($user) {
            return $user->hasRole('student');
        });
        
        Gate::define('isLocator', function ($user) {
            return $user->hasRole('locator');
        });
        
        Gate::define('show-search-bar', function ($user) {
            return $user->hasRole(['student']);
        });
        
        Gate::define('show-filter-bar', function ($user) {
            return $user->hasRole(['student']);
        });
        
        Gate::define('use-chat', function ($user) {
            return $user->hasRole(['student', 'locator']);
        });
    }
}
