<?php

namespace Negartarh\APIWrapper;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

class APIResponseServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {

        AboutCommand::add('API Response', fn() => ['Version' => APIResponse::version]);

        require_once __DIR__ . '/Helpers/functions.php';

        $this->loadJsonTranslationsFrom(__DIR__ . '/Resources/languages');

        $this->publishes([
            __DIR__ . '/Config/apiwrapper.php' => config_path('apiwrapper.php'),
            __DIR__ . '/Resources/languages' => $this->app->langPath('vendor/apiwrapper'),
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/apiwrapper.php', 'apiwrapper'
        );

        $this->app->bind('APIResponse', function () {
            return new APIResponse();
        });

    }
}
