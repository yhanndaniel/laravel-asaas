<?php

namespace App\Services\Asaas\Requests;

use App\Services\Asaas\Entities\Discount;
use App\Services\Asaas\Entities\Fine;
use App\Services\Asaas\Entities\Interest;
use App\Services\Asaas\Enums\BillingType;
use Illuminate\Validation\Rules\Enum;

class CreatePaymentRequest extends BaseRequest
{
    public string $customer;
    public BillingType $billingType;
    public float $value;
    public string $dueDate;
    public ?string $description;
    public ?string $externalReference;
    public ?int $installmentCount;
    public ?float $installmentValue;
    public ?Discount $discount;
    public ?Interest $interest;
    public ?Fine $fine;
    public ?bool $postalService;

    public function __construct(
        string $customer,
        BillingType $billingType,
        float $value,
        string $dueDate,
        ?string $description,
        ?string $externalReference,
        ?int $installmentCount,
        ?float $installmentValue,
        ?Discount $discount,
        ?Interest $interest,
        ?Fine $fine,
        ?bool $postalService
    ) {
        $this->customer = $customer;
        $this->billingType = $billingType;
        $this->value = $value;
        $this->dueDate = $dueDate;
        $this->description = $description;
        $this->externalReference = $externalReference;
        $this->installmentCount = $installmentCount;
        $this->installmentValue = $installmentValue;
        $this->discount = $discount;
        $this->interest = $interest;
        $this->fine = $fine;
        $this->postalService = $postalService;
    }

    protected function validationRules($validationRules = [
        'customer' => 'required|string',
        'billingType' => [new Enum(BillingType::class), 'required'],
        'value' => 'required|numeric',
        'dueDate' => 'required|date',
        'description' => 'nullable|string',
        'externalReference' => 'nullable|string',
        'installmentCount' => 'nullable|integer',
        'installmentValue' => 'nullable|numeric',
        'discount' => '',
        'interest' => '',
        'fine' => '',
        'postalService' => 'nullable|boolean',
    ]): array
    {
        return $validationRules;
    }
}
