<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch categories
        $solarPanels    = Category::where('name', 'Solar Panels')->first();
        $inverters      = Category::where('name', 'Inverters')->first();
        $storage        = Category::where('name', 'Storage (Batteries)')->first();
        $bos            = Category::where('name', 'BOS (Balance of System components)')->first();
        $efficiency     = Category::where('name', 'Energy Efficiency')->first();
        $specials       = Category::where('name', 'Specials / Offers')->first();

        // Fetch brands
        $longi      = Brand::where('name', 'LONGi')->first();
        $jaSolar    = Brand::where('name', 'JA Solar')->first();
        $trina      = Brand::where('name', 'Trina Solar')->first();
        $jinko      = Brand::where('name', 'Jinko Solar')->first();
        $sma        = Brand::where('name', 'SMA')->first();
        $huawei     = Brand::where('name', 'Huawei')->first();
        $sungrow    = Brand::where('name', 'Sungrow')->first();
        $fimer      = Brand::where('name', 'Fimer')->first();
        $hoppecke   = Brand::where('name', 'Hoppecke')->first();
        $studer     = Brand::where('name', 'Studer')->first();
        $hoblos     = Brand::where('name', 'Hoblos')->first();
        $ecopr      = Brand::where('name', 'Ecoprogetti')->first();
        $megarevo   = Brand::where('name', 'Megarevo')->first();
        $clenergy   = Brand::where('name', 'Clenergy')->first();

         Product::insert([
            // ✅ Solar Panels
            [
                'name' => 'LONGi 540W Solar Panel',
                'image' => '/images/longi-540w.jpg',
                'price' => 250.00,
                'description' => 'High-efficiency monocrystalline solar panel by LONGi.',
                'category_id' => $solarPanels->id,
                'brand_id' => $longi->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'JA Solar 550W Module',
                'image' => '/images/ja-550w.jpg',
                'price' => 240.00,
                'description' => 'Cost-effective 550W panel with strong performance in low-light.',
                'category_id' => $solarPanels->id,
                'brand_id' => $jaSolar->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Trina Solar 600W Panel',
                'image' => '/images/trina-600w.jpg',
                'price' => 280.00,
                'description' => '600W module for utility-scale solar farms.',
                'category_id' => $solarPanels->id,
                'brand_id' => $trina->id,
                'created_at' => now(), 'updated_at' => now()
            ],

            // ✅ Inverters
            [
                'name' => 'SMA Sunny Boy Inverter 5kW',
                'image' => '/images/sma-5kw.jpg',
                'price' => 1300.00,
                'description' => 'Reliable German-made solar inverter with smart features.',
                'category_id' => $inverters->id,
                'brand_id' => $sma->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Huawei SUN2000 10kW Inverter',
                'image' => '/images/huawei-10kw.jpg',
                'price' => 1200.00,
                'description' => 'Smart inverter with AI diagnostics and high efficiency.',
                'category_id' => $inverters->id,
                'brand_id' => $huawei->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Sungrow SG110CX Inverter',
                'image' => '/images/sungrow-110kw.jpg',
                'price' => 1500.00,
                'description' => '110kW commercial inverter with advanced safety features.',
                'category_id' => $inverters->id,
                'brand_id' => $sungrow->id,
                'created_at' => now(), 'updated_at' => now()
            ],

            // ✅ Storage (Batteries)
            [
                'name' => 'Hoppecke Energy Storage 10kWh',
                'image' => '/images/hoppecke-10kwh.jpg',
                'price' => 4000.00,
                'description' => 'Durable battery system for residential and small business use.',
                'category_id' => $storage->id,
                'brand_id' => $hoppecke->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Studer Xtender Battery 5kWh',
                'image' => '/images/studer-5kwh.jpg',
                'price' => 2500.00,
                'description' => 'Swiss battery solution with integrated inverter technology.',
                'category_id' => $storage->id,
                'brand_id' => $studer->id,
                'created_at' => now(), 'updated_at' => now()
            ],

            // ✅ BOS & Components
            [
                'name' => 'Clenergy PV Mounting System',
                'image' => '/images/clenergy-mount.jpg',
                'price' => 400.00,
                'description' => 'Reliable racking system for solar panels.',
                'category_id' => $bos->id,
                'brand_id' => $clenergy->id,
                'created_at' => now(), 'updated_at' => now()
            ],

            // ✅ Energy Efficiency
            [
                'name' => 'Ecoprogetti Solar Production Line',
                'image' => '/images/ecoprogetti-production.jpg',
                'price' => 150000.00,
                'description' => 'High-end automated solar module manufacturing line.',
                'category_id' => $efficiency->id,
                'brand_id' => $ecopr->id,
                'created_at' => now(), 'updated_at' => now()
            ],

            // ✅ Specials / Offers
            [
                'name' => 'Hoblos Hybrid Inverter - Special Offer',
                'image' => '/images/hoblos-special.jpg',
                'price' => 999.00,
                'description' => 'Special promotional hybrid inverter by Hoblos.',
                'category_id' => $specials->id,
                'brand_id' => $hoblos->id,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Megarevo Energy Storage System - Discounted',
                'image' => '/images/megarevo-storage.jpg',
                'price' => 3500.00,
                'description' => 'Discounted modular energy storage solution.',
                'category_id' => $specials->id,
                'brand_id' => $megarevo->id,
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
