<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Wallet;
use App\Models\UserWallet;
use App\Models\UserBalance;
use \Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'contact_number' => fake()->unique()->phoneNumber(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the Model Library
     */
    public function configure(): static {
        return $this->afterMaking(function(User $user) {
            // ...
        })->afterCreating(function(User $user) {
            // ...
            // Code Below is for testing & research purposes:
            $wallet = Wallet::select(['id'])->get()->toArray();

            if(count($wallet) > 0){
                $random_wallet_key_a = array_rand($wallet);
                $random_wallet_key_b = array_rand($wallet);

                $user_wallet_a = UserWallet::insert([
                    'user_id' => $user->id,
                    'wallet_id' => $wallet[$random_wallet_key_a]['id'],
                    'account_number' => fake()->randomNumber(9, true),
                    'created_at' => Carbon::now()
                ]);

                $user_wallet_a = UserWallet::insert([
                    'user_id' => $user->id,
                    'wallet_id' => $wallet[$random_wallet_key_b]['id'],
                    'account_number' => fake()->randomNumber(9, true),
                    'created_at' => Carbon::now()
                ]);

                $user_balance = UserBalance::insert([
                    'user_id' => $user->id,
                    'points_balance' => fake()->randomFloat(2, 500.00, 100000.00),
                    'created_at' => Carbon::now()
                ]);
            }
        });
    }
}