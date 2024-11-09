<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin user
        $admin = Admin::create([
            'first_name' => config('app.admin.first_name'),
            'last_name' => config('app.admin.last_name'),
            'email' => config('app.admin.email'),
            'phone_number' => config('app.admin.phone_number'),
        ]);
        $adminUser = User::create([
            'name' => config('app.admin.name'),
            'email' => config('app.admin.email'),
            'userable_id' => $admin->id,
            'userable_type' => Admin::class,
            'phone_number' => config('app.admin.phone_number'),
            'password' => Hash::make(config('app.admin.password')),
        ]);

        $adminUser->role = 'A';
        $adminUser->save();
    }
}
