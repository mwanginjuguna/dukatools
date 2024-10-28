<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function home(): View
    {
        return view('pages.vendor.home');
    }
}
