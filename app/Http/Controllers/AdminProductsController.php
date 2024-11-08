<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    public function products(): View
    {
        $products = Product::query()->where('vendor_id', $this->vendor->id)->orderBy('views', 'desc')->get();
        $users = Customer::query()->where('vendor_id', $this->vendor->id)->get();

        return view('admin.products.index', [
            'products' => $products,
            'users' => $users,
            'purchasedProducts' => $this->purchasedProducts()->count()
        ]);
    }

    public function purchasedProducts(): Collection|array
    {
        return Product::query()->where('vendor_id', $this->vendor->id)->whereHas('orders')->get();
    }

    public function editProduct(Request $request, Product $product): View
    {
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }
}
