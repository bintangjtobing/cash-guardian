<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PurchaseType;

class PurchaseTypeSeeder extends Seeder
{
    public function run()
    {
        // Pembelian ATK Kantor (Expenses)
        PurchaseType::create([
            'name' => 'Pembelian ATK Kantor',
            'transaction_type' => 'expenses',
        ]);

        // Pembelian Spare Part Kamera (Expenses)
        PurchaseType::create([
            'name' => 'Pembelian Spare Part Kamera',
            'transaction_type' => 'expenses',
        ]);

        // Reimburse Transport (Expenses)
        PurchaseType::create([
            'name' => 'Reimburse Transport',
            'transaction_type' => 'expenses',
        ]);

        // Reimburse Telekomunikasi (Expenses)
        PurchaseType::create([
            'name' => 'Reimburse Telekomunikasi',
            'transaction_type' => 'expenses',
        ]);

        // Pembelian Barang Fresh (Expenses)
        PurchaseType::create([
            'name' => 'Pembelian Barang Fresh',
            'transaction_type' => 'expenses',
        ]);

        // Pembelian Kamera (Expenses)
        PurchaseType::create([
            'name' => 'Pembelian Kamera',
            'transaction_type' => 'expenses',
        ]);

        // Penjualan Kamera (Income)
        PurchaseType::create([
            'name' => 'Penjualan Kamera',
            'transaction_type' => 'income',
        ]);

        // Penyewaan Kamera (Income)
        PurchaseType::create([
            'name' => 'Penyewaan Kamera',
            'transaction_type' => 'income',
        ]);

        // Jasa Perbaikan Kamera (Income)
        PurchaseType::create([
            'name' => 'Jasa Perbaikan Kamera',
            'transaction_type' => 'income',
        ]);

        // Penjualan Spare Part Kamera (Income)
        PurchaseType::create([
            'name' => 'Penjualan Spare Part Kamera',
            'transaction_type' => 'income',
        ]);
    }
}
