<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PettyCashTransaction;
use App\Models\PettyCashAccount;
use App\Models\PurchaseType;
use App\Models\Site;
use Carbon\Carbon;

class PettyCashTransactions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tentukan tanggal awal (1 Januari 2024)
        $startDate = Carbon::create(2024, 1, 1, 0, 0, 0);

        // Tentukan tanggal akhir (tanggal hari ini)
        $endDate = Carbon::now();

        // Generate dummy transactions
        for ($i = 1; $i <= 50; $i++) {
            $pettyCashAccount = PettyCashAccount::inRandomOrder()->first();
            $purchaseType = PurchaseType::inRandomOrder()->first();
            $site = Site::inRandomOrder()->first();

            $transactionType = $purchaseType->transaction_type;

            // Generate random amount
            $amount = rand(100000, 1000000);

            // Generate random transaction date between January 2024 and today
            $transactionDate = Carbon::createFromTimestamp(rand($startDate->timestamp, $endDate->timestamp));

            // Create petty cash transaction
            PettyCashTransaction::create([
                'petty_cash_account_id' => $pettyCashAccount->id,
                'purchase_type_id' => $purchaseType->id,
                'description' => 'Transaction ' . $i,
                'amount' => $amount,
                'transaction_type' => $transactionType,
                'site_id' => $site->id,
                'transaction_date' => $transactionDate,
            ]);
        }
    }
}
