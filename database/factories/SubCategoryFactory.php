<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
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
            'sub_cat_name'=>$slug = $this->faker->unique()->sentence(2, true),
            'sub_cat_name_slug' => Str::slug($slug)
        ];
    }
}
