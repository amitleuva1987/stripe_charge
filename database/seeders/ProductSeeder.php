<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Apple Iphone 12',
            'price' => '1000',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Macbook Air',
            'price' => '1200',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Macbook Pro',
            'price' => '1400',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Samsung Galaxy',
            'price' => '1100',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Apple SmartWatch',
            'price' => '700',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Redmi Note 12',
            'price' => '400',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'HP pavalion G6',
            'price' => '600',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Reebok Shoes',
            'price' => '150',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Fasttrack Sunglasses',
            'price' => '170',
            'description' => fake()->text()
        ]);

        Product::create([
            'name' => 'Reebok Sunglasses',
            'price' => '120',
            'description' => fake()->text()
        ]);
    }
}
