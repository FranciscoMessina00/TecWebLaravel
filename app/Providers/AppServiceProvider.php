<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Risolve un problema di Laravel 6 per cui il numero massimo di caratteri consentito non è sufficiente a contenere quelli 
        associati ad un username, ad esempio.*/
        Schema::defaultStringLength(191);
    }
}
