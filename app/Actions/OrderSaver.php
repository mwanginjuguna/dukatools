<?php

namespace App\Actions;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderSaver
{
    public static function create($data  = [])
    {
        $cart = Cart::getCart();
        $cartTotal = Cart::getCartTotal();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'is_paid' => $data['is_paid'] ?? true,
            'payment_method' => $data['payment_method'] ?? 'N/A',
            'subtotal' => $cartTotal,
            'total' => $cartTotal,
            'status' => 'paid'
        ]);
//
//        'customer_id' => $data['customer_id'] ?? null,
//            'discount_id' => $data['discount_id'] ?? null,
//            'customer_name' => $data['customer_name'] ?? '',
//            'customer_email' => $data['customer_email'] ?? '',
//            'customer_phone' => $data['customer_phone'] ?? '',

        if (Str::length($data['customer_phone']) > 1){
            $order->customer_phone = $data['customer_phone'];
        }

        if (Str::length($data['customer_name']) > 1){
            $order->customer_name = $data['customer_name'];
        }

        if (Str::length($data['customer_email']) > 1){
            $order->customer_email = $data['customer_email'];
        }

        if (Str::length($data['customer_id']) > 1){
            $order->customer_id = $data['customer_id'];
        }

        $order->save();
        // save order items
        foreach ($cart as $item) {
            OrderItem::updateOrCreate([
                'order_id' => $order->id,
                'product_id' => $item['product']['id'],
            ], [
                'order_id' => $order->id,
                'product_id' => $item['product']['id'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal']
            ]);
        }

        return $order;
    }
}
