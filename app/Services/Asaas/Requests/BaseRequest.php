<?php

namespace App\Services\Asaas\Requests;

use Illuminate\Support\Facades\Validator;

abstract class BaseRequest
{

    protected function validationRules($validationRules = []): array
    {
        return $validationRules;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function validated()
    {
        return Validator::make($this->toArray(), $this->validationRules())->validated();
    }
}
