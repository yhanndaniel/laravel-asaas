<div class="p-2 pt-10">
    <x-card cardClasses="p-2 space-y-2 flex justify-center">
        Cliente: {{ $this->customer_id }}
        <x-native-select placeholder="Tipo de Pagamento" :options="['UNDEFINED', 'BOLETO', 'CREDIT_CARD', 'PIX']" wire:model="paymentModel.billingType" />
        <x-input wire:model.defer='paymentModel.value' type="text" placeholder="value" />

        @if ($this->paymentModel->billingType == 'CREDIT_CARD')
            Dados do Cartão
            <x-input wire:model.defer='creditCardName' type="text" placeholder="NOME" />
            <x-input wire:model.defer='creditCardNumber' type="text" placeholder="NUMERO" />
            <x-input wire:model.defer='creditCardMonth' type="text" placeholder="MES VALIDADE" />
            <x-input wire:model.defer='creditCardYear' type="text" placeholder="ANO VALIDADE" />
            <x-input wire:model.defer='creditCardCvv' type="text" placeholder="CVV" />
            Endereço de Cobrança
            <x-input wire:model.defer='creditCardHolderName' type="text" placeholder="NOME" />
            <x-input wire:model.defer='creditCardHolderEmail' type="text" placeholder="EMAIL" />
            <x-input wire:model.defer='creditCardHolderCpfCnpj' type="text" placeholder="CPF/CNPJ" />
            <x-input wire:model.defer='creditCardHolderCep' type="text" placeholder="CEP" />
            <x-input wire:model.defer='creditCardHolderNumber' type="text" placeholder="NUMERO" />
            <x-input wire:model.defer='creditCardHolderComplement' type="text" placeholder="COMPLEMENTO" />
            <x-input wire:model.defer='creditCardHolderPhone' type="text" placeholder="TELEFONE" />
        @endif

        <x-button wire:click="create" label="Criar" />
    </x-card>
</div>
