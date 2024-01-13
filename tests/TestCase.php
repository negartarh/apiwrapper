<?php

namespace Negartarh\APIWrapper\Tests;

use Negartarh\APIWrapper\APIResponseServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            APIResponseServiceProvider::class,
        ];
    }
}
