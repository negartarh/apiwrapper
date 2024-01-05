<?php

namespace Negartarh\APIWrapper\Facades;

use \Illuminate\Support\Facades\Facade;

class APIResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'APIResponse';
    }
}
