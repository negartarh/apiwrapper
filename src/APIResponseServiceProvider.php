<?php

namespace Negartarh\APIWrapper;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class APIResponseServiceProvider
 *
 * This service provider is responsible for bootstrapping the API wrapper package,
 * loading translations, publishing configuration files, and registering the APIResponse singleton.
 *
 * @package Negartarh\APIWrapper
 */
class APIResponseServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * This method is called after all other service providers have been registered.
	 * It is used to load translations, publish configuration files, and add custom information
	 * to the About command.
	 *
	 * @return void
	 */
	public function boot(): void
	{
		require_once __DIR__ . '/Helpers/functions.php';
		
		$this->loadJsonTranslationsFrom(__DIR__ . '/Resources/languages/');
		
		$this->publishes([
			                 __DIR__ . '/Config/apiwrapper.php' => config_path('apiwrapper.php'),
			                 __DIR__ . '/Resources/languages/'  => $this->app->langPath('vendor/apiwrapper'),
		                 ]);
		
		AboutCommand::add('API Response', static fn(): array => ['Version' => APIResponse::version]);
	}
	
	/**
	 * Register any application services.
	 *
	 * This method is called before the "boot" method and is used to bind services into the
	 * service container. In this case, it merges the package configuration and registers
	 * the APIResponse singleton.
	 *
	 * @return void
	 */
	public function register(): void
	{
		$this->mergeConfigFrom(__DIR__ . '/Config/apiwrapper.php', 'apiwrapper');
		
		$this->app->singleton('APIResponse', static fn(): APIResponse => new APIResponse());
	}
}
