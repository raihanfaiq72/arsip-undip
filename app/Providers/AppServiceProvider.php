<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->share('Ketua', 'Layout/main');
        view()->share('Sekretaris', 'Layout/main');
        view()->share('Anggota', 'Layout/main');
    }
}