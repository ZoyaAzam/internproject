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
    public function boot(): void
    {
        //
        config(['MailNoti' => 'info@awamine.com']);
        config(['whats' => '+971507048840']);
        config(['whatsapp' => '+971 50 704 8840']);
    
    }
}
