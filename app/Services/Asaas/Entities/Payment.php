<?php

namespace App\Services\Asaas\Entities;

class Payment
{
    public string $object;
    public string $id;
    public string $dateCreated;
    public string $customer;
    public ?string $paymentLink;
    public float $value;
    public float $netValue;
    public ?float $originalValue;
    public ?float $interestValue;
    public ?string $description;
    public string $billingType;
    public ?string $confirmedDate;
    public ?CreditCard $creditCard;
    public ?string $pixTransaction;
    public string $status;
    public ?string $dueDate;
    public ?string $originalDueDate;
    public ?string $paymentDate;
    public ?string $clientPaymentDate;
    public ?string $installmentNumber;
    public ?string $invoiceUrl;
    public ?string $invoiceNumber;
    public ?string $externalReference;
    public bool $deleted;
    public bool $anticipated;
    public bool $anticipable;
    public ?string $creditDate;
    public ?string $estimatedCreditDate;
    public ?string $transactionReceiptUrl;
    public ?string $nossoNumero;
    public ?string $bankSlipUrl;
    public ?string $lastInvoiceViewedDate;
    public ?string $lastBankSlipViewedDate;
    public ?Discount $discount;
    public ?Fine $fine;
    public ?Interest $interest;
    public ?string $postalService;
    public ?string $custody;
    public ?string $refunds;

    public function __construct(array $data)
    {
        $this->object                   = data_get($data, 'object');
        $this->id                       = data_get($data, 'id');
        $this->dateCreated              = data_get($data, 'dateCreated');
        $this->customer                 = data_get($data, 'customer');
        $this->paymentLink              = data_get($data, 'paymentLink');
        $this->value                    = data_get($data, 'value');
        $this->netValue                 = data_get($data, 'netValue');
        $this->originalValue            = data_get($data, 'originalValue');
        $this->interestValue            = data_get($data, 'interestValue');
        $this->description              = data_get($data, 'description');
        $this->billingType              = data_get($data, 'billingType');
        $this->confirmedDate            = data_get($data, 'confirmedDate');
        $this->creditCard               = new CreditCard(data_get($data, 'creditCard'));
        $this->pixTransaction           = data_get($data, 'pixTransaction');
        $this->status                   = data_get($data, 'status');
        $this->dueDate                  = data_get($data, 'dueDate');
        $this->originalDueDate          = data_get($data, 'originalDueDate');
        $this->paymentDate              = data_get($data, 'paymentDate');
        $this->clientPaymentDate        = data_get($data, 'clientPaymentDate');
        $this->installmentNumber        = data_get($data, 'installmentNumber');
        $this->invoiceUrl               = data_get($data, 'invoiceUrl');
        $this->invoiceNumber            = data_get($data, 'invoiceNumber');
        $this->externalReference        = data_get($data, 'externalReference');
        $this->deleted                  = data_get($data, 'deleted');
        $this->anticipated              = data_get($data, 'anticipated');
        $this->anticipable              = data_get($data, 'anticipable');
        $this->creditDate               = data_get($data, 'creditDate');
        $this->estimatedCreditDate      = data_get($data, 'estimatedCreditDate');
        $this->transactionReceiptUrl    = data_get($data, 'transactionReceiptUrl');
        $this->nossoNumero              = data_get($data, 'nossoNumero');
        $this->bankSlipUrl              = data_get($data, 'bankSlipUrl');
        $this->lastInvoiceViewedDate    = data_get($data, 'lastInvoiceViewedDate');
        $this->lastBankSlipViewedDate   = data_get($data, 'lastBankSlipViewedDate');
        $this->discount                 = new Discount(data_get($data, 'discount'));
        $this->fine                     = new Fine(data_get($data, 'fine'));
        $this->interest                 = new Interest(data_get($data, 'interest'));
        $this->postalService            = data_get($data, 'postalService');
        $this->custody                  = data_get($data, 'custody');
        $this->refunds                  = data_get($data, 'refunds');
    }

}
