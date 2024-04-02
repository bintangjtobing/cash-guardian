<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserGroup;

class UserGroups extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group = [
            'Direktur',
            'Manager Toko',
            'Head',
            'Staff',
        ];

        foreach ($group as $group) {
            UserGroup::create(['name' => $group]);
        }
    }
}
