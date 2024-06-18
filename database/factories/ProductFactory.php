<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\CategoryProduct;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->domainName(),
            'barcode' => fake()->creditCardNumber(),
            'sku' => fake()->creditCardNumber(),
            'description' => fake()->realText(100),
            'status' => 'AVAILABLE',
            'srp' => fake()->randomFloat(2, 100, 2000),
            'points' => fake()->randomFloat(2, 100, 2000),
            'created_at' => Carbon::now()
        ];
    }

    /**
     * Configure the Model Library
     */
    public function configure(): static {
        return $this->afterMaking(function(Product $product) {
            // ...
        })->afterCreating(function(Product $product) {
            // ...
            // Code Below is for testing & research purposes:
            $products = Product::select(['id'])->get()->toArray();
            $product_categories = ProductCategory::select(['id'])->get()->toArray();

            $random_product_key_a = array_rand($products);
            $random_product_category_key_b = array_rand($product_categories);

            $user_wallet_a = CategoryProduct::insert([
                'product_id' => $products[$random_product_key_a]['id'],
                'product_category_id' => $product_categories[$random_product_category_key_b]['id'],
                'created_at' => Carbon::now()
            ]);
        });
    }
}