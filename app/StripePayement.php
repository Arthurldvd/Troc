<?php

namespace App;

use Stripe\Stripe;

class StripePayment
{

    public function __construct(readonly private string $clientSecret) {
        Stripe::setApiKey($this->clientSecret);
        Stripe::setApiVersion('2022-11-15');
    }

    public function startPayement(Cart $cart){
        

        $cartID = 12;
        $session = Session::create([
            // 'line_items' => [
            //     array_map(fn (array $product) => [
            //         'quantity' => 1,
            //         'price_data' => [
            //             'currency' => 'EUR',
            //             'product_data' => [
            //                 'name' => "test"
            //             ],
            //             'unit_amount' => 1000,
            //         ], )
            //]
            'mode' => 'payment',
            'success_url' => 'http://localhost:8000/success',
            'cancel_url' => 'http://localhost:8000/cancel',
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [
                'allowed_countries' => ['FR'],
            ],
            'metadata' => [
                'cart_id' => $cartID
            ]

            ]);
    }
}