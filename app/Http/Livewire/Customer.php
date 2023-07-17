<?php

namespace App\Http\Livewire;

use App\Models\Customer as ModelsCustomer;
use App\Services\Asaas\Facades\Asaas;
use App\Services\Asaas\Requests\CreateCustomerRequest;
use Livewire\Component;
use WireUi\Traits\Actions;
class Customer extends Component
{

    use Actions;

    public ModelsCustomer $customerModel;

    public $tasks = [];

    protected array $rules = [
        'customerModel.name' => 'required | string | max:255 | min:3',
        'customerModel.email' => 'nullable | email | max:255 | min:3',
        'customerModel.cpfCnpj' => 'required |regex:/^([0-9]*)$/| max:14 | min:11 ',
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
        $this->customerModel->where('cpfCnpj', $this->customerModel->cpfCnpj)->first();
        $hasUser = ModelsCustomer::where('cpfCnpj', $this->customerModel->cpfCnpj)->first();
        if ($hasUser) {
            $hasUser->update($this->customerModel->toArray());
            return redirect()->to('payment/' . $hasUser->asaas_id);
        } else {
            $this->customerModel->save();
            $customerRequest = new CreateCustomerRequest($this->customerModel->name,
            $this->customerModel->cpfCnpj, $this->customerModel->email);
            $customerAsaas = Asaas::customers()->create($customerRequest);
            $this->customerModel->asaas_id = $customerAsaas->id;
            $this->customerModel->save();
            return redirect()->to('payment/' . $hasUser->asaas_id);
        }

    }
}
