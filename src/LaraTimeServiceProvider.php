<?php

namespace rakeshthapac\LaraTime;

use Illuminate\Support\ServiceProvider;

class LaraTimeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/Events' => base_path('app/laratime/Events')
        ], 'events');

        $this->publishes([
            __DIR__ . '/Traits' => base_path('app/laratime/Traits')
        ], 'traits');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
