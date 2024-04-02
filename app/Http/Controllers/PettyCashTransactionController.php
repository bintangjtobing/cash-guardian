<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PettyCashTransaction;
use App\Models\PurchaseType;
use App\Models\PettyCashAccount;
use App\Models\Site;

class PettyCashTransactionController extends Controller
{
    public function index()
    {
        $transactions = PettyCashTransaction::with('pettyCashAccount', 'purchaseType', 'site.area')->paginate(5);
        return view('petty_cash_transactions.index', compact('transactions'));
    }

    public function create()
    {
        $pettyCashAccounts = PettyCashAccount::all();
        $purchaseTypes = PurchaseType::all();
        $sites = Site::all();
        return view('petty_cash_transactions.create', compact('pettyCashAccounts', 'purchaseTypes', 'sites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'petty_cash_account_id' => 'required|exists:petty_cash_accounts,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|string',
            'purchase_type_id' => 'nullable|exists:purchase_types,id',
            'site_id' => 'nullable|exists:sites,id',
            'transaction_date' => 'required|date', // validate transaction_date
        ]);

        $purchaseType = PurchaseType::find($request->purchase_type_id);

        $amount = str_replace('.', '', $request->amount);

        if (!is_numeric($amount)) {
            return redirect()->back()->with('error', 'Invalid amount format.');
        }

        $pettyCashTransaction = new PettyCashTransaction([
            'petty_cash_account_id' => $request->petty_cash_account_id,
            'description' => $request->description,
            'amount' => $amount,
            'transaction_type' => $purchaseType->transaction_type,
            'site_id' => $request->site_id,
            'transaction_date' => $request->transaction_date, // add transaction_date to fillable
        ]);

        if ($request->has('purchase_type_id')) {
            $purchaseType = PurchaseType::findOrFail($request->purchase_type_id);
            $pettyCashTransaction->purchaseType()->associate($purchaseType);
        }

        $pettyCashTransaction->save();

        return redirect()->route('petty-cash-transactions.index')->with('success', 'Petty Cash Transaction created successfully.');
    }

    public function show($id)
    {
        $transaction = PettyCashTransaction::with('pettyCashAccount', 'purchaseType', 'site')->findOrFail($id);
        return view('petty_cash_transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = PettyCashTransaction::findOrFail($id);
        $pettyCashAccounts = PettyCashAccount::all();
        $purchaseTypes = PurchaseType::all();
        $sites = Site::all();
        return view('petty_cash_transactions.edit', compact('transaction', 'pettyCashAccounts', 'purchaseTypes', 'sites'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'petty_cash_account_id' => 'required|exists:petty_cash_accounts,id',
            'description' => 'required|string|max:255',
            'amount' => 'required|string',
            'purchase_type_id' => 'nullable|exists:purchase_types,id',
            'site_id' => 'nullable|exists:sites,id',
            'transaction_date' => 'required|date', // validate transaction_date
        ]);

        $purchaseType = PurchaseType::find($request->purchase_type_id);

        $amount = str_replace('.', '', $request->amount);

        if (!is_numeric($amount)) {
            return redirect()->back()->with('error', 'Invalid amount format.');
        }

        $transaction = PettyCashTransaction::findOrFail($id);

        $transaction->update([
            'petty_cash_account_id' => $request->petty_cash_account_id,
            'description' => $request->description,
            'amount' => $amount,
            'transaction_type' => $purchaseType->transaction_type,
            'site_id' => $request->site_id,
            'transaction_date' => $request->transaction_date, // update transaction_date
        ]);

        if ($request->has('purchase_type_id')) {
            $purchaseType = PurchaseType::findOrFail($request->purchase_type_id);
            $transaction->purchaseType()->associate($purchaseType);
        }

        $transaction->save();

        return redirect()->route('petty-cash-transactions.index')->with('success', 'Petty Cash Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transaction = PettyCashTransaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('petty-cash-transactions.index')->with('success', 'Petty Cash Transaction deleted successfully.');
    }
}

