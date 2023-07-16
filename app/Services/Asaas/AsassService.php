<?php

namespace App\Services\Asaas;

use App\Services\Asaas\Endpoints\HasCustomers;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Asass Documentation Api Service
 * https://docs.asaas.com/reference/comece-por-aqui
 */
class AsassService
{
    use HasCustomers;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'access_token' => '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNTkzMDE6OiRhYWNoX2UwMzg0YTExLTM2ZmUtNDQ1Yi1hNGQxLTFiYWI1NmZkODFjMg==',
            'Content-Type' => 'application/json'
         ])->baseUrl('https://sandbox.asaas.com/api/v3');
    }
}
