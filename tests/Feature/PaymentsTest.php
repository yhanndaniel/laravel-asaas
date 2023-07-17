<?php

use App\Services\Asaas\Entities\CreditCard;
use App\Services\Asaas\Entities\Discount;
use App\Services\Asaas\Entities\Fine;
use App\Services\Asaas\Entities\Interest;
use App\Services\Asaas\Entities\Payment;
use App\Services\Asaas\Enums\BillingType;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreatePaymentCreditCardRequest;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use App\Services\Asaas\Requests\CreditCardHolderInfoRequest;
use App\Services\Asaas\Requests\CreditCardRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

test('api_get_payments_works', function () {

    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments' => Http::response([
            'data' => [
                [
                    'object' => 'payment',
                    'id' => 'pay_3101282041890488',
                    'dateCreated' => '2023-07-16',
                    'customer' => 'cus_000005363844',
                    'paymentLink' => null,
                    'value' => 100.0,
                    'netValue' => 97.52,
                    'originalValue' => null,
                    'interestValue' => null,
                    'description' => null,
                    'billingType' => 'UNDEFINED',
                    'pixTransaction' => null,
                    'status' => 'PENDING',
                    'dueDate' => '2023-07-16',
                    'originalDueDate' => '2023-07-16',
                    'paymentDate' => null,
                    'originalDueDate' => null,
                    'paymentDate' => null,
                    'clientPaymentDate' => null,
                    'installmentNumber' => null,
                    'invoiceUrl' => 'https://sandbox.asaas.com/i/3101282041890488',
                    'invoiceNumber' => '03717764',
                    'externalReference' => null,
                    'deleted' => false,
                    'anticipated' => false,
                    'anticipable' => false,
                    'creditDate' => null,
                    'estimatedCreditDate' => null,
                    'transactionReceiptUrl' => null,
                    'nossoNumero' => '1093446',
                    'bankSlipUrl' => 'https://sandbox.asaas.com/b/pdf/3101282041890488',
                    'lastInvoiceViewedDate' => '2023-07-16T21:39:33Z',
                    'lastBankSlipViewedDate' => '2023-07-16T21:39:33Z',
                    'discount' => [
                        'value' => 0.00,
                        'limitDate' => null,
                        'dueDateLimitDays' => 0,
                        'type' => 'FIXED'
                    ],
                    'fine' => [
                        'value' => 0.00,
                        'type' => 'FIXED'
                    ],
                    'interest' => [
                        'value' => 0.00,
                        'type' => 'PERCENTAGE'
                    ],
                    'postalService' => false,
                    'custody' => null,
                    'refunds' => null
                ]
            ]
        ])
    ]);

    $payments = Asaas::payments()->get();

    expect($payments)
        ->toBeInstanceOf(Collection::class)
        ->and($payments->first())
        ->toBeInstanceOf(Payment::class)
        ->and($payments->first()->object)
        ->toBe('payment')
        ->and($payments->first()->id)
        ->toBe('pay_3101282041890488')
        ->and($payments->first()->dateCreated)
        ->toBe('2023-07-16')
        ->and($payments->first()->customer)
        ->toBe('cus_000005363844')
        ->and($payments->first()->value)
        ->toBe(100.0)
        ->and($payments->first()->netValue)
        ->toBe(97.52)
        ->and($payments->first()->discount)
        ->toBeInstanceOf(Discount::class)
        ->and($payments->first()->fine)
        ->toBeInstanceOf(Fine::class)
        ->and($payments->first()->interest)
        ->toBeInstanceOf(Interest::class);
});

