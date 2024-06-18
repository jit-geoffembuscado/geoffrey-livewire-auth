<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWallet>
 */
class UserWalletFactory extends Factory
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