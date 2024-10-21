<?php

namespace App\Actions;

use App\Models\Cart;

class PaymentProcessor
{
    public static function cash($cashAmount)
    {

        // fetch the cart from session
        $cart = Cart::getCart();
        $cartTotal = Cart::getCartTotal();

        $change = $cashAmount - $cartTotal;

        return $change > 0 ? $change : 'Insufficient funds';
    }
}
