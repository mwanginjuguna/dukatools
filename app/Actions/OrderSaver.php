<?php

namespace App\Actions;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderSaver
{
    public static function create($data  = [])
    {
        $cart = Cart::getCart();
        $cartTotal = Cart::getCartTotal();

        $order = Order::create([
            'vendor_id' => $data['vendor_id'],
            'is_paid' => $data['is_paid'] ?? true,
            'payment_method' => $data['payment_method'] ?? 'N/A',
            'subtotal' => $cartTotal,
            'total' => $cartTotal,
            'status' => 'paid',
            'paid_at' => now(),
            'amount_paid' => $cartTotal
        ]);
//
//        'customer_id' => $data['customer_id'] ?? null,
//            'discount_id' => $data['discount_id'] ?? null,
//            'customer_name' => $data['customer_name'] ?? '',
//            'customer_email' => $data['customer_email'] ?? '',
//            'customer_phone' => $data['customer_phone'] ?? '',

        // save customer details
        $customer = $data['customer_id'] === null ? Customer::create(['source' => $data['customer_source'],'vendor_id' => $data['vendor_id']]) : Customer::find($data['customer_id']);

        $order->customer_id = $customer->id;

        if (isset($data['branch_id'])){
            $order->branch_id = $data['branch_id'];
        }

        if (isset($data['employee_id'])){
            $order->employee_id = $data['employee_id'];
        }

        if (Str::length($data['customer_phone']) > 1){
            $order->customer_phone = $data['customer_phone'];
            $customer->phone_number = $data['customer_phone'];
        }

        if (Str::length($data['customer_name']) > 1){
            $order->customer_name = $data['customer_name'];
            $customer->username = $data['customer_name'];
            $customer->first_name = $data['customer_name'];
        }

        if (Str::length($data['customer_email']) > 1){
            $order->customer_email = $data['customer_email'];
            $customer->email = $data['customer_email'];
        }

        $order->save();
        $customer->save();
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
