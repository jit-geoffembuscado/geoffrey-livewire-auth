<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\Machine;
use App\Models\Product;
use App\Models\MachineProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    protected $model = Machine::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'code' => fake()->creditCardNumber(),
            'description' => fake()->paragraph(),
            'address' => fake()->address(),
            'active' => 1,
            'created_at' => Carbon::now()
        ];
    }

    /**
     * Configure the Model Library
     */
    public function configure(): static {
        return $this->afterMaking(function(Machine $machine) {
            // ...
        })->afterCreating(function(Machine $machine) {
            // ...
            // Code Below is for testing & research purposes:
            $products = Product::select(['id'])->get()->toArray();

            $ramdom_product_key_a = array_rand($products);
            $ramdom_product_key_b = array_rand($products);

            $machine_product_a = MachineProduct::insert([
                'product_id' => $products[$ramdom_product_key_a]['id'],
                'machine_id' => $machine->id,
                'created_at' => Carbon::now()
            ]);

            $machine_product_b = MachineProduct::insert([
                'product_id' => $products[$ramdom_product_key_b]['id'],
                'machine_id' => $machine->id,
                'created_at' => Carbon::now()
            ]);
        });
    }
}