<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserGroups::class,
            CitySeeder::class,
            AreaSeeder::class,
            SiteSeeder::class,
            PettyCashSeeder::class,
            PurchaseTypeSeeder::class,
        ]);
    }
}
