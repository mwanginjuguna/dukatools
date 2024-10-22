<?php

namespace App\Actions;

use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class PaymentProcessor
{
    public static array $data = [];

    /**
     * Initialize data
     */
    public static function setData(array $data): void
    {
        self::$data = $data;
    }

    public static function cash(float $cashAmount): float|string
    {

        // fetch the cart from session
        $cart = Cart::getCart();
        $cartTotal = Cart::getCartTotal();

        $change = $cashAmount - $cartTotal;

        Log::info('Cash payment', [
            'cashAmount' => $cashAmount,
            'cartTotal' => $cartTotal,
            'change' => $change,
            'data' => self::$data
        ]);

        return $change > 0 ? $change : 'Insufficient funds';
    }

    /**
     * Mpesa payments
     */
    public static function mpesa(string $phone, string $transactionCode, float $amount = 0,): void
    {
        // Process mpesa payment
        Log::info('Mpesa payment', [
            'phone' => $phone,
            'amount' => $amount,
            'transactionCode' => $transactionCode,
            'cart' => Cart::getCart(),
            'cartTotal' => Cart::getCartTotal(),
            'data' => self::$data,
        ]);
    }

    /**
     * Card payments
     */
    public static function card(string $transactionCode, float $amount): void
    {
        // Process card payment

        Log::info('Card Payment', [
            'amount' => $amount,
            'transactionCode' => $transactionCode,
            'cart' => Cart::getCart(),
            'cartTotal' => Cart::getCartTotal(),
            'data' => self::$data,
        ]);
    }
}
