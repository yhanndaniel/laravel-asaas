<?php

namespace App\Services\Asaas\Requests;

class CreditCardRequest extends BaseRequest
{
    public string $holderName;
    public string $number;
    public string $expiryMonth;
    public string $expiryYear;
    public string $ccv;

    public function __construct(
        string $holderName,
        string $number,
        string $expiryMonth,
        string $expiryYear,
        string $ccv
    ) {
        $this->holderName = $holderName;
        $this->number = $number;
        $this->expiryMonth = $expiryMonth;
        $this->expiryYear = $expiryYear;
        $this->ccv = $ccv;
    }

    const REQUIRED_STRING = 'required|string';

    protected function validationRules($validationRules = [
        'holderName' => self::REQUIRED_STRING,
        'number' => self::REQUIRED_STRING,
        'expiryMonth' => self::REQUIRED_STRING,
        'expiryYear' => self::REQUIRED_STRING,
        'ccv' => self::REQUIRED_STRING,
    ]): array
    {
        return $validationRules;
    }
}
