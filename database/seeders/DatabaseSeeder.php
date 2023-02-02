<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(10)->create();
        \App\Models\SubCategory::factory(10)->create();
        \App\Models\Coupon::factory(15)->create();
        \App\Models\Product::factory(30)->create();

        \App\Models\Admin::create([
            'name' => 'Iftekhar Pial',
            'email' => 'admin@test.com',
            'password' => Hash::make('123456')
        ]);
    }
}
