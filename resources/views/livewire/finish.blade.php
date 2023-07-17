<div>
    @if ($this->payment->billingType == 'BOLETO')
        Obrigado por gerar o boleto para baixar clique no link
        <a href="{{ json_decode($this->payment->assas_payment_payload)->bankSlipUrl }}">Clique aqui</a>
    @elseif ($this->payment->billingType == 'PIX')
        Obrigado por gerar o pix para pagar clique no link
        <a href="{{ json_decode($this->payment->assas_payment_payload)->invoiceUrl }}">Clique aqui</a>
    @endif
</div>
