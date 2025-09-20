<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'SMA',
            'Huawei',
            'Sungrow',
            'Fimer',
            'Clenergy',
            'LONGi',
            'JA Solar',
            'Trina Solar',
            'Jinko Solar',
            'Hoppecke',
            'Studer',
            'Hoblos',
            'Ecoprogetti',
            'Megarevo',
        ];

        foreach ($brands as $name) {
            Brand::create([
                'name' => $name,
                'logo' => null, // you can update with actual logo paths later
            ]);
        }
    }
}
