<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class InventoryController extends Controller
{
    /**
     * Main Categories
     */
    public function categories(): View
    {
        return view('pages.inventory.categories');
    }

    /**
     * Main brands
     */
    public function brands(): View
    {
        return view('pages.inventory.brands');
    }

    /**
     * Customers
     */
    public function customers(): View
    {
        return view('pages.inventory.customers');
    }

    /**
     * Suppliers
     */
    public function suppliers(): View
    {
        return view('pages.inventory.suppliers');
    }

    /**
     * Manufacturers
     */
    public function manufacturers(): View
    {
        return view('pages.inventory.manufacturers');
    }
}
