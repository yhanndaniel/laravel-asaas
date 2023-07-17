<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment as ModelsPayment;
class Finish extends Component
{
    public ModelsPayment $payment;

    public $payment_id;
    public function mount($payment_id)
    {
        $this->payment_id = $payment_id;
        $this->payment = ModelsPayment::where('asaas_id_payment', $payment_id)->first();
    }
    public function render()
    {
        return view('livewire.finish');
    }
}
