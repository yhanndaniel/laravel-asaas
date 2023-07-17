<?php

namespace App\Http\Livewire;

use App\Models\Payment as ModelsPayment;
use App\Services\Asaas\Enums\BillingType;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreatePaymentRequest;
use Carbon\Carbon;
use Livewire\Component;

class Payment extends Component
{

    public ModelsPayment $paymentModel;

    public $customer_id;

    protected array $rules = [
        'paymentModel.billingType' => 'required',
        'paymentModel.value' => 'required|numeric',
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

        return redirect()->to('finish/' . $this->paymentModel->asaas_id);
    }
}
