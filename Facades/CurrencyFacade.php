<?php

namespace Modules\Price\Facades;

use Illuminate\Support\Facades\Facade;

class CurrencyFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'currency';
    }
}