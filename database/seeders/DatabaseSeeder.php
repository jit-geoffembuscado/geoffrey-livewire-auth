<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Machine;
use App\Models\ProductCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'firstname' => 'Test',
        //     'lastname' => 'User',
        //     'email' => 'test@example.com',
        //     'contact_number' => '619-0000',
        //     'password' => Hash::make('password')
        // ]);

        // Code Below is for testing purposes:
        ProductCategory::factory()->count(4)->create();
        Product::factory()->count(16)->create();
        Machine::factory()->count(32)->create();
        Wallet::factory()->count(4)->create();
        User::factory()->count(8)->create();
    }
}
