<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Wallet;
use App\Models\UserWallet;
use \Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBalance>
 */
class UserBalanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // The code below is for testing purposes.
        return [
            //
            'created_at' => Carbon::now()
        ];
    }
}