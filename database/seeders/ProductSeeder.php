<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a random seller or choose a specific one
        $user = User::whereHas('roles', function ($q) {
            $q->where('name', 'seller');
        })->first(); // Fetch the first seller from the database

        // Crete 20 products using a factory with random values
        Product::factory()->count(20)->create([
            'user_id' => $user->id,
        ]);
    }
}
