<?php

namespace Negartarh\APIWrapper;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;
use Negartarh\APIWrapper\Exceptions\UndefinedMethodException;
use Negartarh\APIWrapper\Exceptions\InvalidStatusCodeException;

/**
 * Class APIResponse
 *
 * This class provides a standardized way to create API responses in the application.
 * It allows dynamic method calls based on the configuration and wraps responses
 * in a consistent format.
 *
 * @package Negartarh\APIWrapper
 */
class APIResponse
{
	/**
	 * The version of the APIResponse package.
	 *
	 * @var string
	 */
	public const version = '0.9.0';
	
	/**
	 * Handle dynamic method calls to create API responses.
	 *
	 * This method checks if the called method exists in the configuration and
	 * constructs a response based on the provided arguments.
	 *
	 * @param  string  $method     The name of the method being called.
	 * @param  array   $arguments  The arguments passed to the method.
	 *
	 * @return mixed
	 * @throws UndefinedMethodException If the method is not defined in the configuration.
	 */
	public function __call(string $method, array $arguments): mixed
	{
		if (array_key_exists($method, ($http = Config::get('apiwrapper.methods')))):
			
			if (array_key_exists(0, $arguments) and $arguments[0]):
				$content = $arguments[0];
			elseif (array_key_exists('content', $arguments) and $arguments['content']):
				$content = $arguments['content'];
			else:
				$content = [];
			endif;
			
			if (array_key_exists(1, $arguments) and is_string($arguments[1]) and $arguments[1]):
				$message = $arguments[1];
			elseif (
				array_key_exists('message', $arguments)
				and
				is_string($arguments['message'])
				and
				$arguments['message']
			):
				$message = $arguments['message'];
			else:
				$message = $http[$method]['message'];
			endif;
			
			if (array_key_exists(2, $arguments) and is_array($arguments[2])):
				$headers = $arguments[2];
			elseif (array_key_exists('headers', $arguments) and is_array($arguments['headers'])):
				$headers = $arguments['headers'];
			else:
				$headers = [];
			endif;
			
			if (array_key_exists('headers', $http[$method])):
				$headers = array_merge($http[$method]['headers'], $headers);
			endif;
			
			return $this->make((int) $http[$method]['code'], $content, $message, $headers);
		
		else:
			
			throw new UndefinedMethodException($method);
		
		endif;
	}
	
	/**
	 * Create a new response instance.
	 *
	 * This method wraps the content, status, message, and headers into a response.
	 *
	 * @param  int     $status   The HTTP status code for the response.
	 * @param  mixed   $content  The content of the response.
	 * @param  string  $message  The message associated with the response.
	 * @param  array   $headers  Additional headers for the response.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function make(
		int    $status = 200,
		mixed  $content = '',
		string $message = '',
		array  $headers = []
	): \Illuminate\Http\Response {
		$response = Response::make(
			$this->wrap($content, $status, $message),
			$status,
			array_merge(
				[
					'X-WRAPPED-BY' => sprintf('%s/%s', basename(self::class), self::version),
				],
				$headers
			)
		);
		
		if ($status >= 200 and $status < 400):
			return $response;
		else:
			return throw new HttpResponseException($response);
		endif;
	}
	
	/**
	 * Wrap the response content into a standardized format.
	 *
	 * This method constructs an array that represents the response structure
	 * based on the provided content, status, and message.
	 *
	 * @param  mixed   $content  The content to be wrapped.
	 * @param  int     $status   The HTTP status code.
	 * @param  string  $message  The message associated with the response.
	 *
	 * @return array
	 */
	public function wrap(mixed $content = '', int $status = 200, string $message = ''): array
	{
		$statusKey    = (string) Config::get('apiwrapper.replaces.status') ?: 'status';
		$messageKey   = (string) Config::get('apiwrapper.replaces.message') ?: 'message';
		$dataKey      = (string) Config::get('apiwrapper.replaces.data') ?: 'data';
		$errorsKey    = (string) Config::get('apiwrapper.replaces.errors') ?: 'errors';
		$executionKey = (string) Config::get('apiwrapper.replaces.execution') ?: 'execution';
		$versionKey   = (string) Config::get('apiwrapper.replaces.version') ?: 'version';
		
		$wrapped = [
			$statusKey  => $status,
			$messageKey => Config::get('apiwrapper.localization') ? __($message) : $message,
		];
		
		if ($status >= 200 and $status < 400):
			$wrapped[$dataKey] = $content;
			if (Config::get('apiwrapper.fields.errors')):
				$wrapped[$errorsKey] = [];
			endif;
		else:
			$wrapped[$errorsKey] = $content;
			if (Config::get('apiwrapper.fields.data')):
				$wrapped[$dataKey] = [];
			endif;
		endif;
		
		if (is_callable($customExecution = Config::get('apiwrapper.fields.execution'))):
			
			$wrapped[$executionKey] = call_user_func_array($customExecution, [
				'content' => $content,
				'status'  => $status,
				'message' => $message,
			]);
		
		elseif ($customExecution):
			$wrapped[$executionKey] = sprintf(
				'%dms',
				round((microtime(true) - ((float) defined('LARAVEL_START') ? LARAVEL_START : request()->server('REQUEST_TIME_FLOAT'))) * 1000)
			);
		endif;
		
		if (is_callable($customVersion = Config::get('apiwrapper.fields.version'))):
			$wrapped[$versionKey] = call_user_func_array($customVersion, [
				'content' => $content,
				'status'  => $status,
				'message' => $message,
			]);
		elseif ($customVersion):
			$wrapped[$versionKey] = Env::get('APP_VERSION', Config::get('app.version'));
		endif;
		
		if (is_countable(($customKeys = Config::get('apiwrapper.custom_keys'))) and count($customKeys)):
			
			foreach ($customKeys as $key => $value):
				if (is_callable($value)):
					$wrapped[$key] = call_user_func_array($value, [
						'content' => $content,
						'status'  => $status,
						'message' => $message,
					]);
				else:
					$wrapped[$key] = $value;
				endif;
				
				if ($wrapped[$key] === false):
					unset($wrapped[$key]);
				endif;
			endforeach;
		
		endif;
		
		if (Config::get('apiwrapper.sort')):
			ksort($wrapped);
		endif;
		
		return $wrapped;
	}
	
	/**
	 * Create a response based on the given status code.
	 *
	 * This method checks the configured methods for a matching status code
	 * and calls the corresponding method to generate the response.
	 *
	 * @param  int     $status   The HTTP status code.
	 * @param  mixed   $content  The content of the response.
	 * @param  string  $message  The message associated with the response.
	 * @param  array   $headers  Additional headers for the response.
	 *
	 * @return \Illuminate\Http\Response
	 * @throws InvalidStatusCodeException If the status code is not defined in the configuration.
	 */
	public function status(
		int    $status = 200,
		mixed  $content = '',
		string $message = '',
		array  $headers = []
	): \Illuminate\Http\Response {
		foreach (Config::get('apiwrapper.methods') as $method => $value):
			
			if (intval($value['code']) === $status):
				
				return call_user_func_array([self::class, $method], [
					'content' => $content,
					'message' => $message,
					'headers' => $headers,
				]);
			
			endif;
		
		endforeach;
		
		throw new InvalidStatusCodeException($status);
	}
}
