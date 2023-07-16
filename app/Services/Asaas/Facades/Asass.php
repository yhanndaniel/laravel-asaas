<?php

namespace App\Services\Asaas\Facades;

use App\Services\Asaas\AsassService;
use App\Services\Asaas\Endpoints\Customers;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Customers customers()
 */
class Asass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AsassService::class;
    }
}
