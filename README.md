<div align="center" style="text-align: center">

# Laravel Missed API Response Wrapper ![GitHub Repo stars](https://img.shields.io/github/stars/negartarh/apiwrapper)
### Super Fast | Lightweight | Standard | Octane Compatible | High Customizable

</div>
<br />
<div align="center" style="text-align: center">

![Static Badge](https://img.shields.io/badge/passing-tests?label=tests&style=for-the-badge&color=%388E3C)
![GitHub License](https://img.shields.io/github/license/negartarh/apiwrapper?style=for-the-badge&color=%388E3C)
![GitHub Release](https://img.shields.io/github/v/release/negartarh/apiwrapper?style=for-the-badge&color=%388E3C)
![Packagist Downloads](https://img.shields.io/packagist/dt/negartarh/apiwrapper?style=for-the-badge&color=%388E3C)

</div>

<div align="center" style="text-align: center">

![GitHub commit activity](https://img.shields.io/github/commit-activity/t/negartarh/apiwrapper?style=for-the-badge&color=%23303F9F)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/negartarh/apiwrapper?style=for-the-badge&color=%23303F9F)
![GitHub repo file or directory count](https://img.shields.io/github/directory-file-count/negartarh/apiwrapper?style=for-the-badge&color=%23303F9F)
![GitHub Discussions](https://img.shields.io/github/discussions/negartarh/apiwrapper?style=for-the-badge&color=%23303F9F)

</div>

<br />
<br />

## Introduction

The **Laravel Missed API Response Wrapper** package is a high-quality and standard package that makes the process of creating and managing standard API responses in Laravel easy. This package is both fast and lightweight, and fully compatible with Laravel Octane, highly customizable, and automatically enables the standardization of all API responses. By using this package, you can easily manage errors and develop standard API services that automatically provide responses according to HTTP and REST standards. 

This package is usable anywhere, from validators to controllers and other components, and automatically provides features such as request status, message, errors, and execution time. Additionally, adding custom values to responses or disabling these features is easily achievable.

Using this package guarantees the standardization of API responses, meaning you can continuously and reliably provide high-quality responses that are easily understandable and usable for consumers of your API, while also being fully compliant with standards. All done automatically.</div>

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
    
    return apiwrapper()->ok($users);
    # or
    return api_response()->ok($users);
}
```
The result of the above codes is as follows:

```json
{
  "status": 200, // HTTP status code
  "message": "OK", // HTTP message
  "data": [ // Response data
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
  "data": { // Response data
    "id": 1,
    ...
  },
  "errors": [], // Errors
  "execution": "10ms", // Serverside exection time
  "version": "3.2.0" // Your application version
}
```
#### Example 2. No content
```php
use Illuminate\Support\Facades\Request;
use Negartarh\APIWrapper\Facades\APIResponse;

...

public function index(Request $request):\Illuminate\Http\Response
{
    $posts = Post::all();
    
    if(!is_countable($posts) or count($posts) == 0):
                 
        return APIResponse::noContent();
        
    else:
        ...
}

```
The result of the above code is as follows:

```json
{
  "status": 204, // HTTP status code
  "message": "No Content", // HTTP message
  "data": [],
  "errors": [],
  "execution": "10ms",
  "version": "3.2.0"
}
```
#### Example 3. Validating data
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
  "data": [],
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
  "errors": [
    ...
  ],
  "data": [],
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
  "data": [],
  "execution": "15ms",
  "version": "3.2.0"
}
```
But wait, there is a better solution, why not implement our own team standard? To do this, just add your own standard to the apiwrapper.php file in the config folder of your project and or make changes to it as needed.

### Customized methods
#### Example 1.
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
        return APIResponse::accessDenied();
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
App::setLocale('fa');
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
## Customizing responses
To enable, disable or customize default keys in the response, just do it through the configuration file.
#### Example 1. Disabling default keys
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'fields' => [
        ...
        'execution' => false,
```
#### Example 2. change the algorithm
```php
# path/to/project/configuration/dir/apiwrapper.php

return [
    ...
    'fields' => [
        ...
        'version' => fn(mixed $content, int $status, string $message) => env('API_VERSION', 'x.x.x'),
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
        'data' => 'content',
```
result:
```json
{
  "status": 200,
  "message": "OK",
  "content": [ // changed from data to content
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
        'time'=> fn(mixed $content, int $status, string $message) => \Illuminate\Support\Carbon::now(),
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

## Hints
#### Example 1. Real-World software development with axios
###### Back-End:
```php
# API Login Controller
use Negartarh\APIWrapper\Facades\APIResponse;

...

    public function login(LoginRequest $request):\Illuminate\Http\Response
    {
        ...
        
        return APIResponse::ok([
                ...
            ]);
    }

# API LoginRequest Form Request
use Negartarh\APIWrapper\Facades\APIResponse;

...

    public function failedValidation(Validator $validator): HttpResponseException
    {
        return APIResponse::unprocessableEntity($validator->errors());
    }
```
###### Front-End:
```js
let isOnRequest = false;

...

async function submitForm() {

    isOnRequest = true;

    await axios.post('api/login', {
        ...
    })
    .then((response) => {
        // if validation passed, you can get response here
        console.log(response.data)
    }).catch((error)=>{
        // if validation failed, you can catch errors here
        console.log(error.response.data)
    }).finally(()=>{
        isOnRequest = false;
    });
}
```
#### Example 2. Handle 404 status in api responses
```php
# app/Exceptions/Handler.php

class Handler extends ExceptionHandler
{
    ...
    
        public function register()
        {
            $this->reportable( function ( Throwable $e ) {
                //
            } );
    
            $this->renderable(function (NotFoundHttpException $e, Request $request) {
                if ($request->is('api/*')):
                    return APIResponse::status(404);
                endif;
            });
    
        }

```


## Built-in methods
In the table below, the predefined methods are given with the HTTP code and message text. All these values are accessible and changeable through the config file.
<style>
    table {
        width: 100%;
    }
</style>
<table>
<thead>
<tr>
<th align="center">No.</th>
<th align="center">METHOD</th>
<th align="center">HTTP STATUS</th>
<th align="center">MESSAGE</th>
</tr>
</thead>
<tbody>
<tr>
<td align="center">#0</td>
<td align="center">ok</td>
<td align="center">200</td>
<td align="center">OK</td>
</tr>
<tr>
<td align="center">#1</td>
<td align="center">success</td>
<td align="center">200</td>
<td align="center">Success</td>
</tr>
<tr>
<td align="center">#2</td>
<td align="center">created</td>
<td align="center">201</td>
<td align="center">Created</td>
</tr>
<tr>
<td align="center">#3</td>
<td align="center">accepted</td>
<td align="center">202</td>
<td align="center">Accepted</td>
</tr>
<tr>
<td align="center">#4</td>
<td align="center">nonAuthoritativeInformation</td>
<td align="center">203</td>
<td align="center">Non Authoritative Information</td>
</tr>
<tr>
<td align="center">#5</td>
<td align="center">noContent</td>
<td align="center">204</td>
<td align="center">No Content</td>
</tr>
<tr>
<td align="center">#6</td>
<td align="center">resetContent</td>
<td align="center">205</td>
<td align="center">Reset Content</td>
</tr>
<tr>
<td align="center">#7</td>
<td align="center">partialContent</td>
<td align="center">206</td>
<td align="center">Partial Content</td>
</tr>
<tr>
<td align="center">#8</td>
<td align="center">multiStatus</td>
<td align="center">207</td>
<td align="center">Multi Status</td>
</tr>
<tr>
<td align="center">#9</td>
<td align="center">alreadyReported</td>
<td align="center">208</td>
<td align="center">Already Reported</td>
</tr>
<tr>
<td align="center">#10</td>
<td align="center">imUsed</td>
<td align="center">226</td>
<td align="center">IM Used</td>
</tr>
<tr>
<td align="center">#11</td>
<td align="center">multipleChoices</td>
<td align="center">300</td>
<td align="center">Multiple Choices</td>
</tr>
<tr>
<td align="center">#12</td>
<td align="center">movedPermanently</td>
<td align="center">301</td>
<td align="center">Moved Permanently</td>
</tr>
<tr>
<td align="center">#13</td>
<td align="center">found</td>
<td align="center">302</td>
<td align="center">Found</td>
</tr>
<tr>
<td align="center">#14</td>
<td align="center">seeOther</td>
<td align="center">303</td>
<td align="center">See Other</td>
</tr>
<tr>
<td align="center">#15</td>
<td align="center">notModified</td>
<td align="center">304</td>
<td align="center">Not Modified</td>
</tr>
<tr>
<td align="center">#16</td>
<td align="center">useProxy</td>
<td align="center">305</td>
<td align="center">Use Proxy</td>
</tr>
<tr>
<td align="center">#17</td>
<td align="center">temporaryRedirect</td>
<td align="center">307</td>
<td align="center">Temporary Redirect</td>
</tr>
<tr>
<td align="center">#18</td>
<td align="center">permanentRedirect</td>
<td align="center">308</td>
<td align="center">Permanent Redirect</td>
</tr>
<tr>
<td align="center">#19</td>
<td align="center">badRequest</td>
<td align="center">400</td>
<td align="center">Bad Request</td>
</tr>
<tr>
<td align="center">#20</td>
<td align="center">unauthorized</td>
<td align="center">401</td>
<td align="center">Unauthorized</td>
</tr>
<tr>
<td align="center">#21</td>
<td align="center">paymentRequired</td>
<td align="center">402</td>
<td align="center">Payment Required</td>
</tr>
<tr>
<td align="center">#22</td>
<td align="center">forbidden</td>
<td align="center">403</td>
<td align="center">Forbidden</td>
</tr>
<tr>
<td align="center">#23</td>
<td align="center">notFound</td>
<td align="center">404</td>
<td align="center">Not Found</td>
</tr>
<tr>
<td align="center">#24</td>
<td align="center">methodNotAllowed</td>
<td align="center">405</td>
<td align="center">Method Not Allowed</td>
</tr>
<tr>
<td align="center">#25</td>
<td align="center">notAcceptable</td>
<td align="center">406</td>
<td align="center">Not Acceptable</td>
</tr>
<tr>
<td align="center">#26</td>
<td align="center">proxyAuthenticationRequired</td>
<td align="center">407</td>
<td align="center">Proxy Authentication Required</td>
</tr>
<tr>
<td align="center">#27</td>
<td align="center">requestTimeout</td>
<td align="center">408</td>
<td align="center">Request Timeout</td>
</tr>
<tr>
<td align="center">#28</td>
<td align="center">conflict</td>
<td align="center">409</td>
<td align="center">Conflict</td>
</tr>
<tr>
<td align="center">#29</td>
<td align="center">gone</td>
<td align="center">410</td>
<td align="center">Gone</td>
</tr>
<tr>
<td align="center">#30</td>
<td align="center">lengthRequired</td>
<td align="center">411</td>
<td align="center">Length Required</td>
</tr>
<tr>
<td align="center">#31</td>
<td align="center">preconditionFailed</td>
<td align="center">412</td>
<td align="center">Precondition Failed</td>
</tr>
<tr>
<td align="center">#32</td>
<td align="center">requestEntityTooLarge</td>
<td align="center">413</td>
<td align="center">Request Entity Too Large</td>
</tr>
<tr>
<td align="center">#33</td>
<td align="center">requestURITooLong</td>
<td align="center">414</td>
<td align="center">Request URI Too Long</td>
</tr>
<tr>
<td align="center">#34</td>
<td align="center">unsupportedMediaType</td>
<td align="center">415</td>
<td align="center">Unsupported Media Type</td>
</tr>
<tr>
<td align="center">#35</td>
<td align="center">requestedRangeNotSatisfiable</td>
<td align="center">416</td>
<td align="center">Requested Range Not Satisfiable</td>
</tr>
<tr>
<td align="center">#36</td>
<td align="center">expectationFailed</td>
<td align="center">417</td>
<td align="center">Expectation Failed</td>
</tr>
<tr>
<td align="center">#37</td>
<td align="center">unprocessableEntity</td>
<td align="center">422</td>
<td align="center">Unprocessable Entity</td>
</tr>
<tr>
<td align="center">#38</td>
<td align="center">locked</td>
<td align="center">423</td>
<td align="center">Locked</td>
</tr>
<tr>
<td align="center">#39</td>
<td align="center">failedDependency</td>
<td align="center">424</td>
<td align="center">Failed Dependency</td>
</tr>
<tr>
<td align="center">#40</td>
<td align="center">tooEarly</td>
<td align="center">425</td>
<td align="center">Too Early</td>
</tr>
<tr>
<td align="center">#41</td>
<td align="center">upgradeRequired</td>
<td align="center">426</td>
<td align="center">Upgrade Required</td>
</tr>
<tr>
<td align="center">#42</td>
<td align="center">preconditionRequired</td>
<td align="center">428</td>
<td align="center">Precondition Required</td>
</tr>
<tr>
<td align="center">#43</td>
<td align="center">tooManyRequests</td>
<td align="center">429</td>
<td align="center">Too Many Requests</td>
</tr>
<tr>
<td align="center">#44</td>
<td align="center">requestHeaderFieldsTooLarge</td>
<td align="center">431</td>
<td align="center">Request Header Fields Too Large</td>
</tr>
<tr>
<td align="center">#45</td>
<td align="center">noResponse</td>
<td align="center">444</td>
<td align="center">No Response</td>
</tr>
<tr>
<td align="center">#46</td>
<td align="center">unavailableForLegalReasons</td>
<td align="center">451</td>
<td align="center">Unavailable For Legal Reasons</td>
</tr>
<tr>
<td align="center">#47</td>
<td align="center">internalServerError</td>
<td align="center">500</td>
<td align="center">Internal Server Error</td>
</tr>
<tr>
<td align="center">#48</td>
<td align="center">notImplemented</td>
<td align="center">501</td>
<td align="center">Not Implemented</td>
</tr>
<tr>
<td align="center">#49</td>
<td align="center">badGateway</td>
<td align="center">502</td>
<td align="center">Bad Gateway</td>
</tr>
<tr>
<td align="center">#50</td>
<td align="center">serviceUnavailable</td>
<td align="center">503</td>
<td align="center">Service Unavailable</td>
</tr>
<tr>
<td align="center">#51</td>
<td align="center">gatewayTimeout</td>
<td align="center">504</td>
<td align="center">Gateway Timeout</td>
</tr>
<tr>
<td align="center">#52</td>
<td align="center">httpVersionNotSupported</td>
<td align="center">505</td>
<td align="center">HTTP Version Not Supported</td>
</tr>
<tr>
<td align="center">#53</td>
<td align="center">variantAlsoNegotiates</td>
<td align="center">506</td>
<td align="center">Variant Also Negotiates</td>
</tr>
<tr>
<td align="center">#54</td>
<td align="center">insufficientStorage</td>
<td align="center">507</td>
<td align="center">Insufficient Storage</td>
</tr>
<tr>
<td align="center">#55</td>
<td align="center">loopDetected</td>
<td align="center">508</td>
<td align="center">Loop Detected</td>
</tr>
<tr>
<td align="center">#56</td>
<td align="center">notExtended</td>
<td align="center">510</td>
<td align="center">Not Extended</td>
</tr>
<tr>
<td align="center">#57</td>
<td align="center">networkAuthenticationRequire</td>
<td align="center">511</td>
<td align="center">Network Authentication Require</td>
</tr>
</tbody>
</table>

## Requirments
* php: >= 8.1
* illuminate/support: *

## Contributing
We will be happy if we see PR from you.

## License
This is a free package released under the MIT License.
