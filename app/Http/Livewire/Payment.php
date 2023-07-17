<?php

namespace App\Http\Livewire;

use App\Models\Payment as ModelsPayment;
use App\Services\Asaas\Entities\CreditCard;
use App\Services\Asaas\Enums\BillingType;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreatePaymentCreditCardRequest;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use App\Services\Asaas\Requests\CreditCardHolderInfoRequest;
use App\Services\Asaas\Requests\CreditCardRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class Payment extends Component
{

    public ModelsPayment $paymentModel;

    public $customer_id;

    public $creditCardName;
    public $creditCardNumber;
    public $creditCardMonth;
    public $creditCardYear;
    public $creditCardCvv;

    public $creditCardHolderName;
    public $creditCardHolderEmail;
    public $creditCardHolderCpfCnpj;
    public $creditCardHolderCep;
    public $creditCardHolderNumber;
    public $creditCardHolderComplement;
    public $creditCardHolderPhone;

    protected array $rules = [
        'paymentModel.billingType' => 'required',
        'paymentModel.value' => 'required|numeric',
        'creditCardName' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardNumber' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardMonth' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardYear' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardCvv' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderName' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderEmail' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderCpfCnpj' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderCep' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderNumber' => 'required_if:paymentModel.billingType,CREDIT_CARD',
        'creditCardHolderComplement' => '',
        'creditCardHolderPhone' => 'required_if:paymentModel.billingType,CREDIT_CARD',
    ];
    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
        $this->paymentModel = new ModelsPayment();
    }
    public function render()
    {
        return view('livewire.payment');
    }

    public function create()
    {
        $this->validate();
        $this->paymentModel->asaas_id_customer = $this->customer_id;
        $this->paymentModel->save();

        $type = '';

        switch ($this->paymentModel->billingType) {
            case 'UNDEFINED':
                $type = BillingType::UNDEFINED;
                break;
            case 'BOLETO':
                $type = BillingType::BOLETO;
                break;
            case 'CREDIT_CARD':
                $type = BillingType::CREDIT_CARD;
                $paymentRequestCreditCard = new CreatePaymentCreditCardRequest(
                    $this->customer_id,
                    $type,
                    $this->paymentModel->value,
                    Carbon::now()->format('Y-m-d'),
                    null,
                    $this->paymentModel->id, null, null, null, null, null,
                    null,
                    new CreditCardRequest($this->creditCardName, $this->creditCardNumber, $this->creditCardMonth, $this->creditCardYear, $this->creditCardCvv),
                    new CreditCardHolderInfoRequest($this->creditCardHolderName, $this->creditCardHolderEmail, $this->creditCardHolderCpfCnpj, $this->creditCardHolderCep, $this->creditCardHolderNumber, $this->creditCardHolderPhone, $this->creditCardHolderComplement, null),
                    null,
                    false,
                    '177.158.235.42',
                );
                $payment = Asaas::payments()->createCreditCard($paymentRequestCreditCard);

                $this->paymentModel->asaas_id_payment = $payment->id;
                $this->paymentModel->assas_payment_payload = $payment->toJson();
                $this->paymentModel->save();

        return redirect()->to('finish/' . $this->paymentModel->asaas_id_payment);
                break;
            case 'PIX':
                $type = BillingType::PIX;
                break;
            default:
                $type = BillingType::UNDEFINED;
                break;
        };

        $paymentRequest = new CreatePaymentRequest($this->customer_id, $type, $this->paymentModel->value, Carbon::now()->format('Y-m-d'), null, $this->paymentModel->id, null, null, null, null, null, null);

        $payment = Asaas::payments()->create($paymentRequest);

        $this->paymentModel->asaas_id_payment = $payment->id;
        $this->paymentModel->assas_payment_payload = $payment->toJson();
        $this->paymentModel->save();

        return redirect()->to('finish/' . $this->paymentModel->asaas_id_payment);
    }
}
