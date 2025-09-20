<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Solar Panels',
            'Inverters',
            'Storage (Batteries)',
            'BOS (Balance of System components)',
            'Energy Efficiency',
            'Specials / Offers',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}
