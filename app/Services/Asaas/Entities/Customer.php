<?php

namespace App\Services\Asaas\Entities;

class Customer
{
    public string $object;
    public string $id;
    public string $dateCreated;
    public string $name;
    public string $email;
    public ?string $company;
    public string $phone;
    public string $mobilePhone;
    public string $address;
    public string $addressNumber;
    public string $complement;
    public string $province;
    public string $postalCode;
    public string $cpfCnpj;
    public string $personType;
    public bool $deleted;
    public string $additionalEmails;
    public string $externalReference;
    public bool $notificationDisabled;
    public ?string $observations;
    public string $municipalInscription;
    public string $stateInscription;
    public bool $canDelete;
    public ?string $cannotBeDeletedReason;
    public bool $canEdit;
    public ?string $cannotEditReason;
    public bool $foreignCustomer;
    public int $city;
    public string $state;
    public string $country;

    public function __construct(array $data)
    {
        $this->object                   = data_get($data, 'object');
        $this->id                       = data_get($data, 'id');
        $this->dateCreated              = data_get($data, 'dateCreated');
        $this->name                     = data_get($data, 'name');
        $this->email                    = data_get($data, 'email');
        $this->company                  = data_get($data, 'company');
        $this->phone                    = data_get($data, 'phone');
        $this->mobilePhone              = data_get($data, 'mobilePhone');
        $this->address                  = data_get($data, 'address');
        $this->addressNumber            = data_get($data, 'addressNumber');
        $this->complement               = data_get($data, 'complement');
        $this->province                 = data_get($data, 'province');
        $this->postalCode               = data_get($data, 'postalCode');
        $this->cpfCnpj                  = data_get($data, 'cpfCnpj');
        $this->personType               = data_get($data, 'personType');
        $this->deleted                  = data_get($data, 'deleted');
        $this->additionalEmails         = data_get($data, 'additionalEmails');
        $this->externalReference        = data_get($data, 'externalReference');
        $this->notificationDisabled     = data_get($data, 'notificationDisabled');
        $this->observations             = data_get($data, 'observations');
        $this->municipalInscription     = data_get($data, 'municipalInscription');
        $this->stateInscription         = data_get($data, 'stateInscription');
        $this->canDelete                = data_get($data, 'canDelete');
        $this->cannotBeDeletedReason    = data_get($data, 'cannotBeDeletedReason');
        $this->canEdit                  = data_get($data, 'canEdit');
        $this->cannotEditReason         = data_get($data, 'cannotEditReason');
        $this->foreignCustomer          = data_get($data, 'foreignCustomer');
        $this->city                     = data_get($data, 'city');
        $this->state                    = data_get($data, 'state');
        $this->country                  = data_get($data, 'country');
    }
}
