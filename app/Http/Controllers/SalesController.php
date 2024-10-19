<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function pos()
    {
        return view('pages.sales.pos');
    }

    public function sales()
    {
        $data = $this->stats();

        return view('pages.sales.index', [
            'products' => $data['products']->count(),
            'purchasedProducts' => $this->purchasedProducts()->count(),
            'orders' => $data['orders']->get(),
            'customers' => $data['customers'],
            'users' => $data['users']->count(),
        ]);
    }
}
