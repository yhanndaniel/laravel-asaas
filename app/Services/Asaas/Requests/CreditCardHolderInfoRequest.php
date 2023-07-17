<?php

namespace App\Services\Asaas\Requests;

class CreditCardHolderInfoRequest extends BaseRequest
{
    public string $name;
    public string $email;
    public string $cpfCnpj;
    public string $postalCode;
    public string $addressNumber;
    public ?string $addressComplement;
    public string $phone;
    public ?string $mobilePhone;

    public function __construct(
        string $name,
        string $email,
        string $cpfCnpj,
        string $postalCode,
        string $addressNumber,
        string $phone,
        ?string $addressComplement,
        ?string $mobilePhone
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->cpfCnpj = $cpfCnpj;
        $this->postalCode = $postalCode;
        $this->addressNumber = $addressNumber;
        $this->addressComplement = $addressComplement;
        $this->phone = $phone;
        $this->mobilePhone = $mobilePhone;
    }

    const REQUIRED_STRING = 'required|string';

    protected function validationRules($validationRules = [
        'name' => self::REQUIRED_STRING,
        'email' => self::REQUIRED_STRING,
        'cpfCnpj' => self::REQUIRED_STRING,
        'postalCode' => self::REQUIRED_STRING,
        'addressNumber' => self::REQUIRED_STRING,
        'addressComplement' => 'nullable|string',
        'phone' => self::REQUIRED_STRING,
        'mobilePhone' => 'nullable|string',
    ]): array
    {
        return $validationRules;
    }
}
