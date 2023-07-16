<?php

namespace App\Services\Asaas\Endpoints;

use App\Services\Asaas\AsassService;
use Illuminate\Support\Collection;

class BaseEndpoint
{
    protected AsassService $asassService;

    public function __construct()
    {
        $this->asassService = new AsassService();
    }

    protected function transform(mixed $json, string $entity): Collection
    {
        return collect($json)
            ->map(fn ($customer) => new $entity($customer));

    }
}
