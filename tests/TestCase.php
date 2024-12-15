<?php

namespace Negartarh\APIWrapper\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;
use Negartarh\APIWrapper\APIResponseServiceProvider;

/**
 * Base test case for the APIWrapper package.
 *
 * This class extends the Orchestra Testbench TestCase to provide a
 * foundation for testing the APIWrapper package. It sets up the
 * necessary environment and configuration for the tests.
 *
 * The `getPackageProviders` method is overridden to register the
 * APIResponseServiceProvider, ensuring that the service provider is
 * loaded during testing. This allows for testing the package's
 * functionality in an environment that closely resembles a real
 * Laravel application.
 *
 * @package Negartarh\APIWrapper\Tests
 */
class TestCase extends Orchestra
{
	/**
	 * Get the package service providers for the application.
	 *
	 * This method returns an array of service providers that should be
	 * registered for the package during testing. In this case, it
	 * registers the APIResponseServiceProvider.
	 *
	 * @param  \Illuminate\Foundation\Application  $app  The application instance.
	 *
	 * @return array An array of service provider class names.
	 */
	protected function getPackageProviders(Application $app): array
	{
		return [
			APIResponseServiceProvider::class,
		];
	}
}
