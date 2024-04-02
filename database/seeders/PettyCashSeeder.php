<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PettyCashAccountGroup;
use App\Models\PettyCashAccount;

class PettyCashSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk Grup Akun Kas Kecil
        $groups = [
            'Umum',
            'Peralatan Kantor',
            'Pembelian Spare Part Kamera',
            'Transport',
            'Telekomunikasi',
            'Pembelian Barang Fresh'
        ];

        foreach ($groups as $groupName) {
            PettyCashAccountGroup::create([
                'name' => $groupName
            ]);
        }

        // Seeder untuk Akun Kas Kecil
        $accounts = [
            // Umum
            [
                'name' => 'Kas di Tangan',
                'group_id' => 1,
            ],
            [
                'name' => 'Laci Kas Kecil',
                'group_id' => 1,
            ],

            // Peralatan Kantor
            [
                'name' => 'Biaya Perlengkapan Kantor',
                'group_id' => 2,
            ],

            // Pembelian Spare Part Kamera
            [
                'name' => 'Pembelian Spare Part Kamera',
                'group_id' => 3,
            ],

            // Pembelian Kamera
            [
                'name' => 'Pembelian Kamera',
                'group_id' => 3,
            ],

            // Transport
            [
                'name' => 'Biaya Bahan Bakar',
                'group_id' => 4,
            ],
            [
                'name' => 'Ongkos Transportasi',
                'group_id' => 4,
            ],

            // Telekomunikasi
            [
                'name' => 'Biaya Pulsa',
                'group_id' => 5,
            ],
            [
                'name' => 'Biaya Internet',
                'group_id' => 5,
            ],

            // Pembelian Barang Fresh
            [
                'name' => 'Pembelian Makanan dan Minuman',
                'group_id' => 6,
            ],
        ];

        foreach ($accounts as $account) {
            PettyCashAccount::create($account);
        }
    }
}

