<?php

if (!function_exists('api_response')):
	
	/**
	 * Get the instance of the APIResponse singleton.
	 *
	 * This function resolves the 'APIResponse' service from the Laravel service container.
	 *
	 * @return \Negartarh\APIWrapper\APIResponse
	 */
	function api_response(): \Negartarh\APIWrapper\APIResponse
	{
		return resolve('APIResponse');
	}

endif;

if (!function_exists('apiwrapper')):
	
	/**
	 * Get the instance of the APIResponse singleton.
	 *
	 * This function is an alias for the api_response function, resolving the 'APIResponse'
	 * service from the Laravel service container.
	 *
	 * @return \Negartarh\APIWrapper\APIResponse
	 */
	function apiwrapper(): \Negartarh\APIWrapper\APIResponse
	{
		return resolve('APIResponse');
	}

endif;
