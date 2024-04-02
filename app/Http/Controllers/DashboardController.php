<?php

namespace App\Http\Controllers;

use App\Models\PettyCashTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = PettyCashTransaction::with('pettyCashAccount', 'purchaseType', 'site.area')->orderBy('created_at', 'desc')->paginate(5);
        // Hitung total pendapatan (income)
        $totalIncome = PettyCashTransaction::whereHas('purchaseType', function ($query) {
            $query->where('transaction_type', 'income');
        })->sum('amount');

        // Hitung total pengeluaran (expenses)
        $totalExpenses = PettyCashTransaction::whereHas('purchaseType', function ($query) {
            $query->where('transaction_type', 'expenses');
        })->sum('amount');

        $profit = $totalIncome - $totalExpenses;

        // Kirim data ke view dashboard
        return view('home.index', compact('totalIncome', 'totalExpenses','transactions', 'profit'));
        // return response()->json([
        //     'status'=>200,
        //     'data'=>[
        //         'totalIncome'=> $totalIncome,
        //         'totalExpenses'=> $totalExpenses,
        //         'transactions'=> $transactions,
        //     ],
        //     'messages'=>'Data retrived successfully'
        // ]);
    }
}