test('api_get_payments_with_id_works', function () {

    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments/pay_3101282041890488' => Http::response([
            'object' => 'payment',
            'id' => 'pay_3101282041890488',
            'dateCreated' => '2023-07-16',
            'customer' => 'cus_000005363844',
            'paymentLink' => null,
            'value' => 100.0,
            'netValue' => 97.52,
            'originalValue' => null,
            'interestValue' => null,
            'description' => null,
            'billingType' => 'UNDEFINED',
            'pixTransaction' => null,
            'status' => 'PENDING',
            'dueDate' => '2023-07-16',
            'originalDueDate' => '2023-07-16',
            'paymentDate' => null,
            'originalDueDate' => null,
            'paymentDate' => null,
            'clientPaymentDate' => null,
            'installmentNumber' => null,
            'invoiceUrl' => 'https://sandbox.asaas.com/i/3101282041890488',
            'invoiceNumber' => '03717764',
            'externalReference' => null,
            'deleted' => false,
            'anticipated' => false,
            'anticipable' => false,
            'creditDate' => null,
            'estimatedCreditDate' => null,
            'transactionReceiptUrl' => null,
            'nossoNumero' => '1093446',
            'bankSlipUrl' => 'https://sandbox.asaas.com/b/pdf/3101282041890488',
            'lastInvoiceViewedDate' => '2023-07-16T21:39:33Z',
            'lastBankSlipViewedDate' => '2023-07-16T21:39:33Z',
            'discount' => [
                'value' => 0.00,
                'limitDate' => null,
                'dueDateLimitDays' => 0,
                'type' => 'FIXED'
            ],
            'fine' => [
                'value' => 0.00,
                'type' => 'FIXED'
            ],
            'interest' => [
                'value' => 0.00,
                'type' => 'PERCENTAGE'
            ],
            'postalService' => false,
            'custody' => null,
            'refunds' => null
        ])
    ]);

    $payments = Asaas::payments()->getOne('pay_3101282041890488');

    expect($payments)
        ->toBeInstanceOf(Payment::class)
        ->and($payments->object)
        ->toBe('payment')
        ->and($payments->id)
        ->toBe('pay_3101282041890488')
        ->and($payments->dateCreated)
        ->toBe('2023-07-16')
        ->and($payments->customer)
        ->toBe('cus_000005363844')
        ->and($payments->value)
        ->toBe(100.0)
        ->and($payments->netValue)
        ->toBe(97.52)
        ->and($payments->discount)
        ->toBeInstanceOf(Discount::class)
        ->and($payments->fine)
        ->toBeInstanceOf(Fine::class)
        ->and($payments->interest)
        ->toBeInstanceOf(Interest::class);

});

test('api_create_payment_works', function () {

    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments' => Http::response([
            'object' => 'payment',
            'id' => 'pay_3101282041890488',
            'dateCreated' => '2023-07-16',
            'customer' => 'cus_000005363844',
            'paymentLink' => null,
            'value' => 100.0,
            'netValue' => 97.52,
            'originalValue' => null,
            'interestValue' => null,
            'description' => null,
            'billingType' => 'UNDEFINED',
            'pixTransaction' => null,
            'status' => 'PENDING',
            'dueDate' => '2023-07-16',
            'originalDueDate' => '2023-07-16',
            'paymentDate' => null,
            'originalDueDate' => null,
            'paymentDate' => null,
            'clientPaymentDate' => null,
            'installmentNumber' => null,
            'invoiceUrl' => 'https://sandbox.asaas.com/i/3101282041890488',
            'invoiceNumber' => '03717764',
            'externalReference' => null,
            'deleted' => false,
            'anticipated' => false,
            'anticipable' => false,
            'creditDate' => null,
            'estimatedCreditDate' => null,
            'transactionReceiptUrl' => null,
            'nossoNumero' => '1093446',
            'bankSlipUrl' => 'https://sandbox.asaas.com/b/pdf/3101282041890488',
            'lastInvoiceViewedDate' => '2023-07-16T21:39:33Z',
            'lastBankSlipViewedDate' => '2023-07-16T21:39:33Z',
            'discount' => [
                'value' => 0.00,
                'limitDate' => null,
                'dueDateLimitDays' => 0,
                'type' => 'FIXED'
            ],
            'fine' => [
                'value' => 0.00,
                'type' => 'FIXED'
            ],
            'interest' => [
                'value' => 0.00,
                'type' => 'PERCENTAGE'
            ],
            'postalService' => false,
            'custody' => null,
            'refunds' => null
        ])
    ]);

    $paymentRequest = new CreatePaymentRequest('cus_000005363844', BillingType::UNDEFINED, 100, '2023-07-16', null, null, null, null, null, null, null, null, null, false);

    $payment = Asaas::payments()->create($paymentRequest);

    expect($payment)
        ->toBeInstanceOf(Payment::class)
        ->and($payment->object)
        ->toBe('payment')
        ->and($payment->dateCreated)
        ->toBe('2023-07-16')
        ->and($payment->customer)
        ->toBe('cus_000005363844')
        ->and($payment->value)
        ->toBe(100.0)
        ->and($payment->netValue)
        ->toBe(97.52)
        ->and($payment->discount)
        ->toBeInstanceOf(Discount::class)
        ->and($payment->fine)
        ->toBeInstanceOf(Fine::class)
        ->and($payment->interest)
        ->toBeInstanceOf(Interest::class);
});

