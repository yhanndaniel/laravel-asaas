<?php

namespace App\Services\Asaas\Requests;

class CreateCustomerRequest extends BaseRequest
{
    public string $name;
    public string $cpfCnpj;
    public ?string $email;
    public ?string $phone;
    public ?string $mobilePhone;
    public ?string $address;
    public ?string $addressNumber;
    public ?string $complement;
    public ?string $province;
    public ?string $postalCode;
    public ?string $externalReference;
    public ?bool $notificationDisabled;
    public ?string $additionalEmails;
    public ?string $municipalInscription;
    public ?string $stateInscription;
    public ?string $observations;
    public ?string $groupName;

    public function __construct(
        string $name,
        string $cpfCnpj,
        ?string $email = null,
        ?string $phone = null,
        ?string $mobilePhone = null,
        ?string $address = null,
        ?string $addressNumber = null,
        ?string $complement = null,
        ?string $province = null,
        ?string $postalCode = null,
        ?string $externalReference = null,
        ?bool $notificationDisabled = false,
        ?string $additionalEmails = null,
        ?string $municipalInscription = null,
        ?string $stateInscription = null,
        ?string $observations = null,
        ?string $groupName = null
    ) {
        $this->name = $name;
        $this->cpfCnpj = $cpfCnpj;
        $this->email = $email;
        $this->phone = $phone;
        $this->mobilePhone = $mobilePhone;
        $this->address = $address;
        $this->addressNumber = $addressNumber;
        $this->complement = $complement;
        $this->province = $province;
        $this->postalCode = $postalCode;
        $this->externalReference = $externalReference;
        $this->notificationDisabled = $notificationDisabled;
        $this->additionalEmails = $additionalEmails;
        $this->municipalInscription = $municipalInscription;
        $this->stateInscription = $stateInscription;
        $this->observations = $observations;
        $this->groupName = $groupName;
    }

    const NULLABLE_STRING = 'nullable|string';
    protected function validationRules($validationRules = [
        'name' => 'required|string',
        'cpfCnpj' => 'required|string',
        'email' => self::NULLABLE_STRING,
        'phone' => self::NULLABLE_STRING,
        'mobilePhone' => self::NULLABLE_STRING,
        'address' => self::NULLABLE_STRING,
        'addressNumber' => self::NULLABLE_STRING,
        'complement' => self::NULLABLE_STRING,
        'province' => self::NULLABLE_STRING,
        'postalCode' => self::NULLABLE_STRING,
        'externalReference' => self::NULLABLE_STRING,
        'notificationDisabled' => 'nullable|boolean',
        'additionalEmails' => self::NULLABLE_STRING,
        'municipalInscription' => self::NULLABLE_STRING,
        'stateInscription' => self::NULLABLE_STRING,
        'observations' => self::NULLABLE_STRING,
        'groupName' => self::NULLABLE_STRING,
    ]): array
    {
        return $validationRules;
    }

}
