<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'asaas_id_customer',
        'asaas_id_payment',
        'assas_payment_payload',
        'value',
        'billingType',
    ];
}
