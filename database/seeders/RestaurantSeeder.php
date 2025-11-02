<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;


class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            ['name' => 'Pasta Palace', 'location' => 'Downtown', 'rating' => 4.6],
            ['name' => 'Burger Barn',  'location' => 'Midtown',  'rating' => 4.3],
            ['name' => 'Sushi Central', 'location' => 'Uptown',  'rating' => 4.8],
        ];

        foreach ($restaurants as $data) {
            Restaurant::create($data);
        }
    }
}
