<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart
{
    const DEFAULT_INSTANCE = 'shopping-cart';

    /**
     * get cart from session
     */
    public static function getCart()
    {
        return Session::get(self::DEFAULT_INSTANCE, new Collection);
    }

    /**
     * Get cart-total from session
     */
    public static function getCartTotal()
    {
        return Session::get('cart-total', 0.00);
    }

    /**
     * Add a product into the cart.
     * @param int $productId
     * @param int $quantity
     * @return bool
     */
    public static function addToCart(int $productId, int $quantity = 1): bool
    {
        // fetch cart instance from session  and product from database.
        $cart = self::getCart();
        $product = Product::find($productId);

        // update a product already in cart.
        if ($cart->has($product->name)) {
            $item = $cart->get($product->name);

            $item['quantity'] += $quantity;
            $item['subtotal'] = $item['product']['price'] * $item['quantity'];
            $item['image'] = $product->image;
            $item['user_id'] = Auth::user()->id ?? null;

            $cart->put($product->name, $item);
        } else {
            // add a new product into cart.
            $cart->put(
                $product->name, [
                    'product' => $product->only(['id', 'name', 'price']),
                    'quantity' => $quantity,
                    'image' => $product->image,
                    'user_id' => Auth::user()->id ?? null,
                    'subtotal' => $product->price * $quantity
                ]
            );
        }

        // Save cart to session
        Session::put(self::DEFAULT_INSTANCE, $cart);

        // Calculate total
        self::updateTotal();

        return true;
    }

    /**
     * Remove an item/product from the cart
     */
    public static function removeFromCart($productId, $quantity = 1): bool
    {
        // Load cart and product
        $cart = self::getCart();

        $product = Product::findOrFail($productId);

        $item = $cart->get($product->name);

        // Reducing quantity of the product
        if ($item['quantity'] > $quantity) {
            $item['quantity'] -= $quantity;
            $item['subtotal'] -= $product->price;
            $cart->put($product->name, $item);
        } else {
            // removing the product entirely
            $cart->forget($product->name);
        }

        // save changes
        Session::put(self::DEFAULT_INSTANCE, $cart);

        // calculate total
        self::updateTotal();
        return true;
    }

    /**
     * Destroy the cart
     */
    public static function destroyCart(): bool
    {
        Session::forget(self::DEFAULT_INSTANCE);
        Session::forget('cart-total');
        return true;
    }

    /**
     * Update cart total
     */
    public static function updateTotal(): bool
    {
        $cart = self::getCart();
        $cartTotal = $cart->map(fn($item) => $item['subtotal'])->sum();
        Session::put('cart-total', $cartTotal);
        return true;
    }

    /**
     * Create a new order based on cart items
     */
    public static function createOrder()
    {
        $cart = self::getCart();
        $order = new Order();
        $order->user_id = auth()->id();
        $order->save();

        foreach ($cart as $productId => $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->save();
        }

        self::destroyCart();
        return $order;
    }
}
