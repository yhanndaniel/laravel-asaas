<?php

namespace App\Http\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    public ModelsCustomer $customerModel;

    protected array $rules = [
        'customerModel.name' => 'required | string | max:255 | min:3',
        'customerModel.email' => 'nullable | email | max:255 | min:3 | unique:customers,email',
        'customerModel.cpfCnpj' => 'required | string | max:14 | min:11 | unique:customers,cpfCnpj',
    ];

    public function mount()
    {
        $this->customerModel = new ModelsCustomer();
    }

    public function render()
    {
        return view('livewire.customer');
    }

    public function create()
    {
        $this->validate();
        $this->customerModel->save();
    }
}
