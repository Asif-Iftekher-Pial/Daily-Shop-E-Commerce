<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
    public function definition()
    {
        return [
            'category_id' =>$this->faker->numberBetween($min = 1, $max = 10),
            'sub_category_id'=>$this->faker->numberBetween($min = 1, $max = 10),
            'title'=>$slug = $this->faker->unique()->sentence(2, true),
            'slug' => Str::slug($slug),
            'price'=>$this->faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 50),
            'offer_price'=>$this->faker->randomFloat($nbMaxDecimals = 1, $min = 1, $max = 50),
            'summary'=>$this->faker->unique()->sentence(20, true),
            'description'=>$this->faker->unique()->text($nbWords = 200, $variableNbWords = true),
            // 'image'=>$this->faker->imageUrl(250, 300),
            'image'=>'https://source.unsplash.com/250x300/?nature,water',

        ];

    }
}
