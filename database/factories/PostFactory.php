<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
            'title' => fake()->word(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(100 , 5000),
            'number_of_product' => fake() -> numberBetween(1 , 9),
            'taxs' => fake() -> numberBetween(5 , 25),
            'image' => fake()->imageurl(),
            'quality' => fake() -> numberBetween(1 , 5),
            'kind' => $this->faker->randomElement(['men','women','kids']),
        ];
    }
}
