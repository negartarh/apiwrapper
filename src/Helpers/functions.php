<?php

if (!function_exists('api_response')):

    /**
     * This function returns an instance of the  APIResponse  class.
     *
     * @return mixed
     */
    function api_response(): mixed
    {
        return resolve('APIResponse');
    }

endif;

if (!function_exists('apiwrapper')):

    /**
     * This function returns an instance of the  APIResponse  class.
     *
     * @return mixed
     */
    function apiwrapper(): mixed
    {
        return resolve('APIResponse');
    }

endif;