test('api_create_payment_credit_card_works', function () {

    Http::fake([
        'https://sandbox.asaas.com/api/v3/payments' => Http::response([
            'object' => 'payment',
            'id' => 'pay_3657199349753446',
            'dateCreated' => '2023-07-17',
            'customer' => 'cus_000005363844',
            'paymentLink' => null,
            'value' => 100.0,
            'netValue' => 97.52,
            'originalValue' => null,
            'interestValue' => null,
            'description' => null,
            'billingType' => 'CREDIT_CARD',
            'confirmedDate' => '2023-07-17',
            'creditCard' => [
                'creditCardNumber' => '4479',
                'creditCardBrand' => 'MASTERCARD',
                'creditCardToken' => '41aaac25-e8ad-45b8-9e41-f3a67da4e532'
            ],
            'pixTransaction' => null,
            'status' => 'CONFIRMED',
            'dueDate' => '2023-07-17',
            'originalDueDate' => '2023-07-17',
            'paymentDate' => null,
            'clientPaymentDate' => '2023-07-17',
            'installmentNumber' => null,
            'invoiceUrl' => 'https://sandbox.asaas.com/i/3657199349753446',
            'invoiceNumber' => '03718164',
            'externalReference' => null,
            'deleted' => false,
            'anticipated' => false,
            'anticipable' => false,
            'creditDate' => '2023-08-17',
            'estimatedCreditDate' => '2023-08-17',
            'transactionReceiptUrl' => 'https://sandbox.asaas.com/comprovantes/6248509193272957',
            'nossoNumero' => null,
            'bankSlipUrl' => null,
            'lastInvoiceViewedDate' => null,
            'lastBankSlipViewedDate' => null,
            'postalService' => false,
            'custody' => null,
            'refunds' => null
        ])
    ]);

    $paymentCreditCardRequest = new CreatePaymentCreditCardRequest(
        'cus_000005363844',
        BillingType::CREDIT_CARD,
        100,
        '2023-07-17',
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        null,
        new CreditCardRequest('Ian Julio Vieira', '5158180524594479', '12', '2024', '243'),
        new CreditCardHolderInfoRequest('Ian Julio Vieira', 'email@gmail.com', '46429026868', '72602204', '12', '61993005225', null, null),
        null,
        false,
        '177.158.235.44'
    );

    $payment = Asaas::payments()->createCreditCard($paymentCreditCardRequest);

    expect($payment)
        ->toBeInstanceOf(Payment::class)
        ->and($payment->object)
        ->toBe('payment')
        ->and($payment->dateCreated)
        ->toBe('2023-07-17')
        ->and($payment->customer)
        ->toBe('cus_000005363844')
        ->and($payment->value)
        ->toBe(100.0)
        ->and($payment->netValue)
        ->toBe(97.52)
        ->and($payment->confirmedDate)
        ->toBe('2023-07-17')
        ->and($payment->creditCard)
        ->toBeInstanceOf(CreditCard::class)
        ->and($payment->creditCard->creditCardNumber)
        ->toBe('4479')
        ->and($payment->status)
        ->toBe('CONFIRMED');

});
