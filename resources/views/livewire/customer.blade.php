<div class="p-2 pt-10">
    <x-card cardClasses="p-2 space-y-2 flex justify-center">
        <x-input wire:model.defer='customerModel.name' type="text" placeholder="Nome" />
        <x-input wire:model.defer='customerModel.cpfCnpj' type="text" placeholder="Cpf/Cnpj" />
        <x-input wire:model.defer='customerModel.email' type="email" placeholder="E-mail" />


        <x-button wire:click="create" label="Criar" />
    </x-card>
</div>
