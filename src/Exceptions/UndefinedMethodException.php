<?php

namespace Negartarh\APIWrapper\Exceptions;

use Exception;

/**
 * Class UndefinedMethodException
 *
 * Exception thrown when an undefined method is called on the APIResponse class.
 *
 * @package Negartarh\APIWrapper\Exceptions
 */
class UndefinedMethodException extends Exception
{
	/**
	 * Create a new UndefinedMethodException instance.
	 *
	 * @param  string  $method  The name of the undefined method that was called.
	 */
	public function __construct(string $method)
	{
		parent::__construct(
			sprintf('Call to undefined method [%s]. Make sure method exists in configuration file.', $method)
		);
	}
}