<?php

namespace App\Http\Livewire;

class StripePayment
{

    public function __construct(readonly private string $clientSecret) {
        Stripe::setApiKey($this->clientSecret);
        Stripe::setApiVersion('2022-11-15');
    }
}