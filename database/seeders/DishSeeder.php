<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Restaurant;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            $restaurant->dishes()->createMany([
                ['name' => 'Signature Dish A', 'category' => 'Main Course', 'price' => 12.99, 'popularity_score' => rand(50,100), 'availability_status' => true],
                ['name' => 'Special Dish B',   'category' => 'Appetizer',   'price' => 7.49,  'popularity_score' => rand(50,100), 'availability_status' => true],
                ['name' => 'Dessert C',        'category' => 'Dessert',    'price' => 5.99,  'popularity_score' => rand(50,100), 'availability_status' => true],
            ]);
        }
    }
}
