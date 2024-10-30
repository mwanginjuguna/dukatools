<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function isAdmin(): bool
    {
        return Auth::user()->role === 'A';
    }

    public function topProducts($take = 5): Collection|array
    {
        return Product::query()->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('count(order_items.product_id) as count'))
            ->groupBy('products.id')
            ->orderBy('count', 'DESC')
            ->take($take)
            ->get();
    }

    public function purchasedProducts(): Collection|array
    {
        return Product::query()->whereHas('orders')->get();
    }

    public function stats(): \Illuminate\Support\Collection
    {
        return collect([
            'orders' => Order::query(),
            'products' => Product::query(),
            'users' => User::query()->whereNot('role', '=', 'A'),
            'purchasedProducts' => $this->purchasedProducts(),
            'customers' => Order::query()->selectRaw('count(distinct customer_id) as customers')->get()->first()->customers
        ]);
    }

}
