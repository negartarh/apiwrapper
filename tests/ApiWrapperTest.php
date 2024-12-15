<?php

use Negartarh\APIWrapper\Facades\APIResponse;

/**
 * Test that an exception is thrown for a non-existent method.
 *
 * This test verifies that calling a method that is not defined in the
 * APIResponse configuration throws an ErrorException.
 *
 * @return void
 *
 * @throws ErrorException If the method does not exist in the configuration.
 */
test('throws exception for none existent method', static function(): void {
	APIResponse::nothing([]);
})
	->throws(ErrorException::class);

/**
 * Test that the ok() method returns default data.
 *
 * This test checks that the APIResponse::ok() method returns a response
 * with the expected default structure when called with an empty array.
 * The response should contain the keys: status, message, data, errors,
 * execution, and version, with their respective default values.
 *
 * @return void
 */
test('ok() returns default data', static function(): void {
	
	$response = APIResponse::ok([]);
	
	expect($response->original)->toBeArray()
	                           ->toHaveKey('status', 200)
	                           ->toHaveKey('message', 'OK')
	                           ->toHaveKey('data', [])
	                           ->toHaveKey('errors', [])
	                           ->toHaveKey('execution')
	                           ->toHaveKey('version');
});

/**
 * Test that the ok() method returns expected data.
 *
 * This test verifies that the APIResponse::ok() method returns a response
 * with the expected structure and data when called with a specific data
 * array. The response should contain the keys: status, message, data,
 * errors, execution, and version, with the data key containing the
 * provided data.
 *
 * @return void
 */
test('ok() returns expected data', static function(): void {
	
	$data = [
		'name'  => fake()->name(),
		'email' => fake()->email(),
	];
	
	$response = APIResponse::ok($data);
	
	expect($response->original)->toBeArray()
	                           ->toHaveKey('status', 200)
	                           ->toHaveKey('message', 'OK')
	                           ->toHaveKey('data', $data)
	                           ->toHaveKey('errors', [])
	                           ->toHaveKey('execution')
	                           ->toHaveKey('version');
});