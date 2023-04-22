<?php


$payement = new \App\StripePayement(STRIPE_SECRET);
$payement->startPayement($cart);