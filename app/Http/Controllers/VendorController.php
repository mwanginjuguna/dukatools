<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Branch;
use App\Models\Location;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    public function businesses(): View
    {
        $businesses = Business::query()
            ->with(['location', 'vendor', 'user'])
            ->paginate(12);

        return view('pages.businesses.index', [
            'businesses' => $businesses
        ]);
    }

    public function showBusiness(Business $business): View
    {
        $business->load(['location', 'vendor', 'user', 'branches', 'details']);

        return view('pages.businesses.show', [
            'business' => $business
        ]);
    }

    public function createBusiness(): View
    {
        $locations = Location::all();
        return view('pages.businesses.create', [
            'locations' => $locations
        ]);
    }

    public function storeBusiness(Request $request)
    {
        // Handle authentication
        if ($request->has('login_email')) {
            // Attempt login
            if (!Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
                return back()->withErrors([
                    'login_email' => 'The provided credentials do not match our records.',
                ])->withInput();
            }
        } elseif ($request->has('user_email')) {
            // Register new user
            $request->validate([
                'user_name' => 'required|string|max:255',
                'user_email' => 'required|string|email|max:255|unique:users,email',
                'user_password' => 'required|string|confirmed',
            ]);

            $user = User::create([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
            ]);

            Auth::login($user);
        }

        // Validate business data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        // Create vendor profile if it doesn't exist
        $vendor = Vendor::create([
            'username' => $user->name,
            'status' => 'active',
            'is_suspended' => false,
        ]);

        $user->userable_id = $vendor->id;
        $user->userable_type = Vendor::class;
        $user->save();

        // logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('business-logos', 'public');
        }

        // Format website URL if provided
        $website = $request->website;
        if ($website && !str_starts_with($website, 'http')) {
            $website = 'https://' . $website;
        }

        // Create business
        $business = Business::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
            'location' => $validated['location'],
            'website' => $website,
            'description' => $validated['description'],
            'logo' => $logoPath ?? null,
            'user_id' => Auth::id(),
            'vendor_id' => $vendor->id,
        ]);

        // Create branches if provided
        if ($request->has('branches')) {
            foreach ($request->branches as $branchData) {
                if (!empty($branchData['name'])) {
                    $business->branches()->create([
                        'name' => $branchData['name'],
                        'phone_number' => $branchData['phone_number'] ?? null,
                        'address' => $branchData['address'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('businesses.show', $business)
            ->with('success', 'Business registered successfully!');
    }
}
