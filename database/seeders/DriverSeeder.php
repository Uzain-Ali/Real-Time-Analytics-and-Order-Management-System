<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $drivers = [
            ['name' => 'Ali Khan'],
            ['name' => 'Sara Malik'],
            ['name' => 'John Doe'],
        ];

        foreach ($drivers as $driver) {
            Driver::create($driver);
        }
    }
}
