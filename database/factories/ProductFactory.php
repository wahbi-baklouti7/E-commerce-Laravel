<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {


        $images= [
            'https://cdn.dummyjson.com/product-images/2/1.jpg',
            // 'https://cdn.dummyjson.com/product-images/8/4.jpg',
    // 'https://cdn.dummyjson.com/product-images/13/4.jpg',
    // 'https://cdn.dummyjson.com/product-images/16/2.webp',
    "https://cdn.dummyjson.com/product-images/23/3.jpg",
    // "https://cdn.dummyjson.com/product-images/23/thumbnail.jpg",
    // "https://cdn.dummyjson.com/product-images/28/3.png",
    // "https://cdn.dummyjson.com/product-images/21/2.jpg",
    // "https://cdn.dummyjson.com/product-images/22/1.jpg",
    "https://cdn.dummyjson.com/product-images/35/1.jpg",

    // "https://cdn.dummyjson.com/product-images/14/3.jpg",
    ];


        return [

            'name'=>fake()->name(),
            'photo'=>fake()->randomElement($images),
            'price'=>fake()->numberBetween(100,1000),
            'description'=>fake()->paragraph(),
            'category_id'=>Category::factory()->create()->id
        ];
    }
}
