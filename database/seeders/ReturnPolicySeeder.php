<?php

namespace Database\Seeders;

use App\Models\ReturnPolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ReturnPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Arr::map(['30 days', '3 days', '7 days', '14 days', 'N/A', 'None', 'Not Eligible'], fn($rp) => ReturnPolicy::create(['name' => $rp]));
    }
}
