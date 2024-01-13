<?php

use Negartarh\APIWrapper\Facades\APIResponse;

test('throws exception for none existent method', function () {
    APIResponse::nothing([]);
})->throws(ErrorException::class);

test('ok() returns default data', function () {

    $response = APIResponse::ok([]);

    expect($response->original)->toBeArray()
        ->toHaveKey('status', 200)
        ->toHaveKey('message', 'OK')
        ->toHaveKey('data', [])
        ->toHaveKey('errors', [])
        ->toHaveKey('execution')
        ->toHaveKey('version');
});

test('ok() returns expected data', function () {

    $data = [
        'name' => fake()->name(),
        'email' => fake()->email()
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