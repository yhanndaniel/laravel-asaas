<?php

use App\Services\Asaas\Entities\Customer;
use App\Services\Asaas\Facades\Asaas;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

test('api_get_customers_works', function () {

    Http::fake([
        'https://sandbox.asaas.com/api/v3/customers' => Http::response([
            'data' => [
                [
                    'object' => 'customer',
                    'id' => 'cus_000005363809',
                    'dateCreated' => '2023-07-16',
                    'name' => 'Yhann Daniel Gomes da Cruz',
                    'email' => null,
                    'company' => null,
                    'phone' => null,
                    'mobilePhone' => null,
                    'address' => null,
                    'addressNumber' => null,
                    'complement' => null,
                    'province' => null,
                    'postalCode' => null,
                    'cpfCnpj' => '00000000000',
                    'personType' => 'FISICA',
                    'deleted' => false,
                    'additionalEmails' => null,
                    'externalReference' => null,
                    'notificationDisabled' => false,
                    'observations' => null,
                    'municipalInscription' => null,
                    'stateInscription' => null,
                    'canDelete' => true,
                    'cannotBeDeletedReason' => null,
                    'canEdit' => true,
                    'cannotEditReason' => null,
                    'foreignCustomer' => false,
                    'city' => null,
                    'state' => null,
                    'country' => 'Brasil'
                ]
            ]
        ])
                ]);

    $customers = Asaas::customers()->get();

    expect($customers)
        ->toBeInstanceOf(Collection::class)
        ->and($customers->first())
        ->toBeInstanceOf(Customer::class)
        ->and($customers->first()->object)
        ->toBe('customer')
        ->and($customers->first()->id)
        ->toBe('cus_000005363809')
        ->and($customers->first()->name)
        ->toBe('Yhann Daniel Gomes da Cruz')
        ->and($customers->first()->cpfCnpj)
        ->toBe('00000000000')
        ->and($customers->first()->personType)
        ->toBe('FISICA')
        ->and($customers->first()->country)
        ->toBe('Brasil');
});
