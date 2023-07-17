<?php

namespace App\Services\Asaas\Enums;

enum BillingType: string
{
    case UNDEFINED = 'UNDEFINED';
    case BOLETO = 'BOLETO';
    case CREDIT_CARD = 'CREDIT_CARD';
    case PIX = 'PIX';
}
