<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories= ['Laptop','Phone','Tablet'];
        $images= [
            'https://cdn.dummyjson.com/product-images/2/1.jpg',
    'https://cdn.dummyjson.com/product-images/19/1.jpg',
    'https://cdn.dummyjson.com/product-images/17/1.jpg',
    // "https://cdn.dummyjson.com/product-images/23/3.jpg",
    ];
        return [
            //
            'name'=>fake()->name(),
            'image'=>$images[rand(0,count($images)-1)],
        ];
    }
}
