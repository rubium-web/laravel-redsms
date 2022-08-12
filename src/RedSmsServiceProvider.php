<?php

namespace Rubium\RedSms;

use Illuminate\Support\ServiceProvider;
use Rubium\RedSms\Vendor\RedSms AS RedSmsClient;

class RedSmsServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/redsms.php', 'redsms');

        $this->app->singleton('RedSms', function ($app) {
            return new RedSms();
        });

        $this->app->singleton('RedSmsClient', function ($app) {
            $login = config('redsms.login');
            $apiKey = config('redsms.api_key');
            $apiUrl = config('redsms.api_url');
            return new RedSmsClient($login, $apiKey, $apiUrl);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
       // return ['notifications'];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }



    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/redsms.php' => config_path('redsms.php'),
        ], 'redsms.config');

        // Registering package commands.
        // $this->commands([]);
    }
}
