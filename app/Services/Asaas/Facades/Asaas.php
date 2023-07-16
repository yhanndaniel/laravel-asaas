<?php

namespace App\Services\Asaas\Facades;

use App\Services\Asaas\AsaasService;
use App\Services\Asaas\Endpoints\Customers;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Customers customers()
 * @method static Payments payments()
 */
class Asaas extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AsaasService::class;
    }
}
