<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(1, true),
            'percent_discount_value' =>$this->faker->randomNumber(2),
            'money_discount_value' =>$this->faker->randomNumber(2),
            'expiration_date'=>$this->faker->dateTime(),
            'code' => Str::random(5, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
        ];
    }
}
