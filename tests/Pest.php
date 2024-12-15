<?php

use Negartarh\APIWrapper\Tests\TestCase;

/**
 * Bootstrap the test environment for the APIWrapper package.
 *
 * This file is responsible for setting up the test case class that will be
 * used for all tests within the current directory. It utilizes the
 * TestCase class from the Negartarh\APIWrapper\Tests namespace to provide
 * the necessary setup and teardown functionality for the tests.
 *
 * The `uses` function is called to apply the TestCase class to all tests
 * defined in the current directory, ensuring that they inherit the
 * functionality and configurations defined in the TestCase class.
 *
 * @return void
 */
uses(TestCase::class)->in(__DIR__);
