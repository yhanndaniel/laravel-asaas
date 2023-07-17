<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Payment extends Component
{

    public $customer_id;
    public function mount($customer_id)
    {
        $this->customer_id = $customer_id;
    }
    public function render()
    {
        return view('livewire.payment');
    }
}
