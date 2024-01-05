# Laravel Missed API Response Wrapper

### Super fast, lightweight, standard and high customizable wrapper for Laravel API responses
Laravel Missed API Response Wrapper is a high-quality package that simplifies the creation and management of Laravel API responses. It is very fast, lightweight, and highly customizable. It allows you to easily classify all your API responses, such as those from validators, controllers, and others, with features like status, message, errors, and execution time, all done automatically. In addition, you can also add your own custom values to it, as easily as possible.
## Installation
To install Laravel Missed API Response Wrapper, just run the following command:
```bash
composer require negartarah/apiwrapper
```
## Configuration
After installing the package, you need to publish its configuration file. To do that, run the following command:
```bash
php artisan vendor:publish --provider="Negartarh\APIWrapper\APIResponseServiceProvider"
```
This will publish the `apiwrapper.php` configuration file to your config directory and publish localization files to your `languages/vendor/apiwrapper` directory.

## Basic usage
There are two ways of utilizing the package: using the facade, or using the helper functions. On either way you will get the same result, it is totally up to you.

### Facade
#### Example 1.
```php
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function index():\Illuminate\Http\Response
{
    $users = User::latest()->take(10)->get();
    
    # Alias of
    # return APIResponse::success($users);
    return APIResponse::ok($users);
}
```
### Helper functions
#### Example 1.
```php
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function index():\Illuminate\Http\Response
{
    $users = User::latest()->take(10)->get();
    
    # Alias of
    # return apiwrapper()->ok($users);
    return api_response()->ok($users);
}
```
The result of the above codes is as follows:

```json
{
  "status": 200, // HTTP status code
  "message": "OK", // HTTP message
  "contents": [ // Response data
    {
      "id": 1,
      ...
    },
    ...
  ],
  "errors": [], // Errors
  "execution": "13ms", // Serverside exection time
  "version": "3.2.0" // Your application version
}
```
As you can see, the simple output information has been automatically replaced with the classified information suitable for API requests. Look at the output keys, they are all changeable and editable, but before that, it is better to do more research on the package and get acquainted with its more features.

## Advanced Usage
### Automatic output based on HTTP standards
#### Example 1. Storing data
```php
use Illuminate\Support\Facades\Request;
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function create(Request $request):\Illuminate\Http\Response
{
    $user = User::where('email', '=', $request->get('email'))
                  ->firstOrCreate();
                  
    return APIResponse::created($user);
}

```
The result of the above code is as follows:

```json
{
  "status": 201, // HTTP status code
  "message": "Created", // HTTP message
  "contents": { // Response data
      "id": 1,
      ...
    },
  "errors": [], // Errors
  "execution": "10ms", // Serverside exection time
  "version": "3.2.0" // Your application version
}
```
#### Example 2. Validating data
```php
use Illuminate\Http\Exceptions\HttpResponseException;
use Negartarh\APIWrapper\Facades\APIResponse;

class ExampleCaptchaRequest extends FormRequest // example rule class
{
    ...

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator): HttpResponseException
    {
        # based on RFC: 4918
        return APIResponse::unprocessableEntity($validator->errors());
    }
}

```
The result of the above code is as follows:

```json
{
  "status": 422, // HTTP status code
  "message": "Unprocessable Entity", // HTTP message
  "errors": {
    "captcha": [
      "The CAPTCHA has expired."
    ]
  },
  "contents": [],
  "execution": "41ms",
  "version": "3.2.0"
}
```
Let’s also take a look at the server response and output headers,

![plot](./src/ScreenShots/Screenshot_1.png)
![plot](./src/ScreenShots/Screenshot_2.png)
everything looks great, If it is hard for you to remember the HTTP standards, no problem, pay attention to the next example.

### Alternative method
#### Example 1. Status method
```php
use Illuminate\Http\Exceptions\HttpResponseException;
use Negartarh\APIWrapper\Facades\APIResponse;

class ExampleCaptchaRequest extends FormRequest // example rule class
{
    ...

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator): HttpResponseException
    {
        return APIResponse::status(413, $validator->errors());
    }
}

```
and the result is:

