<?php

namespace Database\Factories;

use App\Models\ConversionRate;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use \Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    protected $model = Wallet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // The code below is for testing purposes:
        return [
            //
            'title' => fake()->company(),
            'description' => fake()->paragraph(),
            'api_key' => Hash::make(fake()->company()),
            'api_url' => fake()->url(),
            'created_at' => Carbon::now()
        ];
    }

    /**
     * Configure the Model Library
     */
    public function configure(): static {
        return $this->afterMaking(function(Wallet $wallet) {
            // ...
        })->afterCreating(function(Wallet $wallet) {
            // ...
            $conversion_rates = ConversionRate::insert([
                'wallet_id' => $wallet->id,
                'rate' => fake()->randomDigit(),
                'created_at' => Carbon::now()
            ]);
        });
    }
}