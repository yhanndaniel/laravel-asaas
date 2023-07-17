<div class="p-2 pt-10">
    <x-card cardClasses="p-2 space-y-2 flex justify-center">
        Cliente: {{ $this->customer_id }}
        <x-native-select placeholder="Tipo de Pagamento" :options="['UNDEFINED', 'BOLETO', 'CREDIT_CARD', 'PIX']" wire:model="paymentModel.billingType" />
        <x-input wire:model.defer='paymentModel.value' type="text" placeholder="value" />

        <x-button wire:click="create" label="Criar" />
    </x-card>
</div>
