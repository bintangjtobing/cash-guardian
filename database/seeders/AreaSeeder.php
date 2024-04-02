<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua ID kota yang ada
        $cityIds = City::pluck('id')->toArray();

        $areas = [
            'Mall Kelapa Gading',
            'Ruko Jati Junction',
            'Pasar Senayan',
            'Kantor Pondok Lensa',
            'kantor Pondok Lensa II',
            'Pasar Area CBD',
            'Kampus UI',
            'Stasiun Jatinegara',
            'Bandara Soekarno Hatta',
            'Taman Mini Indonesia'
        ];

        foreach ($areas as $area) {
            // Pilih ID kota secara acak dari array $cityIds
            $cityId = $cityIds[array_rand($cityIds)];

            Area::create([
                'name' => $area,
                'city_id' => $cityId
            ]);
        }
    }
}
