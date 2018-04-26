<?php

namespace ikosar\LMFA;

use Illuminate\Support\ServiceProvider;

class LaravelMicrosoftFaceApiProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/route.php';
        $this->publishes([
            __DIR__.'/config/lmfa.php'=>config_path('/LMFA.php'),
        ]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ikosar\LMFA\LmfaController');
    }
}
