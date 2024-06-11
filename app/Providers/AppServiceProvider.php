<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Barryvdh\DomPDF\Facade as PDF;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Vous n'avez pas besoin d'ajouter Route::model ici
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
