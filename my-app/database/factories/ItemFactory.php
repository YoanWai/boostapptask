<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'item' . $this->faker->numberBetween(1, 100),
            'price' => $this->faker->numberBetween(1, 1000),
            'discount' => $this->faker->numberBetween(0, 25),
            'favorite' => $this->faker->boolean(false)
        ];
    }
}