```json
{
  "status": 413,
  "message": "Request Entity Too Large",
  "errors": {
    ...
  },
  "contents": [],
  "execution": "17ms",
  "version": "3.2.0"
}
```
Wait a moment, is not better to customizing the output message? So pay attention to the following example:

### Customized messages
#### Example 1.
```php
use Illuminate\Http\Exceptions\HttpResponseException;
use Negartarh\APIWrapper\Facades\APIResponse;

class ExampleAuthenticationRequest extends FormRequest // example rule class
{
    ...

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return HttpResponseException
     */
    public function failedValidation(Validator $validator): HttpResponseException
    {
        # Alias of
        # return APIResponse::status(403, $validator->errors(), 'Where are you looking here?');
        retun APIResponse::forbidden($validator->errors(), 'What are you looking for here?');

    }
}
```
and guess the result:

```json
{
    "status": 403,
    "message": "What are you looking for here?",
    "errors": {
      ...
    },
    "contents": [],
    "execution": "15ms",
    "version": "3.2.0"
}
```
But wait, there is a better solution, why not implement our own team standard? To do this, just add your own standard to the apiwrapper.php file in the config folder of your project and or make changes to it as needed.
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'methods' => [
        ...
        'accessDenied' => [
            'code' => 403,
            'message' => 'What are you looking for here?',
            'headers' => [
                'Authorization' => 'Failed',
            ],
        ],
```
and easily use the defined method in your project.

```php
use Illuminate\Support\Facades\Request;
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function login(Request $request):\Illuminate\Http\Response
{
    $user = User::where('access_token', '=', $request->get('access_token'))
                  ->first();
                  
    if($user == null):
        return APIResponse::accessDenied($user);
    else:
        ...
}
```
If you pay attention to the above example, you will see that the header value for each status is adjustable, but what to do to adjust it at runtime? To do this, pay attention to the following example:

### Adjustable headers
#### Example 1.
```php
use Illuminate\Support\Facades\Request;
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function login(Request $request):\Illuminate\Http\Response
{
    $user = User::where('access_token', '=', $request->get('access_token'))
                  ->first();
                  
    if($user == null):
        return APIResponse::accessDenied($user, headers: [
                    ...
               ]);
        # or 
        return APIResponse::accessDenied($user)
               ->withHeaders([ ... ]);
    else:
        ...
}
```
## Localization
If your API is multilingual, this package is translatable and has been translated into `Persian`, `Arabic` and `Turkish`. To work with translations, refer to the Laravel documents. for more information, pay attention to the next example:

#### Example 1. Localized response
```php
use Negartarh\APIWrapper\Facades\APIResponse;

...
App::setLocale('fa')
...

return APIResponse::insufficientStorage();
```
and the result:

```json
{
  "status": 507,
  "message": "فضای ذخیره سازی ناکافی",
  ...
}
```
If you do not need to translate the messages, you can disable it through the configuration file.
#### Example 2. Disabling localization
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'localization' => false,
```
## Customizing response values
To enable or disable the keys in the response, just do it through the configuration file.
#### Example 1. Disabling default keys
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'fields' => [
        ...
        'execution' => false,
```
You can get more information on this by studying the configuration file.


## Changing the default key names
Like the previous examples, to change the default key names in the response, just do it through the configuration file.
#### Example 1.
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'replaces' => [
        ...
        'contents' => 'data',
```
result:
```json
{
  "status": 200,
  "message": "OK",
  "data": [ // changed from contents to data
    {
      "id": 1,
      ...
    },
    ...
  ],
  "errors": [],
  "execution": "7ms",
  "version": "3.2.0"
}
```

## Adding custom values
To add custom values to the API response, do the following in the configuration file.
#### Example 1.
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'custom_keys'=>[
        'app'=> 'My Wonderful APP',
        'time'=> fn(mixed $content = '', int $status = 200, string $message = '') => \Illuminate\Support\Carbon::now(),
```
and the result:
```json
{
    "status": 200,
    ...
    "app": "My Wonderful APP",
    "time": "2024-01-05T02:42:10.636571Z"
}
```

## Requirments
* php: >= 8.1
* illuminate/support ^10.0|^9.0

## Contributing
We will be happy if we see PR from you.

## License
The API Response is a free package released under the MIT License.
