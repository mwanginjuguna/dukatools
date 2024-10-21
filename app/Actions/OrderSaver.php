<?php

namespace App\Actions;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderSaver
{
    public static function create($data  = [])
    {
        $cart = Cart::getCart();
        $cartTotal = Cart::getCartTotal();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'is_paid' => $data['is_paid'],
            'payment_method' => $data['payment_method'],
            'subtotal' => $cartTotal,
            'total' => $cartTotal,
            'customer_id' => $data['customer_id'],
            'discount_id' => $data['discount_id'],
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'],
        ]);

        // save order items
        foreach ($cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        return $order;
    }
}
