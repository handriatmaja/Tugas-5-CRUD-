<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; // <-- Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    // ...

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tambahkan baris ini untuk menggunakan template Bootstrap 5
        Paginator::useBootstrapFive(); 
        
        // Jika kamu menggunakan versi Bootstrap lain (misalnya v4):
        // Paginator::useBootstrapFour();
    }
}