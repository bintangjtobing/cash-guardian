<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site;
use App\Models\Area;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = Area::all();

        $sites = [
            ['name' => 'Toko Sparepart Kamera 1', 'area_id' => $areas->random()->id],
            ['name' => 'Toko Sparepart Kamera 2', 'area_id' => $areas->random()->id],
            ['name' => 'Gudang Sparepart Kamera 1', 'area_id' => $areas->random()->id],
            ['name' => 'Gudang Sparepart Kamera 2', 'area_id' => $areas->random()->id],
            ['name' => 'Toko Kamera 1', 'area_id' => $areas->random()->id],
            ['name' => 'Toko Kamera 2', 'area_id' => $areas->random()->id],
            ['name' => 'Gudang Kamera 1', 'area_id' => $areas->random()->id],
            ['name' => 'Gudang Kamera 2', 'area_id' => $areas->random()->id],
            ['name' => 'Pusat Layanan Kamera', 'area_id' => $areas->random()->id],
            ['name' => 'Pusat Layanan Sparepart Kamera', 'area_id' => $areas->random()->id],
        ];

        foreach ($sites as $site) {
            Site::create($site);
        }
    }
}
