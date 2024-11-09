<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function home(): View
    {
        if (Auth::user()->userable_type === Vendor::class)
        {
            session()->put('vendor', Vendor::query()->whereKey(Auth::user()->userable_id)->first());

            redirect()->route('dashboard');
        }
        return view('pages.vendor.home');
    }
}
