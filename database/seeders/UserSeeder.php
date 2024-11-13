<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 2 Super Admins
        $admin1 = User::create([
            'name' => 'Super Admin 1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin1->assignRole('admin'); // Assign the 'admin' role

        $admin2 = User::create([
            'name' => 'Super Admin 2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin2->assignRole('admin'); // Assign the 'admin' role

        // Create 5 Sellers
        $seller1 = User::create([
            'name' => 'Seller 1',
            'email' => 'seller1@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller1->assignRole('seller');

        $seller2 = User::create([
            'name' => 'Seller 2',
            'email' => 'seller2@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller2->assignRole('seller');

        $seller3 = User::create([
            'name' => 'Seller 3',
            'email' => 'seller3@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller3->assignRole('seller');

        $seller4 = User::create([
            'name' => 'Seller 4',
            'email' => 'seller4@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller4->assignRole('seller');

        $seller5 = User::create([
            'name' => 'Seller 5',
            'email' => 'seller5@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller5->assignRole('seller');

        // Create 5 Buyers
        $buyer1 = User::create([
            'name' => 'Buyer 1',
            'email' => 'buyer1@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer1->assignRole('buyer');

        $buyer2 = User::create([
            'name' => 'Buyer 2',
            'email' => 'buyer2@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer2->assignRole('buyer');

        $buyer3 = User::create([
            'name' => 'Buyer 3',
            'email' => 'buyer3@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer3->assignRole('buyer');

        $buyer4 = User::create([
            'name' => 'Buyer 4',
            'email' => 'buyer4@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer4->assignRole('buyer');

        $buyer5 = User::create([
            'name' => 'Buyer 5',
            'email' => 'buyer5@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer5->assignRole('buyer');
    }
}
