<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductVariant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            //here i have  Created product variants and linked  them with the product.
            $product->variants()->saveMany(ProductVariant::factory()->count(3)->make(['product_id' => $product->id]));
        });
    }
}
