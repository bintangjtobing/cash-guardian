<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PettyCashTransaction;
use App\Models\User;

class PettyCashReportController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi petty cash
        $transactions = PettyCashTransaction::orderBy('transaction_date', 'asc')->get();

        // Inisialisasi variabel saldo awal
        $saldo_awal = 0;

        // Buat array untuk menyimpan data laporan
        $reportData = [];

        // Iterasi setiap transaksi
        foreach ($transactions as $transaction) {
            // Tambahkan informasi transaksi ke dalam array laporan
            $reportData[] = [
                'nama_transaksi' => $transaction->purchaseType->name,
                'tanggal' => $transaction->transaction_date,
                'keterangan' => $transaction->description,
                'debet' => $transaction->purchaseType->transaction_type === 'income' ? $transaction->amount : 0,
                'kredit' => $transaction->purchaseType->transaction_type === 'expenses' ? $transaction->amount : 0,
            ];

            // Hitung saldo awal
            if ($transaction->purchaseType->transaction_type === 'income') {
                $saldo_awal = $transaction->amount;
            } else {
                $saldo_awal -= $transaction->amount;
            }
        }

        // Hitung total
        $total_debet = array_sum(array_column($reportData, 'debet'));
        $total_kredit = array_sum(array_column($reportData, 'kredit'));
        $total_saldo = $total_debet - $total_kredit;
        foreach ($transactions as $transaction) {
            if ($transaction->purchaseType->transaction_type === 'income') {
                $total_saldo += $transaction->amount;
            } else {
                $total_saldo -= $transaction->amount;
            }
        }

        // Kirim data laporan ke view
        return view('petty_cash_reports.index', compact('reportData', 'saldo_awal', 'total_debet', 'total_kredit', 'total_saldo'));
    }


}
