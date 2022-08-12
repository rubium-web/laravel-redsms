<?php

namespace Rubium\RedSms\Facades;

use Illuminate\Support\Facades\Facade;

class RedSms extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'RedSms';
    }

}
