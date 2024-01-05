<?php

namespace Negartarh\APIWrapper;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class APIResponse
{
    const version = '0.0.0';

    public function __call($method, $parameters)
    {
        if (array_key_exists($method, ($http = Config::get('apiwrapper.methods')))):

            if (array_key_exists(0, $parameters) && $parameters[0]):
                $content = $parameters[0];
            elseif (array_key_exists('content', $parameters) && $parameters['content']):
                $content = $parameters['content'];
            else:
                $content = [];
            endif;

            if (array_key_exists(1, $parameters) && is_string($parameters[1]) && $parameters[1]):
                $message = $parameters[1];
            elseif (array_key_exists('message', $parameters) && is_string($parameters['message']) && $parameters['message']):
                $message = $parameters['message'];
            else:
                $message = $http[$method]['message'];
            endif;

            if (array_key_exists(2, $parameters) && is_array($parameters[2])):
                $headers = $parameters[2];
            elseif (array_key_exists('headers', $parameters) && is_array($parameters['headers'])):
                $headers = $parameters['headers'];
            else:
                $headers = [];
            endif;

            if (array_key_exists('headers', $http[$method])):
                $headers = array_merge($http[$method]['headers'], $headers);
            endif;

            return $this->make((int)$http[$method]['code'], $content, $message, $headers);

        else:

            trigger_error(sprintf('Call to undefined method [%s]. make sure method exists in Negartarh\APIWrapper\APIResponse configuration file.', $method), E_USER_ERROR);

        endif;

    }


    public function wrap(mixed $content = '', int $status = 200, string $message = ''): array
    {
        $statusKey = (string)Config::get('apiwrapper.replaces.status') ?: 'status';
        $messageKey = (string)Config::get('apiwrapper.replaces.message') ?: 'message';
        $contentsKey = (string)Config::get('apiwrapper.replaces.contents') ?: 'contents';
        $errorsKey = (string)Config::get('apiwrapper.replaces.errors') ?: 'errors';
        $executionKey = (string)Config::get('apiwrapper.replaces.execution') ?: 'execution';
        $versionKey = (string)Config::get('apiwrapper.replaces.version') ?: 'version';

        $wrapped = [
            $statusKey => $status,
            $messageKey => Config::get('apiwrapper.localization') ? __($message) : $message,
        ];

        if ($status >= 200 && $status < 400):
            $wrapped[$contentsKey] = $content;
            if (Config::get('apiwrapper.fields.errors')):
                $wrapped[$errorsKey] = [];
            endif;
        else:
            $wrapped[$errorsKey] = $content;
            if (Config::get('apiwrapper.fields.contents')):
                $wrapped[$contentsKey] = [];
            endif;
        endif;

        if (Config::get('apiwrapper.fields.execution')):
            $wrapped[$executionKey] = microtime(true) - ((float)defined('LARAVEL_START') ? LARAVEL_START : \request()->server('REQUEST_TIME_FLOAT'));
            $wrapped[$executionKey] = sprintf('%dms', round($wrapped[$executionKey] * 1000));
        endif;

        if (Config::get('apiwrapper.fields.version')):
            $wrapped[$versionKey] = Env::get('APP_VERSION');
        endif;

        if (is_countable(($customKeys = Config::get('apiwrapper.custom_keys'))) && count($customKeys)):

            foreach ($customKeys as $key => $value):
                if (is_callable($value)):
                    $wrapped[$key] = call_user_func_array($value, [
                        'content' => $content,
                        'status' => $status,
                        'message' => $message
                    ]);
                else:
                    $wrapped[$key] = $value;
                endif;
            endforeach;

        endif;

        return $wrapped;
    }

    public function status(int $status = 200, mixed $content = '', string $message = '', array $headers = []): \Illuminate\Http\Response
    {
        foreach (Config::get('apiwrapper.methods') as $name => $value):

            if ($value['code'] == $status):

                return call_user_func_array([self::class, $name], [
                    'content' => $content,
                    'message' => $message,
                    'headers' => $headers,
                ]);

            endif;

        endforeach;

        trigger_error(sprintf('Call to undefined HTTP status [%d]. make sure status code exists in Negartarh\APIWrapper\APIResponse configuration file.', $status), E_USER_ERROR);

    }

    public function make(int $status = 200, mixed $content = '', string $message = '', array $headers = []): \Illuminate\Http\Response
    {
        $content = $this->wrap($content, $status, $message);

        $response = Response::make(
            $content,
            $status,
            array_merge([
                'X-WRAPPED-BY' => sprintf('%s/%s', basename(self::class), self::version),
            ], $headers));

        if ($status >= 200 && $status < 400):
            return $response;
        else:
            return throw new HttpResponseException($response);
        endif;
    }

}
