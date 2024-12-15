<?php

namespace Negartarh\APIWrapper\Exceptions;

use Exception;

/**
 * Class InvalidStatusCodeException
 *
 * Exception thrown when an invalid HTTP status code is encountered.
 *
 * @package Negartarh\APIWrapper\Exceptions
 */
class InvalidStatusCodeException extends Exception
{
	/**
	 * Create a new InvalidStatusCodeException instance.
	 *
	 * @param  int  $status  The invalid HTTP status code that was encountered.
	 */
	public function __construct(int $status)
	{
		parent::__construct(
			sprintf('Call to undefined HTTP status [%d]. Make sure status code exists in configuration file.', $status)
		);
	}
}